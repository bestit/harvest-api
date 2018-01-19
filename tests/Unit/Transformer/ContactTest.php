<?php

namespace BestIt\Harvest\Tests\Unit\Transformer;

use BestIt\Harvest\Model;
use BestIt\Harvest\Transformer;
use BestIt\Harvest\Tests\Unit\BaseTestCase;

class ContactTest extends BaseTestCase
{
    /** @test */
    function can_transform_json_data_into_model()
    {
        $transformer = new Transformer\Contact();
        $data = \GuzzleHttp\json_decode(
            $this->getFixtureContent('single_contact'),
            true
        );

        $contact = $transformer->transform(collect($data));
        $client = $contact->getClient();

        $this->assertInstanceOf(Model\Contact::class, $contact);
        $this->assertSame(4706479, $contact->getId());
        $this->assertSame('Owner', $contact->getTitle());
        $this->assertSame('Jane', $contact->getFirstName());
        $this->assertSame('Doe', $contact->getLastName());
        $this->assertSame('Jane Doe', $contact->getName());
        $this->assertSame('janedoe@example.com', $contact->getEmail());
        $this->assertSame('(203) 697-8885', $contact->getPhoneOffice());
        $this->assertSame('(203) 697-8886', $contact->getPhoneMobile());
        $this->assertSame('(203) 697-8887', $contact->getFax());
        $this->assertSame('(203) 697-8886', $contact->getPhoneMobile());
        $this->assertSame('2017-06-26 21:20:07', $contact->getCreatedAt()->format('Y-m-d H:i:s'));
        $this->assertSame('2017-06-26 21:27:07', $contact->getUpdatedAt()->format('Y-m-d H:i:s'));

        $this->assertInstanceOf(Model\Client::class, $client);
        $this->assertSame(5735774, $client->getId());
        $this->assertSame('ABC Corp', $client->getName());
    }
}
