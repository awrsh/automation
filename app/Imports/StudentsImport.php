<?php

namespace App\Imports;

use App\Models\School;
use App\Models\Student;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class StudentsImport implements ToCollection
{

    public function collection(Collection $rows)
    {
        // $count = 0;
        // foreach ($rows as $i) {
        //     $count++;
        // }
   
        // $school = School::where('school_id', 1)->first();
      
        // if ($count <= 17) {
        //     dd('dfs');
        
            $data = session()->get('import_data');
            $array = [];
            $input['school_id'] = 1;

            foreach ($rows as $key => $row) {
                foreach ($data as $key => $item) {
                    $input['student_' . $item] = $row[$key];
                }
                array_push($array, $input);
            }
            unset($array[0]);
            foreach ($array as $in) {
                Student::insert($in);
            }

            return true;
        // } else {
        //     return false;
        // }
    }
}
