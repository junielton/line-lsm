<?php

namespace line\Model;

use Illuminate\Database\Eloquent\Model;

class Control extends Model
{
    protected $table = 'controls';
    public $timestamps = false;
    protected $primaryKey = "ids";
    protected $fillable = array(
        'ids', 'Id', 'Cliente', 'Pedido_id', 'N_mero_pedido',
        'Id_Projeto', 'Nome_projeto', 'Empacotado_por', 'Data_cria_o',
        'Carregado_por', 'Data_carregamento', 'Conte_do', 'status', 'obs',
    );
}