<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jobdesk extends Model
{
    protected $fillable = [
        'job_category'
    ];

    public function employees(){
        return $this->hasMany(Employee::class);
    }
}
