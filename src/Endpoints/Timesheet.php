<?php

namespace BestIt\Harvest\Endpoints;

use BestIt\Harvest\Models\Timesheet\DayEntry as DayEntryModel;
use BestIt\Harvest\Models\Timesheet\Timesheet as TimesheetModel;
use DateTime;
use Psr\Http\Message\ResponseInterface;

/**
 * Class Timesheet
 *
 * @package BestIt\Harvest\Endpoints
 * @author Ahmad El-Bardan <ahmad.el-bardan@bestit-online.de>
 */
class Timesheet extends BaseEndpoint
{
    /**
     * Retrieve all timesheet entries according to the given filters.
     *
     * @param bool $slim Only include time entries, and no projects?
     * @param DateTime|null $dateTime Time entries for another day than today?
     * @param int|null $userId Time entries for a specific user?
     * @return TimesheetModel
     */
    public function all($slim = true, DateTime $dateTime = null, $userId = null)
    {
        $uri = '/daily';
        $query = [];
        $query['slim'] = $slim ? '1' : '0';

        if ($userId !== null) {
            $query['of_user'] = $userId;
        }

        if ($dateTime !== null) {
            $day = (int) $dateTime->format('z') + 1;
            $year = $dateTime->format('Y');

            $uri .= "/{$day}/{$year}";
        }

        $uri .= '?' . http_build_query($query, '', '&');

        $response = $this->httpClient->get($uri);

        return $this->timesheetModel($response);
    }

    /**
     * Retrieve a specific time entry.
     *
     * @param int $id
     * @param int|null $userId
     * @return DayEntryModel
     */
    public function find($id, $userId = null)
    {
        $uri = $this->buildUri("/daily/show/{$id}", [
            'of_user' => $userId
        ]);

        $response = $this->httpClient->get($uri);

        return $this->dayEntryModel($response);
    }

    /**
     * Retrieve a specific time entry.
     *
     * @param DayEntryModel $dayEntry
     * @param int|null $userId
     * @return DayEntryModel
     */
    public function create(DayEntryModel $dayEntry, $userId = null)
    {
        $uri = $this->buildUri('/daily/add', [
            'of_user' => $userId
        ]);

        $response = $this->httpClient->post($uri, [
            'json' => $dayEntry->toArray()
        ]);

        return $this->dayEntryModel($response);
    }

    /**
     * Update a time entry.
     *
     * @param DayEntryModel $dayEntry
     * @param int|null $userId
     * @return DayEntryModel
     */
    public function update(DayEntryModel $dayEntry, $userId = null)
    {
        $uri = $this->buildUri("/daily/update/{$dayEntry->id}", [
            'of_user' => $userId
        ]);

        $this->httpClient->post($uri, [
            'json' => $dayEntry->toArray()
        ]);

        return $this->find($dayEntry->id);
    }

    /**
     * Toggle a timer.
     *
     * @param int $id
     * @param int|null $userId
     * @return bool
     */
    public function toggle($id, $userId = null)
    {
        $uri = $this->buildUri("/daily/timer/{$id}", [
            'of_user' => $userId
        ]);

        $this->httpClient->get($uri);

        return true;
    }

    /**
     * Delete a time entry.
     *
     * @param int $id
     * @param int|null $userId
     * @return bool
     */
    public function delete($id, $userId = null)
    {
        $uri = $this->buildUri("/daily/delete/{$id}", [
            'of_user' => $userId
        ]);

        $this->httpClient->delete($uri);

        return true;
    }

    /**
     * Helper method to convert a response to a timesheet model.
     *
     * @param ResponseInterface $response
     * @return TimesheetModel
     */
    private function timesheetModel(ResponseInterface $response)
    {
        $timesheet = $this->decodeJson($response);

        return new TimesheetModel($timesheet);
    }

    /**
     * Helper method to convert a response to a day entry model.
     *
     * @param ResponseInterface $response
     * @return DayEntryModel
     */
    private function dayEntryModel(ResponseInterface $response)
    {
        $dayEntry = $this->decodeJson($response);

        return new DayEntryModel($dayEntry);
    }
}
