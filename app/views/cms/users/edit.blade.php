@extends('cms.layouts.main')

@section('css')

    @parent

    <link href="/css/cms/common.css" rel="stylesheet">

@stop

@section('content')

    @include('cms.menu.main')

    <div class="container col-xs-4 col-xs-offset-4">

        <ol class="breadcrumb">
            <li>{{HTML::linkRoute('cmsHome', 'Home')}}</li>
            <li>{{HTML::linkRoute('cmsUsers', 'Usuarios')}}</li>
            <li class="active">{{$user->email}}</li>
        </ol>

        <h1>{{$user->email}}</h1>

        {{Form::model($user, array('route' => array('cmsUserEdit', $user->id), 'class' => 'form-horizontal', 'role' => 'form'))}}

            @if($errors->has())

                <div class="alert alert-danger">

                    @foreach($errors->all() as $error)

                        {{$error}}<br />

                    @endforeach

                </div>

            @endif

            <div class="form-group">

                {{Form::label('first_name', 'Nombre', array('class' => 'control-label col-sm-2'))}}

                <div class="input-field col-sm-10">

                    {{Form::text('first_name')}}

                </div>

            </div>

            <div class="form-group">

                {{Form::label('last_name', 'Apellidos', array('class' => 'control-label col-sm-2'))}}

                <div class="input-field col-sm-10">

                    {{Form::text('last_name')}}

                </div>

            </div>

            <div class="form-group">

                <div class="col-sm-offset-2 col-sm-10">

                    {{Form::submit('Actualizar', array('class' => 'btn btn-default'))}}

                </div>

            </div>

        {{Form::close()}}

    </div>

@stop