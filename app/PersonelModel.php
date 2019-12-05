<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersonelModel extends Model
{
    protected $table ="personel";
    protected $primaryKey="personel_id";
    protected $guarded = [];
    protected $casts = ['personel_permissions' => 'array'];

}
