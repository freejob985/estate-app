@extends('layout')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">تفاصيل العقار</div>

                    <div class="card-body">
                        <table class="table table-striped">
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

<div class="row">
    <div class="col-md-12">
        <h3>صور العقار</h3>
        @if ($property->images->isNotEmpty())
            @foreach ($property->images as $image)
                <a href="{{ asset($image->image_path) }}" data-lightbox="property-images" data-title="{{ $property->unit_code }}">
                    <img src="{{ asset($image->image_path) }}" class="img-thumbnail" style="max-width: 150px; margin-right: 10px;">
                </a>
                <form action="{{ route('property-images.destroy', $image) }}" method="POST" style="display: inline-block;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('هل أنت متأكد من حذف هذه الصورة؟')">حذف</button>
                </form>
            @endforeach
        @else
            <p>لا توجد صور لهذا العقار حاليًا.</p>
        @endif
    </div>
</div>
<a href="{{ route('properties.export.pdf', $property) }}">تصدير إلى PDF</a>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" integrity="sha512-ZKX+BvQihRJPA8CROKBhDNvoc2aDMOdAlcm7TUQY+35XYtrd3yh95QOOhsPDQY9QnKE0Wqag9y38OIgEvb88cA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<style>
@import url('https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap');
*{
  font-family: "Cairo", sans-serif;

}
</style>
@endpush

@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

@if (session('success'))
    <script>
        toastr.success("{{ session('success') }}");
    </script>
@endif
@endpush

