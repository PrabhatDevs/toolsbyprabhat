<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Download extends Model
{
    protected $fillable = [
        'user_id',              // Link to the user
        'file_path',   // Total credits allowed
        'file_name',      // Credits currently spent
       'file_size'
    ];
}
