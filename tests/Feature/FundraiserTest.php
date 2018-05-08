<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Fundraiser;


class FundraiserTests extends TestCase
{
    public function setUp()
    {
        parent::setUp();
        factory(\App\Fundraiser::class, 10)->create();
    }

    /** @test */
    public function index_fundraisers_visible()
    {
        $fundraiser = Fundraiser::orderByRaw('RAND()')->first();

        $this->get('/')
            ->assertSee($fundraiser->name);
    }

    /** @test */
    public function fundraiser_view_visible(){
        $fundraiser = Fundraiser::orderByRaw('RAND()')->first();

        $this->get('/fundraiser/' . $fundraiser->slug)
            ->assertSee($fundraiser->location);
    }

    /** @test */
    public function fundraiser_can_create(){
        $fundraiser = factory(\App\Fundraiser::class)->make();
        $this->post('/fundraiser', ['name' => $fundraiser->name, 'location' => $fundraiser->location])
            ->assertStatus(302);
    }
    
    //There should be a lot more tests for this but... time just didn't permit
}
