<?php $__env->startSection('content'); ?>
<!--  BEGIN CONTENT AREA  -->
<div id="content" class="main-content">
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing" id="cancel-row">
            <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
                <div class="widget-content widget-content-area br-6">
                    <div class="table-responsive mb-4 mt-4">
                        <h2>تعديل ممتلك</h2>
                        <form method="POST" action="<?php echo e(route('properties.update', $property->id)); ?>" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PUT'); ?>

                            <div class="form-group">
                                <label for="project_name">اسم المشروع</label>
                                <input type="text" name="project_name" id="project_name" class="form-control" value="<?php echo e(old('project_name', $property->project_name)); ?>">
                                <?php $__errorArgs = ['project_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="form-group">
                                <label for="unit_code">رمز الوحدة</label>
                                <input type="text" name="unit_code" id="unit_code" class="form-control" value="<?php echo e(old('unit_code', $property->unit_code)); ?>">
                                <?php $__errorArgs = ['unit_code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="form-group">
                                <label for="unit_type">نوع الوحدة</label>
                                <input type="text" name="unit_type" id="unit_type" class="form-control" value="<?php echo e(old('unit_type', $property->unit_type)); ?>">
                                <?php $__errorArgs = ['unit_type'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="form-group">
                                <label for="phase">المرحلة</label>
                                <input type="text" name="phase" id="phase" class="form-control" value="<?php echo e(old('phase', $property->phase)); ?>">
                                <?php $__errorArgs = ['phase'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="form-group">
                                <label for="floor">الطابق</label>
                                <input type="text" name="floor" id="floor" class="form-control" value="<?php echo e(old('floor', $property->floor)); ?>">
                                <?php $__errorArgs = ['floor'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="form-group">
                                <label for="area">المساحة</label>
                                <input type="number" name="area" id="area" class="form-control" value="<?php echo e(old('area', $property->area)); ?>">
                                <?php $__errorArgs = ['area'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="form-group">
                                <label for="received">المبلغ المستلم</label>
                                <input type="number" name="received" id="received" class="form-control" value="<?php echo e(old('received', $property->received)); ?>">
                                <?php $__errorArgs = ['received'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="form-group">
                                <label for="paid">المبلغ المدفوع</label>
                                <input type="number" name="paid" id="paid" class="form-control" value="<?php echo e(old('paid', $property->paid)); ?>">
                                <?php $__errorArgs = ['paid'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="form-group">
                                <label for="over_payment">المبلغ الزائد</label>
                                <input type="number" name="over_payment" id="over_payment" class="form-control" value="<?php echo e(old('over_payment', $property->over_payment)); ?>">
                                <?php $__errorArgs = ['over_payment'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="form-group">
                                <label for="down_payment">الدفعة المقدمة</label>
                                <input type="number" name="down_payment" id="down_payment" class="form-control" value="<?php echo e(old('down_payment', $property->down_payment)); ?>">
                                <?php $__errorArgs = ['down_payment'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="form-group">
                                <label for="installments">الأقساط</label>
                                <input type="number" name="installments" id="installments" class="form-control" value="<?php echo e(old('installments', $property->installments)); ?>">
                                <?php $__errorArgs = ['installments'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="form-group">
                                <label for="remaining">المبلغ المتبقي</label>
                                <input type="number" name="remaining" id="remaining" class="form-control" value="<?php echo e(old('remaining', $property->remaining)); ?>">
                                <?php $__errorArgs = ['remaining'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="form-group">
                                <label for="maintenance">رسوم الصيانة</label>
                                <input type="number" name="maintenance" id="maintenance" class="form-control" value="<?php echo e(old('maintenance', $property->maintenance)); ?>">
                                <?php $__errorArgs = ['maintenance'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="form-group">
                                <label for="total">المجموع</label>
                                <input type="number" name="total" id="total" class="form-control" value="<?php echo e(old('total', $property->total)); ?>">
                                <?php $__errorArgs = ['total'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="form-group">
                                <label for="notes">ملاحظات</label>
                                <textarea name="notes" id="notes" class="form-control"><?php echo e(old('notes', $property->notes)); ?></textarea>
                                <?php $__errorArgs = ['notes'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <div class="form-group">
                                <label for="client_number">رقم العميل</label>
                                <input type="text" name="client_number" id="client_number" class="form-control" value="<?php echo e(old('client_number', $property->client_number)); ?>">
                                <?php $__errorArgs = ['client_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            </div>

                            <divclass="form-group">
                               <label for="region">المنطقة</label>
                               <input type="text" name="region" id="region" class="form-control" value="<?php echo e(old('region', $property->region)); ?>">
                               <?php $__errorArgs = ['region'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                   <span class="text-danger"><?php echo e($message); ?></span>
                               <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                           </div>

                           <div class="form-group">
                               <label for="last_updated">آخر تحديث</label>
                               <input type="date" name="last_updated" id="last_updated" class="form-control" value="<?php echo e(old('last_updated', $property->last_updated)); ?>">
                               <?php $__errorArgs = ['last_updated'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                   <span class="text-danger"><?php echo e($message); ?></span>
                               <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                           </div>

                           <div class="form-group">
                               <label for="compound_name">اسم المجمع</label>
                               <input type="text" name="compound_name" id="compound_name" class="form-control" value="<?php echo e(old('compound_name', $property->compound_name)); ?>">
                               <?php $__errorArgs = ['compound_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                   <span class="text-danger"><?php echo e($message); ?></span>
                               <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                           </div>

                           <div class="form-group">
                               <label for="images">صور الوحدة</label>
                               <input type="file" name="images[]" id="images" class="form-control" multiple>
                               <?php $__errorArgs = ['images.*'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                   <span class="text-danger"><?php echo e($message); ?></span>
                               <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
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
<?php $__env->stopSection(); ?>
<?php $__env->startPush('css'); ?>
<style>
@import url('https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap');
*{
  font-family: "Cairo", sans-serif;

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

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\server\htdocs\estate-app\resources\views/properties/edit.blade.php ENDPATH**/ ?>