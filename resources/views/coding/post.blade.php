@extends('layouts.basic')
@section('css')
<style>
    .index-page .wrapper > .header {
        height: 50vh;
    }
    #slogan {
        margin-top: 18vh;
        color: #FFFFFF;
        text-align: center;
    }
    .team {
        margin-top: 50px;
    }
    .team .team-player img {
        max-width: 88%;
    }
    .team .team-player .title {
        margin: 20px auto;
    }
    .content-publish{
        padding: 5% 0;
    }
    .content-footer{
        padding: 6% 0;
    }
    .section{
        padding: 0 0;
    }
    .font-yhl{
        font-family: "Microsoft YaHei UI Light";
    }
</style>
@endsection

@section('header')
    @include('partials.header')
@endsection

@section('content')
<div class="section">
    <div class="row">
        <!--  Begin Blog area	-->
        <div class="col-md-12">
            <div class="team">
                <div style="padding: 3% 8%">
                    <div  class="content-area">
                        <h3 class="content-title space20 text-center font-yhl">{{$post->title}}</h3>
                        <div class="content-body description">
                            <div class="content-publish">
                                <span class="text-muted pull-left">作者：Coding Man</span>
                                <span class="text-muted pull-right text-warning">发布日期：{{$post->updated_at->format('Y-m-d')}}</span>
                            </div>
                            <div class="post-content">
                                {!! $post->body !!}
                            </div>
                        </div>
                        <div class="content-footer">
                            <span class="text-muted pull-left">
                                @if(Auth::check())
                                <a href="/login">登陆 - 评论</a>
                                @else
                                <a href="/login">登陆 - 评论</a>
                                @endif
                            </span>
                        </div>
                        <div class="section section-comments">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="media-area">
                                        <h3 class="title text-center">{{$post->comments->count()}} Comments</h3>
                                        {!! $post->showComments() !!}
                                    </div>
                                    <h3 class="title text-center">Write What You Want</h3>
                                    <div class="media media-post">
                                        <a class="pull-left author" href="#pablo">
                                            <div class="avatar">
                                                <img class="media-object" alt="64x64" src="/storage/{{Auth::user()->avatar}}" width="150" height="150">
                                            </div>
                                        </a>
                                        <div class="media-body">
                                            <form id="post-comment" method="post" action="">
                                                <div class="form-group is-empty">
                                                    <input type="hidden" name="post" value="{{$post->id}}"/>
                                                    <input type="hidden" name="parent" value=""/>
                                                    <textarea class="form-control" placeholder="请在此散发你的荷尔蒙" rows="6"></textarea>
                                                    <span class="material-input"></span>
                                                </div>
                                                <div class="media-footer">
                                                    <button href="#pablo" class="btn btn-success btn-round btn-wd pull-right">发表评论</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div> <!-- end media-post -->
                                </div>
                            </div>
                        </div>
                        <br>
                    </div>
                </div>
                <br>
            </div>
        </div>
        <!-- End Blog list area -->
        <div class="col-md-12">
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
    $(window).load(function(){
        $(".post-content").css('line-height','2em').css('letter-spacing','1px').css('text-align','justify');
        $(".post-content p").css('margin','20px 0');
        $(".post-content img").css('margin','30px 0').addClass("img-responsive center-block img-rounded img-raised");
        $("pre").css("font-family", "Microsoft YaHei UI Light")
            .css('letter-spacing','1px')
            .css('line-height','2em');
    })
</script>
@endsection
