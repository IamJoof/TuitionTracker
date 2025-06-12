<?php

namespace App\DataTransferObjects;

class StudentData
{
    public function __construct(
        public readonly ?string $lrn_number,
        public readonly string  $student_id_number,
        public readonly string  $first_name,
        public readonly ?string $middle_name,
        public readonly string  $last_name,
        public readonly ?string $suffix,
        public readonly string  $date_of_birth,
        public readonly string  $gender,
        public readonly string  $year_level,
        public readonly string  $status,
        public readonly ?string $contact_number,
        public readonly bool    $is_discounted,
        public readonly ?string $address,
        public readonly ?int    $created_by_user_id,
        public readonly ?int    $current_academic_year_id

    ){}

    public static function fromArray(array $data): self
    {
        return new self(
            $data['lrn_number'] ?? null,
            $data['student_id_number'],
            $data['first_name'],
            $data['middle_name'] ?? null,
            $data['last_name'],
            $data['suffix'] ?? null,
            $data['date_of_birth'],
            $data['gender'],
            $data['year_level'],
            $data['status'],
            $data['contact_number'] ?? null,
            $data['is_discounted'] ?? false,
            $data['address'] ?? null,
            $data['created_by_user_id'] ?? null,
            $data['current_academic_year_id'] ?? null
        );
    }
}