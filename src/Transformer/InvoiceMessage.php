<?php

namespace BestIt\Harvest\Transformer;

class InvoiceMessage extends BaseTransformer
{
    public function modelClass(): string
    {
        return \BestIt\Harvest\Model\InvoiceMessage::class;
    }
}
