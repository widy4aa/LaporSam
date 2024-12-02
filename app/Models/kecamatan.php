<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class kecamatan extends Model
{
    //
    protected $guarded = [];
    public function users()
    {
        return $this->hasMany(User::class);
    }

}
