<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SportsActivity extends Model
{
    protected $fillable = [
        'name', 'description', 'date', 'start_time', 'end_time', 'recurrence', 'recurrence_weeks'
    ];
}