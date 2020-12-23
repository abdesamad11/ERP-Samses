@extends('admin.layouts.master')

    @section('title')

            Gestion RH

    @endsection

@section('content')

@if(session('sucess_message'))

<div class="alert alert-success" role="alert">
  <h4 class="alert-heading"></h4>

  {{session('success_message')}}

  <p></p>
  <p class="mb-0"></p>
</div>

@endif

<h1 class="text-center">Liste  des Employers</h1>
<div class="row">
    <div class="col-md">
        <div class="card o-hidden mb-4">
            <div class="card-header d-flex align-items-center">
                <h3 class="w-50 float-left card-title m-0">Ajouter  Nouveau Employers</h3>

                <div class="w-50 float-left">
                    <a   class="btn btn-success btn-rounded m-1"  href="{{action('EmployerController@export') }}" style="
                    background-color:#00b894;">
                        <i class="fas fa-file-excel"></i>  Excel</a>
           <a  class="btn btn-danger btn-rounded m-1"  href="" style="
                        background-color:#d63031;">
                       <i class="fas fa-file-pdf "></i>    PDF</a>
                       <a  class="btn btn-success btn-rounded m-1" href="{{action('EmployerController@csv') }} " style="
                       background-color:#00b894;">
                       <i class="fas fa-file-csv "></i>   CSV</a>
                </div>



                <div class="w-50 float-left">
                    <form action="{{ route('gemp.search') }}" method="post">
                        @csrf
                    <label for="firstName1">Date insertion :</label>
                    <input type="date" name='date_deb'>
                    <label for="firstName1">- jusqu'a -</label>
                    <input type="date" name="date_fin">
                    <input class="btn btn-success ripple m-1" type="submit" value="affchier">
                    </form>
                </div>





            <div class="dropdown dropleft text-right w-50 float-right">
              <button class="btn bg-gray-100" id="dropdownMenuButton_table1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="nav-icon i-Gear-2"></i>
                </button>
       <div class="dropdown-menu" aria-labelledby="dropdownMenuButton_table1">
       <a href="{{route('gemp.create')}}" class="dropdown-item" ><i class="fas fa-user-plus"></i> Ajouter Employers   </a>
        </div>
            </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table dataTable-collapse" id="user_table" >
                        <thead>
                            <tr>
                                <th scope="col"> ID</th>
                                <th scope="col">Nom</th>
                                <th scope="col">Telephone</th>
                                <th scope="col">Adresse </th>
                                <th scope="col">Image </th>
                                <th scope="col">Date insertion</th>
                                <th scope="col">Salaire</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($employer as $item)
                            <tr>
                             <th scope="row">{{$item->id}}</th>
                                <td>{{$item->nom}}</td>
                                <td>{{$item->tele}}</td>
                                <td>{{$item->adresse}}</td>
                 <td><img src="{{ URL('uploads').'/'.$item->photo }}" alt="photo" style="width: 80px; height:80px;"/> </td>
                                <td>{{$item->date_embouche}}</td>
                                <td>{{$item->salaire}}</td>

                    <td>

                 <a  href="{{route('gemp.edit',$item->id )}}" class="btn btn-success btn-sm m-1" type="submit" alt="modifier"><i class="fas fa-user-edit"></i></a>
                 <a  href="{{ route('gemp.show',$item->id) }}" class="btn btn-info btn-sm m-1"   alt="archive">
                 <i class="fas fa-eye    "></i></a>
                 <form method="POST"  action="{{route('gemp.destroy',$item->id)}}">
                    @csrf
                    @method('DELETE')

                    <button  class="btn btn-danger btn-sm m-1" type="submit" onclick="return confirm('Voulez-vous vraimment supprimer ?');"><i class="fas fa-trash-alt"></i></button>

                    </form>


                    </td>

                        </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- end of col-->
    @include('sweetalert::alert')

 </div>



@endsection
