<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MainController extends Controller
{ 
     public function index()
     {
         return view('User.Students.Register');
     }

     public function ImportWithExcel()
     {
         return view('User.Students.ImportData');
     }


     
     public function UploadPhoto()
     {
         return view('User.Students.UploadPhoto');
     }

     public function AlbumPhoto()
     {
         return view('User.Students.AlbumPhoto');
     }


}
