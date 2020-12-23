@extends('admin.layouts.master')

    @section('title')

      Users

    @endsection

@section('content')
<div class="breadcrumb">
    <h1>Ajouter  Utilisateurs </h1>
    <ul>
        <li><a href="#">Utilisateurs </a></li>
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
                <div class="card-title mb-3"> Ajouter Nouveau  Utilisateurs </div>
                <form method="POST" action="" enctype="multipart/form-data">
                    @csrf
                 <div class="row">


            <div class="col-md-6 form-group mb-2">
             <label for="">Nom users :</label>
             <input class="form-control"  name="nom_f" type="text"  placeholder="Users"/>
             </div>
        <div class="col-md-6 form-group mb-3">
            <label for="">Email : </label>
            <input class="form-control"   name="raison_social" type="text"  placeholder=" Email"/>
        </div>
        <div class="col-md-6 form-group mb-3">
            <label for="">Passoword : </label>
            <input class="form-control"   name="raison_social" type="password"  placeholder=" Pass"/>
        </div>
        <div class="col-md-6 form-group mb-3">
            <label for="lastName1">Privilegie :</label>
            <select name="type_compte"  class="form-control">
                <option value="1">Admin</option>
                <option value="0">Users</option>
            </select>
        </div>

        <div class="col-md-6 form-group mb-3">
                    <div class="card-title">Permission : </div>
                    <label class="switch pr-5 switch-primary mr-3 "><span>Users</span>
                        <input type="checkbox"  /><span class="slider"></span>
                    </label>
        </div>
        <div class="col-md-12 form-group mb-3">
            <label class="switch pr-5 switch-primary mr-3 "><span>Clients</span>
                <input type="checkbox"  /><span class="slider"></span>
            </label>
        </div>
        <div class="col-md-12 form-group mb-3">
            <label class="switch pr-5 switch-primary mr-3"><span>Fournisseurs</span>
                <input type="checkbox" /><span class="slider"></span>
            </label>
        </div>

        <div class="col-md-12 form-group mb-3">
            <label class="switch pr-5 switch-primary mr-3"><span>Ventes</span>
                <input type="checkbox"  /><span class="slider"></span>
            </label>
        </div>

        <div class="col-md-12 form-group mb-3">
            <label class="switch pr-5 switch-primary mr-3"><span>Achats</span>
                <input type="checkbox"  /><span class="slider"></span>
            </label>
        </div>

        <div class="col-md-12 form-group mb-3">
            <label class="switch pr-5 switch-primary mr-3"><span>Produits Stocks</span>
                <input type="checkbox"  /><span class="slider"></span>
            </label>
        </div>
        <div class="col-md-12 form-group mb-3">
            <label class="switch pr-5 switch-primary mr-3"><span>Employers</span>
                <input type="checkbox"  /><span class="slider"></span>
            </label>
        </div>
        <div class="col-md-12 form-group mb-3">
            <label class="switch pr-5 switch-primary mr-3"><span>Projets</span>
                <input type="checkbox"  /><span class="slider"></span>
            </label>
        </div>
        <div class="col-md-12 form-group mb-3">
            <label class="switch pr-5 switch-primary mr-3"><span>Parameter Societe</span>
                <input type="checkbox"  /><span class="slider"></span>
            </label>
        </div>


        <br>
        <br>


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
