<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable=['name','age','email'] ;

    function depart(){
        return $this->belongsToMany(Department::class);
    }
}
