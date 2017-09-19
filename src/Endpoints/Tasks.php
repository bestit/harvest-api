<?php

namespace BestIt\Harvest\Endpoints;

use BestIt\Harvest\Models\Tasks\Task as TaskModel;
use BestIt\Harvest\Models\Tasks\Tasks as TasksModel;
use BestIt\Harvest\Utils\Utils;
use DateTime;
use Psr\Http\Message\ResponseInterface;

/**
 * Class Tasks
 *
 * @package BestIt\Harvest\Endpoints
 * @author Ahmad El-Bardan <ahmad.el-bardan@bestit-online.de>
 */
class Tasks extends BaseEndpoint
{
    /**
     * Retrieve all tasks.
     *
     * @param DateTime|null $updatedSince
     * @return TasksModel
     */
    public function all(DateTime $updatedSince = null)
    {
        $uri = '/tasks';

        $response = $this->httpClient->get(Utils::appendUpdatedSinceToUri($uri, $updatedSince));

        return $this->tasksModel($response);
    }

    /**
     * Retrieve a specific task.
     *
     * @param int $id
     * @return TaskModel
     */
    public function find($id)
    {
        $response = $this->httpClient->get("/tasks/{$id}");

        return $this->taskModel($response);
    }

    /**
     * Create a task.
     *
     * @param TaskModel $task
     * @return TaskModel
     */
    public function create(TaskModel $task)
    {
        $response = $this->httpClient->post('/tasks', [
            'json' => [
                'task' => $task->toArray()
            ]
        ]);

        return $this->find($this->getIdFromLocationHeader($response));
    }

    /**
     * Update a task.
     *
     * @param TaskModel $task
     * @return TaskModel
     */
    public function update(TaskModel $task)
    {
        $this->httpClient->put("/tasks/{$task->id}", [
            'json' => [
                'task' => $task->toArray()
            ]
        ]);

        return $this->find($task->id);
    }

    /**
     * Delete a task.
     *
     * @param int $id
     * @return bool
     */
    public function delete($id)
    {
        $this->httpClient->delete("/tasks/{$id}");

        return true;
    }

    /**
     * Re-activate a task.
     *
     * @param int $id
     * @return TaskModel
     */
    public function activate($id)
    {
        $this->httpClient->post("/tasks/{$id}/activate");

        return $this->find($id);
    }

    /**
     * Helper method to convert a response to a tasks model-
     *
     * @param ResponseInterface $response
     * @return TasksModel
     */
    private function tasksModel(ResponseInterface $response)
    {
        $tasks = $this->innerArray($response, 'task');

        return new TasksModel($tasks);
    }

    /**
     * Helper method to convert a response to a task model.
     *
     * @param ResponseInterface $response
     * @return TaskModel
     */
    private function taskModel(ResponseInterface $response)
    {
        $task = $this->outerArray($response);

        return new TaskModel($task);
    }
}
