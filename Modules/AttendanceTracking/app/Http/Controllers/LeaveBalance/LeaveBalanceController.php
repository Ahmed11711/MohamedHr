<?php

namespace Modules\AttendanceTracking\Http\Controllers\LeaveBalance;

use Modules\AttendanceTracking\Repositories\LeaveBalance\LeaveBalanceRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\AttendanceTracking\Transformers\BaseCollection\BaseCollection;

use Modules\AttendanceTracking\Http\Requests\LeaveBalance\LeaveBalanceStoreRequest;
use Modules\AttendanceTracking\Http\Requests\LeaveBalance\LeaveBalanceUpdateRequest;
use Modules\AttendanceTracking\Transformers\LeaveBalance\LeaveBalanceResource;

class LeaveBalanceController extends Controller
{
    use ApiResponseTrait;

    protected $LeaveBalanceRepository;

    public function __construct(LeaveBalanceRepositoryInterface $LeaveBalanceRepository)
    {
        $this->LeaveBalanceRepository = $LeaveBalanceRepository;
    }

    public function index()
    {
        $data = $this->LeaveBalanceRepository->all();

        return $this->successResponse(
                    new BaseCollection($data, 'leavebalance', LeaveBalanceResource::class),
                    'LeaveBalance list retrieved successfully'
                );

        }

    public function show($id)
    {
        $data = $this->LeaveBalanceRepository->find($id);
        if (!$data) {
            return $this->errorResponse('LeaveBalance not found', 404);
        }
        return $this->successResponse(new LeaveBalanceResource($data), 'LeaveBalance retrieved successfully');
    }

    public function store(LeaveBalanceStoreRequest $request)
    {
        $data = $this->LeaveBalanceRepository->create($request->validated());
        return $this->successResponse(new LeaveBalanceResource($data), 'LeaveBalance created successfully', 201);
    }

    public function update(LeaveBalanceUpdateRequest $request, $id)
    {
        $data = $this->LeaveBalanceRepository->update($id, $request->validated());
        return $this->successResponse(new LeaveBalanceResource($data), 'LeaveBalance updated successfully');
    }

    public function destroy($id)
    {
        $this->LeaveBalanceRepository->delete($id);
        return $this->successResponse(null, 'LeaveBalance deleted successfully');
    }
}
