<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class ErrorLogs extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'logs:email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send an email with logs to the developer for improvements';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $allFiles=Storage::disk('logs')->files();
        $logs=[];
        foreach ($allFiles as $allFile) {
            if(strstr($allFile,'laravel')){
                $logs[]=Storage::disk('logs')->path($allFile);
            }
        }
        if(sizeof($logs)>=1) {
            Mail::to('isaac.itcyborg@outlook.com')->send(new \App\Mail\ErrorLogs($logs));
        }
    }
}
