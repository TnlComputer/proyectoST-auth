<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Factura extends Model
{
    use HasFactory;
    // protected $table = "facturas";

    protected $guarded = [];

    public function imputaciones()
    {
        return $this->hasMany('App\Models\Imputacion');
    }

    public function lineasFacs()
    {
        return $this->hasMany('App\Models\Factura');
    }

}

