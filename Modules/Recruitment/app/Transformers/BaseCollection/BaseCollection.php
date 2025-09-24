<?php

namespace Modules\Recruitment\Transformers\BaseCollection;

use Modules\Recruitment\Models\InfoRecruitment;
 use Modules\Recruitment\Models\InfoAttendanceTracking;
use Modules\Recruitment\Models\ColumnsRecruitment;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Modules\Recruitment\Models\ColumnsAttendanceTracking;
use Modules\Recruitment\Transformers\infoModel\infoResource;
use Modules\Recruitment\Transformers\columns\columnsResource;

class BaseCollection extends ResourceCollection
{
    protected string $modelName;
    protected string $resourceClass;

    public function __construct($resource, string $modelName, string $resourceClass)
    {

        parent::__construct($resource);
        $this->modelName = $modelName;
        $this->resourceClass = $resourceClass;
    }

    public function toArray($request)
    {
        return [
            'data'    => ($this->resourceClass)::collection($this->collection),
            'columns' => columnsResource::collection(
                ColumnsRecruitment::where('model', $this->modelName)->get()
            ),
            'infos' => new infoResource(
                InfoRecruitment::where('infoable_type', $this->modelName)->first()
            ),

        ];
    }
}
