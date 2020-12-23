@extends('admin.layouts.master')

    @section('title')

        Devis Service

    @endsection

@section('content')
<div class="breadcrumb">
    <h1>Gestion Services  </h1>
    <ul>
        <li><a href="#">Vente </a></li>
        <li>Modifier </li>
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
                <div class="card-title mb-3">Modifier Consultation </div>
            <form method="POST" action="{{route('vserv.update',$vservice->id)}}" enctype="multipart/form-data">
                     @csrf
                     @method('PUT')
                 <div class="row">
                 <div class="col-md-4 form-group mb-3">
                    <label for="">Clients  </label>
                    <select class="form-control" name="clients_id"   id="mySelect2">
                      <option value="{{$clservi->id}}" selected>{{$clservi->nom_cl}}</option>
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
                <label for="">Date Service   :</label>
                <input class="form-control" id=""  value="{{$vservice->date_ser}}" name="date_ser" type="date"/>
                 </div>
                 <div class="col-md-2 form-group mb-3">
                    <label for=""></label>
                    <input  class="form-control" name="no_serv" id="no_fact" type="hidden" placeholder="000"/>
                </div>
          <div class="col-md-12 form-group mb-3">
                <label for="">Remarque :</label>
                <textarea class="form-control" aria-label="With textarea" name="remarque">
                    {{$vservice->remarque}}
                </textarea>
            </div>

                <div class="col-md-12 table-responsive">
                        <div class="row clearfix">
                          <div class="col-md-12">
                            <table class="table table-bordered table-hover" id="tab_logic">
                              <thead>
                                <tr>
                                  <th class="text-center"> ID  </th>
                                  <th class="test-center">Service</th>
                                  <th class="text-center">Quantite</th>
                                  <th class="text-center"> Prix </th>
                                  <th class="text-center"> Total </th>
                                </tr>
                              </thead>
                              <tbody>
                                  @foreach ($veService as $item)


                                <tr id='addr0'>
                                <td>1</td>
                                  <td><select class="form-control" name='sel_service[]' id='sel_categorie'>
                                    <option value="{{$item->id}}" selected>{{$item->nom_serv}}</option>
                                    @foreach ($activite as $item)
                                    <option value="{{ $item->id }}">{{  $item->nom_serv }}</option>
                                    @endforeach
                                </select></td>

                                  <td><input type="number" name='qty[]'  class="form-control qty"   value="1"  step="0" min="0" /></td>

                                  <td><input type="number" name='price[]'  class="form-control price" /></td>


                                  <td><input type="number" name='total[]'  class="form-control total" readonly/></td>
                                </tr>



                                <tr id='addr1'></tr>
                                @endforeach
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


















<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script>
 $('#mySelect2').select2({});
</script>









  @endsection





