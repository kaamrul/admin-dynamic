<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->everyMinute();
        $schedule->command('logout')->dailyAt('23:59');
        // $schedule->command('send:notification_email')->dailyAt('17:00');
        // $schedule->command('make:nominee_completed')->daily();
        // $schedule->command('send:payment_failed_email')->everyMinute();
        // $schedule->command('queue:work --stop-when-empty')->everyMinute()->withoutOverlapping();
        // $schedule->command('your:command')->yearlyOn(7, 1, '00:00')->withoutOverlapping();
    }

    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
