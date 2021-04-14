<?php

namespace App\Exports;

use App\Student;
use App\User;
use DB;
use Maatwebsite\Excel\Concerns\FromCollection;

class StudentsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //return Student::all();
        $prueba =  DB::table('students')
                    ->join('users', 'users.id', '=', 'students.user_id')
                    ->select('users.id',
                             'users.slug',
                             'users.email',
                             'students.title',                            
                             'students.created_at'
                             )
                    ->get();

        return $prueba;
    }
}
