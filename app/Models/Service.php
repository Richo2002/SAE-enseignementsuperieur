<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

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

    /**
     * Get the archivist who manages the archive of this service.
     */

     public function archivist()
     {
         return $this->belongsTo(User::class);
     }


}
