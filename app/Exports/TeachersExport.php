<?php

namespace App\Exports;

use App\Teacher;
use App\User;
use DB;
use Maatwebsite\Excel\Concerns\FromCollection;

class TeachersExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //return Teacher::select('id','biography','website_url')->get();
        //return Teacher::all();
       $prueba =  DB::table('teachers')
                    ->join('users', 'users.id', '=', 'teachers.user_id')
                    ->select('teachers.id',
                             'users.slug',
                             'users.email',
                             'teachers.title',
                             'teachers.biography',
                             'teachers.website_url',
                             'teachers.created_at'
                             )
                    ->get();

        return $prueba;
        

        





    }
}