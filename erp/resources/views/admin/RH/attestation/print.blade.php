<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex">

    <title>Attestation </title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <style>
        .text-right {
            text-align: right;
        }
    </style>

</head>
<body class="login-page" style="background: white">
@foreach ($attestation as $item)
@foreach ($parameter as $os)



    <div>
        <div class="row">
            <h2 class="text-center">Attestation {{$item->type}}</h2>
            <div class="col-xs-4">
                <img src="" alt="logo">
            </div>
        </div>

        <div style="margin-bottom: 0px">&nbsp;</div>

        <div class="row">
            <div class="col-xs-6">
                @if($item->type =='travail')
                <address>
                    <span>CIN :  {{$item->employer->cin}}       </span> <br>
                    <span>Tele :   {{$item->employer->tele}}      </span>
                    <span>Adrrese :    {{$item->employer->adresse}} </span>
                </address>
                @else
                <address>
                    <span> {{$os->raison_sociale}} </span>
                    <span> {{$os->nom_societe}} </span>
                    <span> {{$os->adresse}}</span>

                </address>
                @endif

            </div>

         <div class="col-xs-5">
             <table style="width: 100%">
                <tbody>
                    <tr>
                         <th>Date  :</th>
                         <td class="text-right">Fait &agrave;{{ $os->adresse }},le {{date('Y-m-d H:i:s')}}  </td>
                     </tr>

                 </tbody>
             </table>

         <div style="margin-bottom: 0px">&nbsp;</div>


            </div>
        </div>

        <table class="table">
            <thead style="background: #F5F5F5;">
                <tr>
                    <th>------------------------------------------------------------------</th>

                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>

                        @if($item->type =='travail')



                        <p>
                            <h4>Nous Certifions que Monsieur /Madmae
                                           <strong>Nom :{{$item->employer->nom}}</strong>
                                           est employ&eacute; par la soc&eacute;t&eacute;{{ $os->raison_sociale }}
                                           domicilli&eacute;e au {{ $os->adresse }},
                                           en tant que fonctonaire en contrat &agrave;
                             duree indetermin&eacute;e depuis le {{ $item->date_embouche }}.
                             Monsieur / Madme {{$item->employer->nom}} n'est a ce jour ni en p&eacute;riode de preavis de licenciement ou de demission ni en cours de mutation.

                           <br>
                           <br>
                           <br>
                           Nous Vous prions de croire,Madame/Monsieur,&agrave; l'&eacute;xpression de nos salutations distingu&eacute;es.

                                    </h4>
                        </p>


                        @else


                        <p>
        <h4>La Societe {{ $os->raison_sociale }} Atteste par la persente que Mr  <strong>{{$item->employer->nom}}</strong>
        Titulaire de la CIN {{$item->employer->cin}} et immatricule a la cnss sous le N:.................Travaille en qualite
        un salaire annuel Net de : {{ $item->employer->salaire  }} DH  le detail est suivant :<br>
            <strong>Salaire Brut Impos :</strong>...................<br>
            <strong>CNSS + AMOS :</strong>...................<br>
            <strong>Revenu net  :</strong>...................<br>
            <strong>IGR :</strong>...................<br>


                           <br>
                           <br>
                           <br>


                           CETTE ATTESTATION LUI EST DELIVREE POUR SERVIR ET VALOIR CE QUE DE DROIT.

                                    </h4>
                        </p>




                        @endif





                     </td>
               </tr>

            </tbody>
        </table>

            <div class="row">
                <div class="col-xs-6"></div>
                <div class="col-xs-5">
                    <table style="width: 100%">
                        <tbody>
                            <tr class="well" style="padding: 5px">
                                <th style="padding: 5px"><div> Singature directeur : </div></th>
                                <td style="padding: 5px" class="text-right"><strong> -------------------------------- </strong></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div style="margin-bottom: 0px">&nbsp;</div>

            <div class="row">
                <div class="col-xs-8 invbody-terms">

    Nous Vous prions de croire,Madame/Monsieur,&agrave; l'&eacute;xpression de nos salutations distingu&eacute;es.
                     <br>
                    <br>
                    <h4>--------------------------------------------------------------------------------------------------</h4>
                    <p>
                    du signature :  {{$item->employer->nom}} .
                    </p>
                </div>
            </div>
        </div>
    @endforeach
    @endforeach
    </body>
    </html>
