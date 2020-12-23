@extends('admin.layouts.master')

    @section('title')

          Categorie

    @endsection

@section('content')
<div class="breadcrumb">
    <h1>GP ET GS </h1>
    <ul>
        <li><a href="#">Categorie</a></li>
        <li>Modifier </li>
    </ul>
</div>
<div class="separator-breadcrumb border-top"></div>
                <div class="row">
                    <div class="col-md-12">
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

                <div class="card-title mb-3">Modifier Categorie</div>
                <form method="POST" action="{{route('categorie.update',$categorie->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                 <div class="row">
            <div class="col-md-6 form-group mb-3">
                <label for="firstName1">Nom de categrie</label>
                <input class="form-control" id="categorie" type="text" name="nom_cat" value="{{$categorie->nom_cat}}" />
          </div>


                        <div class="col-md-12">
                                    <button class="btn btn-success">Modifier</button>
                                </div>
                        </div>
                 </form>

                    </div>
                        </div>
                    </div>
                </div>




@endsection
