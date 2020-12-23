<?php

namespace App\Model\GS;

use Illuminate\Database\Eloquent\Model;

class Activite extends Model
{
    //

    protected $fillable=[
        'nom_serv',
        'prix_serv',
        'decription',

    ];


    public function Vservice(){

        return $this->belongsToMany('App\Model\GS\Vservice')->withTimestamps();

     }




}
