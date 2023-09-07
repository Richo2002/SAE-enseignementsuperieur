<?php

namespace App\Models;

use Kalnoy\Nestedset\NodeTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{
    use HasFactory, NodeTrait;

    protected $guarded = [];

    /**
     * Get the direction that owns the service.
     */
    public function direction()
    {
        return $this->belongsTo(Direction::class);
    }

    /**
     * Get the archives of the service.
     */

    public function archives()
    {
        return $this->hasMany(Archive::class);
    }
}
