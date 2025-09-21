<?php

namespace Modules\CmsErp\Http\Controllers\LicenseType;

use Modules\CmsErp\Repositories\LicenseType\LicenseTypeRepositoryInterface;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Facilities\Transformers\BaseCollection\BaseCollection;

use Modules\CmsErp\Http\Requests\LicenseType\LicenseTypeStoreRequest;
use Modules\CmsErp\Http\Requests\LicenseType\LicenseTypeUpdateRequest;
use Modules\CmsErp\Transformers\LicenseType\LicenseTypeResource;

class LicenseTypeController extends Controller
{
    use ApiResponseTrait;

    protected $LicenseTypeRepository;

    public function __construct(LicenseTypeRepositoryInterface $LicenseTypeRepository)
    {
        $this->LicenseTypeRepository = $LicenseTypeRepository;
    }

    public function index()
    {
        $data = $this->LicenseTypeRepository->all();

        return $this->successResponse(
                    new BaseCollection($data, 'licensetype', LicenseTypeResource::class),
                    'LicenseType list retrieved successfully'
                );
        
        }

    public function show($id)
    {
        $data = $this->LicenseTypeRepository->find($id);
        if (!$data) {
            return $this->errorResponse('LicenseType not found', 404);
        }
        return $this->successResponse(new LicenseTypeResource($data), 'LicenseType retrieved successfully');
    }

    public function store(LicenseTypeStoreRequest $request)
    {
        $data = $this->LicenseTypeRepository->create($request->validated());
        return $this->successResponse(new LicenseTypeResource($data), 'LicenseType created successfully', 201);
    }

    public function update(LicenseTypeUpdateRequest $request, $id)
    {
        $data = $this->LicenseTypeRepository->update($id, $request->validated());
        return $this->successResponse(new LicenseTypeResource($data), 'LicenseType updated successfully');
    }

    public function destroy($id)
    {
        $this->LicenseTypeRepository->delete($id);
        return $this->successResponse(null, 'LicenseType deleted successfully');
    }
}
