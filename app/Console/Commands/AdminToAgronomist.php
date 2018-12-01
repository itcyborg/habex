<?php

namespace App\Console\Commands;

use App\Agronomists;
use App\Mail\AdminUpdateInfo;
use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class AdminToAgronomist extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'admin:verify';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check if an admin has updated his information as an agronomist';


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
        $admins=DB::table('users')
            ->join('role_user','users.id','role_user.user_id')
            ->join('roles','role_user.role_id','roles.id')
            ->where('roles.name','ROLE_ADMIN')
            ->select('users.email','users.name')
            ->get();
        foreach ($admins as $admin) {
            $updated=Agronomists::where('email',$admin->email)->count();
            if($updated==0){
                Mail::to($admin->email)->send(new AdminUpdateInfo($admin));
            }
        }
    }
}
