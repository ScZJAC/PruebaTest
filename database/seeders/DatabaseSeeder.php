<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        $this->dropTable([
            'provincias',
            'ciudades',
            'users'
        ]);
        $this->call(ProvinciaSeeder::class);
        $this->call(CiudadSeeder::class);
        $this->call(UserSeeder::class);
    }
    protected function dropTable( array $tables)
    {
       
        foreach ($tables as $table) {
          
           DB::statement('DELETE FROM '.$table);
           DB::statement('alter table '.$table.' AUTO_INCREMENT=1;');
        }
   
    }
}
