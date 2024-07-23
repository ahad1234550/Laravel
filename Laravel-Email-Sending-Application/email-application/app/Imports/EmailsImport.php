<?php

namespace App\Imports;

use App\Models\Email;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class EmailsImport implements ToModel, WithHeadingRow
{
    protected $userGroupId;

    public function __construct($userGroupId)
    {
        $this->userGroupId = $userGroupId;
    }

    public function model(array $row)
    {
        return new Email([
            'email' => $row['email'] ?? null, 
            'user_group_id' => $this->userGroupId,
        ]);
    }
}
