<?php

use App\Data;
use App\Company;
use Illuminate\Database\Seeder;

class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Data::create([
            'company_id'    => Company::first()->id,
            'address'       => 'Carlos Casares 3364 (CPA B1765MYS), Isidro Casanova, Provincia de Buenos Aires',
            'email'         => 'info@meresortes.com.ar',
            'phone1'        => '+54114669-3093|+54 (11) 4669-3093',
            'phone2'        => '+541144853348|4485-3348',
            'phone3'        => '+541144853348|4485-3348',
            'logo_header'   => 'images/data/logo_header.svg',
            'logo_footer'   => 'images/data/logo_footer.svg'
    
        ]);
         
    }
}
