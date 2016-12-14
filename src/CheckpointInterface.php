<?php

namespace Checkpoint;

interface CheckpointInterface
{
    public function setSafeBorders(array $borders);
    
    public function setCheckpoints(array $checkpoints);
    
    public function canPassThrough(string $route) : bool;
}