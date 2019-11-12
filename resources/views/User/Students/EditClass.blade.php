@extends('Layouts.Pannel.Template');

@section('content')
   
<div class="container-fluid">
 <div class="row">
  <div class=" col-md-12">
    
   <div class="page-header">
    <div>
        <h3>کلاس بندی</h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">صفحه اصلی</a></li>
                <li class="breadcrumb-item"><a href="#">دانش اموزان </a></li>
                <li class="breadcrumb-item active" aria-current="page">کلاس بندی</li>
            </ol>
        </nav>
    </div>
    
</div>

<div class="card">
 <div class="card-header">عنوان محتوا</div>
 <div class="card-body">
    <form action="" method="post">
     <div class=" form-group row">
       <label for="" class=" col-md-1 pt-3"> <span class="text-danger">*</span> مقطع </label>
       <select class="col-md-4 custom-select custom-select-lg mb-3">
        <option selected="">باز کردن فهرست انتخاب</option>
        <option value="1">مورد یک</option>
        <option value="2">مورد دو</option>
        <option value="3">مورد سه</option>
    </select>
     </div>

     <div class=" form-group row">
       <label for="" class=" col-md-1 pt-3"> <span class="text-danger">*</span> پایه </label>
       <select class="col-md-4 custom-select custom-select-lg mb-3">
        <option selected="">باز کردن فهرست انتخاب</option>
        <option value="1">مورد یک</option>
        <option value="2">مورد دو</option>
        <option value="3">مورد سه</option>
    </select>
     </div>

     <div class=" form-group row">
       <label for="" class=" col-md-1 pt-3"> <span class="text-danger">*</span> کلاس </label>
       <select class="col-md-4 custom-select custom-select-lg mb-3">
        <option selected="">باز کردن فهرست انتخاب</option>
        <option value="1">مورد یک</option>
        <option value="2">مورد دو</option>
        <option value="3">مورد سه</option>
    </select>
     </div>


     <div class=" form-group">
<button type="submit" class=" btn btn-primary">مشاهده</button>
     </div>
    </form>



    <div class="table-responsive my-5" tabindex="7" style="overflow: hidden; outline: none;">
      <table class="table text-center">
          <thead class=" bg-success">
          <tr>
              <th scope="col">کلاس</th>
              <th scope="col">هشت یک</th>
              <th scope="col"> هشت دو</th>
              <th scope="col">هشت سه</th>
              <th scope="col">هشت چهار</th>
              <th scope="col"> هشت پنج</th>
              <th scope="col">هشت شش</th>
          </tr>
          </thead>
          <tbody>
          <tr>
              <th scope="row">معدل</th>
              <td>11</td>
              <td>16</td>
              <td>19</td>
              <td>17</td>
              <td>15</td>
              <td>14</td>
             
          </tr> 
          <tr>
            <th scope="row">تعداد افراد</th>
            <td>24</td>
            <td>21</td>
            <td>19</td>
            <td>30</td>
            <td>25</td>
            <td>24</td>
           
        </tr> 
          </tbody>
      </table>

<br><br>

<div class=" container">
    <div class="row">
        <div class=" col-md-5">
            <form action="" method="post">
                <div class=" form-group ">
                    <label for="" class=" pt-3"> <span class="text-danger">*</span> کلاس </label>
                    <select class=" custom-select custom-select-lg mb-3" size="10" multiple>
                     <option selected="">باز کردن فهرست انتخاب</option>
                     <option value="1">مورد یک</option>
                     <option value="2">مورد دو</option>
                     <option value="3">مورد سه</option>
                     <option value="1">مورد یک</option>
                     <option value="2">مورد دو</option>
                     <option value="3">مورد سه</option>
                     <option value="1">مورد یک</option>
                     <option value="2">مورد دو</option>
                     <option value="3">مورد سه</option>
                     <option value="1">مورد یک</option>
                     <option value="2">مورد دو</option>
                     <option value="3">مورد سه</option>
                 </select>
                  </div>
             

            
        </div>
        <div class=" col-md-2">
            <div>
              <button type="submit"  class="btn btn-primary" style="margin-top: 150px;
              margin-right: 30px;">انتخاب</button>
            </div>
          </form>
          <form action="" method="post">
            <button type="submit" class="btn btn-primary" style="margin-right: 30px;
            margin-top: 20px;">افزودن</button>
        </div>
        <div class=" col-md-5">
            <div class=" form-group ">
                <label for="" class=" pt-3"> <span class="text-danger">*</span> کلاس </label>
                <select class=" custom-select custom-select-lg mb-3" size="10">
                
             </select>
              </div>
        </div>
      </form>   
      </div>
</div>


  </div>















 </div>
</div>
  </div>
</div>
  </div>
 </div>
</div>



@endsection

@section('js')
  <script>
  
  </script>
@endsection