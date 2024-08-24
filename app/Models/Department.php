<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'user_id'];

    protected static function booted()
    {
        static::creating(function ($department) {
            $department->user_id = auth()->id();
        });
    }

    public function scopeSearch($query, $name)
    {
        if (!empty($name)) {
            return $query->where('name', 'like', '%' . $name . '%');
        }
        return $query;
    }

    public function canBeDeleted()
    {
        return $this->employees->count();    
    }

    public function user()
    {
        return $this->belongsTo(User::class);    
    }

    public function employees()
    {
        return $this->hasMany(Employee::class);    
    }
}
