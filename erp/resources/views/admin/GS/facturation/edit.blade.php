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
                    Modifier Facture
                </a></li>
            </ul>
            <div class="card">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="invoice" role="tabpanel" aria-labelledby="invoice-tab">
                        <!-- -===== Print Facture =======-->
                        <form method="POST" action="{{route('facturation.update',$fact->id)}}">
                            @csrf
                            @method('PUT')
                            <div class="d-flex mb-5"><span class="m-auto"></span>
                                <button class="btn btn-success">Modifier</button>
                            </div>

                            <input type="hidden" name="cod_id" value="{{$fact->vservices_id}}">
                            <div class="row justify-content-between">
                                <div class="col-md-6">
                                    <h4 class="font-weight-bold">Facture</h4>
                                    <div class="col-sm-4 form-group mb-3 pl-0">
                                        <label for="orderNo">Facture serie :</label>
                                      <input class="form-control" id="orderNo" type="text" name="reference_f" value="{{$fact->num_f}}"  disabled/>
                                    </div>
                                </div>
                                <div class="col-md-3 text-right">
                                    <label class="d-block text-12 text-muted">Etat de Facture </label>
                                    <div class="pr-0 mb-4">
                                        @if($fact->etat==1)
                                        <label class="radio radio-reverse radio-success">
                                            <input type="radio" name="orderStatus" value="Delivered" checked /><span>Valide </span><span class="checkmark"></span>
                                        </label>

                                        <label class="radio radio-reverse radio-warning">
                                            <input type="radio" name="orderStatus" value="Processing" /><span>En coure Traitement</span><span class="checkmark"></span>
                                        </label>

                                        @elseif($fact->etat==0)

                                        <label class="radio radio-reverse radio-warning">
                                            <input type="radio" name="orderStatus" value="Processing" checked /><span>En coure Traitement</span><span class="checkmark"></span>
                                        </label>

                                        <label class="radio radio-reverse radio-success">
                                            <input type="radio" name="orderStatus" value="Delivered"  /><span>Valide </span><span class="checkmark"></span>
                                        </label>

                                        @endif



                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="order-datepicker">Date Facture</label>
                                        <input class="form-control text-right" id="order-datepicker" value="{{$fact->date_f}}" name="date_f" type="date"  required/>
                                        <label for="order-datepicker">Date expire Facture  </label>
                                        <input class="form-control text-right" id="order-datepicker" value="{{$fact->date_exp}}" name="date_limit_f" type="date" required/>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-3 mb-4 border-top"></div>
                            <div class="col-md-12 form-group mb-3">
                                <label for="">Condition Facture  :</label>
                                <textarea class="form-control" aria-label="With textarea" name="remarque">
                                    {{$fact->condition}}
                                </textarea>
                            </div>

                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div><!-- end of main-content -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>


@endsection
