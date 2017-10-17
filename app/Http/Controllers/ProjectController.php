<?php

namespace Sysproject\Http\Controllers;

use Sysproject\Repositories\ProjectRepository;
use Sysproject\Services\ProjectService;
use Illuminate\Http\Request;


class ProjectController extends Controller
{
    /**
     * @var ProjectRepository
     */
    private $repository;

    /**
         * @var ProjectService
         */
    private $service;

    /**
     * [__construct description]
     * @param ProjectRepository $repository [description]
     * @param ProjectService    $service    [description]
 */
    public function __construct(ProjectRepository $repository, ProjectService $service)
    {
        $this->repository = $repository;
        $this->service = $service;
    }

    public function index()
    {
        return $this->repository->with(['owner','client','notes','tasks'])->all();
    }

    public function store(Request $request)
    {
        return response()->json($this->service->create($request->all()));
    }

    public function show($id)
    {
        return $this->repository->with(['owner','client','notes','tasks'])->find($id);
    }

    public function update(Request $request, $id)
    {
        return response()->json(['response',$this->service->update($request->all(),$id)]);
    }

    public function destroy($id)
    {
        return response()->json(['response',$this->repository->find($id)->delete()]);
    }

    public function addMember($project_id, $user_id)
    {
      return response()->json(['response',$this->service->addMember($project_id, $user_id)]);
    }

    public function removeMember($project_id, $user_id)
    {
      return response()->json(['response',$this->service->removeMember($project_id, $user_id)]);
    }

    public function members($id)
    {
      return response()->json(['response',$this->repository->with(['members'])->find($id)]);
    }

    public function isMember($project_id, $user_id)
    {
        return response()->json(['response',$this->service->isMember($project_id, $user_id)]);
    }
}
