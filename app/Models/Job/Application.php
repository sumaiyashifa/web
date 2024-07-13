<?php

namespace App\Models\Job;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;
    protected $table='applications';
    protected $fillable=[
        'id',
        'cv',
        'job_id',
        'user_id',
        'email',
        'job_image',
        'job_tittle',
        'job_region',
        'company',
        'job_type',
        'hours',
        'money', 
        'status',
        'apply',
        
       
       
    ];
    public $timestamps=true;
}
