<?php

namespace App\Imports;

use App\Models\Student;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
class StudentsImport implements ToCollection
{

    public function collection(Collection $rows)
    {

        $data=session()->get('import_data');
        $count =1;
       
        
        foreach ($rows as $row) 
        {
\dd($row[$count]);
            foreach($data as $item){
               
               $input[]=array(  $item => $row[$count] );
               
                }
            // $aa=['cs','ca','sad'];
    //    $input=[
    //     'school_id'=>1,
    //     'student_student_number'    => $row[1],
    //     'student_lastname'    => $row[2],
    //     'student_firstname'     => $row[3],
    //     'student_father_name'    => $row[4],
    //     'student_certificate_number'    => $row[5],
    //     'student_student_basic'    => $row[6],
    //     'student_student_class'    => $row[7],
    //    ];
       
    //    Student::insert($input);
    $count++;
        }
        dd($input);
    }
   
}
