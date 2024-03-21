<?php
namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
    * Run the database seeds.
    *
    * @return void
    */
    public function run()
    {
        $users = User::create([
            'name' => 'G211210051',
            'email' => 'G211210051@gmail.com',
            'password' => Hash::make('Yeriko')
        ]);
    }
}