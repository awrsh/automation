;

<?php $__env->startSection('content'); ?>
<div class="container-fluid">





    <!-- begin::page header -->
    <div class="page-header">
        <div>
            <h3 style="color: #a4aac1;
            text-shadow: 0 1px 1px black;"> داشبورد </h3>
            
        </div>
   
    </div>

        <div class="card">
       
            <div class=" card-header">


                    <?php if(\Session::has('success')): ?>
                    <div class="alert alert-success">
                    <p>
                      <?php echo e(\Session::get('success')); ?>

                    </p>
                    </div>
                    <?php endif; ?>
    
                    <?php if($errors->any()): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                    <?php endif; ?>


                    <div class="profile row">
                            <div class="col-sm-6 p-3">
                                <div class="d-flex">
                                    <div class=" col-sm-6 col-md-3">
                                       <?php if($student->student_student_photo ): ?>
                                       
                                    <img src=" <?php echo e(route('BaseUrl')); ?>/uploads/students/<?php echo e($student->student_student_photo); ?>" style="width: 100px;" class="img-thumbnail" alt="">
                                        <?php else: ?>
                                        <img src="<?php echo e(route('BaseUrl')); ?>/Pannel/img/avatar.jpg" style="width: 100px;" class="img-thumbnail" alt="">

                                       <?php endif; ?>
                                    </div>
                                    <div class="col-md-9 ">
                                        <p class=" lead"><?php echo e($student->student_firstname .' _ '. $student->student_lastname); ?></p>
                                        <p class="">کلاس <?php echo e($student->getClass->class_name); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
            </div>
                <div class="card-body">
                 
                    <div class=" mb-5">
                            <h5>
                                    میزان مطالعه یک هفته گذشته شما
                            </h5>
                    </div>
                        
                    <div class=" row">
                           <div class=" col-md-12">
                                <canvas id="chart_demo_4"></canvas>
                           </div>

                    </div>
                                   
                    
        
                        

















                               
                </div>
            </div>
        

    









</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>

<script src="<?php echo e(route('BaseUrl')); ?>/Pannel/assets/vendors/charts/chart.min.js"></script>
<script>
$(document).ready(function () {
	
	Chart.defaults.global.defaultFontFamily = '"primary-font", "segoe ui", "tahoma"';

    var chartColors = {
        primary: {
            base: '#3f51b5',
            light: '#c0c5e4'
        },
        danger: {
            base: '#f2125e',
            light: '#fcd0df'
        },
        success: {
            base: '#0acf97',
            light: '#cef5ea'
        },
        warning: {
            base: '#ff8300',
            light: '#ffe6cc'
        },
        info: {
            base: '#00bcd4',
            light: '#e1efff'
        },
        dark: '#37474f',
        facebook: '#3b5998',
        twitter: '#55acee',
        linkedin: '#0077b5',
        instagram: '#517fa4',
        whatsapp: '#25D366',
        dribbble: '#ea4c89',
        google: '#DB4437',
        borderColor: '#e8e8e8',
        fontColor: '#999'
    };
    chart_demo_4();
    function chart_demo_4() {
       console.log()
        if ($('#chart_demo_4').length) {
            var ctx = document.getElementById("chart_demo_4").getContext("2d");
            var densityData = {
                backgroundColor: chartColors.success.base,
                data: <?php echo json_encode($study_count); ?> ,
                label: "میزان مطالعه برحسب دقیقه میباشد"
            };
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: <?php echo json_encode($lessons_name); ?> ,
                    datasets: [densityData]
                },
                options: {
                    scaleFontColor: "#FFFFFF",
                    legend: {
                        display: true,
                        labels: {
                            fontColor: chartColors.fontColor
                        }
                    },
                    scales: {
                        xAxes: [{
                            gridLines: {
                                color: chartColors.borderColor
                            },
                            ticks: {
                                fontColor: chartColors.fontColor
                            }
                        }],
                        yAxes: [{
                            gridLines: {
                                color: chartColors.borderColor
                            },
                            ticks: {
                                fontColor: chartColors.fontColor,
                                min: 0,
                                max: 100,
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
        }
    }
});

</script>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
<link rel="stylesheet" href="<?php echo e(route('BaseUrl')); ?>/Pannel/assets/vendors/dataTable/responsive.bootstrap.min.css"
    type="text/css">
    
    <!-- begin::datepicker -->
    <link rel="stylesheet" href="<?php echo e(route('BaseUrl')); ?>/Pannel/assets/vendors/datepicker-jalali/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="<?php echo e(route('BaseUrl')); ?>/Pannel/assets/vendors/datepicker/daterangepicker.css">
    <!-- end::datepicker -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('Layouts.Students.Template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\automation\resources\views/Students/Pannel/Dashboard.blade.php ENDPATH**/ ?>