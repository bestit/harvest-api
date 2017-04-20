<?php

namespace Tests\Unit;

use BestIt\Harvest\Models\Contacts\Contact as ContactModel;
use BestIt\Harvest\Models\Contacts\Contacts as ContactsModel;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use OutOfBoundsException;
use Tests\TestCase;

/**
 * Class ContactsTest
 *
 * @package Tests\Unit
 * @author Ahmad El-Bardan <ahmad.el-bardan@bestit-online.de>
 */
class ContactsTest extends TestCase
{
    public function testThatAllContactsCanBeRetrieved()
    {
        $generatedContacts = $this->generateModels([$this, 'generateContact']);

        $mock = new MockHandler([
            new Response(200, ['Content-Type' => 'application/json'], \GuzzleHttp\json_encode($generatedContacts))
        ]);

        $handler = HandlerStack::create($mock);
        $httpClient = $this->createHarvestClient($handler);

        $contacts = $httpClient->contacts()->all();

        $this->assertInstanceOf(ContactsModel::class, $contacts);
        $this->assertCount(2, $contacts);
    }

    public function testThatAllContactForASpecificClientCanBeRetrieved()
    {
        $generatedContacts = $this->generateModels([$this, 'generateContact']);

        $mock = new MockHandler([
            new Response(200, ['Content-Type' => 'application/json'], \GuzzleHttp\json_encode($generatedContacts))
        ]);

        $handler = HandlerStack::create($mock);
        $httpClient = $this->createHarvestClient($handler);

        $contacts = $httpClient->contacts()->findByClientId(1);

        $this->assertInstanceOf(ContactsModel::class, $contacts);
        $this->assertCount(2, $contacts);
    }

    public function testThatASingleContactCanBeRetrieved()
    {
        $generatedContact = $this->generateContact();

        $mock = new MockHandler([
            new Response(200, ['Content-Type' => 'application/json'], \GuzzleHttp\json_encode($generatedContact))
        ]);

        $handler = HandlerStack::create($mock);
        $httpClient = $this->createHarvestClient($handler);

        $contact = $httpClient->contacts()->find(1);

        $this->assertInstanceOf(ContactModel::class, $contact);
        $this->assertEquals($generatedContact['contact'], $contact->toArray());
    }

    public function testThatAContactCanBeCreated()
    {
        $generatedContact = $this->generateContact();
        $contact = new ContactModel($generatedContact['contact']);

        $mock = new MockHandler([
            new Response(201, ['Location' => '/contacts/1']),
            new Response(200, ['Content-Type' => 'application/json'], \GuzzleHttp\json_encode($generatedContact))
        ]);

        $handler = HandlerStack::create($mock);
        $httpClient = $this->createHarvestClient($handler);

        $contact = $httpClient->contacts()->create($contact);

        $this->assertInstanceOf(ContactModel::class, $contact);
        $this->assertEquals($generatedContact['contact'], $contact->toArray());
    }

    public function testThatAContactCreationThrowsAnExceptionIfTheLocationHeaderIsNotPresent()
    {
        $this->expectException(OutOfBoundsException::class);

        $generatedContact = $this->generateContact();
        $contact = new ContactModel($generatedContact['contact']);

        $mock = new MockHandler([
            new Response(201)
        ]);

        $handler = HandlerStack::create($mock);
        $this->createHarvestClient($handler)->contacts()->create($contact);
    }

    public function testThatAContactCanBeUpdated()
    {
        $generatedContact = $this->generateContact();
        $contact = new ContactModel($generatedContact['contact']);

        $mock = new MockHandler([
            new Response(200, ['Location' => "/contacts/{$contact->id}"]),
            new Response(200, ['Content-Type' => 'application/json'], \GuzzleHttp\json_encode($generatedContact)),
        ]);

        $handler = HandlerStack::create($mock);
        $httpClient = $this->createHarvestClient($handler);

        $contact = $httpClient->contacts()->update($contact);

        $this->assertInstanceOf(ContactModel::class, $contact);
        $this->assertEquals($generatedContact['contact'], $contact->toArray());
    }

    public function testThatAContactUpdateThrowsAnExceptionIfTheLocationHeaderIsNotPresent()
    {
        $this->expectException(OutOfBoundsException::class);

        $generatedContact = $this->generateContact();
        $contact = new ContactModel($generatedContact['contact']);

        $mock = new MockHandler([
            new Response(200)
        ]);

        $handler = HandlerStack::create($mock);
        $this->createHarvestClient($handler)->contacts()->update($contact);
    }

    public function testThatAClientCanBeDeleted()
    {
        $mock = new MockHandler([
            new Response(200)
        ]);

        $handler = HandlerStack::create($mock);
        $httpClient = $this->createHarvestClient($handler);

        $this->assertTrue(
            $httpClient->contacts()->delete(1)
        );
    }
}
