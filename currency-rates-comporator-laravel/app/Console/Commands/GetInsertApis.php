<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\CurrencyRateController;

class GetInsertApis extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:get-insert-apis';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Manuel Api Url Insert';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        CurrencyRateController::getAndInsertApis(['https://run.mocky.io/v3/d0589181-8ea1-4eaf-aaea-119a7372f032']);
        CurrencyRateController::getAndInsertApis(['https://run.mocky.io/v3/c257cdec-3144-48af-bb79-fd76af4c3ac6']);

    }
}
