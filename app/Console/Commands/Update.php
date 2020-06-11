<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use App\Jadwal;

class Update extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:sumbang-saran';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update Countdown';

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
        //
        $mytime = Carbon::now();
        Jadwal::whereDate('selesai', '<', $mytime->toDateTimeString())->update(['status' => 1]);
    }
}
