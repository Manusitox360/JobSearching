<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use App\Models\Offer;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class OfferTest extends TestCase
{
    use RefreshDatabase;

    public function test_CheckIfCanReceiveAllOffersInJsonFile() {
        $offer = Offer::factory(5)->create();
        $response = $this->get(route('apiHomeOffers'));
        
        $response->assertStatus(200)
            ->assertJsonCount(5);
    }

    public function test_CheckIfCanReceiveOneOfferInJsonFile() {
        $offer = $this->post(route('apiStoreOffer'),[
            'info' => 'Programador Backend',
            'company' => 'Hispasec Cibersecurity',
            'logo' => 'https://smartcitycluster.org/wp-content/uploads/2015/08/logo-hispasec.jpg',
            'state' => 'In progress',
        ]);

        $data = ['info' => 'Programador Backend'];

        $response = $this->get(route('apiShowOffer', 1));
        $response->assertStatus(200)
            ->assertJsonFragment($data);
    }

    public function test_ChecKIfCanCreateNewOfferWithApi() {
        $response = $this->post(route('apiStoreOffer'), [
            'info' => 'Programador FullStack',
            'company' => 'Linkedin',
            'logo' => 'https://blog.waalaxy.com/wp-content/uploads/2021/01/3-1.png',
            'status' => 'In progress',
        ]);

        $response = $this->get(route('apiHomeOffers'));
        $response->assertStatus(200)
            ->assertJsonCount(1);
    }

    public function test_CheckIfCanUpdateOfferWithApi() {
        $response = $this->post(route('apiStoreOffer', [
            'info' => 'Programador FullStack',
            'company' => 'Linkedin',
            'logo' => 'https://blog.waalaxy.com/wp-content/uploads/2021/01/3-1.png',
            'status' => 'In progress',
        ]));
        $data = ['company' => 'Linkedin'];

        $response = $this->get(route('apiHomeOffers'));
        $response->assertStatus(200)
            ->assertJsonCount(1)
            ->assertJsonFragment($data);

        $response = $this->put(route('apiUpdateOffer', 1), [
            'info' => 'Programador PHP',
            'company' => 'linkedin',
            'logo' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTWMjR7gx6W5-B-hglc98RYENcZeIrSg0t6aA&s',
            'status' => 'Finished',
        ]);
        $data = ['company' => 'linkedin'];

        $response = $this->get(route('apiHomeOffers'));
        $response->assertStatus(200)
            ->assertJsonCount(1)
            ->assertJsonFragment($data);
    }

    public function test_CheckIfCanDeleteOfferWithApi() {
        $offer = Offer::factory(2)->create();

        $response = $this->delete(route('apiDestroyOffer', 1));
        $this->assertDatabaseCount('offers', 1);

        $response = $this->get(route('apiHomeOffers'));
        $response->assertStatus(200)
            ->assertJsonCount(1);
    }
}