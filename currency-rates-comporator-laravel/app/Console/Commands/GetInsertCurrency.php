<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\CurrencyRateController;


class GetInsertCurrency extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:get-insert-currency';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get Api Urls, request from them and insert result into database.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        CurrencyRateController::getAndInsertCurrencyRates();
    }
}
