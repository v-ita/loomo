<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        # dev env
		if (App::environment('local')) {
			$this->call([
				UserSeeder::class,
			]);
		}
    }
}
