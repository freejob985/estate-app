@extends('layout')

@section('content')
   <div class="container">
       <div class="row">
           <div class="col-md-12">
               <div class="card">
                   <div class="card-header">
                       <h4>تفاصيل الوحدة العقارية</h4>
                   </div>
                   <div class="card-body">
                       <table class="table table-striped table-bordered">
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
                               <th>الدور</th>
                               <td>{{ $property->floor }}</td>
                           </tr>
                           <tr>
                               <th>المساحة</th>
                               <td>{{ $property->area }}</td>
                           </tr>
                           <tr>
                               <th>استلام</th>
                               <td>{{ $property->received }}</td>
                           </tr>
                           <tr>
                               <th>المدفوع</th>
                               <td>{{ $property->paid }}</td>
                           </tr>
                           <tr>
                               <th>الأوفر</th>
                               <td>{{ $property->over_payment }}</td>
                           </tr>
                           <tr>
                               <th>المقدم</th>
                               <td>{{ $property->down_payment }}</td>
                           </tr>
                           <tr>
                               <th>الأقساط</th>
                               <td>{{ $property->installments }}</td>
                           </tr>
                           <tr>
                               <th>المتبقي</th>
                               <td>{{ $property->remaining }}</td>
                           </tr>
                           <tr>
                               <th>الصيانة</th>
                               <td>{{ $property->maintenance }}</td>
                           </tr>
                           <tr>
                               <th>الإجمالي</th>
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
                               <th>تاريخ آخر تحديث</th>
                               <td>{{ optional($property->last_updated)->format('Y-m-d') ?: '-' }}</td>
                           </tr>
                           <tr>
                               <th>اسم الكمبوند</th>
                               <td>{{ $property->compound_name }}</td>
                           </tr>
                       </table>

                       @if($property->images->isNotEmpty())
                           <h5>صور الوحدة العقارية</h5>
                           <div class="row">
                               @foreach($property->images as $image)
                                   <div class="col-md-3 mb-3">
                                       <img src="{{ asset('storage/' . $image->image_path) }}" class="img-fluid" alt="Property Image">
                                   </div>
                               @endforeach
                           </div>
                       @endif
                   </div>
               </div>
           </div>
       </div>
   </div>
@endsection
