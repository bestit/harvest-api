<?php

namespace BestIt\Harvest\Endpoints;

use BestIt\Harvest\Models\Reports\DayEntries as DayEntriesModel;
use BestIt\Harvest\Models\Users\User as UserModel;
use BestIt\Harvest\Models\Users\Users as UsersModel;
use BestIt\Harvest\Utils\Utils;
use DateTime;
use Psr\Http\Message\ResponseInterface;

/**
 * Class Users
 *
 * @package BestIt\Harvest\Endpoints
 * @author Ahmad El-Bardan <ahmad.el-bardan@bestit-online.de>
 * @author Marcel Thiesies <marcel.thiesies@bestit-online.de>
 */
class Users extends BaseEndpoint
{
    /**
     * Retrieve all users.
     *
     * @param DateTime|null $updatedSince
     * @return UsersModel
     */
    public function all(DateTime $updatedSince = null)
    {
        $uri = '/people';

        $response = $this->httpClient->get(Utils::appendUpdatedSinceToUri($uri, $updatedSince));

        return $this->usersModel($response);
    }

    /**
     * Retrieve a specific user.
     *
     * @param int $id
     * @return UserModel
     */
    public function find($id)
    {
        $response = $this->httpClient->get("/people/{$id}");

        return $this->userModel($response);
    }

    /**
     * Create a user.
     *
     * @param UserModel $user
     * @return bool
     */
    public function create(UserModel $user)
    {
        $this->httpClient->post('/people', [
            'json' => [
                'user' => $user->toArray()
            ]
        ]);

        return true;
    }

    /**
     * Update a user.
     *
     * @param UserModel $user
     * @return UserModel
     */
    public function update(UserModel $user)
    {
        $response = $this->httpClient->put("/people/{$user->id}", [
            'json' => [
                'user' => $user->toArray()
            ]
        ]);

        return $this->find($this->getIdFromLocationHeader($response));
    }

    /**
     * Toggle activation status of a user.
     *
     * @param int $id
     * @return UserModel
     */
    public function toggle($id)
    {
        $this->httpClient->post("/people/{$id}/toggle");

        return $this->find($id);
    }

    /**
     * Delete a user.
     *
     * @param $id
     * @return bool
     */
    public function delete($id)
    {
        $this->httpClient->delete("/people/{$id}");

        return true;
    }

    /**
     * Get time reports for a user with a given timeframe.
     *
     * @param int $userId
     * @param DateTime $from
     * @param DateTime $to
     * @return DayEntriesModel
     */
    public function report($userId, DateTime $from, DateTime $to)
    {
        $query = [
            'from' => $from->format('Ymd'),
            'to' => $to->format('Ymd')
        ];

        $query = '?' . http_build_query($query, '', '&');

        $response = $this->httpClient->get("/people/{$userId}/entries{$query}");

        return $this->dayEntriesModel($response);
    }

    /**
     * Helper method to convert a response to a users model.
     *
     * @param ResponseInterface $response
     * @return UsersModel
     */
    private function usersModel(ResponseInterface $response)
    {
        $users = $this->innerArray($response, 'user');

        return new UsersModel($users);
    }

    /**
     * Helper method to convert a response to a user model.
     *
     * @param ResponseInterface $response
     * @return UserModel
     */
    private function userModel(ResponseInterface $response)
    {
        $user = $this->outerArray($response);

        return new UserModel($user);
    }

    /**
     * Helper method to convert a response to a day entries model.
     *
     * @param ResponseInterface $response
     * @return DayEntriesModel
     */
    private function dayEntriesModel(ResponseInterface $response)
    {
        $dayEntries = $this->innerArray($response, 'day_entry');

        return new DayEntriesModel($dayEntries);
    }
}
