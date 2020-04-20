<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;

class everyDay extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'daily:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Expire Medicine Deactivated';

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
        DB::table('stocks')->whereDate('expire_date', '<=', date('Y-m-d'))->where('stock_status', 'Active')->update(['stock_status' => 'Deactivated']);
    }
}
