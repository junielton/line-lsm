@extends("layout.master")
@section('conteudo')
@if(! $pedidos->count())
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
            <th class="text-center">Status</th>
            <th class="text-center">Pedido</th>
            <th class="text-center">Cliente</th>
            <th class="text-left">Proj/Nome</th>
        </thead>
        @foreach ($pedidos as $p)
        <tr class="">
            <td class="text-center
        {{$p->status == 'deposito' ? 'alert-success' : '' }}
        {{$p->status == 'cliente' ? 'alert-info' : '' }}
        {{$p->status == 'carga' ? 'alert-danger' : '' }}
        {{$p->status == 'finalizado' ? 'alert-default' : '' }}">

                <h4><strong>{{ strtoupper($p->status)}}</strong></h4>
            </td>
            <td class="text-center">
                <h4>{{$p->Pedido_id}}</h4>
            </td>
            <td class="text-center">
                <h4>{{ucwords($p->Cliente)}}</h4>
            </td>
            <td class="text-left">
                <h4>{{ ucwords($p->Nome_projeto)}}</h4>
            </td>

            <td class="text-center">
                <a class="btn btn-default" href="{{ route('pedido.form', $p->Id)}}">Editar Cliente</a>
            </td>

            <td class="text-center">
                <a class="btn btn-md btn-warning" href="{{ route('pedido.finalizado', $p->Pedido_id)}}">Finalizar Pedido</a>
            </td>
            <td class="text-center">
                <a class="btn btn-md btn-danger" href="{{ route('remove', $p->Pedido_id) }}">Excluir Pedido</a>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endif
@endsection
