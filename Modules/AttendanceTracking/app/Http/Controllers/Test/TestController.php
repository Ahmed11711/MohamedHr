<?php

namespace Modules\AttendanceTracking\Http\Controllers\Test;

use Modules\AttendanceTracking\Repositories\Test\TestRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\AttendanceTracking\Transformers\BaseCollection\BaseCollection;

use Modules\AttendanceTracking\Http\Requests\Test\TestStoreRequest;
use Modules\AttendanceTracking\Http\Requests\Test\TestUpdateRequest;
use Modules\AttendanceTracking\Transformers\Test\TestResource;

class TestController extends Controller
{
    use ApiResponseTrait;

    protected $TestRepository;

    public function __construct(TestRepositoryInterface $TestRepository)
    {
        $this->TestRepository = $TestRepository;
    }

    public function index()
    {
        $data = $this->TestRepository->all();

        return $this->successResponse(
                    new BaseCollection($data, 'test', TestResource::class),
                    'Test list retrieved successfully'
                );

        }

    public function show($id)
    {
        $data = $this->TestRepository->find($id);
        if (!$data) {
            return $this->errorResponse('Test not found', 404);
        }
        return $this->successResponse(new TestResource($data), 'Test retrieved successfully');
    }

    public function store(TestStoreRequest $request)
    {
        $data = $this->TestRepository->create($request->validated());
        return $this->successResponse(new TestResource($data), 'Test created successfully', 201);
    }

    public function update(TestUpdateRequest $request, $id)
    {
        $data = $this->TestRepository->update($id, $request->validated());
        return $this->successResponse(new TestResource($data), 'Test updated successfully');
    }

    public function destroy($id)
    {
        $this->TestRepository->delete($id);
        return $this->successResponse(null, 'Test deleted successfully');
    }
}
