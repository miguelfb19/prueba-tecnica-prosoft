<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class task extends Model
{
    public $incrementing = false; // Disable auto-incrementing
    protected $keyType = 'string'; // Use string as primary key

    
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($task) {
            $task->id = (string) Str::uuid(); // Generate UUID before saving
            $task->date = Carbon::now();
        });
    }
    
    protected $fillable = [
        'name', 'description', 'status'
    ];

}
