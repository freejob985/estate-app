<?php $__env->startSection('content'); ?>
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

<div class="row">
    <div class="col-md-12">
        <h3>صور العقار</h3>
        <?php if($property->images->isNotEmpty()): ?>
            <?php $__currentLoopData = $property->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(asset($image->image_path)); ?>" data-lightbox="property-images" data-title="<?php echo e($property->unit_code); ?>">
                    <img src="<?php echo e(asset($image->image_path)); ?>" class="img-thumbnail" style="max-width: 150px; margin-right: 10px;">
                </a>
                <form action="<?php echo e(route('property-images.destroy', $image)); ?>" method="POST" style="display: inline-block;">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('DELETE'); ?>
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('هل أنت متأكد من حذف هذه الصورة؟')">حذف</button>
                </form>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
            <p>لا توجد صور لهذا العقار حاليًا.</p>
        <?php endif; ?>
    </div>
</div>
<a href="<?php echo e(route('properties.export.pdf', $property)); ?>">تصدير إلى PDF</a>


                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('css'); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css" integrity="sha512-ZKX+BvQihRJPA8CROKBhDNvoc2aDMOdAlcm7TUQY+35XYtrd3yh95QOOhsPDQY9QnKE0Wqag9y38OIgEvb88cA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<style>
@import url('https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap');
*{
  font-family: "Cairo", sans-serif;

}
.table {
    width: 100%;
    margin-bottom: 1rem;
    color: #ffffff !important;
}
.table > tbody > tr > td {
    border: none;
    color: #ffffff !important;
    font-size: 15px;
    letter-spacing: 1px;
}
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('js'); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<?php if(session('success')): ?>
    <script>
        toastr.success("<?php echo e(session('success')); ?>");
    </script>
<?php endif; ?>
<?php $__env->stopPush(); ?>


<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\server\htdocs\estate-app\resources\views/properties/show.blade.php ENDPATH**/ ?>