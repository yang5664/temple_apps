<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
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
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();
        $schedule->call(function(){
//            \Log::info('schedule');
            //
//            $response = \Curl::to('https://fcm.googleapis.com/fcm/send')
//                ->withHeader(
//                    'Authorization: key=AIzaSyDAdRLnHQgr3tILaasZNwpgSA2GmU6DbQg')
//                ->withData([
//                    'registration_ids'=> ["e3USqtpa82A:APA91bEFC7tCDTX9Kv9r_c67egQYHit2WZtskpyi28CD2cODDj2z5WK1BlWYowHZWgWZyp-M1o8aiIboE5eay_bCG592Eo7ftW-YP2JKbpO56p0mNTe0oPPxsNxAv2Pqqtv4xmcF9j4U",
//                    "f5XvbpKxEVk:APA91bF6mCwzAMzduENRqbD9UFzUBjJyoC-12DbSrwB35f1bmc6Bu1uszGuBd0kqjDpn67iir_66xAdpM4Z38AukHFD5FMvkcFPxLc6OQTJ0KVB_2SDaOvgb16r7PnL_EgxD46nn2KAN"],
//                    'priority' => 'high',
//                    'content_available' => false,
//                    'data' => [
//                        'title' => '測試訊息',
//                        'body' => '考古學家在福建省順昌縣寶山的雙聖廟內發現一座古代合葬墓',
//                    ],
//                    'notification' => [
//                        'title' => '測試訊息',
//                        'body' => '考古學家在福建省順昌縣寶山的雙聖廟內發現一座古代合葬墓',
//                        'sound' => 'default',
//                        'badge' => '1',
//                        'icon' => 'ic_launcher'
//                    ]
//                ])
//                ->asJson()
//                ->post();

//            $response = \Curl::to('https://fcm.googleapis.com/fcm/send')
//                ->withHeader(
//                    'Authorization: key=AIzaSyDAdRLnHQgr3tILaasZNwpgSA2GmU6DbQg')
//                ->withData([
//                    'registration_ids'=> ["fkruWIaGr3k:APA91bHRan2ZHfk1fLzTYI7UxTa7lzYALRklnVD14Vk0Zub7gWnqCg7cPbKXBLCA_AZ0yJSJhFAIy-FEQ9Q4VE0BVZVbm0di3jMhpL2X454rht5XrYM0jnRt2EILpf5ah6EAoXgxcxC2",
//                    "cvlAd4U8OTg:APA91bE-kYjMdsc_pR-rV6ourWlybtIF0ylxWU2s3KkCmj4JBIp1t7KEoxG2e6ge6IMfuDCpRCwj1U-rjKWMwHO92dgbnn250l3tOws5SRNmbdvjE1GHGzRNCJX452QN3AKSdlQQE32u"],
//                    'priority' => 'high',
//                    'content_available' => false,
//                    'notification' => [
//                        'title' => 'i_temple01',
//                        'body' => '考古學家在福建省順昌縣寶山的雙聖廟內發現一座古代合葬墓',
//                        'sound' => 'default',
//                        'badge' => '1',
//                        'icon' => 'ic_launcher'
//                    ]
//                ])
//                ->asJson()
//                ->post();

//            $response = \Curl::to('https://fcm.googleapis.com/fcm/send')
//                ->withHeader(
//                    'Authorization: key=AIzaSyDAdRLnHQgr3tILaasZNwpgSA2GmU6DbQg')
//                ->withData([
//                    'to'=> "/topics/a_temple01",
//                    'priority' => 'high',
//                    'content_available' => false,
//                    'data' => [
//                        'title' => 'a_temple01',
//                        'body' => '考古學家在福建省順昌縣寶山的雙聖廟內發現一座古代合葬墓',
//                    ]
//                ])
//                ->asJson()
//                ->post();
            //
//            \Log::info(\GuzzleHttp\json_encode($response));
        })->everyMinute();
    }

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        require base_path('routes/console.php');
    }
}
