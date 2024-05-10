@extends('layout')
@section('content')
<!--  BEGIN CONTENT AREA  -->
<div id="content" class="main-content">

    <div class="layout-px-spacing">

        <div class="row layout-top-spacing" id="cancel-row">

            <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
<a href="{{ route('properties.create') }}" class="btn btn-primary">
    <i class="fas fa-plus"></i> إضافة عقار جديد
</a>
                <div class="widget-content widget-content-area br-6">
                    <div class="table-responsive mb-4 mt-4">

                        <table id="default-ordering" class="table table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>اسم المشروع</th>
                                    <th>كود الوحدة</th>
                                    <th>نوع الوحدة</th>
                                    <th>رقم العميل</th>
                                    <th>الإجراءات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($properties as $property)
                                <tr>
                                    <td><a href="{{ route('properties.show', $property->id) }}" class="btn btn-primary">{{ $property->project_name }}</td>
                                    <td>{{ $property->unit_code }}</td>
                                    <td>{{ $property->unit_type }}</td>
                                    <td>{{ $property->client_number }}</td>
                                    <td>
<a href="{{ route('properties.images.upload.form', $property->id) }}" class="btn btn-primary">رفع صور</a>
                                        <a href="{{ route('properties.edit', $property->id) }}" class="btn btn-primary">تعديل</a>
                                        <form action="{{ route('properties.destroy', $property->id) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('هل أنت متأكد من حذف هذا العقار؟')">حذف</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--  END CONTENT AREA  -->
@endsection

@push('css')
<style>
@import url('https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap');
*{
  font-family: "Cairo", sans-serif;

}
.table > tbody > tr > td {
    border: none;
    color: #888ea8;
    font-size: 20px;
    letter-spacing: 1px;
}
</style>
@endpush

@push('js')
@if (session('success'))
    <script>
        toastr.success("{{ session('success') }}");
    </script>
@endif
@endpush
