<?php

namespace Modules\Recruitment\Http\Controllers\ApplicationPreviousExperience;

use Modules\Recruitment\Repositories\ApplicationPreviousExperience\ApplicationPreviousExperienceRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Recruitment\Transformers\BaseCollection\BaseCollection;

use Modules\Recruitment\Http\Requests\ApplicationPreviousExperience\ApplicationPreviousExperienceStoreRequest;
use Modules\Recruitment\Http\Requests\ApplicationPreviousExperience\ApplicationPreviousExperienceUpdateRequest;
use Modules\Recruitment\Transformers\ApplicationPreviousExperience\ApplicationPreviousExperienceResource;

class ApplicationPreviousExperienceController extends Controller
{
    use ApiResponseTrait;

    protected $ApplicationPreviousExperienceRepository;

    public function __construct(ApplicationPreviousExperienceRepositoryInterface $ApplicationPreviousExperienceRepository)
    {
        $this->ApplicationPreviousExperienceRepository = $ApplicationPreviousExperienceRepository;
    }

    public function index()
    {
        $data = $this->ApplicationPreviousExperienceRepository->all();

        return $this->successResponse(
                    new BaseCollection($data, 'applicationpreviousexperience', ApplicationPreviousExperienceResource::class),
                    'ApplicationPreviousExperience list retrieved successfully'
                );

        }

    public function show($id)
    {
        $data = $this->ApplicationPreviousExperienceRepository->find($id);
        if (!$data) {
            return $this->errorResponse('ApplicationPreviousExperience not found', 404);
        }
        return $this->successResponse(new ApplicationPreviousExperienceResource($data), 'ApplicationPreviousExperience retrieved successfully');
    }

    public function store(ApplicationPreviousExperienceStoreRequest $request)
    {
        $data = $this->ApplicationPreviousExperienceRepository->create($request->validated());
        return $this->successResponse(new ApplicationPreviousExperienceResource($data), 'ApplicationPreviousExperience created successfully', 201);
    }

    public function update(ApplicationPreviousExperienceUpdateRequest $request, $id)
    {
        $data = $this->ApplicationPreviousExperienceRepository->update($id, $request->validated());
        return $this->successResponse(new ApplicationPreviousExperienceResource($data), 'ApplicationPreviousExperience updated successfully');
    }

    public function destroy($id)
    {
        $this->ApplicationPreviousExperienceRepository->delete($id);
        return $this->successResponse(null, 'ApplicationPreviousExperience deleted successfully');
    }
}
