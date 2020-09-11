<?php

namespace App\Console\Commands;

use App\Notifications\NotifyUser;
use App\User;
use Illuminate\Console\Command;

class EmailInactiveUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:inactive-user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Email inactive user';

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
     * @return int
     */
    public function handle()
    {
       //logic will go here

       $limit = now()->subDay(7);
      
       $inactive_user = User::where('last_loign','<',$limit)->get();
       
       foreach ($inactive_user as $user) {
           $user->notify(new NotifyUser());
           $user->info('mail send to ',$user->email);
       }
    }
}
