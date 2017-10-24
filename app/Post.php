<?php

namespace App;

use TCG\Voyager\Models\Post as VoyagerPost;

class Post extends VoyagerPost
{
    /**
     * 获取当前文章所有的评论
     */
    public function comments()
    {
        return $this->hasMany(Comment::class,'target_id');
    }

    /**
     * 获取当前文章根节点评论
     */
    public function getRootCommentsAttribute()
    {
        return Comment::where('target_id',$this->id)
            ->where('parent_id',null)->get();
    }

    /**
     * 显示当前文章的所有评论信息
     */
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
