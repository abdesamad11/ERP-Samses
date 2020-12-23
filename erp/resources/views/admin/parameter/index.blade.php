@extends('admin.layouts.master')

    @section('title')

        Societe

    @endsection

@section('content')
<div class="row">
   <div class="col-md">
       <div class="card o-hidden mb-4">
           <div class="card-header d-flex align-items-center">
               <h3 class="w-50 float-left card-title m-0">Information sur Societe </h3>
           <div class="dropdown dropleft text-right w-50 float-right">
             <button class="btn bg-gray-100" id="dropdownMenuButton_table1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 <i class="nav-icon i-Gear-2"></i>
            </button>
<div class="dropdown-menu" aria-labelledby="dropdownMenuButton_table1">
<a href="{{route('parameter.create')}}" class="dropdown-item" ><i class="fas fa-user-plus"></i> Ajouter parameter</a>
       </div>
           </div>
           </div>
           <div class="card-body">
               <div class="table-responsive">
                   <table class="table dataTable-collapse" id="user_table" >
                       <thead>
                           <tr>
                               <th scope="col">Rasion social</th>
                               <th scope="col">ICE</th>
                               <th scope="col">Adresse</th>
                               <th scope="col">Eamil</th>
                               <th scope="col">GSM</th>
                               <th scope="col">logo</th>
                               <th scope="col">Action</th>
                           </tr>
                       </thead>

                       <tbody>
                        @foreach ($par as $item)

                        <tr>
                         <th scope="row">{{$item->raison_sociale}}</th>
                         <th scope="row">{{$item->RC_soc}}</th>
                         <th scope="row">{{$item->adresse}}</th>
                         <th scope="row">{{$item->email}}</th>
                         <th scope="row">{{$item->GSM}}</th>
                         <td>
                    <img src="{{ URL('uploads').'/'.$item->logo }}" alt="photo" style="width: 80px; height:80px;"/> </td>


                <td>

       <a  href="{{route('parameter.edit',$item->id )}}" class="btn btn-success btn-sm m-1" type="submit" alt="modifier">
        <i class="nav-icon i-Pen-2 font-weight-bold"></i>
    </a>



             <form method="POST"  action="{{route('parameter.destroy',$item->id)}}">
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
</div>














@endsection
