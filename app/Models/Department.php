<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Department extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function archives()
    {
        return $this->hasMany(Archive::class);
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
