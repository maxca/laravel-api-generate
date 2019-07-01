<?php

namespace LumenApiGenerator\Provider;

use LumenApiGenerator\Command\GenerateFileCommand;
use Illuminate\Support\ServiceProvider;

/**
 * Class ApiGenerateServiceProvider
 * @package LumenApiGenerator\Provider
 * @author samark chaisanguan <samarkchsngn@gmail.com>
 */
class ApiGenerateServiceProvider extends ServiceProvider
{
    /**
     * @var array
     * setting command list
     */
    protected $command = [
        GenerateFileCommand::class,
    ];

    /**
     * Booting application
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/api-generate.php' => config_path('api-generate.php'),
            __DIR__ . '/../generate/template'       => base_path('template/'),
        ], 'config');

        $this->commands($this->command);

    }
}