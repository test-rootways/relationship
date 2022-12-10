<?php

namespace Database\Seeders;

use App\Models\Hobby;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HobbySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Hobby::truncate();
        $hobbies = [
            ['name'=>'Singing'/* ,'id'=>'1' */],
            ['name'=>'Playing Cricket'/* ,'id'=>'2' */],
            ['name'=>'Playing Videogames'/* ,'id'=>'3' */],
            ['name'=>'Youtube'/* ,'id'=>'4' */],
            ['name'=>'Reading Books'/* ,'id'=>'5' */],
            ['name'=>'Watching TV'/* ,'id'=>'6' */],
            ['name'=>'Learning'/* ,'id'=>'7' */],
            ['name'=>'Cooking'/* ,'id'=>'8' */],
            ['name'=>'Photography'/* ,'id'=>'9' */],
        ];
        foreach ($hobbies as $key => $value) {
            Hobby::create($value);
        }
    }
}
