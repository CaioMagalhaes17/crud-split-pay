<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = 'produtos';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'nome', 'descricao', 'preco', 'quantidade'
    ];
}
