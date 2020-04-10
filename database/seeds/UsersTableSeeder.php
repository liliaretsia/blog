<?php

use App\Entity\User;
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
        $this->createAdminUser();
    }

    protected function createAdminUser()
    {
        factory(User::class)->create([
            'name' => 'admin',
            'email' => env('ADMIN_EMAIL', 'admin@mail.com'),
            'password' => bcrypt(env('ADMIN_PASSWORD', 'admin'))
        ]);
    }
}
