;

<?php $__env->startSection('content'); ?>
   
<div class="container">
 <div class="row">
  <div class=" col-md-12">
    
   <div class="card">
    <div class="card-body">

       <div >
            <form id="form" action="" method="post">
                    <?php echo csrf_field(); ?>
                    
        
                   <div class=" row">
                    <div class=" form-group col-md-4 ">
                     <label for="" class=" "> <span class="text-danger">*</span> پایه </label>
                     <select id="basic" name="basic" class=" custom-select  mb-3">
                       <option selected="">باز کردن فهرست انتخاب</option> 
                       <?php $__currentLoopData = \App\Models\BasicModel::where('section_id',$section)->latest()->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $basic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                       <option value="<?php echo e($basic->basic_id); ?>" ><?php echo e($basic->basic_name); ?></option> 
                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                  
                     </select>
             </div>
             <div class=" form-group col-md-4 ">
              <label for="" class=" "> <span class="text-danger">*</span> انتخاب مورد </label>
              <select id="type" name="type" class=" custom-select  mb-3">
              
                <option value="غیبت" selected="">غیبت</option>
                <option value="تاخیر">تاخیر</option> 
                              
              </select>
      </div>
             <div class=" form-group col-md-4 ">
              <label> تاریخ </label>
              <input type="text" id="date" value=" " name="date" 
                  class="form-control text-right date-picker-shamsi-list" dir="ltr">

          </div>

          
                   </div>
        
                    
                    <div class=" form-group button__wrapper">
                            <button type="submit"  class=" btn btn-primary">مشاهده</button>
                    </div>
        
        
        
                </form>
       </div>
<hr>
















     <div id="content">
          
     </div>
    </div>
</div>
  </div>
</div>
  </div>
 </div>
</div>



<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>


<!-- begin::datepicker -->
<script src="<?php echo e(route('BaseUrl')); ?>/Pannel/assets/vendors/datepicker-jalali/bootstrap-datepicker.min.js"></script>
<script src="<?php echo e(route('BaseUrl')); ?>/Pannel/assets/vendors/datepicker-jalali/bootstrap-datepicker.fa.min.js"></script>
<script src="<?php echo e(route('BaseUrl')); ?>/Pannel/assets/vendors/datepicker/daterangepicker.js"></script>
<script src="<?php echo e(route('BaseUrl')); ?>/Pannel/assets/js/examples/datepicker.js"></script>
<!-- end::datepicker -->
<script src="<?php echo e(route('BaseUrl')); ?>/Pannel/assets/vendors/dataTable/jquery.dataTables.min.js"></script>
<script src="<?php echo e(route('BaseUrl')); ?>/Pannel/assets/vendors/dataTable/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo e(route('BaseUrl')); ?>/Pannel/assets/vendors/dataTable/dataTables.responsive.min.js"></script>
<script src="<?php echo e(route('BaseUrl')); ?>/Pannel/assets/js/examples/datatable.js"></script>

    <script >

$(document).ready(function(){
    
     
 $.ajaxSetup({
headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});




$("#form").submit(function(e){
e.preventDefault();
$('.button__wrapper').html('<button class="btn btn-primary" type="button" disabled> <span class="spinner-border spinner-border-sm m-l-5" role="status" aria-hidden="true"></span> در حال بارگذاری ... </button>')

var date = $(this).find('#date').val();
var basic = $(this).find('#basic').val();
var type = $(this).find('#type').val();

console.log({basic,date,type})
$.ajax({

type:'POST',
url:'get_absenceAndDelayList',
data:{
 basic:basic,
date:date,
type:type
},
success:function(data){
    
   if (data.length == 173 || data.length == 174) {
    $('#content').html('<p>موردی برای نمایش وجود ندارد</p>')
    $('.button__wrapper').html(' <button type="submit" class=" btn btn-primary"> نمایش</button>')

   }else{
    $('#content').html(data)
    $('.button__wrapper').html(' <button type="submit" class=" btn btn-primary"> نمایش</button>')
   }


},
        error:function(data){
    
            $('.button__wrapper').html(' <button type="submit" class=" btn btn-primary"> نمایش</button>')
       alert('لطفا ورودی ها را تکمیل کنید')
        }

    });

});





})





    </script>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('css'); ?>

<!-- begin::datepicker -->
<link rel="stylesheet" href="<?php echo e(route('BaseUrl')); ?>/Pannel/assets/vendors/datepicker-jalali/bootstrap-datepicker.min.css">
<link rel="stylesheet" href="<?php echo e(route('BaseUrl')); ?>/Pannel/assets/vendors/datepicker/daterangepicker.css">
<!-- end::datepicker -->

<link rel="stylesheet" href="<?php echo e(route('BaseUrl')); ?>/Pannel/assets/vendors/dataTable/responsive.bootstrap.min.css"
    type="text/css">

    <style>
    .flex__column{
        display: flex;
    flex-direction: column;
    align-items: center;
    border: 1px solid #d6d1d1;
    background: #fff;
    box-shadow: 1px 7px 22px 3px #8e909f8f;
    border-radius: 10px;
    padding: 10px;
    cursor: default!important;
    }

    .flex__column:hover{
        box-shadow: 1px 7px 22px 3px #0027ff52;
    }

    .flex__column > span{
        margin-top: 7px;
    }
    </style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('Layouts.Pannel.Template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\automation\resources\views/User/Discipline/AbsenceAndDelayList.blade.php ENDPATH**/ ?>