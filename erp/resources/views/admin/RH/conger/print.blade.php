<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex">

    <title>Invoice</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <style>
        .text-right {
            text-align: right;
        }
    </style>

</head>
<body class="login-page" style="background: white">
@foreach ($conger as $item)


    <div>
        <div class="row">

            <div class="col-xs-4">
                <img src="" alt="logo">
            </div>
        </div>

        <div style="margin-bottom: 0px">&nbsp;</div>

        <div class="row">
            <div class="col-xs-6">
                <h4>Je Soussigne Mr le directeur de l'entprise de atteste que l'employer de  :</h4>
                <address>
                    <strong>Nom :  {{$item->employer->nom}}     </strong><br>
                    <span>CIN :  {{$item->employer->cin}}       </span> <br>
                    <span>Tele :   {{$item->employer->tele}}      </span>
                    <span>Adrrese :    {{$item->employer->adresse}} </span>
                </address>
            </div>

            <div class="col-xs-5">
                <table style="width: 100%">
                    <tbody>
                        <tr>
                            <th>Date  :</th>
                            <td class="text-right">  {{date('Y-m-d H:i:s')}}  </td>
                        </tr>

                    </tbody>
                </table>

                <div style="margin-bottom: 0px">&nbsp;</div>


            </div>
        </div>

        <table class="table">
            <thead style="background: #F5F5F5;">
                <tr>
                    <th>Type de  conger </th>
                    <th>Date </th>
                    <th>Nombre de jr conger rest par annne</th>
                    <th>Nombre de jours votre conger</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <p>
                            {{ $item->cause }}
              </p></td>
                        <td>
                            <h5>{{ $item->date_debut }}</h5><h6><span>à</span></h6><h5> {{ $item->date_fin }}</h5>
                        </td>
                        <td>
                            <h5> {{ ($item->employer->conger)-($item->restjr) }} <span>Jrous</span>
                            </h5>
                        </td>
                        <td>
                            <h5> {{ $item->restjr }}   <span>Jrous</span>
                            </h5>
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
                Le Reprise Du Travail est Fixtee au {{ $item->date_fin }}  A 08 H 30
                     <br>
                    <br>
                    <h4>Attenstion : </h4>
                    <p>
                        Cette Attestion de conger est valable jusqu'a fin de votre conger .
          </p>
                </div>
            </div>
        </div>
    @endforeach
    </body>
    </html>
