@extends('layout')

@section('content')
    <style>
        .modal-header {
            background-color: #3f51b5;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.5rem 1rem;
        }

        .modal-header .close {
            color: white;
            opacity: 1;
            font-size: 1.5rem;
            font-weight: 700;
            line-height: 1;
            text-shadow: none;
        }

        .modal-header .modal-title {
            margin-bottom: 0;
        }
    </style>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4>قائمة العقارات</h4>
                            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#createModal">إضافة عقار جديد</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <form action="{{ route('properties.index') }}" method="GET">
                                    <div class="input-group">
                                        <input type="text" name="search" class="form-control" placeholder="البحث..." value="{{ request()->query('search') }}">
                                        <div class="input-group-append">
                                            <button type="submit" class="btn btn-primary">بحث</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>كود الوحدة</th>
                                <th>نوع الوحدة</th>
                                <th>المرحلة</th>
                                <th>الدور</th>
                                <th>المساحة</th>
                                <th>استلام</th>
                                <th>الإجراءات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse ($properties as $property)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><a href="{{ route('properties.show', $property->id) }}" class="btn btn-sm btn-primary">{{ $property->unit_code }}</td>
                                    <td>{{ $property->unit_type }}</td>
                                    <td>{{ $property->phase }}</td>
                                    <td>{{ $property->floor }}</td>
                                    <td>{{ $property->area }}</td>
                                    <td>{{ $property->received }}</td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#viewModal" data-id="{{ $property->id }}">عرض</a>                                        <a href="#" class="btn btn-sm btn-success" data-toggle="modal" data-target="#editModal-{{ $property->id }}">تعديل</a>
                                        <form action="{{ route('properties.destroy', $property->id) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('هل أنت متأكد من حذف هذا العقار؟')">حذف</button>
                                        </form>
                                    </td>
                                </tr>

                                <!-- Modal لعرض تفاصيل العقار -->


                                <!-- Modal لتعديل العقار -->
                          <!-- Modal لتعديل العقار -->
<!-- Modal لتعديل العقار -->
<div class="modal fade" id="editModal-{{ $property->id }}" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">تعديل العقار</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('properties.update', $property->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
<div class="form-group">
    <label for="project_name">اسم المشروع</label>
    <input type="text" class="form-control @error('project_name') is-invalid @enderror" id="project_name" name="project_name" value="{{ $property->project_name }}" required>
    @error('project_name')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
                    <div class="form-group">
                        <label for="unit_code">كود الوحدة</label>
                        <input type="text" class="form-control @error('unit_code') is-invalid @enderror" id="unit_code" name="unit_code" value="{{ $property->unit_code }}" required>
                        @error('unit_code')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="unit_type">نوع الوحدة</label>
                        <input type="text" class="form-control @error('unit_type') is-invalid @enderror" id="unit_type" name="unit_type" value="{{ $property->unit_type }}" required>
                        @error('unit_type')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="phase">المرحلة</label>
                        <input type="text" class="form-control @error('phase') is-invalid @enderror" id="phase" name="phase" value="{{ $property->phase }}" required>
                        @error('phase')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="floor">الدور</label>
                        <input type="text" class="form-control @error('floor') is-invalid @enderror" id="floor" name="floor" value="{{ $property->floor }}" required>
                        @error('floor')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="area">المساحة</label>
                        <input type="number" class="form-control @error('area') is-invalid @enderror" id="area" name="area" value="{{ $property->area }}" required>
                        @error('area')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="received">استلام</label>
                        <input type="number" class="form-control @error('received') is-invalid @enderror" id="received" name="received" value="{{ $property->received }}">
                        @error('received')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="paid">المدفوع</label>
                        <input type="number" class="form-control @error('paid') is-invalid @enderror" id="paid" name="paid" value="{{ $property->paid }}">
                        @error('paid')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="over_payment">الاوفر</label>
                        <input type="number" class="form-control @error('over_payment') is-invalid @enderror" id="over_payment" name="over_payment" value="{{ $property->over_payment }}">
                        @error('over_payment')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="down_payment">المقدم</label>
                        <input type="number" class="form-control @error('down_payment') is-invalid @enderror" id="down_payment" name="down_payment" value="{{ $property->down_payment }}">
                        @error('down_payment')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="installments">الاقساط</label>
                        <input type="number" class="form-control @error('installments') is-invalid @enderror" id="installments" name="installments" value="{{ $property->installments }}">
                        @error('installments')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="remaining">المتبقى</label>
                        <input type="number" class="form-control @error('remaining') is-invalid @enderror" id="remaining" name="remaining" value="{{ $property->remaining }}">
                        @error('remaining')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="maintenance">الصيانة</label>
                        <input type="number" class="form-control @error('maintenance') is-invalid @enderror" id="maintenance" name="maintenance" value="{{ $property->maintenance }}">
                        @error('maintenance')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="total">الاجمالى</label>
                        <input type="number" class="form-control @error('total') is-invalid @enderror" id="total" name="total" value="{{ $property->total }}">
                        @error('total')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="notes">ملاحظات</label>
                        <textarea class="form-control @error('notes') is-invalid @enderror" id="notes" name="notes">{{ $property->notes }}</textarea>
                        @error('notes')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="client_number">رقم العميل</label>
                        <input type="text" class="form-control @error('client_number') is-invalid @enderror" id="client_number" name="client_number" value="{{ $property->client_number }}" required>
                        @error('client_number')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
                    <button type="submit" class="btn btn-primary">حفظ التغييرات</button>
                </div>
            </form>
        </div>
    </div>
</div>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center">لا توجد عقارات</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                        {{ $properties->links('vendor.pagination.bootstrap-4') }}

                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel" aria-hidden="true">
        <!-- محتويات النافذة المنبثقة سيتم تحميلها عبر AJAX -->
    </div>

    <!-- Modal لإضافة عقار جديد -->
    <!-- Modal لإضافة عقار جديد -->
    <div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createModalLabel">إضافة عقار جديد</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="
    display: contents;
">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('properties.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">

<div class="form-group">
    <label for="project_name">اسم المشروع</label>
    <input type="text" class="form-control @error('project_name') is-invalid @enderror" id="project_name" name="project_name" required>
    @error('project_name')
    <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
                        <div class="form-group">
                            <label for="unit_code">كود الوحدة</label>
                            <input type="text" class="form-control @error('unit_code') is-invalid @enderror" id="unit_code" name="unit_code" required>
                            @error('unit_code')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="unit_type">نوع الوحدة</label>
                            <input type="text" class="form-control @error('unit_type') is-invalid @enderror" id="unit_type" name="unit_type" required>
                            @error('unit_type')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="phase">المرحلة</label>
                            <input type="text" class="form-control @error('phase') is-invalid @enderror" id="phase" name="phase" required>
                            @error('phase')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="floor">الدور</label>
                            <input type="text" class="form-control @error('floor') is-invalid @enderror" id="floor" name="floor" required>
                            @error('floor')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="area">المساحة</label>
                            <input type="number" class="form-control @error('area') is-invalid @enderror" id="area" name="area" required>
                            @error('area')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="received">استلام</label>
                            <input type="number" class="form-control @error('received') is-invalid @enderror" id="received" name="received">
                            @error('received')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="paid">المدفوع</label>
                            <input type="number" class="form-control @error('paid') is-invalid @enderror" id="paid" name="paid">
                            @error('paid')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="over_payment">الاوفر</label>
                            <input type="number" class="form-control @error('over_payment') is-invalid @enderror" id="over_payment" name="over_payment">
                            @error('over_payment')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="down_payment">المقدم</label>
                            <input type="number" class="form-control @error('down_payment') is-invalid @enderror" id="down_payment" name="down_payment">
                            @error('down_payment')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="installments">الاقساط</label>
                            <input type="number" class="form-control @error('installments') is-invalid @enderror" id="installments" name="installments">
                            @error('installments')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="remaining">المتبقى</label>
                            <input type="number" class="form-control @error('remaining') is-invalid @enderror" id="remaining" name="remaining">
                            @error('remaining')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="maintenance">الصيانة</label>
                            <input type="number" class="form-control @error('maintenance') is-invalid @enderror" id="maintenance" name="maintenance">
                            @error('maintenance')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="total">الاجمالى</label>
                            <input type="number" class="form-control @error('total') is-invalid @enderror" id="total" name="total">
                            @error('total')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="notes">ملاحظات</label>
                            <textarea class="form-control @error('notes') is-invalid @enderror" id="notes" name="notes"></textarea>
                            @error('notes')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="client_number">رقم العميل</label>
                            <input type="text" class="form-control @error('client_number') is-invalid @enderror" id="client_number" name="client_number" required>
                            @error('client_number')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="region">المنطقة</label>
                            <input type="text" class="form-control @error('region') is-invalid @enderror" id="region" name="region" required>
                            @error('region')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="last_updated">تاريخ آخر تحديث</label>
                            <input type="date" class="form-control @error('last_updated') is-invalid @enderror" id="last_updated" name="last_updated">
                            @error('last_updated')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="compound_name">اسم الكمبوند</label>
                            <input type="text" class="form-control @error('compound_name') is-invalid @enderror" id="compound_name" name="compound_name" required>
                            @error('compound_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="images">الصور</label>
                            <input type="file" class="form-control-file @error('images') is-invalid @enderror" id="images" name="images[]" multiple>
                            @error('images')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
                        <button type="submit" class="btn btn-primary">حفظ</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    @push('js')
        <script>
            $(document).ready(function() {
                $(document).on('click', 'a[data-toggle="modal"]', function(e) {
                    e.preventDefault();
                    var propertyId = $(this).data('id');
                    $.ajax({
                        url: '/estate-app/public/properties/' + propertyId + '/show',
                        method: 'GET',
                        success: function(response) {
                            $('#viewModal').html(response.html);
                            $('#viewModal').modal('show');
                        },
                        error: function() {
                            alert('حدث خطأ أثناء جلب البيانات');
                        }
                    });
                });
            });
            $(document).ready(function() {
                $(document).on('click', 'a[data-toggle="modal"]', function(e) {
                    e.preventDefault();
                    var propertyId = $(this).data('id');
                    var modalUrl = '{{ route('properties.show.modal', ':propertyId') }}'.replace(':propertyId', propertyId);

                    $.get(modalUrl, function(data) {
                        $('#viewModal').html(data.html);
                        $('#viewModal').modal('show');
                    });
                });

     $('#ex').on('click', function(e) {
                if ($(e.target).hasClass('modal')) {
                    $('#viewModal').modal('hide');
                }
            });
            });

        </script>

    @endpush

@endsection
