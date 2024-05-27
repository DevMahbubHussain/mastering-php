<?php

class Dog extends PreyMethod implements PreditorInterface, PreyInterface
{

    public function chase(PreyInterface $preyInterfacer)
    {
        var_dump('I am chasing a ' . get_class($preyInterfacer));
    }
    public function kill(PreyInterface $preyInterfacer)
    {
        var_dump('I have just killed a ' . get_class($preyInterfacer));
    }
}
