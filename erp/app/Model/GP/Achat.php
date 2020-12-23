<?php

namespace App\Model\GP;

use Illuminate\Database\Eloquent\Model;

class Achat extends Model
{
    //

    protected $fillable=[

        'no_commande',
        'fournisseur_id',
        'date_achat',
        'name',
        'prix',
        'qte',
        'total',
        'rest',
        'active',
        'status',
        'remarque',

    ];



    public function produits(){


      return $this->hasMany('App\Model\GP\Produit');

    }



    public function Fournisseur(){

        return  $this->belongsTo('App\Model\GP\Fournisseur');
    }




    public function ReglementAchat(){


        return $this->hasMany('App\Model\GP\ReglementAchat','achat_id');

    }



    public function StockIn(){

        return $this->belongsTo('App\Model\GP\StockIn');

    }




}
