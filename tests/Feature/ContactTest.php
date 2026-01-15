<?php

namespace Tests\Feature;

use Tests\TestCase;

class ContactTest extends TestCase
{
    public function test_contact_page_is_displayed(): void
    {
        $response = $this->get('/nous-contacter');

        $response->assertStatus(200);
        $response->assertSee('Nous contacter');
        $response->assertSee('02 . 40 . 19 . 15 . 45');
        $response->assertSee('ce.pontchateau@wanadoo.fr');
    }
}
