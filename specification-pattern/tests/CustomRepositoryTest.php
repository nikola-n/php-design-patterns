<?php

class CustomRepositoryTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \CustomersRepository
     */
    protected $customers;

    protected function setUp(): void
    {

        parent::setUp();
        $this->customers = new CustomersRepository(
            [
                new Customer('gold'),
                new Customer('bronze'),
                new Customer('silver'),
                new Customer('gold'),
            ]
        );
    }

    /** @test */
    public function it_fetches_all_customer()
    {
        $results = $this->customers->all();
        $this->assertCount(4, $results);
    }

    /** @test */
    public function it_fetches_all_customers_who_match_a_given_specification()
    {

        $spec = new CustomerIsGold;

        $results = $this->customers->bySpecification(new CustomerIsGold);

        $this->assertCount(2, $results);
    }
}