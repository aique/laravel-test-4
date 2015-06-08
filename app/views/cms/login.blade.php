@extends('cms.layouts.main')

@section('css')

    @parent

    <link href="/css/cms/login.css" rel="stylesheet">

@stop

@section('content')

    <div class="container col-xs-4 col-xs-offset-4">

        @if($errors->has())

            <div class="alert alert-danger">

                @foreach($errors->all() as $error)

                    {{$error}}<br />

                @endforeach

            </div>

        @endif

        {{Form::open(array('route' => 'doCmsLogin', 'class' => 'form-signin'))}}

            <h2 class="form-signin-heading">Login</h2>

            <label for="inputEmail" class="sr-only">Correo electrónico</label>
            <input value="{{Input::get('email')}}" type="email" name="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>

            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>

            <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>

        {{Form::close()}}

    </div>

@stop