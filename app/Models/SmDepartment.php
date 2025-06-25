<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SmDepartment extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'is_active',
        'operator_id',
    ];

    /*================ Start Eloquent Relationship ==================*/
    public function operator()
    {
        return $this->belongsTo(User::class, 'operator_id');
    }
    /*================ End Eloquent Relationship ==================*/


    /*================ Start Scope Variables ==================*/
    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }
    /*================ End Scope Variables ==================*/
}
