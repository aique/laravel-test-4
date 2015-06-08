@extends('app.layouts.main')

@section('content')

    <div class="row">

        <h1>Últimos Posts</h1>

        <div class="col-md-8">

            @foreach($posts as $post)

                {{PostPrinter::printPost($post)}}

            @endforeach

            {{PagerPrinter::printPager($page, $posts, $totalPosts)}}

        </div>

        <div class="col-md-4">

            {{WidgetPrinter::printSubscribeWidget()}}
            {{WidgetPrinter::printLatestPostsWidget($latestPosts)}}
            {{WidgetPrinter::printLatestCommentsWidget($latestComments)}}

        </div>

    </div>

@stop