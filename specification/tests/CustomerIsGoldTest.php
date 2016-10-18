<?php

class CustomerIsGoldTest extends PHPUnit_Framework_TestCase {


    /** @test */
    function it_returns_correct_type_for_gold()
    {
        $specification = new CustomerIsGold;

        $goldCustomer = new Customer(['type' => 'gold']);

        $silverCustomer = new Customer(['type' => 'silver']);

        $this->assertTrue($specification->isSatisfiedBy($goldCustomer));

        $this->assertFalse($specification->isSatisfiedBy($silverCustomer));
    }

}
