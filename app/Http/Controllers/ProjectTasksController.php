<?php

namespace Sysproject\Http\Controllers;

use Illuminate\Http\Request;

//use Sysproject\Http\Requests;
//use Prettus\Validator\Contracts\ValidatorInterface;
//use Prettus\Validator\Exceptions\ValidatorException;
//use Sysproject\Http\Requests\ProjectTaskCreateRequest;
//use Sysproject\Http\Requests\ProjectTaskUpdateRequest;
use Sysproject\Repositories\ProjectTaskRepository;
use Sysproject\Services\ProjectTaskService;


class ProjectTasksController extends Controller
{

    /**
     * @var ProjectTaskRepository
     */
    protected $repository;

    /**
     * @var ProjectTaskService
     */
    protected $service;
    /**
     * [__construct description]
     * @param ProjectTaskRepository $repository [description]
     * @param ProjectTaskService    $service    [description]
    */
    public function __construct(ProjectTaskRepository $repository, ProjectTaskService $service)
    {
        $this->repository = $repository;
        $this->service  = $service;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
      //  $this->repository->pushCriteria(app('Prettus\Repository\Criteria\RequestCriteria'));
       return $projectTasks = $this->repository->findWhere(['project_id' => $id]);
       //checa se o parâmetro: 'Accept' no Header contém: 'application/json'
       /*
        if (request()->wantsJson()) {

            return response()->json([
                'data' => $projectTasks,
            ]);
        }*/
        //se desejar retornar os dados para uma view
       // return view('projectTasks.index', compact('projectTasks'));
    }

    public function store(Request $request)
    {

      //return response()->json($this->service->create($request->all()));

      //  try {

          //  $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_CREATE);

           return response()->json(['response',$this->service->create($request->all())]);
/*
            $response = [
                'message' => 'Nova Tarefa criada!',
                'data'    => $projectTask->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);*/
        /*} catch (ValidatorException $e) {
            if ($request->wantsJson()) {
                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }*/

            //return redirect()->back()->withErrors($e->getMessageBag())->withInput();
      //  }
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id, $taskId)
    {
       return response()->json(['response',$this->repository->findWhere(['project_id' => $id, 'id' => $taskId])]);
/*
        if (request()->wantsJson()) {

            return response()->json([
                'data' => $projectTask,
            ]);
        }

        return view('projectTasks.show', compact('projectTask'));*/
    }

    public function update(Request $request, $id, $taskId)
    {
        
    //    try {

      //      $this->validator->with($request->all())->passesOrFail(ValidatorInterface::RULE_UPDATE);

        return response()->json(['response',$this->service->update($request->all(), $taskId)]);
/*
            $response = [
                'message' => 'Tarefa atualizada!',
                'data'    => $projectTask->toArray(),
            ];

            if ($request->wantsJson()) {

                return response()->json($response);
            }

            return redirect()->back()->with('message', $response['message']);*/
  /*      } catch (ValidatorException $e) {

            if ($request->wantsJson()) {

                return response()->json([
                    'error'   => true,
                    'message' => $e->getMessageBag()
                ]);
            }

            return redirect()->back()->withErrors($e->getMessageBag())->withInput();*/
      //  }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $taskId)
    {
        return response()->json(['response',$this->repository->find($taskId)->delete()]);
/*
        if (request()->wantsJson()) {

            return response()->json([
                'message' => 'ProjectTask deleted.',
                'deleted' => $deleted,
            ]);
        }

        return redirect()->back()->with('message', 'ProjectTask deleted.');*/
    }
}
