@extends('admin.layouts.master')

    @section('title')

        Utilisateurs

    @endsection

@section('content')

<h1 class="text-center">Utilisateurs Samese  </h1>

<div class="row">
   <div class="col-md">
       <div class="card o-hidden mb-4">
           <div class="card-header d-flex align-items-center">
               <h3 class="w-50 float-left card-title m-0">
                  Liste Users  </h3>


           <div class="dropdown dropleft text-right w-50 float-right">
             <button class="btn bg-gray-100" id="dropdownMenuButton_table1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 <i class="nav-icon i-Gear-2"></i>
               </button>
<div class="dropdown-menu" aria-labelledby="dropdownMenuButton_table1">
<a href="{{route('users.create')}}" class="dropdown-item" >
    <i class="fas fa-plus"></i> Ajouter Utilisateurs </a>
       </div>
           </div>
           </div>
           <div class="card-body">
               <div class="table-responsive">
                   <table class="table dataTable-collapse" id="user_table" >
                       <thead>
                           <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Login Users </th>
                            <th scope="col">Password</th>
                            <th scope="col">Privilege</th>
                            <th scope="col">Action</th>
                           </tr>
                       </thead>

                       <tbody>





                       </tbody>

                   </table>
               </div>
           </div>
       </div>
   </div>
   <!-- end of col-->
</div>




@endsection
