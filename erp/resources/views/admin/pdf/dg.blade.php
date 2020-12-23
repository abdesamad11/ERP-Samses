@extends('admin.layouts.master')

    @section('title')

          Vente

    @endsection

@section('content')
<div class="breadcrumb">
    <h1>GP ET GS </h1>
    <ul>
        <li><a href="#">Vente </a></li>
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
                <div class="card-title mb-3">Nouvelle Vente   </div>
            <form method="POST" action="{{ route('vente.store') }}" enctype="multipart/form-data">
                     @csrf
                 <div class="row">

                 <div class="col-md-4 form-group mb-3">
                    <label for="">Clients  </label>
                    <select class="form-control" name="clients_id"   id="mySelect2">
                      <option value="0">--Liste Clients--</option>
                      @foreach ($clients as $item)
                      <option value="{{ $item->id }}">{{  $item->nom_cl }}</option>
                      @endforeach
                    </select>
                </div>
                <div class="col-md-2 form-group mb-3"
                style=" padding-top: 19px;">
                <a  href="{{route('clients.create')}}" class="btn btn-primary btn-sm m-1" type="submit"  title="Ajouter Nouveau client"><i class="fas fa-plus    "></i></a>
                </div>

                <div class="col-md-6 form-group mb-3">
                <label for="">Date Vente  :</label>
                <input class="form-control" id="" placeholder="2020/02/02 "  name="date_vente" type="date"/>
                 </div>

                 <div class="col-md-6 form-group mb-3">
                    <label for="">Bon de livraison : </label>
                    <label class="radio radio-success">
                        <input type="radio" name="radion"  onclick="show1();" checked/><span>Non</span><span class="checkmark"></span>
                    </label>
                    <label class="radio radio-success">
                        <input type="radio" name="radion"   onclick="show2();" checked/><span>Oui</span><span class="checkmark"></span>
                    </label>
                </div>
                <div id="div1" class="col-md-6 form-group mb-3  hide"
                style="
                margin-left: 11%;
                padding-right: 36%;
                margin-top: -5%;" >
            <input type="text" name="bonliv" id="" class="form-control" placeholder="000">
                </div>
                <div class="col-md-2 form-group mb-3">
                    <label for="">Serie Facture :</label>
                    <input  class="form-control" name="no_facture" id="no_fact" type="text"/>
                </div>
            <div class="col-md-12 form-group mb-3">
                <label for="">Remarque :</label>
                <textarea class="form-control" aria-label="With textarea" name="remarque">
                </textarea>
            </div>

            <div class="col-md-3 form-group mb-3">
                <label for="">Categorie : </label>
                <select class="form-control" name='sel_categorie[]' id='sel_categorie'>
                    <option value='0'>-- Select Categories --</option>
                    @foreach ($CategorieData['data'] as $item)
                    <option value="{{ $item->id }}" >{{  $item->nom_cat }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3 form-group mb-3 ">
                <label for="">Produit : </label>
                <select class="form-control nm" name='prod_id[]'    id='sel_prod'>
                    <option value='0'>-- Liste Produits --</option>
                </select>
            </div>
            <div class="col-md-1 form-group mb-2">
                <label>Stock Rest  : </label>
                <input class="form-control"  id="qterest"   name="qte[]" type="number"
                style="
                background-color: cyan;"
                disabled/>
            </div>

            <div class="col-md-2 form-group mb-2">
                <label>Prix Vente   : </label>
                <input class="form-control"  id="prixAchat"   name="prix_vente" type="text" disabled/>
            </div>

            <div class="col-md-2 form-group mb-2">
                <label>Remise %  : </label>
                <input class="form-control"  id="remise"  value="0"  name="remise" type="text" />
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
                            <th class="text-center">Quantite vendue </th>
                            <th class="text-center">Prix Vende </th>
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

        var prix=response['data'][i].prix_ht_vente;

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
var f="{{$deta+1}}";
var tr='<tr>'
+'<td><input type="text"  name="name[]"  class="form-control prod"   id="sel_prod_'+f+'"/></td>'
+'<td><input type="text" name="qte[]"  id="quantity_'+f+'" placeholder="0.00" value="" min="0" class="form-control qte" /></td>'
+'<td><input type="text" name="prix[]"   id="product_rate_'+f+'" placeholder="0.00" value="" min="0"  class="form-control prix"/></td>'
+'<td><input type="text" name="total_price[]" id="total_price_'+f+'" value="0.00"  readonly="readonly" class="form-control total_price"/></td>'
+'<td><button type="button"    class="btn btn-danger remove-tr">Remove</button>  </td>'
+'</tr>';

$('tbody').append(tr);



}

$('.remove-tr').live("click", function(){

    $(this).parents('tr').remove();



  });


</script>



<script type="text/javascript">

$(document).ready(function(){

    var add=$('.classAdd');
    var f="{{$deta+1}}";

    $(add).click(function(){
        f++;

    })


});



</script>

















<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script>
 $('#mySelect2').select2({});
</script>

<script>
    function show1() {
      document.getElementById("div1").style.display = "none";
    }
    function show2() {
      document.getElementById("div1").style.display = "block";
    }


    </script>











  @endsection





