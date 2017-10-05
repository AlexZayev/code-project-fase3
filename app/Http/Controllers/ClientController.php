<?php

namespace Sysproject\Http\Controllers;

use Sysproject\Repositories\ClientRepository;
use Sysproject\Services\ClientService;
use Illuminate\Http\Request;


class ClientController extends Controller
{
    /**
     * @var ClientRepository
     */
    private $repository;

    /**
         * @var ClientService
         */
    private $service;

    /**
     * [__construct description]
     * @param ClientRepository $repository [description]
     * @param ClientService    $service    [description]
 */
    public function __construct(ClientRepository $repository, ClientService $service)
    {
        $this->repository = $repository;
        $this->service = $service;
    }

    public function index()
    {
        return $this->repository->all();
    }

    public function store(Request $request)
    {
        return response()->json($this->service->create($request->all()));
    }

    public function show($id)
    {
        return $this->repository->find($id);
    }

    public function update(Request $request, $id)
    {
        return response()->json(['response',$this->service->update($request->all(),$id)]);
    }

    public function destroy($id)
    {
        return response()->json(['response',$this->repository->find($id)->delete()]);
    }
}
