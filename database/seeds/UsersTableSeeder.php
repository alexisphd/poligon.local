<?php

use Illuminate\Database\Seeder;
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
        $data=[
         [   'name'=>'Автор не известен',
            'email' =>'autor_unknown@g.g',
            'password'=> bcrypt(str_random(16)),
        ],
        [
            'name'=> 'Автор',
            'email'=> 'autor1@g.g',
            'password'=>bcrypt('123123'),
        ],
    ];
    \DB::table('users')->insert($data);
    }
}
