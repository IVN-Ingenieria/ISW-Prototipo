    <?php
        if (empty($current)) $current = 0;
    ?>
    <nav class="navbar navbar-default">
        <div class="container-fluid">

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li{!!$current==0? ' class="active"': '' !!}><a href="{!! URL::to('home') !!}">Inicio</a>{!! $current==0? '<span class="sr-only">(current)</span>': '' !!}</li>
                    <li{!!$current==1? ' class="active"': '' !!}><a href="#">Usuarios</a>{!!$current==1? '<span class="sr-only">(current)</span>': '' !!}</li>
                    <li class="dropdown{!! $current==2? ' active': '' !!}">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Reportes <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{URL::to('report')}}">Trabajadores</a></li>
                            <li><a href="{{URL::to('report/xml')}}">Instituciones de salud</a></li>
                        </ul>
                    </li>
                    <li{!!$current==3? ' class="active"': '' !!}><a href="#">Administración</a>{!!$current==3? '<span class="sr-only">(current)</span>': '' !!}</li>
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
