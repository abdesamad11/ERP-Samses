<?php

namespace App\Model\GS;

use Illuminate\Database\Eloquent\Model;

class Reglementservice extends Model
{
    //

    protected $fillable=[
        'vservices_id',
        'Mode',
        'date_reglemant',
        'remarque',
        'Montant',
        'valide',
        'echeance',
        'nrest',

    ];

    public function Vservice(){


        return $this->belongsTo('App\Model\GS\Vservice');

    }

}
