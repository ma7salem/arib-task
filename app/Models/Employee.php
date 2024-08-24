<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Employee extends Authenticatable
{
    use HasFactory;
    protected $fillable = [
        'first_name',
        'last_name',
        'phone',
        'email',
        'image',
        'salary',
        'department_id',
        'password',
    ];

    protected $hidden = [
        'password'
    ];

    protected $casts = [
        'password' => 'hashed',
    ];

    private $searchable = ['name', 'email', 'phone'];

    public function department()
    {
        return $this->belongsTo(Department::class);    
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);    
    }
    
    public function getFullNameAttribute()
    {
        return $this->first_name .  ' ' . $this->last_name; 
    }

    public function getImagePathAttribute()
    {
        $image = $this->image;
        return !$image || !file_exists(public_path($image)) ? url('default.png') : url($image);
    }

    public function scopeSearch($query, $data)
    {
        if (!empty($data)) {
            foreach ($data as $key => $value) {
                if(in_array($key, $this->searchable) && $value != ''){
                    $key == 'name' ? $query->where(function($q) use($value){
                        return $q->where('first_name', 'like', '%' . $value . '%')->orWhere('last_name', 'like', '%' . $value . '%');
                    }) : $query->where($key, 'like', '%' . $value . '%');
                }
            }
            return $query;
        }
        return $query;
    }
}
