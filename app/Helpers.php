<?php

// app/Helpers.php

if (!function_exists('renderPropertyDetails')) {
    function renderPropertyDetails($property)
    {
        $output = '<div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="viewModalLabel">تفاصيل العقار</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>كود الوحدة</th>
                                            <td>' . $property->unit_code . '</td>
                                        </tr>
                                        <tr>
                                            <th>نوع الوحدة</th>
                                            <td>' . $property->unit_type . '</td>
                                        </tr>
                                        <tr>
                                            <th>المرحلة</th>
                                            <td>' . $property->phase . '</td>
                                        </tr>
                                        <tr>
                                            <th>الدور</th>
                                            <td>' . $property->floor . '</td>
                                        </tr>
                                        <tr>
                                            <th>المساحة</th>
                                            <td>' . $property->area . '</td>
                                        </tr>
                                        <tr>
                                            <th>استلام</th>
                                            <td>' . $property->received . '</td>
                                        </tr>
                                        <tr>
                                            <th>المدفوع</th>
                                            <td>' . $property->paid . '</td>
                                        </tr>
                                        <tr>
                                            <th>الاوفر</th>
                                            <td>' . $property->over_payment . '</td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-md-6">
                                    <table class="table table-bordered">
                                        <tr>
                                            <th>المقدم</th>
                                            <td>' . $property->down_payment . '</td>
                                        </tr>
                                        <tr>
                                            <th>الاقساط</th>
                                            <td>' . $property->installments . '</td>
                                        </tr>
                                        <tr>
                                            <th>المتبقى</th>
                                            <td>' . $property->remaining . '</td>
                                        </tr>
                                        <tr>
                                            <th>الصيانة</th>
                                            <td>' . $property->maintenance . '</td>
                                        </tr>
                                        <tr>
                                            <th>الاجمالى</th>
                                            <td>' . $property->total . '</td>
                                        </tr>
                                        <tr>
                                            <th>ملاحظات</th>
                                            <td>' . $property->notes . '</td>
                                        </tr>
                                        <tr>
                                            <th>رقم العميل</th>
                                            <td>' . $property->client_number . '</td>
                                        </tr>
                                        <tr>
                                            <th>المنطقة</th>
                                            <td>' . $property->region . '</td>
                                        </tr>
                                        <tr>
                                            <th>تاريخ آخر تحديث</th>
                                            <td>' . $property->last_updated . '</td>
                                        </tr>
                                        <tr>
                                            <th>اسم الكمبوند</th>
                                            <td>' . $property->compound_name . '</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            ' . renderPropertyImages($property) . '
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
                        </div>
                    </div>
                </div>';

        return $output;
    }
}

if (!function_exists('renderPropertyImages')) {
    function renderPropertyImages($property)
    {
        $output = '';

        if ($property->images->count() > 0) {
            $output .= '<div class="row mt-3">
                            <div class="col-md-12">
                                <h5>الصور</h5>';

            foreach ($property->images as $image) {
                $output .= '<img src="' . asset('storage/' . $image->image_path) . '" alt="Property Image" class="img-fluid mr-2 mb-2" style="max-height: 150px;">';
            }

            $output .= '</div>
                        </div>';
        }

        return $output;
    }
}
