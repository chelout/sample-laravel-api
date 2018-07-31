<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class BaseResourceCollection extends ResourceCollection
{
    /**
     * @var int
     */
    protected $meta;

    /**
     * Create a new resource instance.
     *
     * @param $resource
     * @param $itemsCount
     */
    public function __construct($resource, $meta = [])
    {
        parent::__construct($resource);

        $this->meta = $meta;
    }
}
