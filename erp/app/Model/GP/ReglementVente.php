<?php

namespace App\Model\GP;

use Illuminate\Database\Eloquent\Model;

class ReglementVente extends Model
{
    //
    protected $fillable=[

        'vente_id',
        'Mode',
        'numero',
        'date_reglemant',
        'remarque',
        'Montant',
        'valide',
        'echeance',
        'nrest',

    ];

    public function Vente(){


        return $this->belongsTo('App\Model\GP\Vente');

    }






}
