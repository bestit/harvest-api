<?php

namespace BestIt\Harvest;

use BestIt\Harvest\Endpoint\Contacts;
use BestIt\Harvest\Endpoint\Clients;
use BestIt\Harvest\Endpoint\Expenses;
use BestIt\Harvest\Endpoint\Projects;
use BestIt\Harvest\Endpoint\Tasks;
use BestIt\Harvest\Endpoint\Timesheet;
use BestIt\Harvest\Endpoint\Users;
use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\ClientInterface;

class Client
{
    /** @var HttpClient|ClientInterface $httpClient */
    private $httpClient;
    /** @var Clients $clients */
    private $clients;
    /** @var Users $users */
    private $users;
    /** @var Tasks $tasks */
    private $tasks;
    /** @var Timesheet $timesheet */
    private $timesheet;
    /** @var Contacts $contacts */
    private $contacts;
    /** @var Expenses $expenses */
    private $expenses;
    /** @var Projects $projects */
    private $projects;

    public function __construct(
        int $accountId,
        string $token,
        array $guzzleOptions = [],
        ClientInterface $httpClient = null
    ) {
        $defaultOptions = [
            'base_uri' => 'https://api.harvestapp.com/v2/',
            'headers' => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
                'Authorization' => "Bearer {$token}",
                'Harvest-Account-Id' => $accountId
            ]
        ];

        $options = array_merge($defaultOptions, $guzzleOptions);

        $this->httpClient = $httpClient ?? new HttpClient($options);
    }

    /**
     * @return \BestIt\Harvest\Endpoint\Clients
     */
    public function clients()
    {
        if (!$this->clients instanceof Clients) {
            $this->clients = new Clients($this->httpClient);
        }

        return $this->clients;
    }

    /**
     * @return \BestIt\Harvest\Endpoint\Users
     */
    public function users()
    {
        if (!$this->users instanceof Users) {
            $this->users = new Users($this->httpClient);
        }

        return $this->users;
    }

    /**
     * @return \BestIt\Harvest\Endpoint\Tasks
     */
    public function tasks()
    {
        if (!$this->tasks instanceof Tasks) {
            $this->tasks = new Tasks($this->httpClient);
        }

        return $this->tasks;
    }

    /**
     * @return \BestIt\Harvest\Endpoint\Timesheet
     */
    public function timesheet()
    {
        if (!$this->timesheet instanceof Timesheet) {
            $this->timesheet = new Timesheet($this->httpClient);
        }

        return $this->timesheet;
    }

    /**
     * @return \BestIt\Harvest\Endpoint\Contacts
     */
    public function contacts()
    {
        if (!$this->contacts instanceof Contacts) {
            $this->contacts = new Contacts($this->httpClient);
        }

        return $this->contacts;
    }

    /**
     * @return \BestIt\Harvest\Endpoint\Expenses
     */
    public function expenses()
    {
        if (!$this->expenses instanceof Expenses) {
            $this->expenses = new Expenses($this->httpClient);
        }

        return $this->expenses;
    }

    /**
     * @return \BestIt\Harvest\Endpoint\Projects
     */
    public function projects()
    {
        if (!$this->projects instanceof Projects) {
            $this->projects = new Projects($this->httpClient);
        }

        return $this->projects;
    }
}
