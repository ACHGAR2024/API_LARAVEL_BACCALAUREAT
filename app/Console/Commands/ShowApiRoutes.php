<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Route;

class ShowApiRoutes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'route:show-api';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Afficher uniquement les routes API';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $routes = collect(Route::getRoutes())->filter(function ($route) {
            return in_array('api', $route->gatherMiddleware());
        });

        $this->table(
            ['Method', 'URI', 'Name', 'Action', 'Middleware'],
            $routes->map(function ($route) {
                return [
                    'Method' => implode('|', $route->methods()),
                    'URI' => $route->uri(),
                    'Name' => $route->getName(),
                    'Action' => $route->getActionName(),
                    'Middleware' => implode(', ', $route->middleware()),
                ];
            })->toArray()
        );

        return 0;
    }
}