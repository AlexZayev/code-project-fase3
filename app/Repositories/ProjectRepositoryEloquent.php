<?php

namespace Sysproject\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Sysproject\Repositories\ProjectRepository;
use Sysproject\Entities\Project;
use Sysproject\Validators\ProjectValidator;

/**
 * Class ProjectRepositoryEloquent
 * @package namespace Sysproject\Repositories;
 */
class ProjectRepositoryEloquent extends BaseRepository implements ProjectRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Project::class;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
