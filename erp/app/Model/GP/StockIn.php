<?php

namespace App\Model\GP;

use Illuminate\Database\Eloquent\Model;

class StockIn extends Model
{
    //
       //
       protected $fillable=[

        'achat_id',
        'produit_id',
        'date_entree',
        'qte_entree',
        'active',
    ];

    public function Produits(){


        return $this->hasMany('App\Model\GP\Produit','produit_id');


    }

    public function Achat(){


        return $this->hasMany('App\Model\GP\achat','achat_id');

    }





}
