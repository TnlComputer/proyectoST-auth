<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cheques extends Model
{
    use HasFactory;

    protected $table = "cheques";
    // protected $fillable = [
    //     'nroChq' ,
    //     'fecChq',
    //     'impChq',
    //     'bancoChq',
    //     'cobrado',
    //     'obsChq',
    //     'imputado',
    //     'impSaldo',
    //     'depositado'
    // ];

    protected $guarded = [];

}
