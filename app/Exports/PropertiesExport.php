<?php

namespace App\Exports;

use App\Models\Property;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PropertiesExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Property::select(
            'unit_code',
            'unit_type',
            'phase',
            'floor',
            'area',
            'received',
            'paid',
            'over_payment',
            'down_payment',
            'installments',
            'remaining',
            'maintenance',
            'total',
            'notes',
            'client_number',
            'region',
            'last_updated',
            'compound_name',
            'project_name'
        )->get();
    }

    /**
     * @return array
     */
    public function headings(): array
    {
        return [
            'كود الوحدة',
            'نوع الوحدة',
            'المرحلة',
            'الدور',
            'المساحة',
            'استلام',
            'المدفوع',
            'الاوفر',
            'المقدم',
            'الاقساط',
            'المتبقى',
            'الصيانة',
            'الاجمالى',
            'ملاحظات',
            'رقم العميل',
            'المنطقة',
            'تاريخ آخر تحديث',
            'اسم الكمبوند',
            'اسم المشروع',
        ];
    }
}
