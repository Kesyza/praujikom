<?php

use Illuminate\Database\Seeder;

class setting_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $name=['Nama Toko','Alamat','Nomor Telepon','Email'];
        $type=['text','text','text','text'];
        $description=[
            'Sistem Informasi Rental Mobil K.15.A',
            $faker->address,
            $faker->phoneNumber,
            $faker->email
        ];
        for($i=0;$i<count($name);$i++){

            App\Setting::create([
                'id'=>$faker->uuid,
                'name'=> $name[$i],
                'slug'=> str_slug($name[$i]),
                'type'=> $type[$i],
                'description'=> $description[$i]
            ]);
        }
    }
}
