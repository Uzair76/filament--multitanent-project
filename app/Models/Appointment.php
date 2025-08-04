<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    //

    public function clinic()
    {
        return $this->belongsTo(Clinic::class);
    }
}
