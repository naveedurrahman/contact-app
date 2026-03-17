<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Person extends Model
{
    /** @use HasFactory<\Database\Factories\PersonFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = ['firstname', 'lastname', 'email', 'phone', 'business_id'];

    //we also define the eager loding with function here in model and we called him eager loding by default
    // protected $with = ['business'];

    public function business()
    {
        return $this->belongsTo(Business::class);
    }

    public function tasks()
    {
        return $this->morphMany(Task::class, 'taskable');
    }

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }
}
