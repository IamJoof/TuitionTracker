<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class StudentCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'data' => $this->collection->transform (function ($student) {
                      return (new StudentResource($student))->toArray($request);
            }),
        ];
    }

    // This is for future pagination purpose only
    public function with($request): array
    {
        return [
            'meta' => [

                'current_page'      =>          $this->currentPage(),
                'last_page'         =>          $this->lastPage(),
                'per_page'          =>          $this->perPage(),
                'total'             =>          $this->total(),

            ]
        ];
    }
}
