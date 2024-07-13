<?php

namespace App\Models\Job;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    protected $table='job';
    protected $fillable=[
        'id',
        'job_tittle',
        'job_region',
        'company',
        'job_type',
       
        'experience',
        'salary',
        'gender',

        'jobdescription',
        'client',
        'responsibilities',

        'otherbenifits',
        'catagory',
        'Due_Date', 
        'image',
        'created_at',
        'updated_at',
    ];
    public $timestamps=true;
    
}
