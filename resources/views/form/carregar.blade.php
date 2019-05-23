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
        <h2>Nada para carregar</h2>
    </div>
    <div>
        <img src="img/line.jpg" alt="">
    </div>
</div>
@else
<div class="box-body-form">
    <div class="container-fluid">
        <div class="row">
            <div>
                <form class="" action="{{route('carregar')}}" method="get">
                    <label class="ls-label col-xs-4">
                        <div>
                            <input class="form-control input-control" placeholder="CARREGAR" maxlength="5" autofocus
                                type="text" name="id" value="">
                        </div>
                    </label>
                </form>
            </div>
            <div class="col-xs-2 count-control">
                <strong> {{ $count }}</strong>
            </div>
            <div class="col-xs-6 {{ $alert }} id-control">
                <strong> {{ $id }} </strong>
            </div>
        </div>
    </div>

    <div class="listaCarga">
        <table class="table  table-striped table-condensed table-hover">
            <thead>
                <th>Pacote</th>
                <th>Pedido</th>
                <th>Projeto</th>
                <th>Proj/Nome</th>
                <th>Conteudo</th>
                <th>D</th>
            </thead>
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
