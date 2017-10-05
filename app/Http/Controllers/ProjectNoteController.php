<?php

namespace Sysproject\Http\Controllers;

use Sysproject\Repositories\ProjectNoteRepository;
use Sysproject\Services\ProjectNoteService;
use Illuminate\Http\Request;


class ProjectNoteController extends Controller
{
    /**
     * @var ProjectNoteRepository
     */
    private $repository;

    /**
         * @var ProjectNoteService
         */
    private $service;

    /**
     * [__construct description]
     * @param ProjectNoteRepository $repository [description]
     * @param ProjectNoteService    $service    [description]
 */
    public function __construct(ProjectNoteRepository $repository, ProjectNoteService $service)
    {
        $this->repository = $repository;
        $this->service = $service;
    }

    public function index($id)
    {
        return $this->repository->findWhere(['project_id' => $id]); //with(['owner','client'])->all()
    }
    //verificar comportamento do parametro id
    public function store(Request $request)
    {
        return response()->json($this->service->create($request->all()));
    }

    public function show($id, $noteId)
    {
        return $this->repository->findWhere(['project_id' => $id, 'id' => $noteId]); //with(['user','client'])->find($id)
    }
    //verificar comportamento do parametro id
    public function update(Request $request, $id, $noteId)
    {
        return response()->json(['response',$this->service->update($request->all(),$noteId)]);
    }
    //verificar comportamento do parametro id
    public function destroy($id, $noteId)
    {
        return response()->json(['response',$this->repository->find($noteId)->delete()]);
    }
}
