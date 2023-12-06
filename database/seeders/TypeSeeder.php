<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Type;
use Illuminate\Support\Str;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = ['FrontEnd', 'BackEnd', 'FullStack'];
        foreach ($data as $tipology) {
            $new_tipology = new Type();
            $new_tipology->name = $tipology;
            $new_tipology->slug = Str::slug($tipology, "-");
            $new_tipology->save();
        }
    }
}
