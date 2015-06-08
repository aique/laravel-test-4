@extends('cms.layouts.main')

@section('css')

    @parent

    <link href="/css/cms/common.css" rel="stylesheet">
    <link href="/css/cms/modules.css" rel="stylesheet">

@stop

@section('content')

    @include('cms.menu.main')

    <div class="container col-xs-6 col-xs-offset-3">

        <h1>CMS LaravelBlog</h1>

        <ul class="modules">

            <li class="row">

                @if(Sentry::getUser()->hasAccess('superadmin'))

                    <div class="module col-xs-4">

                        {{HTML::linkRoute('cmsUsers', '', array(), array('class' => 'module-item', 'id' => 'user-module'))}}

                        <p class="module-desc">Usuarios</p>

                    </div>

                @endif

                <div class="module col-xs-4">

                    {{HTML::linkRoute('cmsPosts', '', array(), array('class' => 'module-item', 'id' => 'post-module'))}}

                    <p class="module-desc">Posts</p>

                </div>

                <div class="module col-xs-4">

                    {{HTML::linkRoute('cmsComments', '', array(), array('class' => 'module-item', 'id' => 'comment-module'))}}

                    <p class="module-desc">Comentarios</p>

                </div>

            </li>

        </ul>

    </div>

@stop