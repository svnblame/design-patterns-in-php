<?php

use Illuminate\Database\Capsule\Manager as DB;

class CustomersRepositoryTest extends PHPUnit_Framework_TestCase
{

    protected $customers;

    public function setUp()
    {
        $this->setupDatabase();
        $this->migrateTables();
        $this->customers = new CustomersRepository;
    }

    public function setupDatabase()
    {
        $database = new DB;
        $database->addConnection([
            'driver' => 'sqlite',
            'database' => ':memory:'
        ]);
        $database->bootEloquent();
        $database->setAsGlobal();
    }

    public function migrateTables()
    {
        DB::schema()->create('customers', function($table) {
            $table->increments('id');
            $table->string('name');
            $table->string('type');
            $table->timestamps();
        });

        Customer::create(['name' => 'Joe', 'type' => 'gold']);
        Customer::create(['name' => 'Jane', 'type' => 'silver']);
        Customer::create(['name' => 'Bill', 'type' => 'bronze']);
        Customer::create(['name' => 'Joe', 'type' => 'gold']);
    }

    /** @test */
    function it_fetches_all_customers()
    {
        $results = $this->customers->all();
        $this->assertCount(4, $results);
    }

    /** @test */
    function it_fetches_all_customers_who_match_a_given_specification()
    {
        $results = $this->customers->matchingSpecification(new CustomerIsGold);
        $this->assertCount(2, $results);
    }

}
