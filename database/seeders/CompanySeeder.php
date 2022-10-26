<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $companies = [];

        foreach(range(1,10) as $index){
            $company = [
                'name' => $name = "Company $index",
                'address' => $name = "Address $index",
                'website' => $name = "Website $index",
                'email' => $name = "Email $index",
                'created_at' => now(),
                'updated_at' => now(),
            ];
            $companies[] = $company;
        }

        DB::table('companies')->insert($companies);
    }
}
