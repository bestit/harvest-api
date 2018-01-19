<?php

namespace BestIt\Harvest\Tests\Unit\Transformer;

use BestIt\Harvest\Model;
use BestIt\Harvest\Transformer;
use BestIt\Harvest\Tests\Unit\BaseTestCase;

class InvoicePaymentTest extends BaseTestCase
{
    /** @test */
    function can_transform_json_data_into_model()
    {
        $transformer = new Transformer\InvoicePayment();
        $data = \GuzzleHttp\json_decode(
            $this->getFixtureContent('invoice_payment'),
            true
        );

        $invoicePayment = $transformer->transform(collect($data));

        $this->assertInstanceOf(Model\InvoicePayment::class, $invoicePayment);

        $this->assertSame(10336386, $invoicePayment->getId());
        $this->assertSame(1575.86, $invoicePayment->getAmount());
        $this->assertSame('Jane Bar', $invoicePayment->getRecordedBy());
        $this->assertSame('jane@example.com', $invoicePayment->getRecordedByEmail());
        $this->assertSame('Paid by phone', $invoicePayment->getNotes());
        $this->assertSame('jane@example.com', $invoicePayment->getRecordedByEmail());

        $this->assertNull($invoicePayment->getTransactionId());
        $this->assertNull($invoicePayment->getPaymentGateway()->get('id'));
        $this->assertNull($invoicePayment->getPaymentGateway()->get('name'));

        $this->assertSame('2017-07-24 13:32:18', $invoicePayment->getPaidAt()->format('Y-m-d H:i:s'));
        $this->assertSame('2017-07-28 14:42:44', $invoicePayment->getCreatedAt()->format('Y-m-d H:i:s'));
        $this->assertSame('2017-07-28 14:42:44', $invoicePayment->getUpdatedAt()->format('Y-m-d H:i:s'));
    }
}
