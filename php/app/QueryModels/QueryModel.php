<?php

namespace App\QueryModels;

use JsonSerializable;

interface QueryModel
{
    public function results(...$args): JsonSerializable;
}

