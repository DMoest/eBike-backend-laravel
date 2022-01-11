<?php

/**
 * Declaration of the models namespace and use of other namespaces.
 */
namespace Tests\Feature;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Illuminate\Testing\TestResponse;


class RouterTest extends TestCase
{

    /**
     * @test
     * @description Test the index route response code on a GET request.
     *
     * @return void
     */
    final public function test_web_index_route()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }


    /**
     * @test
     * @description Test the bike route response code on a GET request.
     *
     * @return void
     */
    final public function test_api_index_route()
    {
        $response = $this->get('/api/v1/');

        $response->assertStatus(200);
    }


    /**
     * @test
     * @description Test the '/bike' route response code on a GET request.
     *
     * @return void
     */
    final public function test_bike_login_route()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }


    /**
     * @test
     * @description Test the '/bike' route response code on a GET request.
     *
     * @return void
     */
    final public function test_bike_dashboard_route()
    {
        $response = $this->get('/dashboard');

        $response->assertStatus(302);
    }


    /**
     * @test
     * @description Test the '/bike' route response code on a GET request.
     *
     * @return void
     */
    final public function test_bike_dashboard_clients_route()
    {
        $response = $this->get('/dashboard/clients');

        $response->assertStatus(302);
    }
}
