<?php

namespace line\Http\Controllers\system;

//use Excel;
use Illuminate\Http\Request;
use line\Http\Controllers\Controller;
use line\Model\Control;
use line\Model\Dataimp;
//use line\Model\CsvData;
use Redirect;

class systemController extends Controller
{
    //home
    public function index()
    {
        return view('section.home');
    }

    //formulário para cadastro
    public function cadastroForm()
    {
        return view('form.cad-form');
    }

    //Cadastrar novo produto
    public function cadastroProduto(Request $request)
    {
        $params = $request->all();
        $pacote = new Control($params);
        $pacote->save();
        return view('form.cad-form');
    }

    // método para deletar pedidos
    public function remove($id)
    {
        $delete = Control::where('Pedido_id', $id)->where('status', 'cliente');
        $delete->delete();
        return Redirect::back();
    }
    //lista os pedido para controle
    public function controleList()
    {
        $pedidos = Control::where('status', 'deposito')->groupBy('Pedido_id')->get();
        return view('section.controle', compact('pedidos'));
    }
    //lista pacotes para controle
    public function contPacote()
    {
        $pacotes = Control::all();
        return view('section.cont-pacote', compact('pacotes'));
    }

    public function altPacote($id)
    {
        $params = Control::all()->where('Id', $id);
        return view('form.alt-form', compact('params'));
    }
    //formulario para alterar nome de clientes
    public function pedidoForm($id)
    {
        $params = Control::all()->where('Id', $id);
        return view('form.pedido-edit-form', compact('params'));
    }

    //Editar clientes por pedido
    public function pedidoEdit(Request $request)
    {
        $answer = $request->input();
        $data = new Control($answer);
        $data->where('Pedido_id', $data->Pedido_id)
            ->update([
                'Cliente' => $data->Cliente,
            ]);
        $pedidos = Control::where('status', 'deposito')->groupBy('Pedido_id')->get();
        return view('section.controle', compact('pedidos'));
    }

    //alterar o status manualmente
    public function alterParaFinalizado($id)
    {
        Control::where('Pedido_id', $id)
            ->where('status', 'cliente')
            ->update(['status' => 'finalizado']);
        return Redirect::back();
    }

    //here
    public function alterParaDeposito($id)
    {
        Control::where('Id', $id)
            ->where('status', 'cliente')
            ->update(['status' => 'deposito']);
        return Redirect::back();
    }

    //here
    public function alterParaCliente($id)
    {
        Control::where('Id', $id)
            ->where('status', 'deposito')
            ->update(['status' => 'cliente']);
        return Redirect::back();
    }

    //método para fazer alteração de pacotes
    public function pacoteUp(Request $request)
    {
        $answer = $request->input();
        $data = new Control($answer);
        $data->where('ids', $data->ids)->update([
            'Id' => $data->Id,
            'status' => $data->status,
            'Cliente' => $data->Cliente,
            'Nome_projeto' => $data->Nome_projeto,
            'Pedido_id' => $data->Pedido_id,
            'Id_Projeto' => $data->Id_Projeto,
            'Empacotado_por' => $data->Empacotado_por,
            'Conte_do' => $data->Conte_do,
            'obs' => $data->obs,
        ]);
        $pacotes = Control::all();
        return view('section.cont-pacote', compact('pacotes'));
    }

    //métodos para pesquisa
    public function buscaPacote(Request $request)
    {
        $id = $request->all();
        $id = Control::where('Id', $id)->get();
        return view('section.detalhes', compact('id'));
    }
    public function pacoteDetalhes($id)
    {
        $id = Control::where('Id', $id)->get();
        return view('section.detalhes', compact('id'));
    }
    public function pedidoDetalhes($id)
    {
        $pacotes = Control::all()->where('Pedido_id', $id);
        $carga = $pacotes->where('status', 'carga')->count();
        $deposito = $pacotes->where('status', 'deposito')->count();
        $cliente = $pacotes->where('status', 'cliente')->count();
        return view('section.lista', compact('pacotes', 'carga', 'deposito', 'cliente'));
    }

    public function buscaProjeto(Request $request)
    {
        $id = $request->input();
        $pacotes = Control::where('Id_Projeto', $id)->get();
        $carga = $pacotes->where('status', 'carga')->count();
        $deposito = $pacotes->where('status', 'deposito')->count();
        $cliente = $pacotes->where('status', 'cliente')->count();
        return view('section.lista', compact('pacotes', 'carga', 'deposito', 'cliente'));
    }

    public function buscaPedido(Request $request)
    {
        $id = $request->input();
        $pacotes = Control::where('Pedido_id', $id)->get();
        $carga = $pacotes->where('status', 'carga')->count();
        $deposito = $pacotes->where('status', 'deposito')->count();
        $cliente = $pacotes->where('status', 'cliente')->count();
        return view('section.lista', compact('pacotes', 'carga', 'deposito', 'cliente'));
    }

    //listar produtos nos setores
    public function cargaConteudo()
    {

        $pacotes = Control::where('status', 'carga')->groupBy('Pedido_id')->get();
        return view('section.lista-pedidos', compact('pacotes'));
    }
    //here
    public function depositoConteudo()
    {
        $pacotes = Control::where('status', 'deposito')->groupBy('Pedido_id')->get();
        return view('section.lista-pedidos', compact('pacotes'));
    }

    public function clienteConteudo()
    {
        $pacotes = Control::where('status', 'cliente')->groupBy('Pedido_id')->get();
        return view('section.lista-pedidos', compact('pacotes'));
    }

    //function para descarregar
    public function unload(Request $request)
    { //pega o valor da url
        $id = $request->input();
        //verifica se o id existe
        //if ($test = Control::find($id)->toArray() == true) {
        //faz o update do status
        Control::where('Id', $id)->where('status', 'carga')->update(['status' => 'deposito']);
        //faz a contagem de pacotes restantes
        $count = Control::all()->where('status', 'carga')->count();
        //lista os pacotes restantes organizados id
        $pacotes = Control::where('status', 'carga')->orderBy('Id')->get();
        // p assa o id como texto para a vie w e  p assa a  cor da msg
        $id = implode("", $id);
        $alert = "text-success";
        //retorna a view com as variáveis
        return view('form.descarregar', compact('pacotes', 'count', 'id', 'alert'));
        // } else {
        //faz a contagem de pacotes restantes
        $count = Control::all()->where('status', 'carga')->count();
        //lista os pacotes restantes organizados id
        $pacotes = Control::where('status', 'carga')->orderBy('Id')->get();
        // passa  o id como texto para a vie w e  p assa a  cor da msg
        $id = "Não encontrado!";
        $alert = "text-danger";
        //retorna a view com as variáveis
        return view('form.descarregar', compact('pacotes', 'count', 'id', 'alert'));
        // };
    }
    // Function para
    public function load(Request $request)
    {
        //pega o valor da url
        $id = $request->input();
        //verifica se o id existe
        //if ($test = Control::find($id)->toArray() == true) {
        //faz o update do status
        Control::where('Id', $id)->where('status', 'deposito')->update(['status' => 'cliente']);
        //faz a contagem de pacotes restantes
        $count = Control::all()->where('status', 'deposito')->count();
        //lista os pacotes restantes organizados id
        $pacotes = Control::where('status', 'deposito')->orderBy('Id')->get();
        //  passa o id como texto para a vi ew e   passa a  cor da msg
        $id = implode("", $id);
        $alert = "text-success";
        //retorna a view com as variáveis
        return view('form.carregar', compact('pacotes', 'count', 'id', 'alert'));
        //  } else {
        //faz a contagem de pacotes restantes
        $count = Control::all()->where('status', 'deposito')->count();
        //lista os pacotes restantes organizados id
        $pacotes = Control::where('status', 'deposito')->orderBy('Id')->get();
        // passa  o id como texto para a vi ew e   passa  a cor da msg
        $id = "Não encontrado!";
        $alert = "text-danger";
        //retorna a view com as variáveis
        return view('form.carregar', compact('pacotes', 'count', 'id', 'alert'));
        // };
    }
    //Metodos para importar csv
    //ini
    function list()
    {
        $itens = Control::get();
        $data = Dataimp::all();
        return view('section.csv-in', compact('itens', 'data'));
    }

    // public function productsImport(Request $request)
    // {
    //     if (true) {
    //         $path = $request->file('relatorio')->getPathName();
    //         $data = \Excel::load($path)->get();
    //         if ($data->count()) {
    //             foreach ($data as $value) {
    //                 $product_list[] = [
    //                     'Id' => $value->id,
    //                     'Cliente' => $value->cliente,
    //                     'Pedido_id' => $value->pedido_id,
    //                     'N_mero_pedido' => $value->numero_pedido,
    //                     'Id_Projeto' => $value->id_projeto,
    //                     'Nome_projeto' => $value->nome_projeto,
    //                     'Empacotado_por' => $value->empacotado_por,
    //                     'Data_cria_o' => $value->data_cria_o,
    //                     'Carregado_por' => $value->carregado_por,
    //                     'Data_carregamento' => $value->data_carregamento,
    //                     'Conte_do' => $value->conte_do,
    //                     'Entrega_id' => $value->entrega_id,
    //                 ];
    //             }
    //             if (!empty($product_list)) {

    //                 Control::insert($product_list);
    //                 \Session::flash('success', 'Arquivo importado com sucesso.');
    //             }
    //         }
    //     } else {
    //         \Session::flash('warning', 'Nenhum arquivo foi selecionado.');
    //     }
    //     return Redirect::back();
    // }

    public function productsExport($type)
    {
        $products = Control::where('status', ' deposito')->orderBy('Pedido_id')->select(
            'Id',
            'Cliente',
            'Pedido_id',
            'N_mero_pedido',
            'Id_Projeto',
            'Nome_projeto',
            'Empacotado_por ',
            'Data_cria_o',
            'Carregado_por',
            'Data_carregamento',
            'Conte_do ',
            'Entrega_id'

        )->get()->toArray();
        return \Excel::create('
        ', function ($excel) use ($products) {
            $excel->sheet('Product Details', function ($sheet) use ($products) {
                $sheet->fromArray($products);
            });
        })->download($type);
    }
    //end

    //ini option 2
    public function productsImport(Request $request)
    {
        $path = $request->file('relatorio')->getPathName();
        if (($handle = fopen($path, 'r')) !== FALSE) {
            fgetcsv($handle);
            while (($data = fgetcsv($handle, 1000, ',')) !== FALSE) {
                $csv_data = new Control();
                $csv_data->Id = $data[0];
                $csv_data->Cliente = $data[1];
                $csv_data->Pedido_id = $data[2];
                $csv_data->N_mero_pedido = $data[3];
                $csv_data->Id_Projeto = $data[4];
                $csv_data->Nome_projeto = $data[5];
                $csv_data->Empacotado_por = $data[6];
                $csv_data->Data_cria_o = $data[7];
                $csv_data->Carregado_por = $data[8];
                $csv_data->Data_carregamento = $data[9];
                $csv_data->Conte_do = $data[10];
                $csv_data->Entrega_id = $data[11];
                $csv_data->save();
            }
            fclose($handle);
        }
        \Session::flash('success', 'Arquivo importado com sucesso.');
        return Redirect::back();
    }

    //end option 2
}
