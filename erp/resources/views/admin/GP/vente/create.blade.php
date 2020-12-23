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

                <div class="col-md-12 table-responsive">
                        <div class="row clearfix">
                          <div class="col-md-12">
                            <table class="table table-bordered table-hover" id="tab_logic">
                              <thead>
                                <tr>
                                  <th class="text-center"> ID  </th>
                                  <th class="test-center">Categoire</th>
                                  <th class="text-center"> Produit  </th>
                                  <th class="text-center"> Quantite </th>
                                  <th class="text-center"> Prix </th>
                                  <th class="text-center"> Total </th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr id='addr0'>
                                <td>1</td>
                                  <td><select class="form-control" name='sel_categorie[]' id='sel_categorie'>
                                    <option value='0'>-- Select Categories --</option>
                                    @foreach ($CategorieData['data'] as $item)
                                    <option value="{{ $item->id }}" >{{  $item->nom_cat }}</option>
                                    @endforeach
                                </select></td>
                                  <td>
                                    <select class="form-control nm" name='product[]'  id='sel_prod'>
                                        <option value='0'>-- Liste Produits --</option>
                                    </select>

                                 </td>
                                  <td><input type="number" name='qty[]' placeholder='Enter Quantite' class="form-control qty"   step="0" min="0"/></td>
                                  <td><input type="number" name='price[]' placeholder='Enter  Prix' class="form-control price" step="0.00" min="0"/></td>
                                  <td><input type="number" name='total[]' placeholder='0.00' class="form-control total" readonly/></td>
                                </tr>
                                <tr id='addr1'></tr>
                              </tbody>
                            </table>
                          </div>
                        </div>
                        <div class="row clearfix">
                          <div class="col-md-12">
                            <button type="button" id="add_row" class="btn btn-default pull-left">Ajouter Ligne  </button>
                            <button type="button" id='delete_row' class="pull-right btn btn-default">Supprimer Ligne</button>
                          </div>
                        </div>
                        <div class="row clearfix" style="margin-top:20px">
                          <div class="pull-right col-md-4">
                            <table class="table table-bordered table-hover" id="tab_logic_total">
                              <tbody>
                                <tr>
                                  <th class="text-center">Total HT</th>
                                  <td class="text-center"><input type="number" name='sub_total' placeholder='0.00' class="form-control" id="sub_total" readonly/></td>
                                </tr>

                                <tr>
                                  <th class="text-center">Tva 20 %</th>
                                  <td class="text-center"><div class="input-group mb-2 mb-sm-0">
                                      <input type="number" class="form-control" id="tax" placeholder="0" name="tva">
                                      <div class="input-group-addon">%</div>
                                    </div></td>
                                </tr>
                                <tr>
                                    <th class="text-center">Remise montant</th>
                                    <td class="text-center"><input type="number" id="rem_amount" placeholder='0.00' class="form-control" readonly/></td>
                                  </tr>
                                <tr>
                                  <th class="text-center">Tva montant</th>
                                  <td class="text-center">
                                <input type="number" name='tax_amount' id="tax_amount" placeholder='0.00' class="form-control" readonly/></td>
                                </tr>
                                <tr>
                                  <th class="text-center">Total TTC</th>
                                  <td class="text-center"><input type="number" name='total_amount' id="total_amount" placeholder='0.00' class="form-control" readonly/></td>
                                </tr>
                              </tbody>
                            </table>

                        </div>
                      </div>

            </div>




































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


        if(qte <= 2){

        alert('veuiller verifier quantite produit');
        }

      }
    }

  }
});
});
// Search by refrence Produits
});
</script>
<script type="text/javascript">
$(document).ready(function(){
    var i=1;
    $("#add_row").click(function(){b=i-1;
      	$('#addr'+i).html($('#addr'+b).html()).find('td:first-child').html(i+1);
      	$('#tab_logic').append('<tr id="addr'+(i+1)+'"></tr>');
      	i++;
  	});
    $("#delete_row").click(function(){
    	if(i>1){
		$("#addr"+(i-1)).html('');
		i--;
		}
		calc();
	});

	$('#tab_logic tbody').on('keyup change',function(){
		calc();
	});
	$('#tax').on('keyup change',function(){
		calc_total();
	});


});

function calc()
{
	$('#tab_logic tbody tr').each(function(i, element) {
		var html = $(this).html();
		if(html!='')
		{
			var qty = $(this).find('.qty').val();
			var price = $(this).find('.price').val();
			$(this).find('.total').val(qty*price);

			calc_total();
		}
    });
}

function calc_total()
{
	total=0;
	$('.total').each(function() {
        total += parseInt($(this).val());
    });
	$('#sub_total').val(total.toFixed(2));
	tax_sum=total/100*$('#tax').val();
	$('#tax_amount').val(tax_sum.toFixed(2));
	$('#total_amount').val((tax_sum+total).toFixed(2));
}

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





