<?php

namespace App\Transformers\BaseEnums;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Collection;

class BaseEnums extends JsonResource
{
    protected string $labelKey;

    public function __construct($resource, $labelKey = 'label')
    {
        parent::__construct($resource);
        $this->labelKey = $labelKey;
    }

    public function toArray($request)
    {
        $resource = $this->resource;

        return [
            "label" => $resource->getTranslation($this->labelKey, app()->getLocale()),
            "value" => $resource->id,
        ];
    }

    /**
      */
    public static function collectionFrom(Collection $items, string $labelKey = 'label')
    {
        return $items->map(fn($item) => new static($item, $labelKey))->values();
    }
}
