@extends('admin.layouts.master')

    @section('title')

          Services

    @endsection

@section('content')
<div class="breadcrumb">
    <h1>Gestion Conger</h1>
    <ul>
        <li><a href="#">Conger </a></li>
        <li>Ajouter </li>
    </ul>
</div>
<div class="separator-breadcrumb border-top"></div>
                <div class="row">
                    <div class="col-md-8">
                        <div class="card mb-4">
                            @if ($errors->any())
                            <div class="alert alert-danger">
                              <ul>
                                  @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                  @endforeach
                              </ul>
                            </div><br/>
                            @endif
                <div class="card-body">

                <div class="card-title mb-3">Nouvelle Conger </div>
                <form method="POST" action="{{route('conger.store')}}" enctype="multipart/form-data">
                    @csrf
                 <div class="row">
            <div class="col-md-4 form-group mb-3">
                 <label for="firstName1">Nom de l'employer </label>
                  <select class="form-control" name="emp_id" id="">
                    <option value="0">--Selection Nom de l'employer--</option>
                      @foreach ($employer as $item)
                      <option value="{{$item->id}}">{{$item->nom}}</option>
                      @endforeach
                  </select>
            </div>




            <div class="col-md-3 form-group mb-3">
                <label for="firstName1">Date debut(Max:30 jr)</label>
                <input class="form-control" id="categorie" type="date" name="date_debut"  />
            </div>
            <div class="col-md-3 form-group mb-3">
                <label for="firstName1">Date Fin (Max:30 jr)</label>
                <input class="form-control" id="categorie" type="date" name="date_fin"  />
            </div>
            <div class="col-md-6 form-group mb-3">
                <label for="firstName1">Cause de conger</label>
                <textarea class="form-control" name="cause" id="" cols="30" rows="10"></textarea>
            </div>



                        <div class="col-md-12">
                                    <button class="btn btn-primary"><i class="fas fa-plus"></i> Ajouter </button>
                                </div>
                        </div>
                 </form>

                    </div>
                        </div>
                    </div>
                </div>




@endsection
