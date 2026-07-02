<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');

Schedule::command('app:send-automated-pitches --limit=5')
    ->dailyAt('08:00')
    ->timezone('America/New_York')
    ->weekdays();

Schedule::command('app:send-automated-pitches --limit=5')
    ->dailyAt('10:00')
    ->timezone('America/New_York')
    ->weekdays();

Schedule::command('app:send-automated-pitches --limit=5')
    ->dailyAt('12:00')
    ->timezone('America/New_York')
    ->weekdays();
