<?php

namespace App\Models\Catagory;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catagory extends Model
{
    use HasFactory;
    protected $table='catagories';
    protected $fillable=[
        'id',
        'name',
        'created_at',
        'updated_at',
    ];
    public $timestamps=true;
}
