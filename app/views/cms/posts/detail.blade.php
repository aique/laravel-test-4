@extends('cms.layouts.main')

@section('css')

    @parent

    <link href="/css/cms/common.css" rel="stylesheet">

@stop

@section('content')

    @include('cms.menu.main')

    <div class="detail container col-xs-6 col-xs-offset-3">

        <ol class="breadcrumb">
            <li>{{HTML::linkRoute('cmsHome', 'Home')}}</li>
            <li>{{HTML::linkRoute('cmsUsers', 'Posts')}}</li>
            <li class="active">{{$post->title}}</li>
        </ol>

        <h1>{{$post->title}}</h1>

        <div class="container col-xs-8">

            <h2>Título</h2>

            <p>{{$post->title}}</p>

            <h2>Autor</h2>

            <p>{{HTML::linkRoute('cmsUserDetail', $post->user->email, array($post->user->id))}}</p>

        </div>

        <div class="detail-actions container col-xs-4">

            <ul>

                <li>Ver comentarios del post</li>

            </ul>

        </div>

    </div>

@stop