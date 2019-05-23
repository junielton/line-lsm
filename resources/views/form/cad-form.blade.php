@extends("layout.master")
@section('conteudo')

<div class="box box-danger">
    <div class="box-header with-border">
        <h3 class="box-title">Cadastro de Produtos</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <form action="{{ route('cadastro.produto') }}" method="get" role="form">
            <!-- text input -->
            <div class="row">
                <div class="form-group col-xs-2">
                    <label>Id</label>
                    <input type="text" required class="form-control" name="Id" maxlength="4"
                        placeholder="Digite um Id para o pacote:" />
                </div>
                <!-- text input -->
                <div class="form-group col-xs-2">
                    <label for="sel1">Status</label>
                    <select class="form-control" name="status" id="sel1">
                        <option>deposito</option>
                        <option>carga</option>

                    </select>
                </div>
                <!-- text input -->
                <div class="form-group col-xs-4">
                    <label>Nome do Cliente</label>
                    <input type="text" required class="form-control" maxlength="50" name="Cliente"
                        placeholder="Digite o nome do cliente:" />
                </div>
                <div class="form-group col-xs-4">
                    <label>Nome do Projeto</label>
                    <input type="text" required class="form-control" maxlength="50" name="Nome_projeto"
                        placeholder="Digite o nome do projeto:" />
                </div>
                <!-- text input -->
                <div class="form-group col-xs-4">
                    <label>Nº do Pedido</label>
                    <input type="number" required class="form-control" maxlength="10" name="Pedido_id"
                        placeholder="Digite o Numero do pedido:" />
                </div>
                <!-- text input -->
                <div class="form-group col-lg-4">
                    <label>Nº do Projeto</label>
                    <input type="number" class="form-control" maxlength="10" name="Id_Projeto"
                        placeholder="Digite o numero do projeto:" />
                </div>
                <!-- text input -->
                <div class="form-group col-xs-4 ">
                    <label>Responsável</label>
                    <input type="text" class="form-control" maxlength="50" required name="Empacotado_por"
                        placeholder="Responsável pelo registro do produto:" />
                </div>
                <!-- text input -->
                <div class="form-group col-xs-12">
                    <label>Conteúdo do Pacote</label>
                    <textarea class="form-control" required rows="5" maxlength="140" name="Conte_do"
                        placeholder="Descreva o Conteúdo do pacote:"></textarea>
                </div>

                <!-- textarea -->
                <div class="form-group col-xs-12">
                    <label>Observações</label>
                    <textarea class="form-control" rows="5" maxlength="140" name="obs"
                        placeholder="Observações relacionadas a este cadastro:"></textarea>
                </div>
                <div>
                    <input type="hidden" name="Data_cria_o" value="{{ now()->format('d/m/Y') }}">
                </div>
                <div>
                    <input type="hidden" name="Data_carregamento" value="{{ now()->format('d/m/Y') }}">
                </div>
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-danger">Cadastrar</button>
            </div>
        </form>
    </div>
</div>
@endsection
