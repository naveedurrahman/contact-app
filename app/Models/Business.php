<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Business extends Model
{
    /** @use HasFactory<\Database\Factories\BusinessFactory> */
    use HasFactory, SoftDeletes;
    protected $fillable = ['business_name', 'contact_email'];

    public function people()
    {
        $this->hasMany(Person::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function tasks(){
        return $this->morphMany(Task::class, 'taskable');
    }

    public function tags(){
        return $this->morphToMany(Tag::class, 'taggable');
    }
}
