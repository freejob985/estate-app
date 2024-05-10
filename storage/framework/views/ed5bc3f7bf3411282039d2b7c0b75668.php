<?php $__env->startSection('content'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dropzone Example</title>
    <!-- تضمين Dropzone CSS من CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.css">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <!-- تضمين toastr.js CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
<body>
    <h1>تحميل الملفات باستخدام Dropzone.js</h1>
    <!-- صندوق الإسقاط -->
    <form action="<?php echo e(route('properties.upload-images', $property->id)); ?>" class="dropzone" id="myDropzone" enctype="multipart/form-data">
    </form>

    <!-- تضمين Dropzone JS من CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/min/dropzone.min.js"></script>
    <!-- تضمين toastr.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <!-- تضمين axios -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script>
        // تكوين Dropzone
        Dropzone.options.myDropzone = {
            maxFilesize: 2, // حد أقصى لحجم الملف (بالميغابايت)
            acceptedFiles: ".jpg, .png, .gif", // أنواع الملفات المقبولة
            addRemoveLinks: true, // عرض روابط لإزالة الملفات
            maxFiles: 10, // الحد الأقصى للملفات المسموح برفعها في كل مرة
            sending: function(file, xhr, formData) {
                formData.append('_token', '<?php echo e(csrf_token()); ?>');
                formData.append('images[]', file); // إرسال الملف كعنصر في مصفوفة
            },
            init: function() {
                this.on("sendingmultiple", function(data, xhr, formData) {
                    formData.append("_token", "<?php echo e(csrf_token()); ?>");
                });
                this.on("successmultiple", function(files, response) {
                    toastr.success('تم رفع الصور بنجاح');
                });
                this.on("errormultiple", function(files, response, errorMessages) {
                    if (response.status === 422) {
                        var errors = response.responseJSON.errors;
                        for (var i = 0; i < errors.length; i++) {
                            toastr.error(errors[i]);
                        }
                    } else {
                        toastr.error('حدث خطأ أثناء رفع الصور: ' + errorMessages);
                    }
                });
            }
        };
        // AJAX request
        Dropzone.options.myDropzone = {
            url: "<?php echo e(route('properties.upload-images', $property->id)); ?>",
            headers: {
                'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?>"
            },
            success: function(file, response) {
                toastr.success('تم رفع الصور بنجاح');
            },
            error: function(file, errorMessage) {
                if (errorMessage.status === 422) {
                    var errors = errorMessage.responseJSON.errors;
                    for (var i = 0; i < errors.length; i++) {
                        toastr.error(errors[i]);
                    }
                } else {
                    toastr.error('حدث خطأ أثناء رفع الصور: ' + errorMessage.message);
                }
            }
        };
    </script>
</body>
</html>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\server\htdocs\estate-app\resources\views/properties/upload-images.blade.php ENDPATH**/ ?>