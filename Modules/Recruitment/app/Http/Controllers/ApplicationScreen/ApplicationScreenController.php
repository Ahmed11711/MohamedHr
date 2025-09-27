<?php

namespace Modules\Recruitment\Http\Controllers\ApplicationScreen;

use Modules\Recruitment\Repositories\ApplicationScreen\ApplicationScreenRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Recruitment\Transformers\BaseCollection\BaseCollection;

use Modules\Recruitment\Http\Requests\ApplicationScreen\ApplicationScreenStoreRequest;
use Modules\Recruitment\Http\Requests\ApplicationScreen\ApplicationScreenUpdateRequest;
use Modules\Recruitment\Transformers\ApplicationScreen\ApplicationScreenResource;

class ApplicationScreenController extends Controller
{
    use ApiResponseTrait;

    protected $ApplicationScreenRepository;

    public function __construct(ApplicationScreenRepositoryInterface $ApplicationScreenRepository)
    {
        $this->ApplicationScreenRepository = $ApplicationScreenRepository;
    }

    public function index()
    {
        $data = $this->ApplicationScreenRepository->all();

        return $this->successResponse(
                    new BaseCollection($data, 'applicationscreen', ApplicationScreenResource::class),
                    'ApplicationScreen list retrieved successfully'
                );

        }

    public function show($id)
    {
        $data = $this->ApplicationScreenRepository->find($id);
        if (!$data) {
            return $this->errorResponse('ApplicationScreen not found', 404);
        }
        return $this->successResponse(new ApplicationScreenResource($data), 'ApplicationScreen retrieved successfully');
    }

    public function store(ApplicationScreenStoreRequest $request)
    {
        $data = $this->ApplicationScreenRepository->create($request->validated());
        return $this->successResponse(new ApplicationScreenResource($data), 'ApplicationScreen created successfully', 201);
    }

    public function update(ApplicationScreenUpdateRequest $request, $id)
    {
        $data = $this->ApplicationScreenRepository->update($id, $request->validated());
        return $this->successResponse(new ApplicationScreenResource($data), 'ApplicationScreen updated successfully');
    }

    public function destroy($id)
    {
        $this->ApplicationScreenRepository->delete($id);
        return $this->successResponse(null, 'ApplicationScreen deleted successfully');
    }
}
