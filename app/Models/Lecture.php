<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecture extends Model
{
    use HasFactory;

    // Ensure this matches your database structure
    protected $fillable = ['title', 'subject', 'upload_date', 'file_type', 'file_path'];
}
