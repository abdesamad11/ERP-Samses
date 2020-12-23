<?php

namespace App\Model\GP;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    //

    protected $fillable=[
        'type_compte','verifer','nom_cl',
        'raison_social','tele',
        'email',
        'ICE','secteur_activite',
        'adresse_cl','logo','nom_banck',
        'num_compte',
    ];





    public function Vente(){

      return  $this->belongsTo('App\Model\GP\Vente');

    }

}
