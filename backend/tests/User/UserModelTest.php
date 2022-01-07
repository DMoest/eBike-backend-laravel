<?php

/**
 * Use strict mode.
 */
declare(strict_types=1);


/**
 * Declaration of the models namespace and use of other namespaces.
 */
namespace App\Tests;
use App\Models\User;
use Prophecy\PhpUnit\ProphecyTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use PHPUnit\Framework\TestCase;


/**
 * Test cases for User Model Class.
 */
class UserModelTest extends TestCase
{
    use HasFactory, ProphecyTrait;

    protected object $user;


    /**
     * @description setUp for test suit. Each test case will run this at first.
     */
    final protected function setUp(): void
    {
        $this->user = new User();
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
     * @description Test construction method for User class. Test instance of namespace and test default value for property faces.
     */
    final public function test_User_Model(): void
    {
        /* Test class attributes existence */
//        $this->assertObjectHasAttribute("database", $this->user);
        $this->assertObjectHasAttribute("primaryKey", $this->user);
        $this->assertObjectHasAttribute("guarded", $this->user);
        $this->assertObjectHasAttribute("casts", $this->user);
        $this->assertObjectHasAttribute("fillable", $this->user);

        /* Test existence of expected class methods */
        $this->assertTrue(method_exists($this->user, "city"), "User Model Class does not have expected relation method for city.");
    }


//    /**
//     * @test
//     * @description Test if the User class model have a method for set password attribute.
//     */
//    final public function test_user_model_to_have_method_for_setPasswordAttribute(): void
//    {
//        $user = $this->prophesize(User::class);
//        $user->setPasswordAttribute('superSäkertLösenord12321')->shouldBeCalled();
//        $user->reveal()->setPasswordAttribute('superSäkertLösenord12321');
//    }


    /**
     * @test
     * @description Test if the User class model have a method for city relation.
     */
    final public function test_user_model_to_have_method_for_city_relation(): void
    {
        $user = $this->prophesize(User::class);
        $user->city()->shouldBeCalled();
        $user->reveal()->city();
    }


    /**
     * @test
     * @description Test if the User class model have a method for travels relation.
     */
    final public function test_user_model_to_have_method_for_travels_relation(): void
    {
        $user = $this->prophesize(User::class);
        $user->travels()->shouldBeCalled();
        $user->reveal()->travels();
    }
}
