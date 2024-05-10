<?php $__env->startSection('content'); ?>
<!--  BEGIN CONTENT AREA  -->
<div id="content" class="main-content">

    <div class="layout-px-spacing">

        <div class="row layout-top-spacing" id="cancel-row">

            <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
<a href="<?php echo e(route('properties.create')); ?>" class="btn btn-primary">
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
                                <?php $__currentLoopData = $properties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $property): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><a href="<?php echo e(route('properties.show', $property->id)); ?>" class="btn btn-primary"><?php echo e($property->project_name); ?></td>
                                    <td><?php echo e($property->unit_code); ?></td>
                                    <td><?php echo e($property->unit_type); ?></td>
                                    <td><?php echo e($property->client_number); ?></td>
                                    <td>
<a href="<?php echo e(route('properties.images.upload.form', $property->id)); ?>" class="btn btn-primary">رفع صور</a>
                                        <a href="<?php echo e(route('properties.edit', $property->id)); ?>" class="btn btn-primary">تعديل</a>
                                        <form action="<?php echo e(route('properties.destroy', $property->id)); ?>" method="POST" style="display: inline-block;">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('هل أنت متأكد من حذف هذا العقار؟')">حذف</button>
                                        </form>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--  END CONTENT AREA  -->
<?php $__env->stopSection(); ?>

<?php $__env->startPush('css'); ?>
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
<?php $__env->stopPush(); ?>

<?php $__env->startPush('js'); ?>
<?php if(session('success')): ?>
    <script>
        toastr.success("<?php echo e(session('success')); ?>");
    </script>
<?php endif; ?>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\server\htdocs\estate-app\resources\views/welcome.blade.php ENDPATH**/ ?>