<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run()
    {

        $systemUser = new User();
        $systemUser->setNickname('system');
        $systemUser->setGenderId(1);
        $systemUser->setAge(50);
        $systemUser->setLastName('system');
        $systemUser->setFirstName('system');
        $systemUser->setMiddleName('system');
        $systemUser->setDescription('system');
        $systemUser->setEmail('system@gmail.com');
        $systemUser->setPassword(Hash::make('system'));
        $systemUser->setHide(false);
        $systemUser->setPhone('88008003535');
        $systemUser->save();
        $systemUser->roles()->sync(1);

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