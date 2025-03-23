<?php
namespace App\Http\Controllers;

use App\Models\SportsActivity;
use App\Jobs\CreateRecurringActivitiesJob;
use Illuminate\Http\Request;

class SportsActivityController extends Controller
{
    public function index()
    {
        return SportsActivity::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required|after:start_time',
            'recurrence' => 'required|in:once,weekly',
            'recurrence_weeks' => 'nullable|integer|min:1'
        ]);

        $activity = SportsActivity::create($validated);

        if ($validated['recurrence'] === 'weekly' && $validated['recurrence_weeks']) {
            CreateRecurringActivitiesJob::dispatch($activity, $validated['recurrence_weeks']);
        }

        return response()->json($activity, 201);
    }

    public function show(SportsActivity $activity)
    {
        return $activity;
    }

    public function update(Request $request, SportsActivity $activity)
    {
        $activity->update($request->all());
        return $activity;
    }

    public function destroy(SportsActivity $activity)
    {
        $activity->delete();
        return response()->json(null, 204);
    }
}