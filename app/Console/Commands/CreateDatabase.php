<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class CreateDatabase extends Command
{
    protected $signature = 'db:create {name}';
    protected $description = 'Crea una nueva base de datos';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $dbName = $this->argument('name');

        try {
            $charset = config('database.connections.mysql.charset', 'utf8mb4');
            $collation = config('database.connections.mysql.collation', 'utf8mb4_unicode_ci');

            $query = "CREATE DATABASE IF NOT EXISTS `$dbName` CHARACTER SET $charset COLLATE $collation;";

            DB::statement($query);

            $this->info("La base de datos '$dbName' ha sido creada exitosamente.");
        } catch (\Exception $e) {
            $this->error("Error al crear la base de datos: " . $e->getMessage());
        }
    }
}
