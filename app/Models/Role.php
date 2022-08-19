<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'status'
    ];

    public function setTitleAttribute($value){
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = \Str::slug($value);
    }

    

    public function users() {

        return $this->belongsToMany(User::class, 'roles_users');
     }
}
