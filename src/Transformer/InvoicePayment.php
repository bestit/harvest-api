<?php

namespace BestIt\Harvest\Transformer;

class InvoicePayment extends BaseTransformer
{
    public function modelClass(): string
    {
        return \BestIt\Harvest\Model\InvoicePayment::class;
    }
}
