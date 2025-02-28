<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\File;

class DatabaseServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $modulePath = base_path('app/Modules');

        if (!File::isDirectory($modulePath)) {
            return;
        }

        $modules = File::directories($modulePath);

        foreach ($modules as $module) {
            $migrationPath = $module . '/Database/migrations';

            if (File::isDirectory($migrationPath)) {
                $this->loadMigrationsFrom($migrationPath);
            }
        }
    }
}
