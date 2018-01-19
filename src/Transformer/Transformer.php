<?php

namespace BestIt\Harvest\Transformer;

use Illuminate\Support\Collection;

interface Transformer
{
    public function transform(Collection $data);
}
