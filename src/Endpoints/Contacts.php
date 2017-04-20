<?php

namespace BestIt\Harvest\Endpoints;

use BestIt\Harvest\Models\Contacts\Contact as ContactModel;
use BestIt\Harvest\Models\Contacts\Contacts as ContactsModel;
use BestIt\Harvest\Utils\Utils;
use DateTime;
use Psr\Http\Message\ResponseInterface;

/**
 * Class Contacts
 *
 * @package BestIt\Harvest\Endpoints
 * @author Ahmad El-Bardan <ahmad.el-bardan@bestit-online.de>
 */
class Contacts extends BaseEndpoint
{
    /**
     * Retrieve all contacts.
     *
     * @param DateTime|null $updatedSince
     * @return ContactsModel
     */
    public function all(DateTime $updatedSince = null)
    {
        $uri = '/contacts';

        $response = $this->httpClient->get(Utils::appendUpdatedSinceToUri($uri, $updatedSince));

        return $this->contactsModel($response);
    }

    /**
     * Retrieve a specific contact.
     *
     * @param int $id
     * @return ContactModel
     */
    public function find($id)
    {
        $response = $this->httpClient->get("/contacts/{$id}");

        return $this->contactModel($response);
    }

    /**
     * Retrieve all contacts for a specific client.
     *
     * @param int $id
     * @param DateTime|null $updatedSince
     * @return ContactsModel
     */
    public function findByClientId($id, DateTime $updatedSince = null)
    {
        $uri = "/clients/{$id}/contacts";

        $response = $this->httpClient->get(Utils::appendUpdatedSinceToUri($uri, $updatedSince));

        return $this->contactsModel($response);
    }

    /**
     * Create a contact.
     *
     * @param ContactModel $contact
     * @return ContactModel
     */
    public function create(ContactModel $contact)
    {
        $response = $this->httpClient->post('/contacts', [
            'json' => [
                'contact' => $contact->toArray()
            ]
        ]);

        return $this->find($this->getIdFromLocationHeader($response));
    }

    /**
     * Update a contact.
     *
     * @param ContactModel $contact
     * @return ContactModel
     */
    public function update(ContactModel $contact)
    {
        $response = $this->httpClient->put("/contacts/{$contact->id}", [
            'json' => [
                'contact' => $contact->toArray()
            ]
        ]);

        return $this->find($this->getIdFromLocationHeader($response));
    }

    /**
     * Delete a contact.
     *
     * @param int $id
     * @return bool
     */
    public function delete($id)
    {
        $this->httpClient->delete("/contacts/{$id}");

        return true;
    }

    /**
     * Helper method to convert a response to a contacts model.
     *
     * @param ResponseInterface $response
     * @return ContactsModel
     */
    private function contactsModel(ResponseInterface $response)
    {
        $contacts = $this->innerArray($response, 'contact');

        return new ContactsModel($contacts);
    }

    /**
     * Helper method to convert a response to a contact model.
     *
     * @param ResponseInterface $response
     * @return ContactModel
     */
    private function contactModel(ResponseInterface $response)
    {
        $contact = $this->outerArray($response);

        return new ContactModel($contact);
    }
}
