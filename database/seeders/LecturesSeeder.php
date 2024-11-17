<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Lecture;

class LecturesSeeder extends Seeder
{
    public function run()
    {
        Lecture::create([
            'title' => 'Introduction to Laravel',
            'subject' => 'Web Development',
            'file_path' => 'lectures/intro-to-laravel.pdf',
            'file_type' => 'pdf',
        ]);
        
        Lecture::create([
            'title' => 'Advanced PHP Concepts',
            'subject' => 'Programming',
            'file_path' => 'lectures/advanced-php.mp4',
            'file_type' => 'mp4',
        ]);
    }
}
