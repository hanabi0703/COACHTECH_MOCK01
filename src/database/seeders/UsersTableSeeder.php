<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->delete();
        $param = [
            'name' => 'テスト人間',
            'email' => 'test@test.com',
            'password' => 'password'
        ];
        DB::table('users')->insert($param);
    }
}
