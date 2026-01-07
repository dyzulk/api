<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class TrustLabMigrateCa extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'trustlab:migrate-ca 
                            {--fresh : Drop all tables and re-run all migrations} 
                            {--seed : Seed the database with records} 
                            {--force : Force the operation to run when in production}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Run migrations for the CA database (mysql_ca) using the isolated path';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Starting TrustLab CA Migration...');

        $parameters = [
            '--database' => 'mysql_ca',
            '--path' => 'database/migrations/ca',
        ];

        if ($this->option('force')) {
            $parameters['--force'] = true;
        }

        if ($this->option('seed')) {
            $parameters['--seed'] = true;
        }

        $command = $this->option('fresh') ? 'migrate:fresh' : 'migrate';

        $this->comment("Running command: php artisan {$command} --database=mysql_ca --path=database/migrations/ca " . ($this->option('force') ? '--force' : ''));

        $exitCode = Artisan::call($command, $parameters, $this->output);

        if ($exitCode === 0) {
            $this->info('CA Migration completed successfully.');
        } else {
            $this->error('CA Migration failed.');
        }

        return $exitCode;
    }
}
