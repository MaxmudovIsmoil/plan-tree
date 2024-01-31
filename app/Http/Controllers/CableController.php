<?php

namespace App\Http\Controllers;

use App\Http\Requests\CableRequest;
use App\Services\CableService;
use Illuminate\Http\JsonResponse;

class CableController extends Controller
{
    public function __construct(
        public CableService $service
    ) {}


    public function index()
    {
        return $this->service->list();
    }

    public function getOne(int $id)
    {
        return $this->service->one($id);
    }

    public function storeOrUpdate(CableRequest $request)
    {
        return $this->service->createOrUpdate($request->validated());
    }


    public function destroy(int $id)
    {
        return $this->service->destroy($id);

    }

}
