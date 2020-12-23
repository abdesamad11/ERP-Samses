@extends('admin.layouts.master')

    @section('title')

        Attestations

    @endsection

@section('content')
<div class="breadcrumb">
    <h1>Gestion Attestation</h1>
    <ul>
        <li><a href="#">Attestation </a></li>
        <li>Modifer </li>
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
                <div class="card-title mb-3">Modifer Attestation </div>
                <form method="POST" action="{{ route('attestation.update',$attestation->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

            <div class="row">
            <div class="col-md-4 form-group mb-3">
                <label for="firstName1">Liste Employers</label>
                <select class="form-control" name="employer_id" id="" >
                    <option value="{{ $attestation->employer_id }}" selected>{{ $attestation->employer->nom }}</option>
                    @foreach ($employer as $item)

                        <option value="{{ $item->id }}">{{ $item->nom }}</option>

                    @endforeach
                </select>
            </div>
            <div class="col-md-4 form-group mb-3">
                <label for="firstName1">Type</label>
                <select class="form-control" name="type" id="" >
                <option value="{{ $attestation->type }}" selected>{{ $attestation->type }}</option>
                <option value="travail">Travail</option>
                </select>
            </div>
            <div class="col-md-3 form-group mb-3">
                <label for="firstName1">Date Demande </label>
                <input class="form-control"  type="date" name="date_dm" value="{{ $attestation->date_dm }}" />
            </div>


                        <div class="col-md-12">
                                    <button class="btn btn-success"><i class="fas fa-edit"></i> Modifier </button>
                            </div>
                    </div>

                </form>
                    </div>
                        </div>
                    </div>
                </div>



@endsection
