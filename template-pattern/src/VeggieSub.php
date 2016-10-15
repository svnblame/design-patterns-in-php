<?php namespace TemplatePattern;


class VeggieSub extends Sub
{
    public function addPrimaryToppings()
    {
        var_dump('add some VEGGIES');
        return $this;
    }
}
