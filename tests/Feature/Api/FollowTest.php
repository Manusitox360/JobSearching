<?php

namespace Tests\Feature\Api;

use App\Models\Offer;
use App\Models\Follow;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class FollowTest extends TestCase
{
    use RefreshDatabase;

    public function test_CheckIfCanReceiveAllFollowsInJsonFile()
    {
        $offer = Offer::factory()->create();
        $follow = Follow::factory()->create([
            'offer_id'
            => $offer->id
        ]);
        $response = $this->get(route('apiHomeFollows', $follow->offer_id));

        $response->assertStatus(200)
            ->assertJsonCount(1);
    }

    public function test_CheckIfCanReceiveOneFollowInJsonFile()
    {
        $offer = Offer::factory()->create();
        $follow = Follow::factory()->create([
            'offer_id'
            => $offer->id
        ]);

        $response = $this->get(route('apiShowFollow', [$offer->id, $follow->id]));
        $response->assertStatus(200)
            ->assertJsonCount(5);
    }

    public function test_ChecKIfCanCreateNewFollowWithApi()
    {
        $offer = Offer::factory()->create();
        $response = $this->post(route('apiStoreFollow', $offer->id), [
            'news' => ['Ejemplo'],
        ]);
        $data = ['news' => 'Ejemplo'];

        $response = $this->get(route('apiHomeFollows', $offer->id));
        $response->assertStatus(200)
            ->assertJsonCount(1)
            ->assertJsonFragment($data);
    }

    public function test_CheckIfCanUpdateFollowsWithApi()
    {
        $offer = Offer::factory()->create();
        $follow = Follow::factory()->create([
            'offer_id' => $offer->id,
            'news' => 'Ejemplo'
        ]);

        $data = ['news' => 'Ejemplo'];

        $response = $this->get(route('apiShowFollow', [$offer->id, $follow->id]));
        $response->assertStatus(200)
            ->assertJsonCount(5)
            ->assertJsonFragment($data);

        $response = $this->put(route('apiUpdateFollow', [$offer->id, $follow->id]), [
            'news' => 'Esto es un ejemplo modificado',
        ]);
        $data = ['news' => 'Esto es un ejemplo modificado'];

        $response = $this->get(route('apiShowFollow', [$offer->id, $follow->id]));
        $response->assertStatus(200)
            ->assertJsonCount(5)
            ->assertJsonFragment($data);
    }

    public function test_CheckIfCanDeleteFollowsWithApi()
    {
        $offer = Offer::factory()->create();
        $follow = Follow::factory()->create([
            'offer_id'
            => $offer->id
        ]);

        $data = (['message' => 'Follow deleted successfully']);

        $response = $this->delete(route('apiDestroyFollow', [$offer->id, $follow->id]));
        $this->assertDatabaseCount('follows', 0);
        $response->assertStatus(200)
            ->assertJsonCount(1)
            ->assertJsonFragment($data);
    }
    /** @test */
    public function it_can_create_a_follow()
    {
        $offer = Offer::factory()->create(); 

        $follow = Follow::create([
            'offer_id' => $offer->id,
            'news' => 'Some news content',
        ]);

        $this->assertDatabaseHas('follows', [
            'id' => $follow->id,
            'offer_id' => $offer->id,
            'news' => 'Some news content',
        ]);
    }

    /** @test */
    public function it_belongs_to_an_offer()
    {
        $offer = Offer::factory()->create();
        $follow = Follow::create([
            'offer_id' => $offer->id,
            'news' => 'Some news content',
        ]);
        $this->assertInstanceOf(Offer::class, $follow->offer);
        $this->assertEquals($offer->id, $follow->offer->id);
    }
}
