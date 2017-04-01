<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UpdateUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command Update Status Off For User';

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
        $sql = 'UPDATE users 
                  SET status = 0 
                  WHERE status = 1 
                  AND DATE_ADD(NOW(),INTERVAL -5 MINUTE) > updated_at';
        DB::select($sql);
        Log::info('Update Status Off For User');
    }
}
