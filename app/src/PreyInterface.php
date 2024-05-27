<?php

interface PreyInterface
{
    public function chaseBy(PreditorInterface $prey);
    public function killedBy(PreditorInterface $prey);
}
