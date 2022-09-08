<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run()
    {
        $user = new User();
        $user->setNickname('admin');
        $user->setGenderId(1);
        $user->setAge(50);
        $user->setLastName('admin');
        $user->setFirstName('admin');
        $user->setMiddleName('admin');
        $user->setDescription('admin');
        $user->setEmail('admin@gmail.com');
        $user->setPassword(Hash::make('admin'));
        $user->setHide(false);
        $user->setPhone('88008003535');
        $user->save();
        $user->roles()->sync(1);
    }
}