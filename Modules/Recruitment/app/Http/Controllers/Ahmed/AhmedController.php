<?php

namespace Modules\Recruitment\Http\Controllers\Ahmed;

use Modules\Recruitment\Repositories\Ahmed\AhmedRepositoryInterface;
use App\Traits\ApiResponseTrait;
use App\Http\Controllers\Controller;
use Modules\Recruitment\Transformers\BaseCollection\BaseCollection;

use Modules\Recruitment\Http\Requests\Ahmed\AhmedStoreRequest;
use Modules\Recruitment\Http\Requests\Ahmed\AhmedUpdateRequest;
use Modules\Recruitment\Transformers\Ahmed\AhmedResource;

class AhmedController extends Controller
{
    use ApiResponseTrait;

    protected $AhmedRepository;

    public function __construct(AhmedRepositoryInterface $AhmedRepository)
    {
        $this->AhmedRepository = $AhmedRepository;
    }

    public function index()
    {
        $data = $this->AhmedRepository->all();

        return $this->successResponse(
                    new BaseCollection($data, 'ahmed', AhmedResource::class),
                    'Ahmed list retrieved successfully'
                );

        }

    public function show($id)
    {
        $data = $this->AhmedRepository->find($id);
        if (!$data) {
            return $this->errorResponse('Ahmed not found', 404);
        }
        return $this->successResponse(new AhmedResource($data), 'Ahmed retrieved successfully');
    }

    public function store(AhmedStoreRequest $request)
    {
        $data = $this->AhmedRepository->create($request->validated());
        return $this->successResponse(new AhmedResource($data), 'Ahmed created successfully', 201);
    }

    public function update(AhmedUpdateRequest $request, $id)
    {
        $data = $this->AhmedRepository->update($id, $request->validated());
        return $this->successResponse(new AhmedResource($data), 'Ahmed updated successfully');
    }

    public function destroy($id)
    {
        $this->AhmedRepository->delete($id);
        return $this->successResponse(null, 'Ahmed deleted successfully');
    }
}
