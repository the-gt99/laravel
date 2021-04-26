<?php

namespace App\Console\Commands;

use App\Providers\CurrencyServiceProvider;
use App\Repositories\CurrencyRepositoryEloquent;
use App\Services\Currency as CurrencyServices;
use Illuminate\Console\Command;
use League\Flysystem\Config;

class CurrencyParse extends Command
{
    protected $service;
    protected $currencyRepo;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'currencyParse';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Parse the current exchange rate';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(CurrencyServices $service, CurrencyRepositoryEloquent $currencyRepo)
    {
        $this->service = $service;
        $this->currencyRepo = $currencyRepo;
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        //todo
        //Загрузку проделать..
        //Продумать вариант ексепшена
        $rates = $this->service->getActual(config('constants.openexchangerates.token'));
        $this->currencyRepo->updateByNames($rates);
        $this->info("Я команда простая, меня вызвали - я и пришла.");
    }
}
