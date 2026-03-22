<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use SoftDeletes, HasFactory;
    protected $fillable = ['name'];

    public function people()
    {
        return $this->morphedByMany(Person::class, 'taggable');
    }

    public function businesses()
    {
        return $this->morphedByMany(Person::class, 'taggable');
    }
}
