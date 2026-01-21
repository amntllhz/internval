<?php

namespace App\Console\Commands;

use App\Models\Submission;
use Illuminate\Console\Command;

class ExpireSubmissions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:expire-submissions';

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
        $count = Submission::shouldExpire()
            ->update(['status_pengajuan' => 'expired']);

        $this->info("{$count} submissions expired.");
    }
}
