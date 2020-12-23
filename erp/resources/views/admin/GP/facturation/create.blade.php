@extends('admin.layouts.master')

        @section('title')

        Facturation Vente

        @endsection

@section('content')
<div class="main-content">
    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-tabs justify-content-end mb-4" id="myTab" role="tablist">
                <li class="nav-item">
                <a class="nav-link active" id="invoice-tab" data-toggle="tab" href="#invoice" role="tab" aria-controls="invoice" aria-selected="true">
                    Nouveau Facture
                </a></li>
            </ul>
            <div class="card">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="invoice" role="tabpanel" aria-labelledby="invoice-tab">
                        <!-- -===== Print Facture =======-->
                        <form method="POST" action="{{route('facturation.store')}}">
                            @csrf
                            <div class="d-flex mb-5"><span class="m-auto"></span>
                                <button class="btn btn-primary">Enregistrer</button>
                            </div>
                            <div class="row justify-content-between">
                                <div class="col-md-6">
                                    <h4 class="font-weight-bold">Facture</h4>
                                    <div class="col-sm-4 form-group mb-3 pl-0">
                                        <label for="orderNo">Facture serie :</label>
                                      <input class="form-control" id="orderNo" type="text" name="reference_f" placeholder="Enter F-2020-001" />
                                    </div>
                                </div>
                                <div class="col-md-3 text-right">
                                    <label class="d-block text-12 text-muted">Etat de Facture </label>
                                    <div class="pr-0 mb-4">
                                        <label class="radio radio-reverse radio-warning">
                                            <input type="radio" name="orderStatus" value="Processing" /><span>En coure Traitement</span><span class="checkmark"></span>
                                        </label>
                                        <label class="radio radio-reverse radio-success">
                                            <input type="radio" name="orderStatus" value="Delivered" /><span>Valide </span><span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="order-datepicker">Date Facture</label>
                                        <input class="form-control text-right" id="order-datepicker" placeholder="yyyy-mm-dd" name="date_f" type="date" />
                                        <label for="order-datepicker">Date expire Facture  </label>
                                        <input class="form-control text-right" id="order-datepicker" placeholder="yyyy-mm-dd" name="date_limit_f" type="date" />
                                    </div>
                                </div>
                            </div>
                            <div class="mt-3 mb-4 border-top"></div>
                            <div class="row mb-5">
                                <div class="col-md-6">
                                    <h5 class="font-weight-bold">Facture A : </h5>
                                      <div class="col-md-10 form-group mb-3 pl-0">
                                        <select class="form-control " name="clients_id"   id="mySelect2">
                                            <option value="0">--Liste Clients--</option>

                                        </select>
                                    </div>
                                    <div class="col-md-10 form-group mb-3 pl-0">
                                        <textarea class="form-control" placeholder="Condition reglement facture" name="conditions_reglements_f"></textarea>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-12 table-responsive">
                                        <div class="row clearfix">
                                          <div class="col-md-12">
                                            <table class="table table-bordered table-hover" id="tab_logic">
                                              <thead>
                                                <tr>
                                                  <th class="text-center"> ID  </th>
                                                  <th class="text-center"> Produit  </th>
                                                  <th class="text-center"> Quantite </th>
                                                  <th class="text-center"> Prix </th>
                                                  <th class="text-center"> Total </th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                                <tr id='addr0'>
                                                <td>1</td>
                                                  <td><input type="text" name='product[]'  placeholder='Enter Nom Produit ' class="form-control"/></td>
                                                  <td><input type="number" name='qty[]' placeholder='Enter Quantite' class="form-control qty" step="0" min="0"/></td>
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
                                            <button type="button"    id='delete_row' class="pull-right btn btn-default">Supprimer Ligne</button>
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
                                                      <input type="number" class="form-control" id="tax" placeholder="0">
                                                      <div class="input-group-addon">%</div>
                                                    </div></td>
                                                </tr>
                                                <tr>
                                                  <th class="text-center">Tva montant</th>
                                                  <td class="text-center"><input type="number" name='tax_amount' id="tax_amount" placeholder='0.00' class="form-control" readonly/></td>
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
                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div><!-- end of main-content -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
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


@endsection
