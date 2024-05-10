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
                <td><?php echo e($property->project_name); ?></td>
            </tr>
            <tr>
                <th>كود الوحدة</th>
                <td><?php echo e($property->unit_code); ?></td>
            </tr>
            <tr>
                <th>نوع الوحدة</th>
                <td><?php echo e($property->unit_type); ?></td>
            </tr>
            <tr>
                <th>المرحلة</th>
                <td><?php echo e($property->phase); ?></td>
            </tr>
            <tr>
                <th>الطابق</th>
                <td><?php echo e($property->floor); ?></td>
            </tr>
            <tr>
                <th>المساحة</th>
                <td><?php echo e($property->area); ?></td>
            </tr>
            <tr>
                <th>المبلغ المستلم</th>
                <td><?php echo e($property->received); ?></td>
            </tr>
            <tr>
                <th>المبلغ المدفوع</th>
                <td><?php echo e($property->paid); ?></td>
            </tr>
            <tr>
                <th>المبلغ الزائد</th>
                <td><?php echo e($property->over_payment); ?></td>
            </tr>
            <tr>
                <th>الدفعة المقدمة</th>
                <td><?php echo e($property->down_payment); ?></td>
            </tr>
            <tr>
                <th>الأقساط</th>
                <td><?php echo e($property->installments); ?></td>
            </tr>
            <tr>
                <th>المبلغ المتبقي</th>
                <td><?php echo e($property->remaining); ?></td>
            </tr>
            <tr>
                <th>رسوم الصيانة</th>
                <td><?php echo e($property->maintenance); ?></td>
            </tr>
            <tr>
                <th>المجموع</th>
                <td><?php echo e($property->total); ?></td>
            </tr>
            <tr>
                <th>ملاحظات</th>
                <td><?php echo e($property->notes); ?></td>
            </tr>
            <tr>
                <th>رقم العميل</th>
                <td><?php echo e($property->client_number); ?></td>
            </tr>
            <tr>
                <th>المنطقة</th>
                <td><?php echo e($property->region); ?></td>
            </tr>
            <tr>
                <th>آخر تحديث</th>
                <td><?php echo e($property->last_updated); ?></td>
            </tr>
            <tr>
                <th>اسم المجمع</th>
                <td><?php echo e($property->compound_name); ?></td>
            </tr>
        </tbody>
    </table>
</body>
</html>
<?php /**PATH D:\server\htdocs\estate-app\resources\views/properties/pdf.blade.php ENDPATH**/ ?>