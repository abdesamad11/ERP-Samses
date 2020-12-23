@extends('admin.layouts.master')

    @section('title')

       Vendu Services

    @endsection

@section('content')
<h1 class="text-center">Liste des Service Vendu </h1>

<div class="row">
   <div class="col-md">
       <div class="card o-hidden mb-4">
           <div class="card-header d-flex align-items-center">
               <h3 class="w-50 float-left card-title m-0">
                  Liste Vendu   </h3>

            <div class="w-50 float-left">
                    <form action="" method="post">
                        @csrf
                    <label for="firstName1">Periode d'vendu  :</label>
                    <input type="date" name='date_deb'>
                    <label for="firstName1">- jusqu'a -</label>
                    <input type="date" name="date_fin">
                    <input class="btn btn-success ripple m-1" type="submit" value="Rechercher">
                    </form>
            </div>
           <div class="dropdown dropleft text-right w-50 float-right">
             <button class="btn bg-gray-100" id="dropdownMenuButton_table1" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 <i class="nav-icon i-Gear-2"></i>
               </button>
<div class="dropdown-menu" aria-labelledby="dropdownMenuButton_table1">
<a href="{{route('vserv.create')}}" class="dropdown-item" >
    <i class="fas fa-plus"></i> Ajouter vendu Services </a>
       </div>
           </div>
           </div>
           <div class="card-body">
               <div class="table-responsive">
                   <table class="table dataTable-collapse" id="user_table" >
                       <thead>
                           <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nom Clients </th>
                            <th scope="col">Date Service</th>
                            <th scope="col">Montant Total</th>
                            <th scope="col">Rest</th>
                            <th scope="col">Remarque</th>
                            <th scope="col">Action</th>
                           </tr>
                       </thead>

                       <tbody>
                @foreach ($vservice as $item)
                        <tr>
                            <th scope="row">{{$item->id}}</th>
                            <td>
        <span class="badge badge-pill badge-success m-2">{{$client->nom_cl }}</span>
                           </td>
                            <td>{{$item->date_ser }}</td>
                            <td>{{$item->total }}.00 DH</td>
                            <td>
                                @if($item->rest==null)

                                 0.00 DH

                                @else

                                     {{$item->rest}}.00 DH

                                @endif
                            </td>
                            <td>{{$item->remarque }}</td>

                   <td>



            <a  href="{{route('reglement.regladd',$item->id)}}" class="btn btn-success btn-sm m-1" type="submit" title="reglemen
             paiment avec Client">
                <i class="i-Money-2"></i>
             </a>


             <a  href="{{route('vserv.devis',$item->id)}}" class="btn btn-info btn-sm m-1" type="submit" title="devis">
                <i class="i-File-TXT"></i>
             </a>

             <a  href="{{route('vserv.edit',$item->id)}}" class="btn btn-warning btn-sm m-1" type="submit" title="Modifier">
                <i class="i-Pen-5"></i>
             </a>
             @if( $item->active==0)

             <a  href="{{route('facturation.seradd',$item->id)}}" class="btn btn-danger btn-sm m-1" type="submit" title="Facture"
             style="
    background-color: crimson;
">
                <i class="i-Billing"></i>
             </a>

             @endif
             <a  href="" class="btn btn-primary btn-sm m-1" type="submit" title="details">
                <i class="i-Align-Left"></i>
             </a>
             <form method="POST"  action="{{route('vserv.destroy',$item->id)}}">
                @csrf
                @method('DELETE')

                <button  class="btn btn-danger btn-sm m-1"  onclick="return confirm('Voulez-vous vraimment supprimer ?');" type="submit" title="archive"
                style="
    background-color: coral;
"><i class="nav-icon i-Dropbox"></i></button>

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


<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript" language="javascript" >
    $(document).ready(function(){
     $('#user_table').DataTable({

      dom: 'lBfrtip',
      buttons: [
       'excel', 'csv', 'pdf', 'copy','colvis',
      ],
      "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ]
     });

    });

   </script>






@endsection
