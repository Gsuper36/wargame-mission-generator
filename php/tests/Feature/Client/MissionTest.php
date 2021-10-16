<?php

namespace Tests\Feature\Client;

use App\Models\Mission;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MissionTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_find()
    {
        $mission = Mission::factory()->create();

        $this->getJson('/api/missions')
            ->assertStatus(200)
            ->assertJson(['success' => true])
            ->assertJson(['title' => $mission->title]);
    }

    public function test_find_by_title_success()
    {
        $mission = Mission::factory()->create();

        $this->getJson('/api/missions', ['title' => $mission->title])
            ->assertStatus(200)
            ->assertJson(['success' => true])
            ->assertJson(['title' => $mission->title]);
    }

    public function test_find_by_battlefield_id_success()
    {
        $mission = Mission::factory()->create();

        $this->getJson('/api/missions', ['battlefield_id' => $mission->battlefield_id])
            ->assertStatus(200)
            ->assertJson(['success' => true])
            ->assertJson(['title' => $mission->title]);
    }

    public function test_read_success()
    {
        $mission = Mission::factory()->create();

        $this->getJson("/api/missions/{$mission->id}")
            ->assertStatus(200)
            ->assertJson(['success' => true])
            ->assertJson(['title' => $mission->title]);
    }

    public function test_read_fail()
    {
        $id = 3;

        $this->getJson("/api/missions/{$id}")
            ->assertStatus(404)
            ->assertJson(['success' => false]);
    }
}
