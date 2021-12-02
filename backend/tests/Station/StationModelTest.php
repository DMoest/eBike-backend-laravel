<?php

/**
 * Use strict mode.
 */
declare(strict_types=1);


/**
 * Declaration of the models namespace and use of other namespaces.
 */
namespace App\Tests;
use App\Models\Station;
use Prophecy\PhpUnit\ProphecyTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use PHPUnit\Framework\TestCase;


/**
 * Test cases for Station Model Class.
 */
class StationModelTest extends TestCase
{
    use HasFactory, ProphecyTrait;

    protected object $station;


    /**
     * @description setUp for test suit. Each test case will run this at first.
     */
    final protected function setUp(): void
    {
        $this->station = new Station();
    }


    /**
     * @description tearDown for test suit. Each test case will run this when done is done.
     */
    final protected function tearDown(): void
    {
        parent::tearDown();
    }


    /**
     * @test
     * @description Test construction method for Station class. Test instance of namespace and test default value for property faces.
     */
    final public function test_Station_Model(): void
    {
        /* Test class attributes existence */
        $this->assertObjectHasAttribute("database", $this->station);
        $this->assertObjectHasAttribute("primaryKey", $this->station);
        $this->assertObjectHasAttribute("guarded", $this->station);
        $this->assertObjectHasAttribute("casts", $this->station);
        $this->assertObjectHasAttribute("fillable", $this->station);

        /* Test existence of expected class methods */
        $this->assertTrue(method_exists($this->station, "city"), "Station Model Class does not have expected relation method for city.");
    }


    /**
     * @test
     * @description Test if the Station class model have a method for city relation.
     */
    final public function test_station_model_to_have_method_for_city_relation(): void
    {
        $station = $this->prophesize(Station::class);
        $station->city()->shouldBeCalled();
        $station->reveal()->city();
    }
}
