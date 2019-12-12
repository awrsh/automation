<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <link rel="stylesheet" href="{{route('BaseUrl')}}/Pannel/assets/vendors/bundle.css" type="text/css"> 
 <link rel="stylesheet" href="{{route('BaseUrl')}}/Pannel/assets/css/app.css" type="text/css">
 <title>Document</title>
 <style>
   .flex__column{
       display: flex;
   flex-direction: column;
   align-items: center;

  
  
   padding: 10px;
   cursor: default!important;
   }

 

   .flex__column > span{
       margin-top: 7px;
   }
   </style>
</head>
<body dir="rtl" style="background:#fff;padding-top:10px;">
  
    
    
            <div class="card print">
              
                <div class="card-body">
                  <div class="card-header">
                    <div class="" style="display:flex;justify-content: space-between;margin-top:30px;
                     height:130px;border:1px solid;    padding:10px 12px 0 12px;">
                      <div style="display: flex;
                      flex-direction: column;
                      justify-content: flex-end;">
                        <img class="logo" src="" alt="">
                        <p> نام پایه: {{$basic}}</p>
                      </div>
                      <p>{{session()->get('ManagerSis')['name']}}
                      </p>
                      <div style="display: flex;
                      flex-direction: column;
                      justify-content: flex-end;">
                       <p>سال تحصیلی:  </p>
                      </div>

                     </div>
                  </div>
                  <div class=" card-body">
              @foreach ($classLists as $classList)
              <div class="row my-5">
                @php
                    $classListCount=count($classList);
                @endphp
                    <div style="width:{{$classListCount * 33.333}}%">
                        <table class="table-bordered" cellspacing="0" cellpadding="0" rules="all" border="1" id="rpPage_gridTable_0" style="border-color:Black;width:100%;border-collapse:collapse;">
                            <tbody>
                                <tr class="WBGrid_HeaderStyle">
                                <th scope="col">ردیف</th>
                                <th scope="col" style="white-space:nowrap;">درس</th>
                                <th scope="col" style="font-weight:bold;">میانگین پایه</th>
                            @foreach ($classList as $item)
                            <th scope="col">
                                    <table cellspacing="0" align="center" border="0" width="100%" height="100%">
                                        <tbody>
                                            <tr>
                                            <td colspan="4" style="border-top:0px;border-left:0;border-right:0;border-bottom:0;text-align:center;vertical-align:middle"><strong>{{$item->class_name}}</strong></td>
                                            </tr>
                                            <tr>
                                                <td width="33%" style="border-bottom:0;border-left:0;border-right:0;height:1%; text-align:center;vertical-align:middle"><strong>دبیر</strong></td>
                                                <td width="33%" style="border-bottom:0;border-left:0;text-align:center;vertical-align:middle"><strong>رتبه</strong></td>
                                                <td style="border-bottom:0;border-left:0;text-align:center;vertical-align:middle"><strong>میانگین</strong></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </th>
                           
                            @endforeach
           </tr>
                           @foreach ($lessons as $lesson)
                           <tr class="WBGrid_RowStyle">
                                <td style="width:50px;">1</td>
                           <td style="width:15%;white-space:nowrap;">{{$lesson->lesson_name}}</td>
                                <td style="width:5%;">17.35</td>
                                @foreach ($classList as $class)
                               <td>
                                    <table border="0" cellpadding="0" cellspacing="0" width="100%" height="100%">
                                        <tbody>
                                            <tr height="100%">
                                                <td width="33%" height="100%" style="border-top:0px;border-bottom:0;border-left:0;border-right:0;text-align:center;vertical-align:middle">
                                                    
                                                   @php
                                                   if(\App\Models\TeacherLessons::where('class_id',$class->class_id)->where('lesson_id',$lesson->id)->first() !== null){
                                                    $teacher_id= \App\Models\TeacherLessons::where('class_id',$class->class_id)->where('lesson_id',$lesson->id)->first()->teacher_id;

                                                   }else{
                                                       $teacher_id = null;
                                                   }
                                                   @endphp
                                                    {{\App\Models\Teacher::where('id',$teacher_id)->first() !== null ? \App\Models\Teacher::where('id',$teacher_id)->first()->teacher_fullname : '-' }}
                                                
                                                </td>
                                                <td width="33%" height="100%" style="border-top:0px;border-bottom:0;border-left:0;text-align:center;vertical-align:middle">3</td>
                                                <td height="100%" style="border-top:0px;border-bottom:0;border-left:0;text-align:center;vertical-align:middle">17.38</td>
                                            </tr>
                                        </tbody>
                                   </table>
                               </td>
                               @endforeach
                     
                            </tr>
                           @endforeach
                          
                              
                        </tbody>
                    </table>
                    </div>
                  </div>
              @endforeach
                </div>
            </div>
    

<script >
// window.addEventListener('load',function(){

//   window.print()
// })

</script>
</body>
</html>



