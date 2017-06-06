<?php

namespace BestIt\Harvest\Endpoints;

use BestIt\Harvest\Models\Projects\Project as ProjectModel;
use BestIt\Harvest\Models\Projects\Projects as ProjectsModel;
use BestIt\Harvest\Models\Projects\Task as TaskModel;
use BestIt\Harvest\Models\Projects\Tasks as TasksModel;
use BestIt\Harvest\Models\Projects\User as UserModel;
use BestIt\Harvest\Models\Projects\Users as UsersModel;
use BestIt\Harvest\Models\Reports\DayEntries as DayEntriesModel;
use BestIt\Harvest\Utils\Utils;
use DateTime;
use Psr\Http\Message\ResponseInterface;

/**
 * Class Projects
 *
 * @package BestIt\Harvest\Endpoints
 * @author Ahmad El-Bardan <ahmad.el-bardan@bestit-online.de>
 * @author Marcel Thiesies <marcel.thiesies@bestit-online.de>
 */
class Projects extends BaseEndpoint
{
    /**
     * Retrieve all projects.
     *
     * @return ProjectsModel
     */
    public function all()
    {
        $response = $this->httpClient->get('/projects');

        return $this->projectsModel($response);
    }

    /**
     * Retrieve a specific project.
     *
     * @param int $id
     * @return ProjectModel
     */
    public function find($id)
    {
        $response = $this->httpClient->get("/projects/{$id}");

        return $this->projectModel($response);
    }

    /**
     * Retrieve all projects by specific client id.
     *
     * @param $cid
     * @return ProjectsModel
     */
    public function findByClientId($cid)
    {
        $response = $this->httpClient->get("/projects?client={$cid}");

        return $this->projectsModel($response);
    }

    /**
    * Retrieve all projects updated since a given date.
    *
    * @param DateTime|null|string $updatedSince
    * @return ProjectsModel $response
    */
    public function updatedSince(DateTime $updatedSince = null)
    {
        if ($updatedSince !== null) {
            $updatedSince = Utils::dateTimeObjToHarvestTimeString($updatedSince);
        }

        $response = $this->httpClient->get("/projects?updated_since={$updatedSince}");

        return $this->projectsModel($response);
    }

    /**
     * Create a project.
     *
     * @param ProjectModel $project
     * @return bool
     */
    public function create(ProjectModel $project)
    {
        $this->httpClient->post('/projects', [
            'json' => [
                'project' => $project->toArray()
            ]
        ]);

        return true;
    }

    /**
     * Update a project.
     *
     * @param ProjectModel $project
     * @return ProjectModel
     */
    public function update(ProjectModel $project)
    {
        $this->httpClient->put("/projects/{$project->id}", [
            'json' => [
                'project' => $project->toArray()
            ]
        ]);

        return $this->find($project->id);
    }

    /**
     * Toggle activation status of a project.
     *
     * @param int $id
     * @return ProjectModel
     */
    public function toggle($id)
    {
        $this->httpClient->put("/projects/{$id}/toggle");

        return $this->find($id);
    }

    /**
     * Delete a project.
     *
     * @param int $id
     * @return bool
     */
    public function delete($id)
    {
        $this->httpClient->delete("/projects/{$id}");

        return true;
    }

    /**
     * Retrieve all task assignments for a specific project.
     *
     * @param int $projectId
     * @return TasksModel
     * @TODO: filters
     */
    public function tasks($projectId)
    {
        $response = $this->httpClient->get("/projects/{$projectId}/task_assignments");

        return $this->tasksModel($response);
    }

    /**
     * Find a specific task assignment for a specific project.
     *
     * @param int $projectId
     * @param int $taskAssignmentId
     * @return TaskModel
     */
    public function findTask($projectId, $taskAssignmentId)
    {
        $response = $this->httpClient->get("/projects/{$projectId}/task_assignments/{$taskAssignmentId}");

        return $this->taskModel($response);
    }

    /**
     * Assign a specific task to a specific project.
     *
     * @param int $projectId
     * @param int $taskId
     * @return bool
     */
    public function assignTask($projectId, $taskId)
    {
        $this->httpClient->post("/projects/{$projectId}/task_assignments", [
            'json' => [
                'task' => [
                    'id' => $taskId
                ]
            ]
        ]);

        return true;
    }

    /**
     * Create a task and assign it to a specific project.
     *
     * @param int $projectId
     * @param string $name
     * @return bool
     */
    public function createTask($projectId, $name)
    {
        $this->httpClient->post("/projects/{$projectId}/task_assignments/add_with_create_new_task", [
            'json' => [
                'task' => [
                    'name' => $name
                ]
            ]
        ]);

        return true;
    }

    /**
     * Update task assignment.
     *
     * @param int $projectId
     * @param TaskModel $taskAssignment
     * @return TaskModel
     */
    public function updateTask($projectId, TaskModel $taskAssignment)
    {
        $this->httpClient->put("/projects/{$projectId}/task_assignments/{$taskAssignment->id}", [
            'json' => [
                'task_assignment' => $taskAssignment->toArray()
            ]
        ]);

        return $this->findTask($projectId, $taskAssignment->id);
    }

    /**
     * Remove a task assignment from a project.
     *
     * @param int $projectId
     * @param int $taskAssignmentId
     * @return bool
     */
    public function deleteTask($projectId, $taskAssignmentId)
    {
        $this->httpClient->delete("/projects/{$projectId}/task_assignments/{$taskAssignmentId}");

        return true;
    }

    /**
     * Retrieve all user assignments for a specific project.
     *
     * @param int $projectId
     * @return UsersModel
     * @TODO: filters
     */
    public function users($projectId)
    {
        $response = $this->httpClient->get("/projects/{$projectId}/user_assignments");

        return $this->usersModel($response);
    }

    /**
     * Find a specific user assignment for a specific project.
     *
     * @param int $projectId
     * @param int $userAssignmentId
     * @return UserModel
     */
    public function findUser($projectId, $userAssignmentId)
    {
        $response = $this->httpClient->get("/projects/{$projectId}/user_assignments/{$userAssignmentId}");

        return $this->userModel($response);
    }

    /**
     * Assign a specific user to a specific project.
     *
     * @param int $projectId
     * @param int $userId
     * @return bool
     */
    public function assignUser($projectId, $userId)
    {
        $this->httpClient->post("/projects/{$projectId}/user_assignments", [
            'json' => [
                'user' => [
                    'id' => $userId
                ]
            ]
        ]);

        return true;
    }

    /**
     * Update user assignment.
     *
     * @param int $projectId
     * @param UserModel $userAssignment
     * @return UserModel
     */
    public function updateUser($projectId, UserModel $userAssignment)
    {
        $this->httpClient->put("/projects/{$projectId}/user_assignments/{$userAssignment->id}", [
            'json' => [
                'user_assignment' => $userAssignment->toArray()
            ]
        ]);

        return $this->findUser($projectId, $userAssignment->id);
    }

    /**
     * Remove a user assignment from a project.
     *
     * @param int $projectId
     * @param int $userAssignmentId
     * @return bool
     */
    public function deleteUser($projectId, $userAssignmentId)
    {
        $this->httpClient->delete("/projects/{$projectId}/user_assignments/{$userAssignmentId}");

        return true;
    }

    /**
     * Get time reports for a project with a given filter.
     *
     * @param int $projectId
     * @param DateTime $from
     * @param DateTime $to
     * @param bool|null $billable
     * @param bool|null $onlyBilled
     * @param bool|null $onlyUnbilled
     * @param bool|null $isClosed
     * @param DateTime|null $updatedSince
     * @param int|null $userId
     * @return DayEntriesModel
     * @TODO: clean this up, move the filters to an object.
     */
    public function report(
        $projectId,
        DateTime $from,
        DateTime $to,
        $billable = null,
        $onlyBilled = null,
        $onlyUnbilled = null,
        $isClosed = null,
        DateTime $updatedSince = null,
        $userId = null
    ) {
        $query = [
            'from' => $from->format('Ymd'),
            'to' => $to->format('Ymd')
        ];

        if ($billable !== null) {
            $query['billable'] = $billable ? 'yes' : 'no';
        }

        if ($onlyBilled !== null) {
            $query['only_billed'] = $onlyBilled ? 'yes' : '';
        }

        if ($onlyUnbilled !== null) {
            $query['only_unbilled'] = $onlyUnbilled ? 'yes' : '';
        }

        if ($isClosed !== null) {
            $query['is_closed'] = $isClosed ? 'yes' : 'no';
        }

        if ($updatedSince !== null) {
            $query['updated_since'] = Utils::dateTimeObjToHarvestTimeString($updatedSince);
        }

        if ($userId !== null) {
            $query['user_id'] = $userId;
        }

        $query = '?' . http_build_query($query, '', '&');

        $response = $this->httpClient->get("/projects/{$projectId}/entries{$query}");

        return $this->dayEntriesModel($response);
    }

    /**
     * Helper method to convert a response to a projects model.
     *
     * @param ResponseInterface $response
     * @return ProjectsModel
     */
    private function projectsModel(ResponseInterface $response)
    {
        $projects = $this->innerArray($response, 'project');

        return new ProjectsModel($projects);
    }

    /**
     * Helper method to convert a response to a project model.
     *
     * @param ResponseInterface $response
     * @return ProjectModel
     */
    private function projectModel(ResponseInterface $response)
    {
        $project = $this->outerArray($response);

        return new ProjectModel($project);
    }

    /**
     * Helper method to convert a response to a tasks model.
     *
     * @param ResponseInterface $response
     * @return TasksModel
     */
    private function tasksModel(ResponseInterface $response)
    {
        $tasks = $this->innerArray($response, 'task_assignment');

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

    /**
     * Helper method to convert a response to a users model.
     *
     * @param ResponseInterface $response
     * @return UsersModel
     */
    private function usersModel(ResponseInterface $response)
    {
        $users = $this->innerArray($response, 'user_assignment');

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
