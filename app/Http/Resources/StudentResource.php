<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StudentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'                                =>               $this->id,
            'lrn_number'                        =>               $this->lrn_number,
            'student_id_number'                 =>               $this->student_id_number,
            'first_name'                        =>               $this->first_name,
            'middle_name'                       =>               $this->middle_name,
            'last_name'                         =>               $this->last_name,
            'suffix'                            =>               $this->suffix,
            'full_name'                         =>               trim("{$this->first_name} {$this->middle_name} {$this->last_name}"),
            'date_of_birth'                     =>               $this->date_of_birth,
            'gender'                            =>               $this->gender,
            'year_level'                        =>               $this->year_level,
            'status'                            =>               $this->status,
            'contact_number'                    =>               $this->contact_number,
            'is_discounted'                     =>               $this->is_discounted,
            'address'                           =>               $this->address,
            'created_by_user_id'                =>               $this->created_by_user_id,
            'current_academic_year_id'          =>               $this->current_academic_year_id,
            'created_at'                        =>               $this->created_at->toDateTimeString(),
            'updated_at'                        =>               $this->updated_at->toDateTimeString()
        ];
    }
}
