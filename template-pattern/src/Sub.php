<?php namespace TemplatePattern;


abstract class Sub
{

    public function make()
    {
        return $this
            ->layBread()
            ->addLettuce()
            ->addSauces()
            ->addPrimaryToppings();
    }

    protected abstract function addPrimaryToppings();

    protected function layBread()
    {
        var_dump('laying down the bread');
        return $this;
    }

    protected function addLettuce()
    {
        var_dump('add some lettuce');
        return $this;
    }

    protected function addSauces()
    {
        var_dump('add oil and vinegar');
        return $this;
    }
}
