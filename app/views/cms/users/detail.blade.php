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
            <li>{{HTML::linkRoute('cmsUsers', 'Usuarios')}}</li>
            <li class="active">{{$user->email}}</li>
        </ol>

        <h1>{{$user->email}}</h1>

        <div class="container col-xs-8">

            <h2>Nombre</h2>

            <p>{{$user->first_name}}</p>

            <h2>Apellidos</h2>

            <p>{{$user->last_name}}</p>

        </div>

        <div class="detail-actions container col-xs-4">

            <ul>

                @if(count($user->posts) > 0)

                    <li>{{HTML::linkRoute('cmsUserPosts', 'Ver posts del usuario', array($user->id))}}</li>

                @else

                    <li>Este usuario no tiene posts</li>

                @endif

            </ul>

        </div>

    </div>

@stop