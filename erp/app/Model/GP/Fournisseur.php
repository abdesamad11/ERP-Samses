<?php

namespace App\Model\GP;

use Illuminate\Database\Eloquent\Model;

class Fournisseur extends Model
{
    //

    protected $fillable=[
        'type_compte','verifer','nom_f','raison_social','tele',
        'email','ICE','secteur_activite','adresse_f','logo','nom_banck',
        'num_compte',
    ];



    public function Achats(){


        return $this->hasMany('App\Model\GP\Achat','fournisseur_id');


    }


}
