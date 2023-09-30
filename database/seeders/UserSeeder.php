<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    
    
    public function run()
    {
        DB::table('users')->insert([
            [
            'name' => 'Icaro Erom ',
            'email' => 'icaro.ponteciano@etec.sp.gov.br',
            'password' => Hash::make('123456789'),

            ], [
                'name' => 'Guilherme Serafim',
                'email' => 'gserafim@gmail.com',
                'password' => Hash::make('123456789'),

            ], [
                'name' => 'Guilherme Teixeira',
                'email' => 'gui.teixeira@gmail.com',
                'password' => Hash::make('123456789'),
                
            ], [
                'name' => 'Gabriel Minzon',
                'email' => 'gabrielminzon@gmail.com',
                'password' => Hash::make('123456789'),
            ]
        ]);
    }
}

