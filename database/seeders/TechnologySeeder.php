<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Technology;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $data = ['HTML', 'CSS', 'JavaScript', 'PHP', 'C++'];
        foreach ($data as $category) {
            $new_category = new Technology();
            $new_category->name = $category;
            $new_category->slug = Str::slug($category, "-");
            $new_category->level = $faker->numberBetween(1, 5);
            $new_category->description = $faker->paragraph();
            $new_category->save();
        }
    }
}
