<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
use HasFactory;

    protected $fillable = [
        'name',
        'reason',
        'join_date',
        'scale',
        'image',
        'job_id'
    ];

    public function jobdesk(){
        return $this->belongsTo(Jobdesk::class, 'job_id');
    }
}
