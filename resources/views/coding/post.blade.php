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
