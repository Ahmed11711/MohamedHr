<?php

namespace Modules\Recruitment\Http\Controllers\Recruitment;

use Modules\Recruitment\Repositories\Recruitment\RecruitmentRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Recruitment\Transformers\BaseCollection\BaseCollection;

use Modules\Recruitment\Http\Requests\Recruitment\RecruitmentStoreRequest;
use Modules\Recruitment\Http\Requests\Recruitment\RecruitmentUpdateRequest;
use Modules\Recruitment\Transformers\Recruitment\RecruitmentResource;

class RecruitmentController extends Controller
{
    use ApiResponseTrait;

    protected $RecruitmentRepository;

    public function __construct(RecruitmentRepositoryInterface $RecruitmentRepository)
    {
        $this->RecruitmentRepository = $RecruitmentRepository;
    }

    public function index()
    {
        $data = $this->RecruitmentRepository->all();

        return $this->successResponse(
                    new BaseCollection($data, 'recruitment', RecruitmentResource::class),
                    'Recruitment list retrieved successfully'
                );

        }

    public function show($id)
    {
        $data = $this->RecruitmentRepository->find($id);
        if (!$data) {
            return $this->errorResponse('Recruitment not found', 404);
        }
        return $this->successResponse(new RecruitmentResource($data), 'Recruitment retrieved successfully');
    }

    public function store(RecruitmentStoreRequest $request)
    {
        $data = $this->RecruitmentRepository->create($request->validated());
        return $this->successResponse(new RecruitmentResource($data), 'Recruitment created successfully', 201);
    }

    public function update(RecruitmentUpdateRequest $request, $id)
    {
        $data = $this->RecruitmentRepository->update($id, $request->validated());
        return $this->successResponse(new RecruitmentResource($data), 'Recruitment updated successfully');
    }

    public function destroy($id)
    {
        $this->RecruitmentRepository->delete($id);
        return $this->successResponse(null, 'Recruitment deleted successfully');
    }
}
