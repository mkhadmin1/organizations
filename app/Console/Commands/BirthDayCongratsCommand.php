<?php

namespace App\Console\Commands;

use App\Mail\BirthDay;
use App\Mail\HelloMail;
use http\Client\Curl\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class BirthDayCongratsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:birthday-init';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $users = \App\Models\User::all();
        foreach ($users as $user) {
            $birthday = $user->date_of_birth;

            if (date_parse($birthday)["month"] === date_parse(today())["month"]
                && date_parse($birthday)["day"] === date_parse(today())["day"]) {
                Mail::to($user->email)
                    ->send(new BirthDay());
            };
        }
    }
}
