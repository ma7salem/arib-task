<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Str;

class Task extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'details',
        'status',
        'employee_id',
        'user_id'
    ];

    protected static function booted()
    {
        static::creating(function ($task) {
            $task->user_id = auth()->id();
        });
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getDetailsLimitAttribute()
    {
        return Str::limit($this->details, 60); 
    }
}
