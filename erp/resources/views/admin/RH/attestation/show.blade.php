@extends('admin.layouts.master')

    @section('title')

        Attestations

    @endsection

@section('content')
<div class="breadcrumb">
    <h1>Gestion Attestation</h1>
    <ul>
        <li><a href="#">Attestation </a></li>
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

                <div class="card-title mb-3">Nouvelle Attestation </div>
              @foreach ($attestation as $item)
            <div class="row">
            <div class="col-md-4 form-group mb-3">
                <label for="firstName1">Liste Employers</label>
                <select class="form-control" name="employer_id" id="" disabled>
                    <option value="{{ $item->employer_id }}" selected>{{ $item->employer->nom }}</option>
                  </select>
            </div>
            <div class="col-md-4 form-group mb-3">
                <label for="firstName1">Type</label>
                <select class="form-control" name="type" id="" disabled>
                <option value="" selected>{{ $item->type }}</option>

                </select>
            </div>
            <div class="col-md-3 form-group mb-3">
                <label for="firstName1">Date Demande </label>
                <input class="form-control"  type="date" name="date_dm" value="{{ $item->date_dm }}" disabled/>
            </div>


                        <div class="col-md-12">
                                    <a  href="{{ route('attestation.index') }}" class="btn btn-primary"><i class="fas fa-plus"></i> Retour </a>
                        </div>

                    </div>
             @endforeach

                    </div>
                        </div>
                    </div>
                </div>



@endsection
