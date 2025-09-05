<?php

namespace App\Models\task;

use Illuminate\Database\Eloquent\Model;

class task extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'due_date',
        'category',
        'status',
        'priority'
    ];

    protected $casts = [
        'due_date' => 'datetime', // Use 'datetime' to cast to a Carbon object
    ];

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($task) {
            $lastTask = task::orderBy('id', 'desc')->first();
            $lastOrder = $lastTask ? $lastTask->order : 0;
            $task->order = $lastOrder + 1;
        });
    }

    
}
