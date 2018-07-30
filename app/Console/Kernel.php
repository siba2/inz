<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Customers;
use App\Cash;
use App\Tariffs;
use App\TariffsCustomer;

class Kernel extends ConsoleKernel {

    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
            //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule) {
        $schedule->call(function () {

            $customers = Customers::all();
            foreach ($customers as $customer) {

                $tariffs = TariffsCustomer::where('id_customer', $customer->id)->get();
                $arr = [];

                foreach ($tariffs as $tariff) {

                    array_push($arr, $tariff->id_traffis);
                }

                $arrTariff = Tariffs::select()->whereIn('id', $arr)->get();

                foreach ($arrTariff as $tariff) {

                    $cash = new Cash;
                    $cash->id_customer = $customer->id;
                    $cash->id_tariff = $tariff->id;
                    $cash->comment = $tariff->name;
                    $cash->value = -$tariff->value;
                    $cash->date = date('y-m-d h:m:s');
                    $cash->save();
                }
            }
        })->monthly();

        $schedule->command('backup:database --connection=mysql')->daily();
        $schedule->command('backup:clean')->daily()->at('11:48');
        $schedule->command('backup:run')->daily()->at('11:48');
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands() {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }

}
