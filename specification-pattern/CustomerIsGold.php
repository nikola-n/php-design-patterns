<?php

class CustomerIsGold
{
    public function isSatisfiedBy(Customer $customer)
    {
        return $customer->getType() === 'gold';
    }
}

//Most of the time you will do this, simply add a isGold object and determine if it met the rules
//maybe always
//class Customer
//{
//    public function isGold()
//    {
//        return $this->type === 'gold';
//    }
//}

$spec = new CustomerIsGold;
