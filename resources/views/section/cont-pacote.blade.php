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
<div class="">
    <table class="table table-condensed table-striped table-hover">
        <thead>
            <th class="text-center">Pacote</th>
            <th class="text-center">Status</th>
            <th class="text-center">Cliente</th>
            <th class="text-center">Pedido</th>
            <th class="text-center">Projeto</th>
            <th class="text-center">Proj/Nome</th>
        </thead>
        @foreach ($pacotes as $p)
        <tr class="">
            <td class="text-center ">
                <h4>{{ $p->Id}}</h4>
            </td>
            <td class="text-center
        {{$p->status == 'deposito' ? 'alert-success' : '' }}
        {{$p->status == 'cliente' ? 'alert-info' : '' }}
        {{$p->status == 'carga' ? 'alert-danger' : '' }}
        {{$p->status == 'finalizado' ? 'alert-default' : '' }}
            ">
                <h4>{{ ucwords($p->status)}}</h4>
            </td>
            <td class="text-center">
                <h4>{{ ucwords ($p->Cliente)}}</h4>
            </td>
            <td class="text-center">
                <h4>{{$p->Pedido_id}}</h4>
            </td>
            <td class="text-center">
                <h4>{{$p->Id_Projeto}}</h4>
            </td>
            <td class="text-center">
                <h4>{{ ucwords($p->Nome_projeto)}}</h4>
            </td>
            <td class="text-center">
                <a class="btn btn-md btn-success" href="{{ route('pedido.deposito' , $p->Id)}}">Deposito</a>
            </td>
            <td class="text-center">
                <a class="btn btn-md btn-info" href="{{ route('pedido.cliente' , $p->Id)}}">Cliente</a>
            </td>
            <td class="text-center">
                <a href="{{ route('alt-pacote', $p -> Id )}}">
                    <span class="glyphicon glyphicon-pencil"></span>
                </a>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endif
@endsection
