<?php

namespace App\Console\Commands;


use Illuminate\Console\Command;
use app\k_has_p;
use app\acdealer_has_acc;

class DeletZero extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'DeletZero:amount';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'delet the zeros amount';

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
        $honies=k_has_p::where('amount','0')->get();
        foreach($honies as $honey){

           $days = now()->diffInDays( $honey->updated_at);
           if( $days >7){

            $honey->delete();
           }
        }
        $access=acdealer_has_acc::where('amount','0')->get();
        foreach( $access as $acces){

           $days = now()->diffInDays( $acces->updated_at);
           if($days >7){

            $acces->delete();
           }
        }

    }
}
