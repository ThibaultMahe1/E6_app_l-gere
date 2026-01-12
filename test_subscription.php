<?php

use App\Models\User;
use App\Models\Event;
use App\Models\Adherent;
use Illuminate\Http\Request;
use App\Http\Controllers\PlanningController;
use Illuminate\Support\Facades\Auth;

require __DIR__ . '/vendor/autoload.php';
$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

// 1. Create User & Adherent
$user = User::factory()->create();
// Create Adherent manually or factory if exists
// Looking at file list, no AdherentFactory? but Adherent model exists.
$adherent = new Adherent();
$adherent->user_id = $user->id;
$adherent->formule = 'carte';
$adherent->value = 10;
$adherent->save();

// 2. Create Event (Recurring Course)
// Need EventType 'cours'
$eventType = \App\Models\EventType::firstOrCreate(['name' => 'cours']);

// Create Event starting PAST (Jan 10)
$startDate = \Carbon\Carbon::parse('2026-01-10 10:00:00'); 
$endDate = \Carbon\Carbon::parse('2026-01-10 11:00:00');

$event = Event::create([
    'name' => 'Past Course',
    'description' => 'Test',
    'start_date' => $startDate,
    'end_date' => $endDate,
]);

$event->eventTypes()->attach($eventType->id);

// Pre-subscribe the user to the session
//$event->users()->attach($user->id, ['date' => '2026-01-10']);

// 3. Authenticate
Auth::login($user);

// 4. Call Controller
$controller = new PlanningController();

// Create Request for Subscribe
$request = Request::create('/planning/'.$event->id.'/subscribe', 'POST', [
    'date' => '2026-01-10',
    'subscription_type' => 'unique'
]);
$store = app('session')->driver();
$request->setLaravelSession($store);

try {
    $response = $controller->subscribe($request, $event);
    
    // Check response
    if ($response->isRedirection()) {
        $flash = session()->all();
        echo "Session Flashes: " . json_encode($flash) . "\n";
    } else {
        echo "Response: " . $response->getContent() . "\n";
    }
} catch (\Exception $e) {
    echo "Exception: " . $e->getMessage() . "\n";
}

// Clean up
$event->delete();
$adherent->delete();
$user->delete();
