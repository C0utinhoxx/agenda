<?php
namespace App\Jobs;

use App\Models\SportsActivity;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CreateRecurringActivitiesJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $activity;
    protected $weeks;

    public function __construct(SportsActivity $activity, $weeks)
    {
        $this->activity = $activity;
        $this->weeks = $weeks;
    }

    public function handle()
    {
        for ($i = 1; $i <= $this->weeks; $i++) {
            SportsActivity::create([
                'name' => $this->activity->name,
                'description' => $this->activity->description,
                'date' => date('Y-m-d', strtotime($this->activity->date . " +{$i} weeks")),
                'start_time' => $this->activity->start_time,
                'end_time' => $this->activity->end_time,
                'recurrence' => 'once',
            ]);
        }
    }
}