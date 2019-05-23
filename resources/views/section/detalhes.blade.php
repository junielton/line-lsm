@extends("layout.master") @section('conteudo') @if (! $id->count())
<div class="container text-center">
    <h2>Nada relacionado foi encontrado!</h2>
    <div class="alert alert-warning">
        <h2>O objeto referenciado não consta no sistema.</h2>
    </div>
</div>
@else @foreach ($id as $item)
<div class="container ">
    <div class="jumbotron ">
        <div class="container">
            <div class="row">
                <div class="col-xs-4 col-sm-4 col-md-4">
                    <h1>{{    $item->Id   }}</h1>
                </div>
                <div>
                    <h1 class="col-xs-4 col-sm-4 col-md-4"
                        style="font-size: 90px; font-family: 'Libre Barcode 39', cursive;">
                        *{{    $item->Id   }}*
                    </h1>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <h3><strong>Cliente</strong>: {{ ucwords($item->Cliente)}}</h3>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <h3><strong>Nome do Projeto:</strong> {{  ucwords($item->Nome_projeto) }}</h3>
                </div>
                <div class="col-xs-4 col-l col-sm-6 col-md-6">
                    <h3><strong>Nº Pedido:</strong> {{  $item->Pedido_id }}</h3>
                </div>
                <div class="col-xs-4 col-sm-6 col-md-6">
                    <h3><strong>Nº Projeto:</strong> {{  $item->Id_Projeto }}</h3>
                </div>
                <div class="col-xs-4 col-sm-6 col-md-6">
                    <h3><strong>Status</strong>: {{  strtoupper($item->status) }}</h3>
                </div>
                <div class="col-xs-4 col-sm-6 col-md-6">
                    <h3><strong>Data de Criação:</strong> {{  $item->Data_cria_o }}</h3>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <h3><strong>Obs:</strong> {{  $item->obs }}</h3>
                </div>
                <div>
                    <pre class=" col-xs-12 col-sm-12 col-md-12">
                <h3>{{  ucwords($item->Conte_do) }}</h3></pre>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@endif
@endsection
