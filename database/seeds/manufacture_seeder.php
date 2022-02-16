<?php

use Illuminate\Database\Seeder;

class manufacture_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $name = ['Toyota', 'Honda', 'Daihatsu', 'Suzuki', 'Mitsubishi', 'KIA', 'Nissan', 'Datsun', 'Madza', 'Isuzu', 'BMW', 'Mercedes-Benz'];
        arsort($name);

        for($i=0;$i<count($name);$i++){
            App\Manufacture::create([
                'name'=> $name[$i],
                'slug'=> str_slug($name[$i]),
            ]);
        }
    }
}
