<?php

namespace BestIt\Harvest\Endpoint;

use BestIt\Harvest\Models\Clients\Client as ClientModel;
use GuzzleHttp\Client as HttpClient;

class Clients
{
    /** @var HttpClient $httpClient */
    private $httpClient;

    public function __construct(HttpClient $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function all()
    {
        $response = $this->httpClient->get('clients');

        return $this->transformer->transform((string) $response->getBody());
    }

    /**
     * Retrieve a specific client.
     *
     * @param int $id
     * @return ClientModel
     */
    public function find($id)
    {
        $response = $this->httpClient->get("/clients/{$id}");

        return $this->clientModel($response);
    }

    /**
     * Create a client.
     *
     * @param ClientModel $client
     * @return ClientModel
     */
    public function create(ClientModel $client)
    {
        $response = $this->httpClient->post('/clients', [
            'json' => [
                'client' => $client->toArray()
            ]
        ]);

        return $this->find($this->getIdFromLocationHeader($response));
    }

    /**
     * Update a client.
     *
     * @param ClientModel $client
     * @return ClientModel
     */
    public function update(ClientModel $client)
    {
        $response = $this->httpClient->put("/clients/{$client->id}", [
            'json' => [
                'client' => $client->toArray()
            ]
        ]);

        return $this->find($this->getIdFromLocationHeader($response));
    }

    /**
     * Toggle activation status of a client.
     *
     * @param int $id
     * @return ClientModel
     */
    public function toggle($id)
    {
        $response = $this->httpClient->post("/clients/{$id}/toggle");

        return $this->find($this->getIdFromLocationHeader($response));
    }

    /**
     * Delete a client.
     *
     * @param int $id
     * @return bool
     */
    public function delete($id)
    {
        $this->httpClient->delete("/clients/{$id}");

        return true;
    }
}
