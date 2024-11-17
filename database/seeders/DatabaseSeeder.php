<?php

use Illuminate\Database\Seeder;
use App\Models\Lecture;

class LecturesSeeder extends Seeder
{
    public function run()
   
    {
        
        // Insert some sample lectures
        Lecture::create([
            'title' => 'Introduction to Laravel1',
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

