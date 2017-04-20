<?php

namespace BestIt\Harvest\Endpoints;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use OutOfBoundsException;
use Psr\Http\Message\ResponseInterface;

/**
 * Class BaseEndpoint
 *
 * @package BestIt\Harvest\Endpoints
 * @author Ahmad El-Bardan <ahmad.el-bardan@bestit-online.de>
 */
abstract class BaseEndpoint
{
    /** @var ClientInterface|Client $httpClient */
    protected $httpClient;

    /**
     * BaseEndpoint constructor.
     *
     * @param ClientInterface $httpClient
     */
    public function __construct(ClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    /**
     * Get the outer array. Helper method to retrieve the data we're interested in.
     *
     * @param ResponseInterface $response
     * @param string $column
     * @return mixed
     */
    protected function outerArray(ResponseInterface $response, $column = null)
    {
        $response = $this->decodeJson($response);

        if ($column !== null && array_key_exists($column, $response)) {
            return $response[$column];
        }

        return array_shift($response);
    }

    /**
     * Get the inner array. Helper method to retrieve the data we're interested in since Harvest puts
     * the content we need in an additional array for some odd reason.
     *
     * @param ResponseInterface $response
     * @param string $column
     * @return array
     */
    protected function innerArray(ResponseInterface $response, $column)
    {
        $response = $this->decodeJson($response);

        return array_column($response, $column);
    }

    /**
     * Helper method to decode json from the guzzle response.
     *
     * @param ResponseInterface $response
     * @return array
     */
    protected function decodeJson(ResponseInterface $response)
    {
        $response = \GuzzleHttp\json_decode($response->getBody()->getContents(), true);

        return $response;
    }

    /**
     * Helper method to retrieve the id of the location header that is included in some responses.
     *
     * @param ResponseInterface $response
     * @return int
     * @throws OutOfBoundsException
     */
    protected function getIdFromLocationHeader(ResponseInterface $response)
    {
        if (!$response->hasHeader('Location')) {
            throw new OutOfBoundsException('Location header is missing');
        }

        $location = $response->getHeader('Location');
        $location = array_shift($location);

        return (int) substr(strrchr($location, '/'), 1);
    }

    protected function buildUri($baseUri, array $options)
    {
        $query = [];

        if (isset($options['of_user'])) {
            $query['of_user'] = $options['of_user'];
        }

        if (isset($options['slim'])) {
            $query['slim'] = $options['slim'] ? '1' : '0';
        }

        if (count($query) === 0) {
            return $baseUri;
        }

        return $baseUri . '?' . http_build_query($query, '', '&');
    }
}
