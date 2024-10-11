<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    use HasFactory;

    protected $table = 'tasks'; // Ensure the table name matches your database

    // Columns that can be mass-assigned
    protected $fillable = [
        'title', 'description', 'due_date', 'isCompleted',
    ];

    // If 'due_date' is a date, ensure it's cast as a date object
    protected $dates = ['due_date'];
}
