<?php
//rota para a pagina home
$this->get('/', 'system\systemController@index')->name('home');

//rotas para metodos de listagem
$this->get('/lista/carga', 'system\systemController@cargaConteudo')->name('carga');
$this->get('/lista/deposito', 'system\systemController@depositoConteudo')->name('deposito');
$this->get('/lista/cliente', 'system\systemController@clienteConteudo')->name('cliente');

//carregar e descarregar
$this::get('/descarregar', 'system\systemController@unload')->name('descarregar');
$this->get('/carregar', 'system\systemController@load')->name('carregar');

//Formulários
$this->get('/unload', 'system\systemController@unloadForm')->name('home.unload.form');
$this->get('/load', 'system\systemController@loadForm')->name('home.load.form');

//Rotas para Pesquisa
$this->get('/busca/pacote', 'system\systemController@buscaPacote')->name('busca.pacote');
$this->get('/busca/pedido', 'system\systemController@buscaPedido')->name('busca.pedido');
$this->get('/busca/projeto', 'system\systemController@buscaProjeto')->name('busca.projeto');

//Rota para detalhes do pacote
$this->get('/pacote/detalhes/{id?}', 'system\systemController@pacoteDetalhes')->name('pacote.detalhes');

//formulario de cadastro para novos produtos
$this->get('/formulario/cadastro/produto', 'system\systemController@cadastroProduto')->name('cadastro.produto');
$this->get('/formulario/cadastro/', 'system\systemController@cadastroForm')->name('cadastro.formulario');

//rota para a view de controle
$this->get('/controle/lista', 'system\systemController@controleList')->name('cont-pedidos');

//metodos para deletar pedidos
$this->get('/controle/remove/pedido/{id?}', 'system\systemController@remove')->name('remove');

//Rotas para update de status manualmente
//here
$this->get('/status/deposito', 'system\systemController@alterParaDeposito')->name('pedido.deposito');
$this->get('/controle/status/cliente', 'system\systemController@alterParaCliente')->name('pedido.cliente');
$this->get('/controle/status/finalizado', 'system\systemController@alterParaFinalizado')->name('pedido.finalizado');

//Rota para editar o nome do cliente do pedido
//here
$this->get('/controle/edita/pedido/{id}', 'system\systemController@pedidoForm')->name('pedido.form');
$this->get('/controle/pedido/edit/{id?}', 'system\systemController@pedidoEdit')->name('pedido.edit');


//metodos para editar pacotes
$this->get('/controle/pacote', 'system\systemController@contPacote')->name('cont-pacote');
$this->get('/controle/pacote/{id?}', 'system\systemController@altPacote')->name('alt-pacote');
$this->get('/controle/pacote/atualizar/dados', 'system\systemController@pacoteUp')->name('pacote-up');



//route para importação de arquivos csv no banco de dados
$this->get('/product-list', 'system\systemController@list')->name('product.list');
$this->post('/product-import', 'system\systemController@productsImport')->name('product.import');
$this->get('/product-export/{type}', 'system\systemController@productsExport')->name('product.export');

//rota para listar detalhes do pedido
$this->get('/lista/carga/pedido/detalhes/{id?}', 'system\systemController@pedidoDetalhes')->name('pedidoDetalhes');