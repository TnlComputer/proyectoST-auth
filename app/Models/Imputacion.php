<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imputacion extends Model
{
    use HasFactory;

    protected $table = "imputaciones";

    protected $fillable = [
        'impChqImp',
        'fac_id',
        'chq_id',
        'impChq',
        'impFac'
    ];

    public function facturas()
    {
        return $this->belongsTo('App\Models\Factura');
    }
    public function cheques()
    {
        return $this->belongsTo('App\Models\Cheque');
    }

}
