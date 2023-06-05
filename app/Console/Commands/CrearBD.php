<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Artisan;
use PDO;
use PDOException;

class CrearBD extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:dbprueba';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Crea la BD prueba y ejecuta migraciones';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $database = env('DB_DATABASE', false);

        if (! $database) {
            $this->info('La variable env(DB_DATABASE) se encuentra vacia');
            return;
        }

        try {
            $pdo = $this->getPDOConnection(env('DB_HOST'), env('DB_PORT'), env('DB_USERNAME'), env('DB_PASSWORD'));

            $pdo->exec(sprintf(
                'CREATE DATABASE IF NOT EXISTS %s CHARACTER SET %s COLLATE %s;',
                $database,
                'utf8mb4',
                'utf8mb4_0900_ai_ci'
            ));
        $this->info('DB "prueba" Creada correctamente!');
        Artisan::call('migrate:fresh');
        $this->info('Migración generada correctamente!');
        Artisan::call('db:seed');
        $this->info('Seeders ejecutados correctamente!');
        return Command::SUCCESS;
           
        } catch (PDOException $exception) {
            $this->error(sprintf('Fallo al crear %s database, %s', $database, $exception->getMessage()));
        }
    }
    private function getPDOConnection($host, $port, $username, $password)
    {
        return new PDO(sprintf('mysql:host=%s;port=%d;', $host, $port), $username, $password);
    }
}
