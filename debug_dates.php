<?php

use Carbon\Carbon;

require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$dateStr = '2026-01-14'; // Future date
$timeStr = '10:00:00';
$eventDate = Carbon::parse($dateStr . ' ' . $timeStr);

// Today in context is 2026-01-12
$now = Carbon::create(2026, 1, 12, 12, 0, 0); // Noon

$limit = $eventDate->copy()->subHours(48); // 12 Jan 10:00

echo "Event: " . $eventDate . "\n";
echo "Now: " . $now . "\n";
echo "Limit: " . $limit . "\n";

if ($now->greaterThanOrEqualTo($limit)) {
    echo "BLOCKED (Should be blocked)\n";
} else {
    echo "ALLOWED\n";
}

// Case 2: Past Event
$dateStr = '2026-01-10';
$eventDate = Carbon::parse($dateStr . ' ' . $timeStr);
$limit = $eventDate->copy()->subHours(48);
echo "Past Event: " . $eventDate . "\n";
if ($now->greaterThanOrEqualTo($limit)) {
    echo "BLOCKED (Past event)\n";
} else {
    echo "ALLOWED\n";
}

// Case 3: Far Future
$dateStr = '2026-01-20';
$eventDate = Carbon::parse($dateStr . ' ' . $timeStr);
$limit = $eventDate->copy()->subHours(48); // 18 Jan
echo "Far Event: " . $eventDate . "\n";
if ($now->greaterThanOrEqualTo($limit)) {
    echo "BLOCKED\n";
} else {
    echo "ALLOWED (Should be allowed)\n";
}
