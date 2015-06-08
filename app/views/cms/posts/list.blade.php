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
            <li class="active">Posts</li>
        </ol>

        <h1>Posts</h1>

        {{Form::open(array('route' => 'cmsPosts', 'id' => 'form-post-filtering', 'class' => 'form-horizontal container col-xs-8 col-xs-offset-2', 'role' => 'form'))}}

            <div class="form-group">

                {{Form::label('extra_filter_1', 'Título', array('class' => 'control-label col-sm-2'))}}

                <div class="input-field col-sm-10">

                    {{Form::text('extra_filter_1', $filter->getExtraFilterValue(1), array('class' => 'form-control'))}}

                </div>

            </div>

            <div class="form-group">

                {{Form::label('extra_filter_2', 'Autor', array('class' => 'control-label col-sm-2'))}}

                <div class="input-field col-sm-10">

                    {{Form::select('extra_filter_2', $usersFilter, $filter->getExtraFilterValue(2), array('class' => 'form-control'))}}

                </div>

            </div>

            <div class="form-group">

                <div class="col-sm-offset-2 col-sm-10">

                    {{Form::submit('Buscar', array('class' => 'btn btn-default'))}}

                </div>

            </div>

        {{Form::close()}}

        @if(count($posts) > 0)

            <table class="table">

                <thead>

                    <tr>

                        <th>Título {{FilterPritner::printFilters($filter, URL::route('cmsPosts'), 'title')}}</th>
                        <th>Autor {{FilterPritner::printFilters($filter, URL::route('cmsPosts'), 'user')}}</th>
                        <th>Acciones</th>

                    </tr>

                </thead>

                <tbody>

                    @foreach($posts as $post)

                        <tr>

                            <td>{{$post->title}}</td>
                            <td>{{HTML::linkRoute('cmsUserDetail', $post->user->email, array($post->user->id))}}</td>

                            <td>
                                Detalle
                                Editar
                                Eliminar
                            </td>

                        </tr>

                    @endforeach

                </tbody>

            </table>

        @else

            <p class="no-results-message">No se han encontrado posts</p>

        @endif

        {{$posts->links()}}

    </div>

@stop