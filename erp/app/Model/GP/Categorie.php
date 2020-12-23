<?php

namespace App\Model\GP;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    //


    protected $fillable=['id','nom_cat'];


    public function Produit(){

        return $this->hasMany('App\Model\GP\Produit','cat_id');


     }


}
