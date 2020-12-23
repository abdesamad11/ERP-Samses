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
                <form method="POST" action="{{ route('stockIn.update',$stockin->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                 <div class="row">
                     <input type="hidden" name="achat_id"  id="achat_od" type="text" value="{{$stockin->achat_id}}">
                     <input type="hidden" name="prod_id"  id="achat_od" type="text" value="{{$stockin->produit_id}}">
                     <div class="col-md-6 form-group mb-3">
                        <label for="phone">Fournisseurs   : </label>
                         <input class="form-control"  id="np"  name="name" type="text" value="{{$stockin->nom_f}}"  disabled/>
                    </div>

            <div class="col-md-6 form-group mb-3">
                <label for="phone">Name de produits   : </label>
                 <input class="form-control"  id="np"  name="name" type="text"     value="{{$stockin->name}}"        disabled/>
            </div>
            <div class="col-md-6 form-group mb-3">
                <label for="phone">Prix Achats   : </label>
                 <input class="form-control"  id="pa"  name="" type="text"   value="{{  $stockin->prix_ht_achat  }}"   disabled/>
            </div>
            <div class="col-md-6 form-group mb-3">
                <label for="phone">Prix Vente   : </label>
                 <input class="form-control"  id="pv"  name="" type="text"  value="{{  $stockin->prix_ht_vente  }}" disabled/>
            </div>
            <div class="col-md-6 form-group mb-3">
                <label for="phone">Quntite Rest on stocke    : </label>
                 <input class="form-control"  id="qr"  name="qr" type="text"     value="{{  $stockin->quantite_rest  }}"     disabled/>
            </div>
            <div class="col-md-6 form-group mb-3">
                <label for="phone">Quntite Comander   : </label>
                 <input class="form-control" id="qc"   name="qcm" type="text"  value="{{  $stockin->qte_entree  }}"  disabled/>
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
                                    <button class="btn btn-success"> <i class="fas fa-edit"></i> Modifier  </button>
                                </div>
                            </div>
                 </form>

                    </div>
                        </div>
                    </div>
                </div>




@endsection
