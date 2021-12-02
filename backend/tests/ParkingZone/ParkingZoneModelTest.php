<?php

/**
 * Use strict mode.
 */
declare(strict_types=1);


/**
 * Declaration of the models namespace and use of other namespaces.
 */
namespace App\Tests;
use App\Models\ParkingZone;
use Prophecy\PhpUnit\ProphecyTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use PHPUnit\Framework\TestCase;


/**
 * Test cases for ParkingZone Model Class.
 */
class ParkingZoneModelTest extends TestCase
{
    use HasFactory, ProphecyTrait;

    protected object $parkingZone;


    /**
     * @description setUp for test suit. Each test case will run this at first.
     */
    final protected function setUp(): void
    {
        $this->parkingZone = new ParkingZone();
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
     * @description Test construction method for ParkingZone class. Test instance of namespace and test default value for property faces.
     */
    final public function test_ParkingZone_Model(): void
    {
        /* Test class attributes existence */
        $this->assertObjectHasAttribute("database", $this->parkingZone);
        $this->assertObjectHasAttribute("primaryKey", $this->parkingZone);
        $this->assertObjectHasAttribute("guarded", $this->parkingZone);
        $this->assertObjectHasAttribute("casts", $this->parkingZone);
        $this->assertObjectHasAttribute("fillable", $this->parkingZone);

        /* Test existence of expected class methods */
        $this->assertTrue(method_exists($this->parkingZone, "city"), "ParkingZone Model Class does not have expected relation method for city.");
    }


    /**
     * @test
     * @description Test if the ParkingZone class model have a method for city relation.
     */
    final public function test_parking_zone_model_to_have_method_for_city_relation(): void
    {
        $parkingZone = $this->prophesize(ParkingZone::class);
        $parkingZone->city()->shouldBeCalled();
        $parkingZone->reveal()->city();
    }
}
