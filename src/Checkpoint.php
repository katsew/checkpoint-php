<?php

namespace Checkpoint;

use Checkpoint\CheckpointInterface;
use Checkpoint\CheckpointParser;

class Checkpoint implements CheckpointInterface
{

    private $checkpoints = ['.*'];
    private $safeBorders = [];
    
    public function __construct($checkpoints = [], $safeBorders = []) {
        if (!empty($checkpoints)) {
            $this->checkpoints = $checkpoints;
        }
        if (!empty($safeBorders)) {
            $this->safeBorders = $safeBorders;
        }
    }
    
    public function setCheckpoints(array $checkpoints) {
        $this->checkpoints = $checkpoints;
    }

    public function setSafeBorders(array $borders) {
        $this->safeBorders = $borders;
    }
    
    public function canPassThrough(string $route) : bool {
      
        if (!empty($this->safeBorders)) {
            foreach ($this->safeBorders as $border) {
                $replaced = CheckpointParser::parse($border);
                if (preg_match("/{$replaced}/", $route))
                {
                    return true;
                }
            }
        }

        foreach ($this->checkpoints as $checkpoint) {
            $replaced = CheckpointParser::parse($checkpoint);
            if (preg_match("/{$replaced}/", $route))
            {
                return false;
            }
        }
        return true;

    }
}

