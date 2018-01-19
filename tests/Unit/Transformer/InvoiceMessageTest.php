<?php

namespace BestIt\Harvest\Tests\Unit\Transformer;

use BestIt\Harvest\Model;
use BestIt\Harvest\Transformer;
use BestIt\Harvest\Tests\Unit\BaseTestCase;

class InvoiceMessageTest extends BaseTestCase
{
    /** @test */
    function can_transform_json_data_into_model()
    {
        $transformer = new Transformer\InvoiceMessage();
        $data = \GuzzleHttp\json_decode(
            $this->getFixtureContent('invoice_message'),
            true
        );

        $invoiceMessage = $transformer->transform(collect($data));

        $this->assertInstanceOf(Model\InvoiceMessage::class, $invoiceMessage);

        $this->assertSame(27835324, $invoiceMessage->getId());
        $this->assertSame('Bob Powell', $invoiceMessage->getSentBy());
        $this->assertSame('bobpowell@example.com', $invoiceMessage->getSentByEmail());
        $this->assertSame('Bob Powell', $invoiceMessage->getSentFrom());
        $this->assertSame('bobpowell@example.com', $invoiceMessage->getSentFromEmail());
        $this->assertSame('2017-08-23 22:25:59', $invoiceMessage->getCreatedAt()->format('Y-m-d H:i:s'));
        $this->assertSame('2017-08-23 22:27:59', $invoiceMessage->getUpdatedAt()->format('Y-m-d H:i:s'));
        $this->assertCount(2, $invoiceMessage->getRecipients());
        $this->assertSame([
            'name' => 'Richard Roe',
            'email' => 'richardroe@example.com',
        ], $invoiceMessage->getRecipients()->first());
        $this->assertSame('Invoice #1001', $invoiceMessage->getSubject());
        $this->assertSame('The invoice is attached below.', $invoiceMessage->getBody());

        $this->assertNull($invoiceMessage->getEventType());
        $this->assertNull($invoiceMessage->getSendReminderOn());
        $this->assertFalse($invoiceMessage->includeLinkToClientInvoice());
        $this->assertTrue($invoiceMessage->shouldSendMeACopy());
        $this->assertFalse($invoiceMessage->isThankYouNote());
        $this->assertFalse($invoiceMessage->isReminderMessage());
        $this->assertTrue($invoiceMessage->shouldAttachPdf());
    }
}
