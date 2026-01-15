<?php

namespace Tests\Feature;

use App\Models\PressReview;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PressReviewTest extends TestCase
{
    use RefreshDatabase;

    public function test_press_reviews_page_is_displayed(): void
    {
        $response = $this->get(route('revue-de-presse'));
        $response->assertStatus(200);
    }
    
    public function test_press_reviews_are_listed(): void
    {
        PressReview::factory()->create([
            'title' => 'Article Specifique',
            'date' => now()
        ]);
        
        $response = $this->get(route('revue-de-presse'));
        $response->assertSee('Article Specifique');
    }
}
