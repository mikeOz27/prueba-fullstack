<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Headquarter;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HeadquarterEndpointsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function test_get_all_headquarters()
    {
        // Realizar una solicitud GET al endpoint
        $response = $this->getJson('/api/headquarters');

        // Validar la respuesta
        $response->assertStatus(200)
                ->assertJsonStructure([
                    '*' => ['id', 'code', 'name', 'image', 'created_at', 'updated_at'],
                ]);
    }
}

