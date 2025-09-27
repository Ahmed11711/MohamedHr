<?php

namespace Modules\Recruitment\Http\Controllers\JobVacancieSkill;

use Modules\Recruitment\Repositories\JobVacancieSkill\JobVacancieSkillRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Recruitment\Transformers\BaseCollection\BaseCollection;

use Modules\Recruitment\Http\Requests\JobVacancieSkill\JobVacancieSkillStoreRequest;
use Modules\Recruitment\Http\Requests\JobVacancieSkill\JobVacancieSkillUpdateRequest;
use Modules\Recruitment\Transformers\JobVacancieSkill\JobVacancieSkillResource;

class JobVacancieSkillController extends Controller
{
    use ApiResponseTrait;

    protected $JobVacancieSkillRepository;

    public function __construct(JobVacancieSkillRepositoryInterface $JobVacancieSkillRepository)
    {
        $this->JobVacancieSkillRepository = $JobVacancieSkillRepository;
    }

    public function index()
    {
        $data = $this->JobVacancieSkillRepository->all();

        return $this->successResponse(
                    new BaseCollection($data, 'jobvacancieskill', JobVacancieSkillResource::class),
                    'JobVacancieSkill list retrieved successfully'
                );

        }

    public function show($id)
    {
        $data = $this->JobVacancieSkillRepository->find($id);
        if (!$data) {
            return $this->errorResponse('JobVacancieSkill not found', 404);
        }
        return $this->successResponse(new JobVacancieSkillResource($data), 'JobVacancieSkill retrieved successfully');
    }

    public function store(JobVacancieSkillStoreRequest $request)
    {
        $data = $this->JobVacancieSkillRepository->create($request->validated());
        return $this->successResponse(new JobVacancieSkillResource($data), 'JobVacancieSkill created successfully', 201);
    }

    public function update(JobVacancieSkillUpdateRequest $request, $id)
    {
        $data = $this->JobVacancieSkillRepository->update($id, $request->validated());
        return $this->successResponse(new JobVacancieSkillResource($data), 'JobVacancieSkill updated successfully');
    }

    public function destroy($id)
    {
        $this->JobVacancieSkillRepository->delete($id);
        return $this->successResponse(null, 'JobVacancieSkill deleted successfully');
    }
}
