<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;

class SiteMapController extends Controller
{
    /**
     * Create Dynamic SiteMap for this site
     *
     * @return \Illuminate\Http\Response
     */
    public function siteMap()
    {
        // create new site_map object
        $site_map = App::make('site_map');

        // set cache key (string), duration in minutes (Carbon|Datetime|int), turn on/off (boolean)
        // by default cache is disabled
        $site_map->setCache('laravel.site_map', 60);

        // check if there is cached site_map and build new only if is not
        if (!$site_map->isCached()) {
            // add item to the site_map (url, date, priority, freq)
            $site_map->add(URL::to('/'), '2012-08-25T20:10:00+02:00', '1.0', 'daily');
            $site_map->add(URL::to('page'), '2012-08-26T12:30:00+02:00', '0.9', 'monthly');

            // add item with translations (url, date, priority, freq, images, title, translations)
            $translations = [
                ['language' => 'fr', 'url' => URL::to('pageFr')],
                ['language' => 'de', 'url' => URL::to('pageDe')],
                ['language' => 'bg', 'url' => URL::to('pageBg')],
            ];
            $site_map->add(URL::to('pageEn'), '2015-06-24T14:30:00+02:00', '0.9', 'monthly', [], null, $translations);

            // add item with images
            $images = [
                ['url' => URL::to('images/pic1.jpg'), 'title' => 'Image title', 'caption' => 'Image caption', 'geo_location' => 'Plovdiv, Bulgaria'],
                ['url' => URL::to('images/pic2.jpg'), 'title' => 'Image title2', 'caption' => 'Image caption2'],
                ['url' => URL::to('images/pic3.jpg'), 'title' => 'Image title3'],
            ];
            $site_map->add(URL::to('post-with-images'), '2015-06-24T14:30:00+02:00', '0.9', 'monthly', $images);

            // get all posts from db
            $posts = DB::table('posts')->orderBy('created_at', 'desc')->get();

            // add every post to the site_map
            foreach ($posts as $post) {
                $site_map->add($post->slug, $post->modified, $post->priority, $post->freq);
            }
        }

        // show your site_map (options: 'xml' (default), 'html', 'txt', 'ror-rss', 'ror-rdf')
        return $site_map->render('xml');
    }
}
