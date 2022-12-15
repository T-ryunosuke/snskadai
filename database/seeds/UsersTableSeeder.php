<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //追加3
        DB::table('users')->insert([
            ['username' => 'ファースト', 'mail' => Str::random(10).'@gmail.com', 'password' => Hash::make('password')],
            ['username' => 'セカンド', 'mail' => Str::random(10).'@gmail.com', 'password' => Hash::make('password')],
            ['username' => 'サード', 'mail' => Str::random(10).'@gmail.com', 'password' => Hash::make('password')],
            ['username' => 'フォース', 'mail' => Str::random(10).'@gmail.com', 'password' => Hash::make('password')],
        ]);
    }
}
