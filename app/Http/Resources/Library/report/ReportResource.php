<?php

namespace App\Http\Resources\Library\report;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReportResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [
            'total_books' => $this->resource,
        ];
    }
}
