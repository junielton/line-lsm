@extends("layout.master")
@section('conteudo')

<div class="box box-danger">
    <div class="box-header with-border">
        <h3 class="box-title">Formulario para Alteração de Pacotes</h3>
    </div>

    <!-- /.box-header -->
    @foreach ($params as $p)
    <div class="box-body">
        <form action="{{ route('pacote-up') }}" method="get" role="form">
            <!-- text input -->
            <div class="row">
                <div>
                    <input type="hidden" value="{{ $p->ids }}" name="ids" />
                </div>
                <div class="form-group col-xs-2">
                    <label>Id</label>
                    <input required type="number" class="form-control" value="{{ $p->Id }}" name="Id" maxlength="4"
                        placeholder="Digite um Id para o pacote:" />
                </div>
                <!-- text input -->
                <div class="form-group col-xs-2">
                    <label for="sel1">Status</label>
                    <select class="form-control" value="{{ $p->status }}" name="status" id="sel1">
                        <option>deposito</option>
                        <option>carga</option>
                    </select>
                </div>
                <!-- text input -->
                <div class="form-group col-xs-4">
                    <label>Nome do Cliente</label>
                    <input type="text" required class="form-control" value="{{ $p->Cliente }}" maxlength="50"
                        name="Cliente" placeholder="Digite o nome do cliente:" />
                </div>
                <div class="form-group col-xs-4">
                    <label>Nome do Projeto</label>
                    <input type="text" required class="form-control" value="{{ $p->Nome_projeto }}" maxlength="50"
                        name="Nome_projeto" placeholder="Digite o nome do projeto:" />
                </div>
                <!-- text input -->
                <div class="form-group col-xs-4">
                    <label>Nº do Pedido</label>
                    <input type="number" required class="form-control" value="{{ $p->Pedido_id }}" maxlength="10"
                        name="Pedido_id" placeholder="Digite o Numero do pedido:" />
                </div>
                <!-- text input -->
                <div class="form-group col-lg-4">
                    <label>Nº do Projeto</label>
                    <input type="number" class="form-control" value="{{ $p->Id_Projeto }}" maxlength="10"
                        name="Id_Projeto" placeholder="Digite o numero do projeto:" />
                </div>
                <!-- text input -->
                <div class="form-group col-xs-4 ">
                    <label>Responsável</label>
                    <input type="text" class="form-control" value="{{ $p->Empacotado_por }}" maxlength="50" required
                        name="Empacotado_por" placeholder="Responsável pelo registro do produto:" />
                </div>
                <!-- text input -->
                <div class="form-group col-xs-12">
                    <label>Conteúdo do Pacote</label>
                    <textarea class="form-control" required rows=" 5" maxlength="260" name="Conte_do"
                        placeholder="Descreva o Conteúdo do pacote:">{{ $p->Conte_do }}
                    </textarea>
                </div>

                <!-- textarea -->
                <div class="form-group col-xs-12">
                    <label>Observações</label>
                    <textarea class="form-control" rows="5" maxlength="140" name="obs"
                        placeholder="Observações relacionadas a este cadastro:"> {{ $p->obs }}</textarea>
                </div>
                <div>
                    <input type="hidden" name="Data_cria_o" value="{{ $p->Data_cria_o }}">
                </div>
                <div>
                    <input type="hidden" name="Data_carregamento" value="{{ $p->Data_carregamento }}">
                </div>
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-danger">Atualizar</button>
            </div>
        </form>
    </div>
    @endforeach
</div>
@endsection
