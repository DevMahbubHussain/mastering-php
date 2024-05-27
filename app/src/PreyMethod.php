<?php

abstract class PreyMethod
{
    public function chaseBy(PreditorInterface $preentedBy)
    {
        var_dump('Please help! I\'m being chased by a ' . get_class($preentedBy));
    }
    public function killedBy(PreditorInterface $preentedBy)
    {
        var_dump('Please help! I\'m killed  by a ' . get_class($preentedBy));
    }
}
