@extends('admin.layouts.master')

    @section('title')

       Achats

    @endsection

@section('content')


<h1 class="text-center">Liste des Achats </h1>

<div class="row">
   <div class="col-md">
       <div class="card o-hidden mb-4">
           <div class="card-header d-flex align-items-center">
               <h3 class="w-50 float-left card-title m-0">
                  Liste Achats  </h3>

            <div class="w-50 float-left">
                    <form action="{{route('achat.search')}}" method="post">
                        @csrf
                    <label for="firstName1">Periode d'Achat  :</label>
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
<a href="{{route('achat.create')}}" class="dropdown-item" >
    <i class="fas fa-plus"></i> Ajouter Achat</a>
       </div>
           </div>
           </div>
           <div class="card-body">
               <div class="table-responsive">
                   <table class="table dataTable-collapse" id="user_table" >
                       <thead>
                           <tr>
                               <th scope="col">ID</th>
                               <th scope="col">Nom Fournisseur</th>
                               <th scope="col">Code Commade</th>
                               <th scope="col">Date Achats</th>
                               <th scope="col">Detail Commande</th>
                               <th scope="col">Total</th>
                               <th scope="col">Rest</th>
                               <th scope="col">Remarque</th>
                               <th scope="col">Etat</th>
                               <th scope="col">Action</th>
                           </tr>
                       </thead>

                       <tbody>
                        @foreach ($achats as $item)
                        <tr>
                            <th scope="row">{{$item->id}}</th>
                            <td>{{$item->nom_f }}</td>
                            <td>{{$item->no_commande }}</td>
                            <td>{{$item->date_achat }}  </td>
                            <td>

                                <ul>
                                    <li>Produit Name : {{$item->name }}</li>
                                    <li>Quntite Comander: {{$item->qte }}</li>
                                    <li>Prix Achats : {{$item->prix }}</li>
                                </ul>

                            </td>
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
                    @if($item->status =='commander')

                            <span class="badge badge-pill badge-warning m-2">Commander</span>

                    @elseif($item->status=='recu')

                            <span class="badge badge-pill badge-success m-2">Reçu</span>

                    @endif
                     </td>
                   <td>
                <form method="POST"  action="">
                   @csrf
                   @method('DELETE')

                   <button  class="btn btn-danger btn-sm m-1"  onclick="return confirm('Voulez-vous vraimment supprimer ?');" type="submit" title="supprimer"><i class="fas fa-trash-alt"></i></button>

                </form>


            <a  href="{{ route('achat.reglement',$item->fournisseur_id) }}" class="btn btn-success btn-sm m-1" type="submit" title="reglement paiment avec fournisseurs">
                <i class="i-Money-2"></i>
             </a>

           @if( $item->active==0)

            <a  href="{{ route('achat.bcmd',$item->fournisseur_id) }}" class="btn btn-info btn-sm m-1" type="submit" title="imprimer fiche Commander">
                <i class="i-Billing"></i>
             </a>


             <a  href="{{route('achat.accepter',$item->fournisseur_id)}}" class="btn btn-success btn-sm m-1" type="submit" title="Active Commande"
             style="background-color: darkcyan;"
             >

                <i class="fa fa-check"></i>
             </a>

           @endif

            <a  href="" class="btn btn-primary btn-sm m-1" type="submit" title="details">
                <i class="i-Align-Left"></i>
             </a>










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
