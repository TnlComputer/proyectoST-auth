<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cheque extends Model
{
    use HasFactory;

    // protected $table = "cheques";
    protected $fillable = [
        'nroChq' ,
        'fecChq',
        'impChq',
        'bancoChq',
        'cobrado',
        'gastos',
        'obsChq',
        'imputado',
        'impSaldo',
        'depositado'
    ];

    protected $guarded = [];

    public function imputaciones()
    {
        return $this->hasMany('App\Models\Imputacion');
    }


}
