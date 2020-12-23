<?php

namespace App\Exports;

use App\Model\RH\Employer;
use Maatwebsite\Excel\Concerns\FromCollection;

class EmployersExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //

       // $employer=Employer::only('nom','tele','cin','date_embouche','salaire','RIB','affectation');

        return Employer::all();


        //  return Employer::only('nom','tele','cin','date_embouche','salaire','RIB','affectation');

    }
}
