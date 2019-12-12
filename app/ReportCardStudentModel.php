<?php

namespace App;

use App\Models\ReportCardModel;
use Illuminate\Database\Eloquent\Model;

class ReportCardStudentModel extends Model
{

    protected $table ='report_card_student';
    protected $guarded =[];

   public function getReportCard()
   {
       return $this->belongsTo(ReportCardModel::class,'report_card_id','id');
   }

}
