<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Crypt;

class MailCredentialsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mail_credentials')->insert([
            'username' => 'rana412ahmed@gmail.com',
            'password' => Crypt::encrypt('123456789'),
        ]);
    }
}
