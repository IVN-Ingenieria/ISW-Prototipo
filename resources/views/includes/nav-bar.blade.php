
    <nav class="navbar navbar-default">
        <div class="container-fluid">


            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="{{URL::to('home')}}">Inicio <span class="sr-only">(current)</span></a></li>
                    <li><a href="#">Usuarios </a></li>
                    <li><a href="{{URL::to('reportes')}}">Reportes </a></li>
                    <li><a href="#">Administración </a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{Auth::user()->name}} <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{URL::to('auth/logout')}}">Desconectarse</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
