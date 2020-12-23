@extends('admin.layouts.master')

    @section('title','Service ')

    @section('content')

    <h1 class="text-center">Liste des Services  </h1>

    <div class="row">
       <div class="col-md">
           <div class="card o-hidden mb-4">
               <div class="card-header d-flex align-items-center">
                   <h3 class="w-50 float-left card-title m-0">Ajouter  Nouveau Services </h3>
               <div class="dropdown dropleft text-right w-50 float-right">
                 <button class="btn bg-gray-100" id="dropdownMenuButton_table1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     <i class="nav-icon i-Gear-2"></i>
                   </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton_table1">
          <a href="{{route('serviices.create')}}" class="dropdown-item" ><i class="fas fa-user-plus"></i> Ajouter Services    </a>
           </div>
               </div>
               </div>
               <div class="card-body">
                   <div class="table-responsive">
                       <table class="table dataTable-collapse" id="user_table" >
                           <thead>
                               <tr>
                                   <th scope="col">ID</th>
                                   <th scope="col">Nom de Service</th>
                                   <th scope="col">Description</th>
                                   <th scope="col">Action</th>
                               </tr>
                           </thead>

                           <tbody>
                            @foreach ($service as $item)
                            <tr>
                             <th scope="row">{{$item->id}}</th>
                                <td>{{$item->nom}}</td>
                                <td>
                                    <textarea name="" id="" cols="40" rows="10" disabled>
                                        {{$item->description}}
                                    </textarea>

                                </td>

                    <td>

                 <a  href="{{route('serviices.edit',$item->id )}}" class="btn btn-success btn-sm m-1" type="submit" alt="modifier"><i class="fas fa-edit"></i></a>
                 <form method="POST"  action="{{route('serviices.destroy',$item->id)}}">
                    @csrf
                    @method('DELETE')

                    <button  class="btn btn-danger btn-sm m-1" type="submit" onclick="return confirm('Voulez-vous vraimment supprimer ?');"><i class="fas fa-trash-alt"></i></button>

                    </form>

                    <a  href="{{ route('serviices.show',$item->id) }}" class="btn btn-info btn-sm m-1"   alt="archive">  <i class="fas fa-eye "></i></a>

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

