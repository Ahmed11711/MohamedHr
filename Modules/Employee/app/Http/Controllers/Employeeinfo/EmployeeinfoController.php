<?php

namespace Modules\Employee\Http\Controllers\Employeeinfo;

use Modules\Employee\Repositories\Employeeinfo\EmployeeinfoRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Modules\Employee\Http\Requests\Employeeinfo\EmployeeinfoStoreRequest;
use Modules\Employee\Http\Requests\Employeeinfo\EmployeeinfoUpdateRequest;
use Modules\Employee\Transformers\Employeeinfo\EmployeeinfoResource;

class EmployeeinfoController extends Controller
{
    use ApiResponseTrait;

    protected $EmployeeinfoRepository;

    public function __construct(EmployeeinfoRepositoryInterface $EmployeeinfoRepository)
    {
        $this->EmployeeinfoRepository = $EmployeeinfoRepository;
    }

    public function index()
    {
        $data = $this->EmployeeinfoRepository->all();
        return $this->successResponse(EmployeeinfoResource::collection($data), 'Employeeinfo list retrieved successfully');
    }

    public function show($id)
    {
        $data = $this->EmployeeinfoRepository->find($id);
        if (!$data) {
            return $this->errorResponse('Employeeinfo not found', 404);
        }
        return $this->successResponse(new EmployeeinfoResource($data), 'Employeeinfo retrieved successfully');
    }

    public function store(EmployeeinfoStoreRequest $request)
    {
        $data = $this->EmployeeinfoRepository->create($request->validated());
        return $this->successResponse(new EmployeeinfoResource($data), 'Employeeinfo created successfully', 201);
    }

    public function update(EmployeeinfoUpdateRequest $request, $id)
    {
        $data = $this->EmployeeinfoRepository->update($id, $request->validated());
        return $this->successResponse(new EmployeeinfoResource($data), 'Employeeinfo updated successfully');
    }

    public function destroy($id)
    {
        $this->EmployeeinfoRepository->delete($id);
        return $this->successResponse(null, 'Employeeinfo deleted successfully');
    }
}
