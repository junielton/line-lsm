<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8" />
    <link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/custom.css" rel="stylesheet" />

    <title>L.I.N.E</title>
</head>
@if (! $pacotes->count())
<div class="container text-center">
    <h2></h2>
    <div class="alert alert-info">
        <h2>Nada para descarregar</h2>
    </div>
    <div>
        <img src="img/line.jpg" alt="">
    </div>N
</div>
@else
<div class="box-body-form">

    <div class="container-fluid">
        <div class="row">
            <div>
                <form action=" {{route('descarregar')}}" method="get">
                    <label class="ls-label col-xs-4 col-sm-4 col-md-4">
                        <div>
                            <input class="form-control input-control" placeholder="DESCARREGAR" autofocus type="text"
                                maxlength="5" name="id">
                        </div>
                    </label>
                </form>
            </div>
            <div class="text-center col-xs-2 col-sm-2 col-md-2 count-control">
                <strong> {{ $count }}</strong>
            </div>
            <div class="text-center col-xs-6 col-sm-6 col-md-6 {{ $alert }} id-control">
                <strong> {{ $id }} </strong>
            </div>
        </div>
    </div>

    <div class="listaCarga">
        <table class="table  table-striped table-condensed table-hover">
            <div class="table-bordered">
                <thead>
                    <th>Pacote</th>
                    <th>Pedido</th>
                    <th>Projeto</th>
                    <th>Proj/Nome</th>
                    <th>Conteudo</th>
                    <th>D</th>
                </thead>
            </div>
            @foreach ($pacotes as $c)
            <tr>
                <td>
                    {{ ($c->Id) }}
                </td>
                <td>
                    {{$c->Pedido_id}}
                </td>
                <td>
                    {{$c->Id_Projeto}}
                </td>
                <td>
                    {{ substr($c->Nome_projeto, 0, 20) }}
                </td>
                <td>
                    {{ substr($c->Conte_do, 0 , 125) }}
                </td>
                <td>
                    <a href="{{ route('pacote.detalhes') }}/{{ $c -> Id }}">
                        <span class="glyphicon glyphicon-search"></span>
                    </a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
@endif
