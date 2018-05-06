<?php

use App\Breed;
use App\Cert;
use App\Gender;
use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::firstOrCreate([
            'name' => 'admin',
            'email' => 'admin@mail.com',
            'password' => bcrypt('111111'),
            'remember_token' => str_random(10),
            'is_admin' => true,
        ]);

        Gender::firstOrCreate(['name' => 'Чоловіча']);
        Gender::firstOrCreate(['name' => 'Жіноча']);

        Cert::firstOrCreate(['name' => 'Породистий']);
        Cert::firstOrCreate(['name' => 'Непородистий']);

        Breed::firstOrCreate(['name' => 'Лайка']);
        Breed::firstOrCreate(['name' => 'Доберман']);
        Breed::firstOrCreate(['name' => 'Бульдог']);
        Breed::firstOrCreate(['name' => 'Німецька вівчарка']);
        Breed::firstOrCreate(['name' => 'Далматин']);
        Breed::firstOrCreate(['name' => 'Шпіц']);
        Breed::firstOrCreate(['name' => 'Чихуахуа']);
        Breed::firstOrCreate(['name' => 'Алабай']);
        Breed::firstOrCreate(['name' => 'Пудель']);
        Breed::firstOrCreate(['name' => 'Такса']);
    }
}
