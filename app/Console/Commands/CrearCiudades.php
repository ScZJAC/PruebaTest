<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Provincia;
use App\Models\Ciudad;
use Illuminate\Support\Facades\DB;

class CrearCiudades extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:city {parametros}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Crea una ciudad y su Provincia';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {   
        try {
            DB::beginTransaction();
            $argumentos= $this->argument('parametros');
            $parametros=explode(',', $argumentos);
            $nombre_ciudad=$parametros[0];
            $nombre_provincia=$parametros[1];
            
            $provincia=Provincia::create([
                'descripcion_provincia' =>$nombre_provincia,                                         
            ]);
            $ciudad=Ciudad::create([
                'descripcion_ciudad' =>$nombre_ciudad,                                         
                'id_provincia' =>$provincia->id_provincia,                                         
            ]);
            DB::commit(); 
           
            $data= DB::table('ciudades as a')
            ->select('a.id_ciudad','a.descripcion_ciudad as ciudad','b.descripcion_provincia as provincia','a.created_at as fecha_creacion')
            ->leftJoin('provincias as b', 'b.id_provincia', '=', 'a.id_provincia') 
            ->where('a.id_ciudad',$ciudad->id_ciudad)
            ->get();
            $data=json_decode(json_encode($data),true);
            $header=['id_ciudad','ciudad','provincia','fecha_creacion'];
            $this->table($header,$data);
            $this->info('Ciudad Creada correctamente!');
            return Command::SUCCESS;

        } catch (\Throwable $th) {
            DB::rollback();  
            $this->info('Por favor ingrese los Parametros separados por: "CIUDAD,PROVINCIA" '); 
            return Command::SUCCESS;
        }
    }
}
