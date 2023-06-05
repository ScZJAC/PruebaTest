<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CiudadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert("insert into ciudades (id_ciudad, descripcion_ciudad, id_provincia, created_at, updated_at) VALUES
        (1, 'Buenos Aires', 1, NULL, NULL),
        (2, 'Córdoba', 2, NULL, NULL),
        (3, 'Rosario', 3, NULL, NULL),
        (4, 'Mar del Plata', 4, NULL, NULL),
        (5, 'San Miguel de Tucumán', 5, NULL, NULL),
        (6, 'Salta', 6, NULL, NULL),
        (7, 'Santa Fe', 7, NULL, NULL),
        (8, 'Corrientes', 8, NULL, NULL),
        (9, 'Bahía Blanca', 9, NULL, NULL),
        (10, 'Resistencia', 10, NULL, NULL),
        (11, 'Posadas', 11, NULL, NULL),
        (12, 'Merlo nota 1?', 12, NULL, NULL),
        (13, 'Quilmes', 13, NULL, NULL),
        (14, 'San Salvador de Jujuy', 14, NULL, NULL),
        (15, 'Guaymallén', 15, NULL, NULL),
        (16, 'Santiago del Estero', 16, NULL, NULL),
        (17, 'Gregorio de Laferrere', 17, NULL, NULL),
        (18, 'José C. Paz', 18, NULL, NULL),
        (19, 'Paraná', 19, NULL, NULL),
        (20, 'Banfield nota 2?', 20, NULL, NULL),
        (21, 'González Catán', 21, NULL, NULL),
        (22, 'Neuquén', 22, NULL, NULL),
        (23, 'Formosa', 23, NULL, NULL),
        (24, 'Lanús', 24, NULL, NULL),
        (25, 'La Plata', 25, NULL, NULL),
        (26, 'Godoy Cruz', 26, NULL, NULL),
        (27, 'Isidro Casanova', 27, NULL, NULL),
        (28, 'Las Heras', 28, NULL, NULL),
        (29, 'Berazategui', 29, NULL, NULL),
        (30, 'La Rioja', 30, NULL, NULL),
        (31, 'Comodoro Rivadavia', 31, NULL, NULL),
        (32, 'Moreno', 32, NULL, NULL),
        (33, 'San Luis', 33, NULL, NULL),
        (34, 'San Miguel nota 3?', 34, NULL, NULL),
        (35, 'San Fernando del Valle de Catamarca', 35, NULL, NULL),
        (36, 'Río Cuarto', 36, NULL, NULL),
        (37, 'Virrey del Pino', 37, NULL, NULL)");
    }
}
