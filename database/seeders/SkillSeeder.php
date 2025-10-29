<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Skill;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $skills = [
            ['name' => 'HTML', 'level' => '80'],
            ['name' => 'CSS', 'level' => '80'],
            ['name' => 'JavaScript', 'level' => '90'],
            ['name' => 'PHP', 'level' => '90'],
            ['name' => 'Laravel', 'level' => '80'],
            ['name' => 'MySQL', 'level' => '100'],
           
        ];

        foreach ($skills as $skill) {
            Skill::create($skill);
        }
    }
}
