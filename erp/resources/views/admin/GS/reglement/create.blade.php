@extends('admin.layouts.master')

    @section('title')

       Reglement Service

    @endsection

@section('content')
@foreach ($vservice as $item)
<div class="breadcrumb">
    <h1>GP ET GS </h1>
    <ul>
        <li><a href="#">Reglement Service  </a></li>
        <li>Reglement N : {{$item->num_vs}} </li>

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
                <div class="card-title mb-3"> </div>
                <form method="POST" action="{{route('reglement.store')}}" enctype="multipart/form-data">
                    @csrf
                 <div class="row">
            <div class="col-md-6 form-group mb-3">
                <label >Montant Total Doit payer    :</label>
                <span class="badge badge-pill badge-danger m-2" >{{$total}}.00 DH</span>
            </div>
            <input type="hidden" name="total" value="{{$total}}">
            <input type="hidden" name="vservice_id" value="{{$item->id}}">
            <div class="col-md-3 form-group mb-3">
                <label > Mode Paimenet   :</label>
                <select class="form-control" name="mode" id="">
                    <option value="0">choix</option>
                    <option value="Espese">Espese</option>
                    <option value="Cheque">Cheque </option>
                    <option value="Virement">Virement</option>
                </select>
            </div>



            <div class="col-md-3 form-group mb-3">
                <label > Date Reglement   :</label>
                <input class="form-control"  type="date" name="date_reglement"  />
            </div>
            <div class="col-md-3 form-group mb-3">
                <label > Montant  :</label>
                <input class="form-control"  type="text " name="montant"  placeholder="000.00 DH" />
            </div>

            <div class="col-md-12 form-group mb-3">
                <label > Remarque  :</label>
                <textarea   class="form-control"  name="remarque" id="" cols="20" rows="10">
                </textarea>
            </div>
            <div class="col-md-3 form-group mb-3">
                <label for="">Valide : </label>
                <label class="radio radio-success">
                    <input type="radio" name="valide"  value="0"/><span>Non</span><span class="checkmark"></span>
                </label>
                <label class="radio radio-success">
                    <input type="radio" name="valide" value="1"/><span>oui</span><span class="checkmark"></span>
                </label>
            </div>
            <div class="col-md-3 form-group mb-3">
                <label > Compte Bancaire   :</label>
               <select class="form-control"   name="compte" id="">
                @foreach ($parameter as $item)
                <option value="{{$item->RIB_soc}}">
                    {{$item->RIB_soc}}
                </option>
                @endforeach

               </select>
            </div>
            <div class="col-md-3 form-group mb-3">
                <label > Date Échéance   :</label>
                <input class="form-control"  type="date" name="date_echance" />
            </div>










                     <div class="col-md-12">
                                    <button class="btn btn-primary"> Enregistre </button>
                        </div>
                    </div>
                 </form>

                    </div>
                        </div>
                    </div>
                </div>
                @break($item->id == $item->id)

                @endforeach

@endsection
