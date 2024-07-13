<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Job\Job;
class Files extends Model
{
    use HasFactory;
    protected $table='files';
    protected $fillable=[
        'id',
        'path',
        
        'apply',
        
       
       
    ];
    public $timestamps=true;
    
    public function user()
{
    return $this->belongsTo(User::class, 'user_id', 'id');
}

}
