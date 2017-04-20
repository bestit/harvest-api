<?php

namespace BestIt\Harvest\Endpoints;

use BestIt\Harvest\Models\Clients\Client as ClientModel;
use BestIt\Harvest\Models\Clients\Clients as ClientsModel;
use Psr\Http\Message\ResponseInterface;

/**
 * Class Clients
 *
 * @package BestIt\Harvest\Endpoints
 * @author Ahmad El-Bardan <ahmad.el-bardan@bestit-online.de>
 */
class Clients extends BaseEndpoint
{
    /**
     * Retrieve all clients.
     *
     * @return ClientsModel
     */
    public function all()
    {
        $response = $this->httpClient->get('/clients');

        return $this->clientsModel($response);
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

    /**
     * Helper method to convert a response to a clients model.
     *
     * @param ResponseInterface $response
     * @return ClientsModel
     */
    private function clientsModel(ResponseInterface $response)
    {
        $clients = $this->innerArray($response, 'client');

        return new ClientsModel($clients);
    }

    /**
     * Helper method to convert a response to a client model.
     *
     * @param ResponseInterface $response
     * @return ClientModel
     */
    private function clientModel(ResponseInterface $response)
    {
        $client = $this->outerArray($response);

        return new ClientModel($client);
    }
}
