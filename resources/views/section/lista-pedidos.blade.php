@extends("layout.master") @section('conteudo') @if(! $pacotes->count())

<div class="container text-center">
    <h2>Nada relacionado foi encontrado!</h2>
    <div class="alert alert-warning">
        <h2>O objeto referenciado não consta no sistema.</h2>
    </div>
</div>
@else
<div class="row">
    @foreach ($pacotes as $p)
    <div class="container   col-xs-4 col-sm-4 col-md-4">
        <div class="jumbotron alert-default">
            <div class="page-header">
                <h4><strong>Pedido: </strong>{{ $p->Pedido_id }}</h4>
            </div>
            <div>
                <h4><strong>Cliente: </strong>{{ ucwords($p->Cliente) }}</h4>
                <h4><strong>Status: </strong>{{ strtoupper($p->status) }}</h4>
                <a class="btn btn-lg
                {{ $p->status=='deposito'?'alert-success':'' }}
                {{ $p->status=='carga'?'alert-danger':'' }}
                {{ $p->status=='cliente'?'alert-info':'' }}
                 btn-default"
                  href="{{  route('pedidoDetalhes')}}/{{ $p -> Pedido_id }}">Detalhes</a>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endif
@endsection
