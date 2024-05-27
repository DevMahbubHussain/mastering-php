<?php

interface PreditorInterface
{
    public function chase(PreyInterface $editor);
    public function kill(PreyInterface $editor);
}
