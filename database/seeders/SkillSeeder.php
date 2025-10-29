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
            ['name' => 'HTML', 'level' => 'Avanzado'],
            ['name' => 'CSS', 'level' => 'Avanzado'],
            ['name' => 'JavaScript', 'level' => 'Intermedio'],
            ['name' => 'Laravel', 'level' => 'Avanzado'],
            ['name' => 'MySQL', 'level' => 'Intermedio'],
            ['name' => 'React', 'level' => 'Básico'],
        ];

        foreach ($skills as $skill) {
            Skill::create($skill);
        }
    }
}
