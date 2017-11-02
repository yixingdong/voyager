<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
use Illuminate\Support\Facades\Cache;


class PostController extends Controller
{
    use SEOToolsTrait;

    public function index(Request $request)
    {
        $this->seo()->setTitle('Home');
        $this->seo()->setDescription('This is a description for this page');
        $this->seo()->setCanonical(url('post'));

        $page = is_null($request->get('page'))?1:$request->get('page');

        $posts = Cache::remember('posts.'.$page, 10,function() use ($page){
            return Post::paginate(10);
        });
        //$posts = Post::paginate(10);
        return view('coding.posts',compact('posts'));
    }

    public function show($id)
    {
        $post = Cache::rememberForever('cc.post.'.$id, function() use ($id){
            return Post::where('id',$id)->firstOrFail();
        });

        $comments = Cache::rememberForever('cc.post.comment'.$id, function() use ($post){
            return $post->comments;
        });

        $this->seo()->setTitle($post->seo_title);
        $this->seo()->setDescription($post->meta_description);
        $this->seo()->setCanonical(url('post/'.$post->id));

        return view('coding.post',compact('post','comments'));
    }
}
