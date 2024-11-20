<?php

namespace Database\Seeders;

// database/seeders/LectureSeeder.php
use App\Models\Lecture;
use Illuminate\Database\Seeder;

class LectureSeeder extends Seeder
{
    public function run()
    {
        // Inserting a sample lecture with 'file_path'
        Lecture::create([
            'title' => 'Introduction to Laravel',
            'subject' => 'PHP Development',
            'upload_date' => now(),
            'file_type' => 'PDF',
            'file_path' => 'path/to/your/file.pdf', // Add the correct file path
        ]);
        Lecture::factory()->count(10)->create();
        // Add more sample lectures with proper 'file_path'
    }
}
