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
      $data = file_get_contents("https://randomuser.me/api/?results=100&inc=name,email,login&seed=seng401");
        $data = json_decode($data, true);

      for($x = 0; $x < 100; $x++){
    //   $data = json_decode($data);

        DB::table('users')->insert([
          //'name' => $data['name']['first']." ".$data['name']['last'],
          //'name' => $data['results']['name']['first']." ".$data['results']['name']['last'],
          'name' => $data['results'][$x]['name']['first']." ".$data['results'][$x]['name']['last'],
          'email' => $data['results'][$x]['email'],
          'password' => $data['results'][$x]['login']['password'],
        ]);




      }

        //https://randomuser.me/api/?inc=name,email,login
    }
}
