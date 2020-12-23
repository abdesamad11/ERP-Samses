@extends('admin.layouts.master')

    @section('title')

        Stock Entre

    @endsection

@section('content')
<div class="breadcrumb">
    <h1>GP ET GS </h1>
    <ul>
        <li><a href="#">Stock</a></li>
        <li>Ajouter </li>
    </ul>
</div>
<div class="separator-breadcrumb border-top"></div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-4">
                            <div class="card-body">
                        @if ($errors->any())
                                <div class="alert alert-danger">
                                  <ul>
                                      @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                      @endforeach
                                  </ul>
                                </div><br/>
                         @endif
                <div class="card-title mb-3"> Ajouter Nouveau  Produit Entree </div>
                <form method="POST" action="{{ route('stockIn.store')}}" enctype="multipart/form-data">
                    @csrf
                 <div class="row">
                     <input type="hidden" name="achat_id"  id="achat_od" type="text" >
             <div class="col-md-6 form-group mb-3">
            <label for="lastName1"> Liste Achat On regle par Fournisseurs :</label>
            <select name="fourn_id"  class="form-control" id="sel_four">
                <option value='0'>-- Liste Fournisseurs --</option>
                @foreach ($forId as $item)
                    <option value="{{$item->id}}">{{$item->nom_f}}</option>
                @endforeach
            </select>
            </div>
            <div class="col-md-6 form-group mb-3">
                <label for="phone">Liste Nom  Produit  Entre: </label>
                <select name="prod_id"  class="form-control" id="sel_prod">
                    <option value='0'>-- Liste Produits --</option>
                </select>
            </div>
            <div class="col-md-6 form-group mb-3">
                <label for="phone">Name de produits   : </label>
                 <input class="form-control"  id="np"  name="name" type="text"  disabled/>
            </div>
            <div class="col-md-6 form-group mb-3">
                <label for="phone">Prix Achats   : </label>
                 <input class="form-control"  id="pa"  name="" type="text"  disabled/>
            </div>
            <div class="col-md-6 form-group mb-3">
                <label for="phone">Prix Vente   : </label>
                 <input class="form-control"  id="pv"  name="" type="text"  disabled/>
            </div>
            <div class="col-md-6 form-group mb-3">
                <label for="phone">Quntite Rest on stocke    : </label>
                 <input class="form-control"  id="qr"  name="qr" type="text"  disabled/>
            </div>
            <div class="col-md-6 form-group mb-3">
                <label for="phone">Quntite Comander   : </label>
                 <input class="form-control" id="qc"   name="qcm" type="text"  disabled/>
            </div>
            <div class="col-md-6 form-group mb-3">
             <label for="phone">Total Quantite Entree   : </label>
              <input class="form-control"   name="qte_entre" type="text"  placeholder="0"/>
             </div>
             <div class="col-md-6 form-group mb-3">
                <label for="phone">Date Entree   : </label>
                 <input class="form-control"   name="date_entre" type="date"  />
                </div>





                                <div class="col-md-12">
                                    <button class="btn btn-primary"> Ajouter </button>
                                </div>
                            </div>
                 </form>

                    </div>
                        </div>
                    </div>
                </div>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
<script>
$(document).ready(function(){
 // Categorie Change
 $('#sel_four').change(function(){

                   // Department id
                   var id = $(this).val();

                   // Empty the dropdown
                   $('#sel_prod').find('option').not(':first').remove();

                   // AJAX request
                   $.ajax({
                     url: 'getProduit/'+id,
                     type: 'GET',
                     dataType: 'json',
                     success: function(response){

                       var len = 0;
                       if(response['data'] != null){
                         len = response['data'].length;
                       }

                       if(len > 0){
                         // Read data and create <option >
                         for(var i=0; i<len; i++){

                           var id = response['data'][i].id;
                           var name = response['data'][i].name;
                           var option = "<option value='"+id+"'>"+name+"</option>";

                           $("#sel_prod").append(option);






                         }
                       }

                     }
                  });
                });



$('#sel_prod').change(function(){

// Department id
var id = $(this).val();

// Empty the dropdown
// AJAX request
$.ajax({
  url: 'getAchat/'+id,
  type: 'GET',
  dataType: 'json',
  success: function(response){

    var len = 0;
    if(response['data'] != null){
      len = response['data'].length;
    }

    if(len > 0){
      // Read data and create <option >
      for(var i=0; i<len; i++){

        var id = response['data'][i].id;
        var name = response['data'][i].name;
        var prvent = response['data'][i].prix_ht_vente;
        var prachat = response['data'][i].prix_ht_achat;
        var qrest = response['data'][i].quantite_rest;
        var qt = response['data'][i].qte;




        $("#achat_od").val(id);
        $("#np").val(name);
        $("#pa").val(prachat);
        $("#pv").val(prvent);
        $("#qr").val(qrest);
        $("#qc").val(qt);








      }
    }

  }
});
});



























                });
                </script>


@endsection
