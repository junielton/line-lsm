@extends("layout.master")
@section('conteudo')
@if(! $pacotes->count())
<div class="container text-center">
    <h2>Nada relacionado foi encontrado!</h2>
    <div class="alert alert-warning">
        <h2>O objeto referenciado não consta no sistema.</h2>
    </div>
</div>
@else
<div class=" panel panel-default">
    <div class="">
        <div class="row">
            <h4 class="text-danger col-xs-4 col-sm-4 col-md-4 text-center"><strong>
                    Pacotes na Carga </strong><span class="badge">{{ $carga }}</span></h4>
            <h4 class="text-success  col-xs-4 col-sm-4 col-md-4 text-center"><strong>
                    Pacotes no Deposito </strong><span class="badge">{{ $deposito }}</span></h4>
            <h4 class="text-info  col-xs-4 col-sm-4 col-md-4 text-center"><strong>
                    Pacotes no Cliente </strong><span class="badge">{{ $cliente }}</span></h4>
        </div>
    </div>
</div>
<div class="">
    <table class="table table-condensed table-striped table-hover">
        <thead>
            <th class="text-center">Pacote</th>
            <th class="text-center">Cliente</th>
            <th class="text-center">Pedido</th>
            <th class="text-center">Projeto</th>
            <th class="text-center">Proj/Nome</th>
            <th class="text-center">Status</th>
        </thead>
        @foreach ($pacotes as $p)
        <tr class="">
            <td class="text-center">
                <h4>{{$p->Id}}</h4>
            </td>
            <td class="text-center">
                <h4>{{ucwords($p->Cliente)}}</h4>
            </td>
            <td class="text-center">
                <h4>{{$p->Pedido_id}}</h4>
            </td>
            <td class="text-center">
                <h4>{{$p->Id_Projeto}}</h4>
            </td>
            <td class="text-center">
                <h4>{{ucwords($p->Nome_projeto)}}</h4>
            </td>

            <td class="text-center
            {{$p->status == 'deposito' ? 'alert-success' : '' }}
            {{$p->status == 'cliente' ? 'alert-info' : '' }}
            {{$p->status == 'carga' ? 'alert-danger' : '' }}">
                <h4><strong>{{ strtoupper($p->status)}}</strong></h4>
            </td>
            <td class="text-center">
                <a href="{{ route('pacote.detalhes') }}/{{ $p -> Id }}">
                    <span class=" glyphicon glyphicon-search"></span>
                </a>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endif
@endsection
