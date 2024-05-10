<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>معلومات العقار</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap');

        body {
            font-family: 'Cairo', sans-serif;
            direction: rtl;
            text-align: right;
            font-size: 14px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 8px;
            text-align: right;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <table>
        <tbody>
            <tr>
                <th>اسم المشروع</th>
                <td>{{ $property->project_name }}</td>
            </tr>
            <tr>
                <th>كود الوحدة</th>
                <td>{{ $property->unit_code }}</td>
            </tr>
            <tr>
                <th>نوع الوحدة</th>
                <td>{{ $property->unit_type }}</td>
            </tr>
            <tr>
                <th>المرحلة</th>
                <td>{{ $property->phase }}</td>
            </tr>
            <tr>
                <th>الطابق</th>
                <td>{{ $property->floor }}</td>
            </tr>
            <tr>
                <th>المساحة</th>
                <td>{{ $property->area }}</td>
            </tr>
            <tr>
                <th>المبلغ المستلم</th>
                <td>{{ $property->received }}</td>
            </tr>
            <tr>
                <th>المبلغ المدفوع</th>
                <td>{{ $property->paid }}</td>
            </tr>
            <tr>
                <th>المبلغ الزائد</th>
                <td>{{ $property->over_payment }}</td>
            </tr>
            <tr>
                <th>الدفعة المقدمة</th>
                <td>{{ $property->down_payment }}</td>
            </tr>
            <tr>
                <th>الأقساط</th>
                <td>{{ $property->installments }}</td>
            </tr>
            <tr>
                <th>المبلغ المتبقي</th>
                <td>{{ $property->remaining }}</td>
            </tr>
            <tr>
                <th>رسوم الصيانة</th>
                <td>{{ $property->maintenance }}</td>
            </tr>
            <tr>
                <th>المجموع</th>
                <td>{{ $property->total }}</td>
            </tr>
            <tr>
                <th>ملاحظات</th>
                <td>{{ $property->notes }}</td>
            </tr>
            <tr>
                <th>رقم العميل</th>
                <td>{{ $property->client_number }}</td>
            </tr>
            <tr>
                <th>المنطقة</th>
                <td>{{ $property->region }}</td>
            </tr>
            <tr>
                <th>آخر تحديث</th>
                <td>{{ $property->last_updated }}</td>
            </tr>
            <tr>
                <th>اسم المجمع</th>
                <td>{{ $property->compound_name }}</td>
            </tr>
        </tbody>
    </table>
</body>
</html>
