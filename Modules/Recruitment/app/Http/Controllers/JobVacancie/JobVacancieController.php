<?php

namespace Modules\Recruitment\Http\Controllers\JobVacancie;

use Modules\Recruitment\Repositories\JobVacancie\JobVacancieRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Recruitment\Transformers\BaseCollection\BaseCollection;

use Modules\Recruitment\Http\Requests\JobVacancie\JobVacancieStoreRequest;
use Modules\Recruitment\Http\Requests\JobVacancie\JobVacancieUpdateRequest;
use Modules\Recruitment\Transformers\JobVacancie\JobVacancieResource;

class JobVacancieController extends Controller
{
    use ApiResponseTrait;

    protected $JobVacancieRepository;

    public function __construct(JobVacancieRepositoryInterface $JobVacancieRepository)
    {
        $this->JobVacancieRepository = $JobVacancieRepository;
    }

    public function index()
    {
        $data = $this->JobVacancieRepository->all();

        return $this->successResponse(
                    new BaseCollection($data, 'jobvacancie', JobVacancieResource::class),
                    'JobVacancie list retrieved successfully'
                );

        }

    public function show($id)
    {
        $data = $this->JobVacancieRepository->find($id);
        if (!$data) {
            return $this->errorResponse('JobVacancie not found', 404);
        }
        return $this->successResponse(new JobVacancieResource($data), 'JobVacancie retrieved successfully');
    }

    public function store(JobVacancieStoreRequest $request)
    {
        $data = $this->JobVacancieRepository->create($request->validated());
        return $this->successResponse(new JobVacancieResource($data), 'JobVacancie created successfully', 201);
    }

    public function update(JobVacancieUpdateRequest $request, $id)
    {
        $data = $this->JobVacancieRepository->update($id, $request->validated());
        return $this->successResponse(new JobVacancieResource($data), 'JobVacancie updated successfully');
    }

    public function destroy($id)
    {
        $this->JobVacancieRepository->delete($id);
        return $this->successResponse(null, 'JobVacancie deleted successfully');
    }
}
