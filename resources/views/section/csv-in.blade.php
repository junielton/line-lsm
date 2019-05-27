@extends("layout.master")
@section('conteudo')
<div class="">
    <div class="">
        <div class="">
            {!! Form::open(array('route' => 'product.import','method'=>'POST','files'=>'true')) !!}
            <div class="row">
                <div class="col-xs-10 col-sm-10 col-md-10">
                    @if (Session::has('success'))
                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                    @elseif (Session::has('warnning'))
                    <div class="alert alert-warnning">{{ Session::get('warnning') }}</div>
                    @endif
                    <div class="form-group">
                        {!! Form::label('sample_file','Selecione um arquivo:',['class'=>'col-md-3'])
                        !!}
                        <div class="col-md-6">
                            {!! Form::file('relatorio', array('class' => 'form-control btn btn-default'
                            )) !!}
                            {!! $errors->first('relatorio', '<p class="alert alert-danger">:message</p>') !!}
                        </div>
                    </div>
                </div>
                <div class="col-xs-2 col-sm-2 col-md-2 text-center">
                    {!! Form::submit('Importar',['class'=>'btn btn-default']) !!}
                </div>
            </div>
            {!! Form::close() !!}
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <br /><Br />

                    <a target="_blank"
                    @foreach ($data as $d)
                    href="{{$d->link}}"
                    @endforeach
                        class="btn btn-warning" style="margin-right: 15px;">Download - CSV</a>
                    <!-- <a href="{{ route('product.export',['type'=>'xlsx']) }}" class="btn btn-primary"
                        style="margin-right: 15px;">Download - Excel xlsx</a> -->
                    <a href="{{ route('product.export',['type'=>'csv']) }}" class="btn btn-info"
                        style="margin-right: 15px;">Backup Deposito</a>

                    <br /><Br />
                    <table class="table table-condensed table-hover table-striped">
                        <tr>
                            <th>Id</th>
                            <th>Pedido</th>
                            <th>Nº Projeto</th>
                            <th>Cliente</th>
                            <th>Nome doProjeto</th>
                            <th>Carregamento</th>
                        </tr>

                        @foreach($itens as $iten)
                        <tr>
                            <td>{{$iten->Id}}</td>
                            <td>{{$iten->Pedido_id  }}</td>
                            <td>{{$iten->Id_Projeto}}</td>
                            <td>{{$iten->Cliente  }}</td>
                            <td>{{$iten->Nome_projeto}}</td>
                            <td>{{$iten->Data_carregamento  }}</td>

                        </tr>
                        @endforeach

                    </table>
                </div>
            </div>

        </div>

    </div>

</div>


@endsection
