<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\User;
class DatabaseSeeder extends Seeder {public function run():void {
 $email=env('ADMIN_EMAIL'); $password=env('ADMIN_PASSWORD');
 if($email && $password && strlen($password)>=12) User::updateOrCreate(['email'=>$email],['name'=>'Site Administrator','password'=>$password]);
}}
