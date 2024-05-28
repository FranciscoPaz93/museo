<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User();
        $user->name = 'Romero Mazariegos';
        $user->email = 'romero.mazariegos@unah.edu.hn';
        $user->password = bcrypt('password');
        $user->save();
        $user->assignRole('Usuario');
        $user->save();


        $user = new User();
        $user->name = 'Pamela Figueroa';
        $user->email = 'pamela.figueroa@unah.edu.hn';
        $user->password = bcrypt('password');
        $user->save();
        $user->assignRole('Usuario');
        $user->save();

        $user = new User();
        $user->name = 'Christian Wildt';
        $user->email = 'christian.wildt@unah.edu.hn';
        $user->password = bcrypt('password');
        $user->save();
        $user->assignRole('Usuario');
        $user->save();

        $user = new User();
        $user->name = 'Practicante 1';
        $user->email = 'practicante1@icf-unah.com';
        $user->password = bcrypt('password');
        $user->save();
        $user->assignRole('Usuario');
        $user->save();

        $user = new User();
        $user->name = 'Practicante 2';
        $user->email = 'practicante2@icf-unah.com';
        $user->password = bcrypt('password');
        $user->save();
        $user->assignRole('Usuario');
        $user->save();

        $user = new User();
        $user->name = 'Isis Umaña';
        $user->email = 'isismaribel1991@gmail.com';
        $user->password = bcrypt('password');
        $user->save();
        $user->assignRole('Usuario');
        $user->save();

        $user = new User();
        $user->name = 'Santos Jiménez';
        $user->email = 'samueljimenez9175@gmail.com';
        $user->password = bcrypt('password');
        $user->save();
        $user->assignRole('Usuario');
        $user->save();

        $user = new User();
        $user->name = 'Kevin Amaya';
        $user->email = 'kevinamayafu0493@gmail.com';
        $user->password = bcrypt('password');
        $user->save();
        $user->assignRole('Usuario');
        $user->save();

        $user = new User();
        $user->name = 'Practicante ICF';
        $user->email = 'laboratoriosaludsanidadforetal@gmail.com';
        $user->password = bcrypt('password');
        $user->save();
        $user->assignRole('Usuario');
        $user->save();

        $user = new User();
        $user->name = 'Karla Cantarero';
        $user->email = 'karla.cantarero@unah.edu.hn';
        $user->password = bcrypt('password');
        $user->save();
        $user->assignRole('Administrador');
        $user->save();


        $user = new User();
        $user->name = 'Yensi Yanes';
        $user->email = 'yanezyensi91@gmail.com';
        $user->password = bcrypt('password');
        $user->save();
        $user->assignRole('Administrador');
        $user->save();
    }
}
