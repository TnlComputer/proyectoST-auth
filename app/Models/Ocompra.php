<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ocompra extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Esta opcion sirve para reemplazar que lea el name por el slug y tengamos rutas amigables
     *    */
    // public function getRouteKeyName()
    // {
    //     // return $this->getKeyName();
    //     return 'slug';
    // }

    // Relacion uno a muchos
    public function remitok(){
        return $this->hasMany('App\Models\Remitok');
    }
}
