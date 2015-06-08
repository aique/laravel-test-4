@extends('cms.layouts.main')

@section('css')

    @parent

    <link href="/css/cms/common.css" rel="stylesheet">

@stop

@section('content')

    @include('cms.menu.main')

    <div class="container col-xs-6 col-xs-offset-3">

        <ol class="breadcrumb">
            <li>{{HTML::linkRoute('cmsHome', 'Home')}}</li>
            <li>{{HTML::linkRoute('cmsUsers', 'Usuarios')}}</li>
            <li>{{HTML::linkRoute('cmsUserDetail', $user->email, array($user->id))}}</li>
            <li class="active">Listado de posts</li>
        </ol>

        <h1>Listado de posts para {{$user->email}}</h1>

        @if(count($user->posts) > 0)

            <table class="table">

                <thead>

                <tr>

                    <th>
                        Título {{FilterPritner::printFilters($filter, URL::route('cmsUserPosts', $user->id), 'title')}}
                    </th>

                    <th>Acciones</th>

                </tr>

                </thead>

                <tbody>

                @foreach($user->posts as $post)

                    <tr>

                        <td>{{$post->title}}</td>
                        <td>
                            {{HTML::linkRoute('cmsPostDetail', 'Detalle', array($post->id), array('class' => 'btn btn-info'))}}
                        </td>

                    </tr>

                @endforeach

                </tbody>

            </table>

            {{$user->posts->links()}}

        @else

            <p>Este usuario no tiene ningun post</p>

        @endif

    </div>

@stop