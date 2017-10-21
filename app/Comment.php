<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * 当前这条评论数据所属的用户.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * 当前这条评论数据所属的文章
     */
    public function post()
    {
        return $this->belongsTo(Post::class,'target_id');
    }

    /**
     * 当前这条评论的回复评论
     */
    public function children()
    {
        return $this->hasMany(Comment::class,'parent_id');
    }

    /**
     * 当前这条评论的上层评论数据
     */
    public function parent()
    {
        return $this->belongsTo(Comment::class,'parent_id');
    }

    /**
     * 显示评论信息
     */
    public function show()
    {
        $output = <<<EOF
<div class="media">
    <a class="pull-left" href="#pablo">
        <div class="avatar">
            <img class="media-object" src="/storage/{$this->user->avatar}" alt="User Avatar" width="64" height="64">
        </div>
    </a>
    <div class="media-body">
        <h4 class="media-heading">{$this->user->name}<small>· {$this->created_at}</small></h4>
        <h6 class="text-muted"></h6>

        {$this->body}
        
        <div class="media-footer">
            <a href="#pablo" class="btn btn-primary btn-simple pull-right" rel="tooltip" title="" data-original-title="Reply to Comment">
                Reply
                <div class="ripple-container"></div></a> 
        </div>
        {$this->showChildren()}
    </div>
</div>
EOF;
        return $output;
    }

    /**
     * 显示子评论信息
     */
    public function showChildren()
    {
        $output = '';
        if($this->children){
            foreach ($this->children as $child){
                $output = $output.$child->show();
            }
        }
        return $output;
    }
}
