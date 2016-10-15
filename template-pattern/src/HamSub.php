<?php namespace TemplateMethod;


class HamSub extends Sub
{

    protected function addPrimaryToppings()
    {
        var_dump('add some HAM');
        return $this;
    }
}