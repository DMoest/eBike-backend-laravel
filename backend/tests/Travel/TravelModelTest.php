<?php

/**
 * Use strict mode.
 */
declare(strict_types=1);


/**
 * Declaration of the models namespace and use of other namespaces.
 */
namespace App\Tests;
use App\Models\Travel;
use Prophecy\PhpUnit\ProphecyTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use PHPUnit\Framework\TestCase;


/**
 * Test cases for Travel Model Class.
 */
class TravelModelTest extends TestCase
{
    use HasFactory, ProphecyTrait;

    protected object $travel;


    /**
     * @description setUp for test suit. Each test case will run this at first.
     */
    final protected function setUp(): void
    {
        $this->travel = new Travel();
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
     * @description Test construction method for Travel class. Test instance of namespace and test default value for property faces.
     */
    final public function test_Travel_Model(): void
    {
        /* Test class attributes existence */
//        $this->assertObjectHasAttribute("database", $this->travel);
        $this->assertObjectHasAttribute("primaryKey", $this->travel);
        $this->assertObjectHasAttribute("guarded", $this->travel);
        $this->assertObjectHasAttribute("casts", $this->travel);
        $this->assertObjectHasAttribute("fillable", $this->travel);

        /* Test existence of expected class methods */
        $this->assertTrue(method_exists($this->travel, "city"), "Travel Model Class does not have expected relation method for city.");
    }


    /**
     * @test
     * @description Test if the Travel class model have a method for bike relation.
     */
    final public function test_travel_model_to_have_method_for_bike_relation(): void
    {
        $travel = $this->prophesize(Travel::class);
        $travel->bike()->shouldBeCalled();
        $travel->reveal()->bike();
    }


    /**
     * @test
     * @description Test if the Travel class model have a method for city relation.
     */
    final public function test_travel_model_to_have_method_for_city_relation(): void
    {
        $travel = $this->prophesize(Travel::class);
        $travel->city()->shouldBeCalled();
        $travel->reveal()->city();
    }


    /**
     * @test
     * @description Test if the Travel class model have a method for user relation.
     */
    final public function test_travel_model_to_have_method_for_user_relation(): void
    {
        $travel = $this->prophesize(Travel::class);
        $travel->user()->shouldBeCalled();
        $travel->reveal()->user();
    }
}
