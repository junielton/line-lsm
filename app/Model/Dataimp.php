<?php

namespace line\Model;

use Illuminate\Database\Eloquent\Model;

class dataimp extends Model
{
    protected $table = 'dataimps';
    public $timestamps = false;
    protected $primaryKey = "id";
    protected $fillable = array(
        'id',
        'cliente',
        'link'
    );
}
