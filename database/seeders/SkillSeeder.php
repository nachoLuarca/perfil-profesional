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
            ['name' => 'HTML', 'level' => '90'],
            ['name' => 'CSS', 'level' => '80'],
            ['name' => 'JavaScript', 'level' => '90'],
            ['name' => 'Laravel', 'level' => '90'],
            ['name' => 'MySQL', 'level' => '100'],
            ['name' => 'React', 'level' => '50'],
        ];

        foreach ($skills as $skill) {
            Skill::create($skill);
        }
    }
}
