<?php

namespace BestIt\Harvest;

use BestIt\Harvest\Endpoints\Contacts;
use BestIt\Harvest\Endpoints\Clients;
use BestIt\Harvest\Endpoints\Expenses;
use BestIt\Harvest\Endpoints\Projects;
use BestIt\Harvest\Endpoints\Tasks;
use BestIt\Harvest\Endpoints\Timesheet;
use BestIt\Harvest\Endpoints\Users;
use GuzzleHttp\Client as HttpClient;
use GuzzleHttp\ClientInterface;

/**
 * Class Client
 *
 * @package BestIt\Harvest
 * @author Ahmad El-Bardan <ahmad.el-bardan@bestit-online.de>
 */
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

    /**
     * Client constructor.
     *
     * @param string $url
     * @param string $username
     * @param string $password
     * @param array $guzzleOptions
     * @param ClientInterface|null $httpClient
     */
    public function __construct(
        $url,
        $username,
        $password,
        array $guzzleOptions = [],
        ClientInterface $httpClient = null
    ) {
        $defaultOptions = [
            'base_uri' => rtrim($url, '/'),
            'headers' => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ],
            'auth' => [$username, $password]
        ];

        $options = array_merge($defaultOptions, $guzzleOptions);

        $this->httpClient = $httpClient ?? new HttpClient($options);
    }

    /**
     * @return \BestIt\Harvest\Endpoints\Clients
     */
    public function clients()
    {
        if (!$this->clients instanceof Clients) {
            $this->clients = new Clients($this->httpClient);
        }

        return $this->clients;
    }

    /**
     * @return \BestIt\Harvest\Endpoints\Users
     */
    public function users()
    {
        if (!$this->users instanceof Users) {
            $this->users = new Users($this->httpClient);
        }

        return $this->users;
    }

    /**
     * @return \BestIt\Harvest\Endpoints\Tasks
     */
    public function tasks()
    {
        if (!$this->tasks instanceof Tasks) {
            $this->tasks = new Tasks($this->httpClient);
        }

        return $this->tasks;
    }

    /**
     * @return \BestIt\Harvest\Endpoints\Timesheet
     */
    public function timesheet()
    {
        if (!$this->timesheet instanceof Timesheet) {
            $this->timesheet = new Timesheet($this->httpClient);
        }

        return $this->timesheet;
    }

    /**
     * @return \BestIt\Harvest\Endpoints\Contacts
     */
    public function contacts()
    {
        if (!$this->contacts instanceof Contacts) {
            $this->contacts = new Contacts($this->httpClient);
        }

        return $this->contacts;
    }

    /**
     * @return \BestIt\Harvest\Endpoints\Expenses
     */
    public function expenses()
    {
        if (!$this->expenses instanceof Expenses) {
            $this->expenses = new Expenses($this->httpClient);
        }

        return $this->expenses;
    }

    /**
     * @return \BestIt\Harvest\Endpoints\Projects
     */
    public function projects()
    {
        if (!$this->projects instanceof Projects) {
            $this->projects = new Projects($this->httpClient);
        }

        return $this->projects;
    }
}
