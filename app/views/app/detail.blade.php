@extends('app.layouts.main')

@section('css')

    @parent

    <link href="/css/app/detail.css" rel="stylesheet">
    <link href="/css/app/comment.css" rel="stylesheet">

@stop

@section('content')

    <div class="row">

        <h1>{{$post->title}}</h1>

        <div class="col-md-8">

            {{PostPrinter::printPostInDetail($post)}}
            {{CommentPrinter::printNewCommentForm($post)}}
            {{CommentPrinter::printPostComments($post)}}

        </div>

        <div class="col-md-4">

            {{WidgetPrinter::printSubscribeWidget()}}
            {{WidgetPrinter::printLatestPostsWidget($latestPosts)}}
            {{WidgetPrinter::printLatestCommentsWidget($latestComments)}}

        </div>

    </div>

@stop