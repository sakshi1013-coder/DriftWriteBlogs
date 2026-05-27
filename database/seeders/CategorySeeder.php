<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['name' => 'Admit Card',   'slug' => 'admit-card',   'color' => '#6366f1'],
            ['name' => 'Result',       'slug' => 'result',       'color' => '#10b981'],
            ['name' => 'Syllabus',     'slug' => 'syllabus',     'color' => '#f59e0b'],
            ['name' => 'Answer Key',   'slug' => 'answer-key',   'color' => '#ef4444'],
            ['name' => 'Recruitment',  'slug' => 'recruitment',  'color' => '#8b5cf6'],
            ['name' => 'Exam Date',    'slug' => 'exam-date',    'color' => '#06b6d4'],
        ];

        foreach ($categories as $cat) {
            Category::updateOrCreate(['slug' => $cat['slug']], $cat);
        }
    }
}
