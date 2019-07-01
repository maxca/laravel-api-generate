<?php
namespace LumenApiGenerator\Command;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Samark\ApiGenerate\Generate\GenerateFiles;

/**
 * Class GenerateFileCommand
 * @package LumenApiGenerator\Command
 * @author samark chaisanguan <samarkchsngn@gmail.com>
 */
class GenerateFileCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'maxca:genfile';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate API Resource file.';

    /**
     * generate list
     * @var collection
     */
    protected $generate;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        Log::info('start process ' . get_class());
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $namespace = $this->ask('What is your namespace ?');
        $this->generate = app(GenerateFiles::class, ['namespace' => $namespace]);
        $this->generate->setTemplatePath('public/');
        $this->generate->setPath(base_path());
        $this->generate->execute();

        #$this->generate->makeMigration();
        dump('generate module ' . $namespace . ' success !');
    }
}