<?php

namespace App\Imports;

use App\Models\Property;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PropertiesImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Property([
            'unit_code' => $row['unit_code'],
            'unit_type' => $row['unit_type'],
            'phase' => $row['phase'],
            'floor' => $row['floor'],
            'area' => $row['area'],
            'received' => $row['received'],
            'paid' => $row['paid'],
            'over_payment' => $row['over_payment'],
            'down_payment' => $row['down_payment'],
            'installments' => $row['installments'],
            'remaining' => $row['remaining'],
            'maintenance' => $row['maintenance'],
            'total' => $row['total'],
            'notes' => $row['notes'],
            'client_number' => $row['client_number'],
            'region' => $row['region'],
            'last_updated' => $row['last_updated'],
            'compound_name' => $row['compound_name'],
            'project_name' => $row['project_name'],
            'user_id' => Auth::user()->id,
        ]);
    }
}
