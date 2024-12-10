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

    public function test_CheckIfCanReceiveAllFollowsInJsonFile() {
        $offer = Offer::factory()->create();
        $follow = Follow::factory()->create();
        $response = $this->get(route('apiHomeFollows',$follow->offer_id));

        $response->assertStatus(200)
            ->assertJsonCount(1);
    }

    public function test_CheckIfCanReceiveOneFollowInJsonFile() {
        $offer = Offer::factory()->create();
        $follow = $this->post(route('apiStoreFollow', $offer->offer_id ),[
            'news' => ['Ejemplo'],
        ]);
        $follow->json();
        $data = ['news' => 'Ejemplo'];

        $response = $this->get(route('apiShowFollow', $offer->offer_id, $follow->id));
        $response->assertStatus(200)
            ->assertJsonFragment($data);
    }

    public function test_ChecKIfCanCreateNewFollowWithApi() {
        $offer = Offer::factory()->create();
        $response = $this->post(route('apiStoreFollow', $offer->offer_id), [
            'news' => ['Ejemplo'],
        ]);
        $data = ['news' => 'Ejemplo'];

        $response = $this->get(route('apiHomeFollows',));
        $response->assertStatus(200)
            ->assertJsonCount(1)
            ->assertJsonFragment($data);
    }

    public function test_CheckIfTryCreateNewFollowsInNonexistentOfferWithApi() {
        $offer = Offer::factory()->create();
        $response = $this->post(route('apiStoreFollow', 51), [
            'news' => ['Esto no tiene que funcionar'],
        ]);
        $data = ['The offer where you want to insert Follows does not exists'];

        $response->assertStatus(404)
            ->assertJsonCount(1)
            ->assertJsonFragment($data);
    }

    public function test_CheckIfCanUpdateFollowsWithApi() {
        $offer = Offer::factory()->create();
        $follow = $this->post(route('apiStoreFollow', $offer->offer_id), [
            'news' => ['Esto es un ejemplo'],
        ]);
        $follow -> json();
        $data = ['news' => 'Esto es un ejemplo'];

        $response = $this->get(route('apiShowFollow',$offer->offer_id,$follow->id));
        $response->assertStatus(200)
            ->assertJsonCount(1)
            ->assertJsonFragment($data);

        $response = $this->put(route('apiUpdateFollow',$offer->offer_id,$follow->id), [
            'news' => 'Esto es un ejemplo modificado',
        ]);
        $data = ['news' => 'Esto es un ejemplo modificado'];

        $response = $this->get(route('apiShowFollow',$offer->offer_id,$follow->id));
        $response->assertStatus(200)
            ->assertJsonCount(1)
            ->assertJsonFragment($data);
    }

    public function test_CheckIfCanDeleteFollowsWithApi() {
        $offer = Offer::factory()->create();
        $follow = $this->post(route('apiStoreFollow', $offer->offer_id), [
            'news' => ['Esto es un ejemplo'],
        ]);
        $follow->json();
        $response = $this->delete(route('apiDestroyFollow', $offer->offer_id,$follow->id));
        $this->assertDatabaseCount('follow', 0);

        $response = $this->get(route('apiShowFollow', $offer->offer_id,$follow->id));
        $response->assertStatus(200)
            ->assertJsonCount(0);
    }
}