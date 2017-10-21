<?php

namespace App;

use TCG\Voyager\Models\Post as VoyagerPost;

class Post extends VoyagerPost
{
    public function comments()
    {
        return $this->hasMany(Comment::class,'target_id');
    }

    public function getRootCommentsAttribute()
    {
        return Comment::where('target_id',$this->id)->where('parent_id',null)->get();
    }

    public function showComments()
    {
        $output = '';
        if($this->root_comments){
            foreach ($this->root_comments as $comment){
                $output= $output.$comment->show();
            }
        }
        return $output;
    }
}
