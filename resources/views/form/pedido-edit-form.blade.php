@extends("layout.master")
@section('conteudo')

<div class="box box-danger">

    <div class="box-header with-border">
        <h3 class="box-title">Formulario para editar o nome do cliente.</h3>
    </div>

    <div class="box-body">
        @foreach ($params as $p)
        <form action="{{ route('pedido.edit') }}" method="get" role="form">
            <div class="row">
                <div>
                    <input type="hidden" value="{{ $p->Pedido_id }}" name="Pedido_id" />
                    <div class="form-group col-xs-12">
                        <label>Nome do Cliente</label>
                        <input type="text" required class="form-control" value="{{ $p->Cliente }}" maxlength="50"
                            name="Cliente" placeholder="Digite o nome do cliente, isso irá alterar todos os campos de nome de clientes desse pedido:" />
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-danger">Atualizar</button>
                    </div>
                </div>
            </div>
        </form>
        @endforeach
    </div>
    @endsection
