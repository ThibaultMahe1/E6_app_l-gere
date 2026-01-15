<?php

use App\Models\Tarif;

test('tarifs page is displayed', function () {
    $response = $this->get('/tarifs');

    $response->assertStatus(200);
});

test('tarifs page displays pricing from database', function () {
    // Arrange: Create some tarifs in the database
    $chevalTarif = Tarif::create([
        'category' => 'cheval',
        'section' => 'enseignement',
        'title' => 'Forfait Test Cheval',
        'description' => 'Test Description',
        'price' => 123.45,
    ]);

    $poneyTarif = Tarif::create([
        'category' => 'poney',
        'section' => 'cartes',
        'title' => 'Forfait Test Poney',
        'description' => 'Test Desc Poney',
        'price' => 67.89,
    ]);

    // Act: Visit the page
    $response = $this->get('/tarifs');

    // Assert: Check if data is present
    $response->assertStatus(200);
    $response->assertSee('Forfait Test Cheval');
    $response->assertSee('123,45 €'); // formatting check
    $response->assertSee('Forfait Test Poney');
    $response->assertSee('67,89 €');
});
