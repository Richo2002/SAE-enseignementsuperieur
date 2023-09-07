<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Direction extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Get the services of the direction.
     */

    public function services()
    {
        return $this->hasMany(Service::class);
    }

    /**
     * Get the archivist who manages the archive of this service.
     */

     public function archivist()
     {
         return $this->belongsTo(User::class);
     }
}
