<?php
namespace App\Console\Commands;

use App\Models\BusinessHour;
use App\Models\SportsActivity;
use Illuminate\Console\Command;

class GenerateFreeSlots extends Command
{
    protected $signature = 'slots:generate';
    protected $description = 'Generate free time slots based on business hours and activities';

    public function handle()
    {
       
        $this->info('Generating free slots...');
       
    }
}