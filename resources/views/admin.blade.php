<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>AdminLTE 2 | Dashboard</title>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

        <link rel="stylesheet" href="{{ elixir("css/admin.css") }}">

        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

    <body class="skin-blue sidebar-mini admin {{ $bodyClass }}">
        <div class="wrapper">
            <header class="main-header">
                <a href="#" class="logo">
                    <span class="logo-mini">
                        <b>L5</b>
                    </span>

                    <span class="logo-lg">
                        <b>Laravel 5</b> blog
                    </span>
                </a>

                <nav class="navbar navbar-static-top" role="navigation">
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">
                            Toggle navigation
                        </span>
                    </a>

                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <span class="hidden-xs">
                                        <i class="fa fa-user"></i>

                                        {{ Auth::user()->name }}
                                    </span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li class="user-footer">
                                        <a href="#" class="btn btn-default btn-flat">
                                            <i class="fa fa-power-off"></i> Sign out
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>

            <aside class="main-sidebar">
                <section class="sidebar">
                    @include('admin._menu')
                </section>
            </aside>

            <div class="content-wrapper">
                <section class="content-header">
                    @yield('breadcrumbs')
                </section>

                <section class="content">
                    <div class="box box-primary">
                        <div class="box-body">
                            @yield('content')
                        </div>
                    </div>
                </section>
            </div>

            <div class="control-sidebar-bg"></div>
        </div>

        <script>
            var flashMessage = "{{ Session::get('flash_message') }}";
            var flashMessageType = "{{ Session::get('flash_type', 'success') }}";
        </script>

        <script src="{{ elixir("js/admin.js") }}"></script>

        <script>
            $.widget.bridge('uibutton', $.ui.button);
        </script>

        @yield('scripts')
    </body>
</html>