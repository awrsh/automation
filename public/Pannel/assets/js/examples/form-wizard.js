'use strict';
$(document).ready(function () {


    var form = $("#form1");
    form.validate({
        errorPlacement: function errorPlacement(error, element) {element.before(error);  },


        rules: {
            certificate_number:{

                required: true,
                rangelength: [10,15]
            },
            father_mobile:{

                required:true,
                digits: true,
                minlength:11
            },
            firstname:{
                required: true,
                minlength: 3
            },lastname:{

                required:true,
                minlength: 3
            },
            father_name:{
                required: true,
                minlength: 3
            },
            mother_name:{
                required: true,
                minlength: 3
            },
            birthday:{
                required: true,

            },
            student_section:{
                required: true,

            },

            student_basic:{
                required: true,

            },
            student_class:{
                required: true,

            },
            student_number:{
                required: true,

            },
            home_tel:{
                required:true
            }



        }
        ,messages:{

            certificate_number: {required:"وارد کردن شماره الزامیست", rangelength:" شماره بین 10 تا 15 رقم میباشد"},
            father_mobile: {required:"وارد کردن شماره الزامیست", digits:" شماره شامل اعداد میباشد ",minlength:"بایستی 11 رقم باشد"},
            firstname :{required:"وارد کردن نام الزامیست", minlength:" شماره حداقل 3 حرف میباشد"},
            lastname:{required:"وارد کردن نام خانوادگی الزامیست", minlength:" شماره حداقل 3 حرف میباشد"},
            father_name:{required:"وارد کردن نام خانوادگی الزامیست", minlength:" شماره حداقل 3 حرف میباشد"},
            mother_name:{required:"وارد کردن نام خانوادگی الزامیست", minlength:" شماره حداقل 3 حرف میباشد"},
            birthday:{required:"وارد کردن  تاریخ تولد الزامیست"},
            student_section:{required:"وارد کردن مقطع الزامیست"},
            student_basic:{required:"وارد کردن پایه الزامیست"},
            student_class:{required:"وارد کردن کلاس الزامیست"},
            student_number:{required:" شماره دانش اموزی الزامیست"},
            home_tel:{required:"شماره منزل الزامیست"},

        }
    });

    form.children("div").steps({
        headerTag: "h3",
        bodyTag: "section",
        transitionEffect: "slideLeft",
        labels: {
            cancel: 'انصراف',
            current: 'قدم کنونی:',
            pagination: 'صفحه بندی',
            finish: 'ثبت اطلاعات',
            next: 'ادامه',
            previous: 'بازگشت',
            loading: 'در حال بارگذاری ...'
        },
        onStepChanging: function (event, currentIndex, newIndex)
        {

            form.validate().settings.ignore = ":disabled,:hidden";
            return form.valid();
        },
        onFinishing: function (event, currentIndex)
        {
            form.validate().settings.ignore = ":disabled";
            return form.valid();
        },
        onFinished: function (event, currentIndex)
        {
            form.submit()
        }
    });



});
