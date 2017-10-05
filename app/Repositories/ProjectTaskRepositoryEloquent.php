<?php

namespace Sysproject\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Sysproject\Repositories\ProjectTaskRepository;
use Sysproject\Entities\ProjectTask;
use Sysproject\Validators\ProjectTaskValidator;

/**
 * Class ProjectTaskRepositoryEloquent
 * @package namespace Sysproject\Repositories;
 */
class ProjectTaskRepositoryEloquent extends BaseRepository implements ProjectTaskRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ProjectTask::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
