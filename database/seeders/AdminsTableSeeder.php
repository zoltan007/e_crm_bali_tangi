<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRecords = [
            ['id'=>2,'name'=>'Govinda','type'=>'superadmin','mobile'=>'97000000000','email'=>'govinda@admin.com','password'=>'$2a$12$62JgOYCoZ.bxqhbN.SC5/uiyJvyX8XmT7H8.FwvrwGw7nCoDF7vbS','image'=>'','status'=>0],
        ];
        Admin::insert($adminRecords);
    }
}
