<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ocompras extends Model
{
    use HasFactory;

    // protected $fillable = [
    //     'nroOc',
    //     'fecOc',
    //     'cantOc',
    //     'preUnitOc',
    // ];

    protected $table = "ocompras";

    protected $guarded = [];

    /**
     * Esta opcion sirve para reemplazar que lea el name por el slig y tengamos rutas amigables
     *    */
    // public function getRouteKeyName()
    // {
    //     // return $this->getKeyName();
    //     return 'slug';
    // }

}

