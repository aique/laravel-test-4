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
            <li class="active">Usuarios</li>
        </ol>

        <h1>Usuarios</h1>

        @if(count($users) > 0)

            <table class="table">

                <thead>

                    <tr>

                        <th>Email {{FilterPritner::printFilters($filter, URL::route('cmsUsers'), 'email')}}</th>
                        <th>Grupo</th>
                        <th>Acciones</th>

                    </tr>

                </thead>

                <tbody>

                    @foreach($users as $user)

                        <tr>

                            <td>{{$user->email}}</td>
                            <td>{{UserPrinter::printGroups($user)}}</td>
                            <td>
                                {{HTML::linkRoute('cmsUserDetail', 'Detalle', array($user->id), array('class' => 'btn btn-info'))}}
                                {{HTML::linkRoute('cmsUserEdit', 'Editar', array($user->id), array('class' => 'btn btn-info'))}}
                                {{HTML::linkRoute('cmsUserDelete', 'Eliminar', array($user->id), array('class' => 'btn btn-danger'))}}
                            </td>

                        </tr>

                    @endforeach

                </tbody>

            </table>

        @else

            <p>No se han encontrado usuarios</p>

        @endif

    </div>

@stop