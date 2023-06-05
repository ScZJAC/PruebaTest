<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProvinciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert("insert into provincias (id_provincia, descripcion_provincia, created_at, updated_at) VALUES
            (2, ' Córdoba', NULL, NULL),
            (1, ' Ciudad de Buenos Aires', NULL, NULL),
            (3, ' Santa Fe', NULL, NULL),
            (4, ' Buenos Aires', NULL, NULL),
            (5, ' Tucumán', NULL, NULL),
            (6, ' Salta', NULL, NULL),
            (7, ' Santa Fe', NULL, NULL),
            (8, ' Corrientes', NULL, NULL),
            (9, ' Buenos Aires', NULL, NULL),
            (10, ' Chaco', NULL, NULL),
            (11, ' Misiones', NULL, NULL),
            (12, ' Buenos Aires', NULL, NULL),
            (13, ' Buenos Aires', NULL, NULL),
            (14, ' Jujuy', NULL, NULL),
            (15, ' Mendoza', NULL, NULL),
            (16, ' Santiago del Estero', NULL, NULL),
            (17, ' Buenos Aires', NULL, NULL),
            (18, ' Buenos Aires', NULL, NULL),
            (19, ' Entre Ríos', NULL, NULL),
            (20, ' Buenos Aires', NULL, NULL),
            (21, ' Buenos Aires', NULL, NULL),
            (22, ' Neuquén', NULL, NULL),
            (23, ' Formosa', NULL, NULL),
            (24, ' Buenos Aires', NULL, NULL),
            (25, ' Buenos Aires', NULL, NULL),
            (26, ' Mendoza', NULL, NULL),
            (27, ' Buenos Aires', NULL, NULL),
            (28, ' Mendoza', NULL, NULL),
            (29, ' Buenos Aires', NULL, NULL),
            (30, ' La Rioja', NULL, NULL),
            (31, ' Chubut', NULL, NULL),
            (32, ' Buenos Aires', NULL, NULL),
            (33, ' San Luis', NULL, NULL),
            (34, ' Buenos Aires', NULL, NULL),
            (35, ' Catamarca', NULL, NULL),
            (36, ' Córdoba', NULL, NULL),
            (37, ' Buenos Aires', NULL, NULL)");
    }
}
