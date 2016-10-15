<?php namespace TemplatePattern;


class TurkeySub extends Sub
{
    public function addPrimaryToppings()
    {
        var_dump('add some TURKEY');
        return $this;
    }
}
