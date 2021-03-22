<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\db_bills;
use App\db_close_day;
use App\db_credit;
use App\db_summary;
use App\db_supervisor_has_agent;
use App\db_wallet;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class close extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:close';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cierra la cartera todos los dias';

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
        $data_agents  = DB::table('agent_has_supervisor')
        ->get();
        
        foreach($data_agents as $d){

            $base_amount = db_supervisor_has_agent::where('id_user_agent',$d->id_user_agent)->first()->base;
            $today_amount = db_summary::whereDate('created_at', '=', Carbon::now()->toDateString())
                ->where('id_agent',$d->id_user_agent)
                ->sum('amount');
            $today_sell = db_credit::whereDate('created_at','=',Carbon::now()->toDateString())
                ->where('id_agent',$d->id_user_agent)
                ->sum('amount_neto');
            $bills = db_bills::whereDate('created_at','=',Carbon::now()->toDateString())
                ->sum('amount');
            $total = floatval($base_amount+$today_amount)-floatval($today_sell+$bills);


            db_supervisor_has_agent::where('id_user_agent',$d->id_user_agent)
                ->where('id_supervisor',$d->id_supervisor)
                ->update(['base'=>$total]);

            $values = array(
                'id_agent' => $d->id_user_agent,
                'id_supervisor' => $d->id_supervisor,
                'created_at' => Carbon::now(),
                'total' => $total,
                'base_before' => $base_amount,

            );

            
            db_close_day::insert($values);
            

        }
      
      
    }
}
