<?php

namespace Sysproject\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use Sysproject\Repositories\ProjectMembersRepository;
use Sysproject\Entities\ProjectMembers;
use Sysproject\Validators\ProjectMembersValidator;

/**
 * Class ProjectMembersRepositoryEloquent
 * @package namespace Sysproject\Repositories;
 */
class ProjectMembersRepositoryEloquent extends BaseRepository implements ProjectMembersRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return ProjectMembers::class;
    }

    

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }
}
