@extends('layout')
@section('content')
<!--  BEGIN CONTENT AREA  -->
<div id="content" class="main-content">
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing" id="cancel-row">
            <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
                <div class="widget-content widget-content-area br-6">
                    <div class="table-responsive mb-4 mt-4">
                        <h2>تعديل ممتلك</h2>
                        <form method="POST" action="{{ route('properties.update', $property->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="project_name">اسم المشروع</label>
                                <input type="text" name="project_name" id="project_name" class="form-control" value="{{ old('project_name', $property->project_name) }}">
                                @error('project_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="unit_code">رمز الوحدة</label>
                                <input type="text" name="unit_code" id="unit_code" class="form-control" value="{{ old('unit_code', $property->unit_code) }}">
                                @error('unit_code')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="unit_type">نوع الوحدة</label>
                                <input type="text" name="unit_type" id="unit_type" class="form-control" value="{{ old('unit_type', $property->unit_type) }}">
                                @error('unit_type')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="phase">المرحلة</label>
                                <input type="text" name="phase" id="phase" class="form-control" value="{{ old('phase', $property->phase) }}">
                                @error('phase')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="floor">الطابق</label>
                                <input type="text" name="floor" id="floor" class="form-control" value="{{ old('floor', $property->floor) }}">
                                @error('floor')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="area">المساحة</label>
                                <input type="number" name="area" id="area" class="form-control" value="{{ old('area', $property->area) }}">
                                @error('area')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="received">المبلغ المستلم</label>
                                <input type="number" name="received" id="received" class="form-control" value="{{ old('received', $property->received) }}">
                                @error('received')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="paid">المبلغ المدفوع</label>
                                <input type="number" name="paid" id="paid" class="form-control" value="{{ old('paid', $property->paid) }}">
                                @error('paid')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="over_payment">المبلغ الزائد</label>
                                <input type="number" name="over_payment" id="over_payment" class="form-control" value="{{ old('over_payment', $property->over_payment) }}">
                                @error('over_payment')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="down_payment">الدفعة المقدمة</label>
                                <input type="number" name="down_payment" id="down_payment" class="form-control" value="{{ old('down_payment', $property->down_payment) }}">
                                @error('down_payment')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="installments">الأقساط</label>
                                <input type="number" name="installments" id="installments" class="form-control" value="{{ old('installments', $property->installments) }}">
                                @error('installments')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="remaining">المبلغ المتبقي</label>
                                <input type="number" name="remaining" id="remaining" class="form-control" value="{{ old('remaining', $property->remaining) }}">
                                @error('remaining')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="maintenance">رسوم الصيانة</label>
                                <input type="number" name="maintenance" id="maintenance" class="form-control" value="{{ old('maintenance', $property->maintenance) }}">
                                @error('maintenance')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="total">المجموع</label>
                                <input type="number" name="total" id="total" class="form-control" value="{{ old('total', $property->total) }}">
                                @error('total')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="notes">ملاحظات</label>
                                <textarea name="notes" id="notes" class="form-control">{{ old('notes', $property->notes) }}</textarea>
                                @error('notes')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="client_number">رقم العميل</label>
                                <input type="text" name="client_number" id="client_number" class="form-control" value="{{ old('client_number', $property->client_number) }}">
                                @error('client_number')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <divclass="form-group">
                               <label for="region">المنطقة</label>
                               <input type="text" name="region" id="region" class="form-control" value="{{ old('region', $property->region) }}">
                               @error('region')
                                   <span class="text-danger">{{ $message }}</span>
                               @enderror
                           </div>

                           <div class="form-group">
                               <label for="last_updated">آخر تحديث</label>
                               <input type="date" name="last_updated" id="last_updated" class="form-control" value="{{ old('last_updated', $property->last_updated) }}">
                               @error('last_updated')
                                   <span class="text-danger">{{ $message }}</span>
                               @enderror
                           </div>

                           <div class="form-group">
                               <label for="compound_name">اسم المجمع</label>
                               <input type="text" name="compound_name" id="compound_name" class="form-control" value="{{ old('compound_name', $property->compound_name) }}">
                               @error('compound_name')
                                   <span class="text-danger">{{ $message }}</span>
                               @enderror
                           </div>

                           <div class="form-group">
                               <label for="images">صور الوحدة</label>
                               <input type="file" name="images[]" id="images" class="form-control" multiple>
                               @error('images.*')
                                   <span class="text-danger">{{ $message }}</span>
                               @enderror
                           </div>

                           <button type="submit" class="btn btn-primary">حفظ التغييرات</button>
                       </form>
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
</style>
@endpush

@push('js')
@if (session('success'))
    <script>
        toastr.success("{{ session('success') }}");
    </script>
@endif
@endpush
