<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecture extends Model
{
    use HasFactory;

    // Define the fillable fields if needed
    protected $fillable = ['title', 'description', 'date'];
}
