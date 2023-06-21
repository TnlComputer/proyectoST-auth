<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LineaFac extends Model
{
    use HasFactory;

        protected $fillable = [
        'fecFac',
        'cantFac',
        'impFac',
        'remST',
        'tipo',
        'nroFac',
        'oc_id',
        'remk_id'
    ];

    protected $guarded = [];

}
