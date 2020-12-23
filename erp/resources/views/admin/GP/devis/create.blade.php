@extends('admin.layouts.master')

    @section('title')

       Devis

    @endsection

@section('content')
<div class="main-content">
    <div class="row">
        <div class="col-md-12">
            <ul class="nav nav-tabs justify-content-end mb-4" id="myTab" role="tablist">
                <li class="nav-item">
                <a class="nav-link active" id="invoice-tab" data-toggle="tab" href="#invoice" role="tab" aria-controls="invoice" aria-selected="true">
                    Nouveau Devis
                </a></li>
            </ul>
            <div class="card">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="invoice" role="tabpanel" aria-labelledby="invoice-tab">
                        <!-- -===== Print Facture =======-->
                        <form method="POST" action="{{route('devis.store')}}">
                            @csrf
                            <div class="d-flex mb-5"><span class="m-auto"></span>
                                <button class="btn btn-primary">Enregistrer</button>
                            </div>
                            <div class="row justify-content-between">
                                <div class="col-md-6">
                                    <h4 class="font-weight-bold">Devis</h4>
                                    <div class="col-sm-4 form-group mb-3 pl-0">
                                        <label for="orderNo">Devis serie :</label>
                                      <input class="form-control" id="orderNo" type="text" name="reference_f" placeholder="Enter F-2020-001" />
                                    </div>
                                </div>
                                <div class="col-md-3 text-right">
                                    <label class="d-block text-12 text-muted">Etat de Devis </label>
                                    <div class="pr-0 mb-4">
                                        <label class="radio radio-reverse radio-warning">
                                            <input type="radio" name="orderStatus" value="Processing" /><span>En coure Traitement</span><span class="checkmark"></span>
                                        </label>
                                        <label class="radio radio-reverse radio-success">
                                            <input type="radio" name="orderStatus" value="Delivered" /><span>Valide </span><span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="order-datepicker">Date Devis</label>
                                        <input class="form-control text-right" id="order-datepicker" placeholder="yyyy-mm-dd" name="date_f" type="date" />
                                        <label for="order-datepicker">Date expire Devis   </label>
                                        <input class="form-control text-right" id="order-datepicker" placeholder="yyyy-mm-dd" name="date_limit_f" type="date" />
                                    </div>
                                </div>
                            </div>
                            <div class="mt-3 mb-4 border-top"></div>
                            <div class="row mb-5">
                                <div class="col-md-6">
                                    <h5 class="font-weight-bold">Devis A : </h5>
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
                                    <table class="table table-hover mb-3">
                                        <thead class="bg-gray-300">
                                            <tr>

                                                <th scope="col">Nom Produit ou service </th>
                                                <th scope="col">Quantite </th>
                                                <th scope="col">Prix</th>
                                                <th scope="col">Total</th>
                                                <th scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody >


                                        </tbody>
                                    </table>
                                    <button     type="button"       class="btn btn-primary float-right mb-4 classAdd" >Ajouter linge </button>
                                </div>
                                <div class="col-md-12">
                                    <div class="invoice-summary invoice-summary-input float-right">
                                        <p>Total HT: <span  class="gtotal"></span></p>
                                        <p class="d-flex align-items-center">TVA %:<span>
                                                <input class="form-control small-input " type="text" name="tva" id="total_tva"/></span></p>
                                        <h5 class="font-weight-bold d-flex align-items-center" >Total Global:<span>
                                                <input class="form-control small-input" type="text" name="total_golable" id="total_golable" /></span></h5>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- ==== / Print Facture =====-->
                        <div class="d-sm-flex mb-5 position" data-view="print" style="
                        position: absolute;
                        margin-left: 0px;
                        margin-top: -45px;
                    "><span class="m-auto"></span>
                            <button class="btn btn-primary mb-sm-0 mb-3 print-invoice">Print Invoice</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div><!-- end of main-content -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>

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


@endsection
