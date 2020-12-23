<?php

namespace App\Model\GP;

use Illuminate\Database\Eloquent\Model;

class ReglementAchat extends Model
{
    //
    protected $fillable=[

        'achat_id',
        'Mode',
        'numero',
        'date_reglemant',
        'remarque',
        'Montant',
        'valide',
        'echeance',
        'nrest',

    ];


    public function Achat(){


        return $this->belongsTo('App\Model\GP\achat');

    }


}
