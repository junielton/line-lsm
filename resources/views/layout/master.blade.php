<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>LineLSM</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport" />
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="/vendor/adminlte/vendor/bootstrap/dist/css/bootstrap.min.css" />
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/vendor/adminlte/vendor/font-awesome/css/font-awesome.min.css" />
    <!-- Ionicons -->
    <link rel="stylesheet" href="/vendor/adminlte/vendor/Ionicons/css/ionicons.min.css" />

    <!-- Select2 -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css" />

    <!-- Theme style -->
    <link rel="stylesheet" href="/vendor/adminlte/dist/css/AdminLTE.min.css" />

    <!-- DataTables with bootstrap 3 style -->
    <link rel="stylesheet" href="//cdn.datatables.net/v/bs/dt-1.10.18/datatables.min.css" />

    <link rel="stylesheet" href="/vendor/adminlte/dist/css/skins/skin-red.min.css " />
    <link href="https://fonts.googleapis.com/css?family=Libre+Barcode+39" rel="stylesheet">
    <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic" />
</head>

<body class="hold-transition skin-red sidebar-mini ">
    <div class="wrapper">
        <!-- Main Header -->
        <header class="main-header">
            <!-- Logo -->
            <a href="{{ route('home') }}" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>LSM</b></span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>L.I.N.E</b>.LSM</span>
            </a>

            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">adminlte::adminlte.toggle_navigation</span>
                </a>
                <!-- Navbar Right Menu -->
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- <li>
                            <a href="#"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fa fa-fw fa-power-off"></i>
                                adminlte::adminlte.log_out
                            </a>
                            <form id="logout-form" action="http://127.0.0.1:8000/logout" method="POST"
                                style="display: none;">
                                <input type="hidden" name="_token" value="HkKRmRW9JuORjo2ru9gspaUyHNRQfA7bk9WID4ip" />
                            </form>

                            </li>
                        -->
                        <li>
                            <input class="btn btn-lg btn-danger" type="button" value="Imprimir" onclick="window.print()" />
                        </li>
                        <li>
                            <input class="btn btn-lg btn-danger" type="button" value="Voltar"
                                onClick="history.go(-1)" />
                        </li>
                        {{-- <li>
                            <input class="btn btn-lg btn-danger" type="button" value="Fechar" onclick="self.close()" />
                        </li> --}}
                    </ul>
                </div>
            </nav>
        </header>

        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar Menu -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="">
                        <a target="_blank" href="{{ route('descarregar') }}">
                            <i class="fa fa-fw fa-chevron-circle-down "></i>
                            <span>Descarregar</span>
                        </a>
                    </li>
                    <li class="">
                        <a target="_blank" href="{{ route('carregar') }}">
                            <i class="fa fa-fw fa-chevron-circle-up "></i>
                            <span>Carregar</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="{{ route('carga') }}">
                            <i class="fa fa-fw fa-truck "></i>
                            <span>Carga</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="{{ route('deposito') }}">
                            <i class="fa fa-fw fa-archive "></i>
                            <span>Deposito</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="{{ route('cliente') }}">
                            <i class="fa fa-fw fa-user "></i>
                            <span>Cliente</span>
                        </a>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <span clas><span class="glyphicon glyphicon-search"></span> Procurar</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-fw fa-circle-o "></i>
                                    <span>Pacote</span>
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li class="">
                                        <form action="{{
                                                    route('busca.pacote')
                                                }}" name="" method="get">
                                            <div class="input-group input-group-sm">
                                                <input type="text" placeholder="Nº Pacote" name="id"
                                                    class="form-control" />
                                                <span class="input-group-btn">
                                                    <button type="button" class="btn btn-danger btn-flat">
                                                        Procurar
                                                    </button>
                                                </span>
                                            </div>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-fw fa-circle-o "></i>
                                    <span>Pedido</span>
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li class="">
                                        <form action="{{
                                                    route('busca.pedido')
                                                }}" name="pedido" method="get">
                                            <div class="input-group input-group-sm">
                                                <input type="text" placeholder="Nº Pedido" name="pedido"
                                                    class="form-control" />
                                                <span class="input-group-btn">
                                                    <button type="button" class="btn btn-danger btn-flat">
                                                        Procurar
                                                    </button>
                                                </span>
                                            </div>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                            <li class="treeview">
                                <a href="#">
                                    <i class="fa fa-fw fa-circle-o "></i>
                                    <span>Projeto</span>
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li class="">
                                        <form action="{{
                                                    route('busca.projeto')
                                                }}" name="projeto" method="get">
                                            <div class="input-group input-group-sm">
                                                <input type="text" placeholder="Nº Projeto" name="projeto"
                                                    class="form-control" />
                                                <span class="input-group-btn">
                                                    <button type="button" class="btn btn-danger btn-flat">
                                                        Procurar
                                                    </button>
                                                </span>
                                            </div>
                                        </form>
                                    </li>
                                </ul>
                            </li>

                            {{-- Criar a rota e metodo para buscar clientes
                                <li class="treeview">
                                    <a href="#">
                                        <i class="fa fa-fw fa-circle-o "></i>
                                        <span>Cliente</span>
                                        <span class="pull-right-container">
                                            <i
                                                class="fa fa-angle-left pull-right"
                                            ></i>
                                        </span>
                                    </a>

                                    <ul class="treeview-menu">
                                        <li class="">
                                            <form
                                                action=""
                                                name=""
                                                method="get"
                                            >
                                                <div
                                                    class="input-group input-group-sm"
                                                >
                                                    <input
                                                        type="text"
                                                        placeholder="Nome do Cliente"
                                                        class="form-control"
                                                    />
                                                    <span
                                                        class="input-group-btn"
                                                    >
                                                        <button
                                                            type="button"
                                                            class="btn btn-danger btn-flat"
                                                        >
                                                            Procurar
                                                        </button>
                                                    </span>
                                                </div>
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                                --}}
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <span> <span class="fa fa-fw fa-clipboard "></span> Controle</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li class="treeview"></li>
                            <li class="">
                                <a href="{{ route('product.list') }}">
                                    <i class="glyphicon glyphicon-download-alt"></i>
                                    <span>Importar CSV</span>
                                </a>
                            </li>
                            <li class="">
                                <a href="{{ route('cadastro.formulario') }}">
                                    <i class="fa fa-fw fa-clipboard "></i>
                                    <span>Cadastrar</span>
                                </a>
                            </li>

                            <li class="">
                                <a href="{{ route('cont-pedidos') }}">
                                    <i class="glyphicon glyphicon-th-list"></i>
                                    <span>Controle de Pedidos</span>
                                </a>
                            <li class="">
                                <a href="{{ route('cont-pacote') }}">
                                    <i class="glyphicon glyphicon-th-large"></i>
                                    <span>Controle de Pacotes</span>
                                </a>
                            </li>
                    </li>
                </ul>
                </li>
                </ul>
                <!-- /.sidebar-menu -->
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header"></section>

            <!-- Main content -->
            <section class="content">
                @yield('conteudo')
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
    </div>
    <!-- ./wrapper -->

    <script src="/vendor/adminlte/vendor/jquery/dist/jquery.min.js"></script>
    <script src="/vendor/adminlte/vendor/jquery/dist/jquery.slimscroll.min.js"></script>
    <script src="/vendor/adminlte/vendor/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Select2 -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

    <!-- DataTables with bootstrap 3 renderer -->
    <script src="//cdn.datatables.net/v/bs/dt-1.10.18/datatables.min.js"></script>

    <!-- ChartJS -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js"></script>

    <script src="/vendor/adminlte/dist/js/adminlte.min.js"></script>
</body>

</html>
