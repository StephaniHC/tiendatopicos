<?php

namespace Database\Seeders;

use App\Models\Fecha;
use Illuminate\Database\Seeder;

class fechasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Fecha::create([
            'fechaHora'=> '11/07/2022 01:46',
            'id_ubicacion'=> '1',
        ]);
        Fecha::create([
            'fechaHora'=> '12/07/2022 01:46',
            'id_ubicacion'=> '1',
        ]);
        Fecha::create([
            'fechaHora'=> '11/07/2022 01:46',
            'id_ubicacion'=> '2',
        ]);
        Fecha::create([
            'fechaHora'=> '11/07/2022 01:46',
            'id_ubicacion'=> '2',
        ]);
        Fecha::create([
            'fechaHora'=> '12/07/2022 01:46',
            'id_ubicacion'=> '3',
        ]);
        Fecha::create([
            'fechaHora'=> '11/07/2022 01:46',
            'id_ubicacion'=> '3',
        ]);
        Fecha::create([
            'fechaHora'=> '11/07/2022 01:46',
            'id_ubicacion'=> '4',
        ]);
        Fecha::create([
            'fechaHora'=> '12/07/2022 01:46',
            'id_ubicacion'=> '4',
        ]);
        Fecha::create([
            'fechaHora'=> '11/07/2022 01:46',
            'id_ubicacion'=> '5',
        ]);
        Fecha::create([
            'fechaHora'=> '11/07/2022 01:46',
            'id_ubicacion'=> '5',
        ]);
        Fecha::create([
            'fechaHora'=> '12/07/2022 01:46',
            'id_ubicacion'=> '6',
        ]);
        Fecha::create([
            'fechaHora'=> '11/07/2022 01:46',
            'id_ubicacion'=> '6',
        ]);
        Fecha::create([
            'fechaHora'=> '11/07/2022 01:46',
            'id_ubicacion'=> '7',
        ]);
        Fecha::create([
            'fechaHora'=> '12/07/2022 01:46',
            'id_ubicacion'=> '7',
        ]);
        Fecha::create([
            'fechaHora'=> '11/07/2022 01:46',
            'id_ubicacion'=> '7',
        ]);
    }
}
