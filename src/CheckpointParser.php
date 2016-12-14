<?php

namespace Checkpoint;

class CheckpointParser
{
    public static function parse(string $checkpoint) : string {
      return str_replace([':any', ':num', ':str'], ['[^/]+', '[0-9]+', '[a-zA-Z]+'], $checkpoint);
    }
}