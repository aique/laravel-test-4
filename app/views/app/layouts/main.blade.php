<!DOCTYPE html>

<html lang="es">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>LaravelBlog</title>

    </head>

    <body>

        <header class="navbar navbar-inverse navbar-fixed-top bs-docs-nav" role="banner">

            <div class="container">

                <div class="navbar-header">

                    <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <a href="{{URL::route('home')}}" class="navbar-brand">LaravelBlog</a>

                </div>

                <nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">

                    <form class="navbar-form navbar-right" role="search">
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Search">
                        </div>
                        <button type="submit" class="btn btn-default">Submit</button>
                    </form>

                    <ul class="nav navbar-nav">
                        <li class="active"><a href="{{URL::route('home')}}">Home</a></li>
                        <li><a href="contact.html">Contact</a></li>
                        <li><a href="about.html">About</a></li>
                    </ul>

                </nav>

            </div>

        </header>

        <div id="body" class="container">

            @yield('content')

        </div>

        <footer class="container">

            <div>
                <hr />
                <p class="text-center">Copyright © [Q]-Interactiva 2015. Todos los derechos reservados.</p>
            </div>

        </footer>

    </body>

    @section('css')

        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css" rel="stylesheet">

        {{ HTML::style('css/app/common.css'); }}

    @show

    @section('js')

        <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>

    @show

</html>