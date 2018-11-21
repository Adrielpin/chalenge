<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'The chalenge';
        $user->email = 'admin@admin.com';
        $user->password = Hash::make('1234');
        $user->save();
    }
}
