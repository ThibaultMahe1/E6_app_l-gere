<?php

namespace Tests\Feature;

use App\Models\Event;
use App\Models\EventType;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StageTest extends TestCase
{
    use RefreshDatabase;

    public function test_stages_page_is_displayed(): void
    {
        $response = $this->get(route('stages.index'));
        $response->assertStatus(200);
        $response->assertSee('Nos Stages');
    }

    public function test_stages_are_listed(): void
    {
        $type = EventType::create(['name' => 'stage']);
        $stage = Event::create([
            'name' => 'Super Stage',
            'description' => 'Description du super stage',
            'start_date' => now()->addDay(),
            'end_date' => now()->addDays(2),
        ]);
        $stage->eventTypes()->attach($type);

        $response = $this->get(route('stages.index'));
        $response->assertSee('Super Stage');
    }

    public function test_stage_details_are_displayed(): void
    {
        $type = EventType::create(['name' => 'stage']);
        $stage = Event::create([
            'name' => 'Super Stage',
            'description' => 'Description du super stage',
            'start_date' => now()->addDay(),
            'end_date' => now()->addDays(2),
            'daily_schedule' => [
                ['date' => 'Jour 1', 'description' => 'Activités jour 1']
            ]
        ]);
        $stage->eventTypes()->attach($type);

        $response = $this->get(route('stages.show', $stage));
        $response->assertStatus(200);
        $response->assertSee('Super Stage');
        $response->assertSee('Activités jour 1');
    }
}
