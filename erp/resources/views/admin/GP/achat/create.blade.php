@extends('admin.layouts.master')

    @section('title')

          Achats

    @endsection

@section('content')
<div class="breadcrumb">
    <h1>GP ET GS </h1>
    <ul>
        <li><a href="#">Achat </a></li>
        <li>Ajouter</li>
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
                            </div>
                            <br/>
                        @endif
                <div class="card-title mb-3">Nouvelle achat  </div>
            <form method="POST" action="{{ route('achat.store') }}" enctype="multipart/form-data">
                     @csrf
                 <div class="row">

                    <input  name="no_facture[]" type="hidden"/>

                 <div class="col-md-6 form-group mb-3">
                    <label for="">Fournisseur </label>
                    <select class="form-control" name="four_id"   id="mySelect2">
                      <option value="0">--Liste Fournisseurs--</option>
                      @foreach ($fournisseur as $item)
                      <option value="{{ $item->id }}">{{  $item->nom_f  }}</option>
                      @endforeach
                    </select>
                </div>
                <div class="col-md-6 form-group mb-3">
                <label for="">Date Achat  :</label>
                <input class="form-control" id="" placeholder="2020/02/02 "  name="date_Achat" type="date"/>
                 </div>
            <div class="col-md-12 form-group mb-3">
                <label for="">Remarque  :</label>
                <textarea class="form-control" aria-label="With textarea" name="remarque">
                </textarea>
            </div>

            <div class="col-md-3 form-group mb-3">
                <label for="">Categorie : </label>
                <select class="form-control" name='sel_categorie' id='sel_categorie'>
                    <option value='0'>-- Select Categories --</option>
                    @foreach ($CategorieData['data'] as $item)
                    <option value="{{ $item->id }}" >{{  $item->nom_cat }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3 form-group mb-3">
                <label for="">Produit : </label>
                <select class="form-control nm" name='prod_id'  id='sel_prod'>
                    <option value='0'>-- Liste Produits --</option>
                </select>
            </div>
            <div class="col-md-1 form-group mb-2">
                <label>Stock Rest  : </label>
                <input class="form-control"  id="qterest"   name="stock" type="number"
                style="
                background-color: cyan;"
                disabled/>
            </div>

            <div class="col-md-2 form-group mb-2">
                <label>Prix Achat   : </label>
                <input class="form-control"  id="prixAchat"   name="prix_achat" type="text" />
            </div>



            <div class="col-md-1 form-group mb-2  place" style="margin-top: 25px;">

                <button  type="button"
            class="btn btn-primary classAdd">Ajouter</button>
            </div>



           <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                            <th class="text-center">Produits</th>
                            <th class="text-center">Quantite Comander </th>
                            <th class="text-center">Prix Achater </th>
                            <th class="text-center">Total</th>
                            <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
                <tfoot>
                   <tr>
                       <td style="border: none"></td>
                       <td style="border: none"></td>
                       <td style="border: none"></td>
                        <td style="text-align:right; border:none;">Montant Total:</td>
                        <td class="text-right"><b class="gtotal"> </b>
                        </td>
                    </tr>
                </tfoot>
            </table>

                </div>

                <button type="submit" class="btn btn-success"   style="margin-left: 15px;">Enregister</button>

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
$('#sel_categorie').change(function(){

   // Department id
   var id = $(this).val();

   // Empty the dropdown
   $('#sel_prod').find('option').not(':first').remove();

   // AJAX request
   $.ajax({
     url: 'getProudit/'+id,
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


// select produit pour affochier stock rest

$('#sel_prod').change(function(){

// Department id
var id = $(this).val();

// Empty the dro
// AJAX request
$.ajax({
  url: 'getQte/'+id,
  type: 'GET',
  dataType: 'json',
  success: function(response){

    var len = 0;
    if(response['data'] != null){
      len = response['data'].length;
    }

    if(len > 0){
      // Read data and create
      for(var i=0; i<len; i++){


        var qte=response['data'][i].quantite_rest;

        var prix=response['data'][i].prix_ht_achat;

          $("#qterest").val(qte);


          $("#prixAchat").val(prix);



      }
    }

  }
});
});


// Search by refrence Produits


















});
</script>

<script type="text/javascript">

$('tbody').delegate('.qte,.prix','keyup',function(){

    var tr=$(this).parent().parent();
    var qte=tr.find('.qte').val();
    var prix=tr.find('.prix').val();
    var total_price=(qte*prix);
    tr.find('.total_price').val(total_price);
    sume();
});

function sume(){
    var total=0;
    $('.total_price').each(function(i,e){

        var total_price=$(this).val()-0;

        total +=total_price;

    });

    $('.gtotal').html(total+".00 DH");

}

$('.classAdd').on('click',function(){
    addRow();
});



function addRow(){
var tr='<tr>'
+'<td><input type="text" name="name[]"  class="form-control prod"   id="prod"/></td>'
+'<td><input type="text" name="qte[]"  id="quantity_1"    placeholder="0.00" value="" min="0" class="form-control qte" /></td>'
+'<td><input type="text" name="prix[]"   id="product_rate_1" placeholder="0.00" value="" min="0"  class="form-control prix"/></td>'
+'<td><input type="text" name="total_price[]" id="total_price_1" value="0.00"  readonly="readonly" class="form-control total_price"/></td>'
+'<td><button type="button"    class="btn btn-danger remove-tr">Remove</button>  </td>'
+'</tr>';

$('tbody').append(tr);
}

$('.remove-tr').live("click", function(){

    $(this).parents('tr').remove();



  });


</script>

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script>
 $('#mySelect2').select2({});
</script>

  @endsection





