
<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('student.multi_class_student'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('css'); ?>
    <style>
        .student_rec_card {
            border-radius: 6px;
            border: 1px solid var(--border_color);
            width: 100%;
        }

        .student_rec_header {
            padding: 12px;
            background: -webkit-linear-gradient(90deg, var(--gradient_1) 0%, var(--gradient_3) 51%, var(--gradient_2) 100%);
            background: -moz-linear-gradient(90deg, var(--gradient_1) 0%, var(--gradient_3) 51%, var(--gradient_2) 100%);
            background: -o-linear-gradient(90deg, var(--gradient_1) 0%, var(--gradient_3) 51%, var(--gradient_2) 100%);
            background: -ms-linear-gradient(90deg, var(--gradient_1) 0%, var(--gradient_3) 51%, var(--gradient_2) 100%);
            background: linear-gradient(90deg, var(--gradient_1) 0%, var(--gradient_3) 51%, var(--gradient_2) 100%);
        }

        .student_rec_footer {
            padding: 12px;
            margin-top: 16px;
            border-top: 1px solid var(--border_color);
        }

        .student_rec_content {
            padding: 16px;
            max-height: 300px;
            min-height: 300px;
        }

        .primary-btn.icon-only {
            padding: 1px 8px !important;
            right: 15px !important;
            bottom: 13px !important;
        }

        .common-checkbox~label {
            bottom: 13px;
        }
        .student-record-input > *{
            padding: 0px 5px
        }

        @media (max-width: 576px){
            .student-record-delete-btn{
                text-align: right!important;
            }
        }
    </style>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('mainContent'); ?>
    <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
    <section class="sms-breadcrumb mb-20 up_breadcrumb">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo app('translator')->get('student.multi_class_student'); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                    <a href="#"><?php echo app('translator')->get('student.student_information'); ?></a>
                    <a href="#"><?php echo app('translator')->get('student.multi_class_student'); ?></a>
                </div>
            </div>
        </div>
    </section>
    <section class="admin-visitor-area up_admin_visitor">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-lg-12">
                    <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'student.multi-class-student', 'method' => 'GET', 'enctype' => 'multipart/form-data', 'id' => 'infix_form'])); ?>

                    <div class="white-box">
                        <div class="row">
                            <div class="col-lg-6 col-sm-6">
                                <div class="main-title">
                                    <h3 class="mb-15"><?php echo app('translator')->get('common.select_criteria'); ?></h3>
                                </div>
                            </div>
            
                            <div class="col-lg-6 col-sm-6 text-right mt-sm-0">
                                <?php if(userPermission('student.delete-student-record')): ?>
                                    <a href="<?php echo e(route('student.delete-student-record')); ?>" class="primary-btn small fix-gr-bg">
                                        <span class="ti-plus pr-2"></span>
                                        <?php echo app('translator')->get('student.delete_student_record'); ?>
                                    </a>
                                <?php endif; ?>
                            </div>
            
                        </div>
                        <div class="row">



                            <?php if(moduleStatusCheck('University')): ?>
                                <?php if ($__env->exists(
                                    'university::common.session_faculty_depart_academic_semester_level',
                                    ['mt' => 'mt-30', 'hide' => ['USUB'], 'required' => ['USEC']]
                                )) echo $__env->make(
                                    'university::common.session_faculty_depart_academic_semester_level',
                                    ['mt' => 'mt-30', 'hide' => ['USUB'], 'required' => ['USEC']]
                                , \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <div class="col-lg-3 mt-25">
                                    <div class="primary_input ">
                                        <input class="primary_input_field" type="text" name="name"
                                            value="<?php echo e(isset($name) ? $name : ''); ?>">
                                        <label class="primary_input_label" for=""><?php echo app('translator')->get('student.search_by_name'); ?></label>

                                    </div>
                                </div>
                                <div class="col-lg-3 mt-25">
                                    <div class="primary_input md_mb_20">
                                        <input class="primary_input_field" type="text" name="roll_no"
                                            value="<?php echo e(isset($roll_no) ? $roll_no : ''); ?>">
                                        <label class="primary_input_label" for=""><?php echo app('translator')->get('student.search_by_roll_no'); ?></label>

                                    </div>
                                </div>
                            <?php else: ?>
                                <?php echo $__env->make('backEnd.common.search_criteria', [
                                    'div' => 'col-lg-3',
                                    'visiable' => ['academic', 'class', 'section', 'student'],
                                ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php endif; ?>
                            <div class="col-lg-12 mt-20 text-right">
                                <button type="submit" class="primary-btn small fix-gr-bg" id="btnsubmit">
                                    <span class="ti-search pr-2"></span>
                                    <?php echo app('translator')->get('common.search'); ?>
                                </button>
                            </div>
                        </div>
                    </div>
                    <?php echo e(Form::close()); ?>

                </div>
            </div>


            <?php if(@$students): ?>
                <div class="row mt-40">
                    <div class="col-lg-12">
                        <div class="white-box p-3">
                            <div class="row">
                                <?php $__currentLoopData = $students; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $student): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-xl-6 col-12 mb-20 d-flex">
                                        <?php echo Form::open([
                                            'route' => 'multi-record-store',
                                            'method' => 'POST',
                                            'class' => 'w-100 d-flex',
                                            'id' => 'form_' . $student->id,
                                        ]); ?>


                                        <div class="student_rec_card">
                                            <div
                                                class="student_rec_header d-flex align-items-center justify-content-between mb-3">
                                                <h5 class="mb-0 text-white"><?php echo e($student->full_name); ?>

                                                    <?php echo e($student->admission_no ? '(' . $student->admission_no . ')' : ''); ?></h5>
                                                <button class="primary-btn small fix-gr-bg addMore" type="button"
                                                    data-student_id="<?php echo e($student->id); ?>"><i class="ti-plus"></i>
                                                    <?php echo e(__('common.add')); ?></button>
                                            </div>
                                            <input type="hidden" id="student_id" name="student_id"
                                                value="<?php echo e($student->id); ?>">
                                            <input type="hidden" id="div_button"
                                                value="<?php echo e(generalSetting()->multiple_roll == 1 ? 'col-sm-4 col-6' : 'col-sm-3 col-6'); ?>">
                                            <input type="hidden" id="div_count"
                                                value="<?php echo e($student->id . $student->studentRecords->count() + 1); ?>">
                                            <input type="hidden" name="default" id="default_<?php echo e($student->id); ?>">
                                            <div class="student_rec_content" id="student_rec_content_<?php echo e($student->id); ?>">


                                                <?php echo $__env->make('backEnd.studentInformation.inc._multiple_class_record', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


                                                <div id="appendDiv_<?php echo e($student->id); ?>">

                                                </div>

                                            </div>
                                            <div
                                                class="student_rec_footer d-flex align-items-center justify-content-center">
                                                <button class="primary-btn small fix-gr-bg updateStudentRecord"
                                                    type="submit" data-student_id="<?php echo e($student->id); ?>"
                                                    data-loading-text="<i class='fa fa-spinner fa-spin '></i> Updating...">
                                                    <i class="ti-check"></i> <?php echo e(__('common.update')); ?></button>
                                            </div>
                                        </div>
                                        <?php echo Form::close(); ?>


                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
    </section>
    <div class="modal fade admin-query" id="deleteRecord">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><?php echo app('translator')->get('common.delete'); ?></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="text-center">
                        <h4><?php echo app('translator')->get('common.are_you_sure_to_delete'); ?></h4>
                    </div>
                    <div class="mt-40 d-flex justify-content-between">
                        <button type="button" class="primary-btn tr-bg" data-dismiss="modal"><?php echo app('translator')->get('common.cancel'); ?></button>
                        <form action="<?php echo e(route('student.multi-record-delete')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" id="remove_record_id">
                            <input type="hidden" id="remove_student_id">
                            <button type="submit" class="primary-btn fix-gr-bg"
                                id="removeBtnSubmit"><?php echo app('translator')->get('common.delete'); ?></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        $(document).ready(function() {

            $(document).on('click', '.addMore', function() {
                let student_id = $(this).data('student_id');
                let div_count = parseInt($('#div_count').val());
                let div_button = $('#div_button').val();

                var div = `<div class="row mb-4 align-items-end student-record-input" id="div_id_${student_id}${div_count}">
                           
                            <div class="${div_button}">
                                <div class="primary_input">
                                    <select class="primary_select  classSelectClass form-control<?php echo e($errors->has('class') ? ' is-invalid' : ''); ?>"
                                        name="new_record[${div_count}][class][]" >
                                        <option data-display="<?php echo app('translator')->get('common.select_class'); ?> *" value="">
                                            <?php echo app('translator')->get('common.class'); ?> *</option>
                                            <?php if(isset($classes)): ?>
                                                <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($class->id); ?>">
                                                        <?php echo e($class->class_name); ?>

                                                    </option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                    </select>
                                    <div class="pull-right loader loader_style select_class_loader">
                                        <img class="loader_img_style" src="<?php echo e(asset('public/backEnd/img/demo_wait.gif')); ?>" alt="loader">
                                    </div>
                                    
                                    <?php if($errors->has('class')): ?>
                                        <span class="text-danger invalid-select" role="alert">
                                            <?php echo e($errors->first('class')); ?>

                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="${div_button}">
                                <div class="primary_input">
                                    <select class="primary_select classSelectSection form-control<?php echo e($errors->has('section') ? ' is-invalid' : ''); ?>"
                                        name="new_record[${div_count}][section][]">
                                        <option data-display="<?php echo app('translator')->get('common.select_section'); ?> *" value="">
                                            <?php echo app('translator')->get('common.section'); ?> *</option>
                                    </select>
                                    <div class="pull-right loader loader_style select_section_loader">
                                        <img class="loader_img_style" src="<?php echo e(asset('public/backEnd/img/demo_wait.gif')); ?>" alt="loader">
                                    </div>
                                    
                                    <?php if($errors->has('section')): ?>
                                        <span class="text-danger invalid-select" role="alert">
                                            <?php echo e($errors->first('section')); ?>

                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="col-sm-3 col-6 mt-4 mt-sm-0">
                                <input type="checkbox" id="is_default_${div_count}" data-row_id="${div_count}" data-student_id="${student_id}"class="common-checkbox is_default is_default_${student_id} form-control<?php echo e(@$errors->has('is_default') ? ' is-invalid' : ''); ?>">
                                <label for="is_default_${div_count}"><?php echo app('translator')->get('common.default'); ?></label>
                            </div>
                            <?php if(generalSetting()->multiple_roll == 1): ?>
                                <div class="col-2">
                                    <div class="primary_input">
                                        <input oninput="numberCheck(this)" class="primary_input_field" type="text" id="roll_number" placeholder="<?php echo e(moduleStatusCheck('Lead') == true ? __('lead::lead.id_number') : __('student.roll')); ?><?php echo e(is_required('roll_number') == true ? ' *' : ''); ?>"
                                            name="new_record[${div_count}][roll_number]" value="<?php echo e(old('roll_number')); ?>">
                                        
                                        <span class="text-danger" id="roll-error" role="alert">
                                            <strong></strong>
                                        </span>
                                        <?php if($errors->has('roll_number')): ?>
                                            <span class="text-danger" >
                                                <?php echo e($errors->first('roll_number')); ?>

                                            </span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <div class="col-sm-1 col-6 mt-4 mt-sm-0 text-left student-record-delete-btn">
                                <button class="primary-btn small fix-gr-bg icon-only removrButton"
                                data-student_id = "${student_id}" data-div_id = "${div_count}"><i class="ti-trash"></i></button>
                            </div>
                            </div>`;
                $('#appendDiv_' + student_id).append(div);
                $('#div_count').val(div_count + 1);
                $('.primary_select').niceSelect('destroy');
                $(".primary_select").niceSelect();
            });
            $(document).on('click', '.updateStudentRecord', function(event) {
                var submit_btn = $(this).find("button[type=submit]");
                event.preventDefault();
                var url = $("#url").val();
                var student_id = $(this).data('student_id');
                var formData = $("#form_" + student_id).serialize();

                $.ajax({
                    type: "POST",
                    data: formData,
                    dataType: "json",
                    url: url + '/multi-record-store',
                    beforeSend: function() {
                        submit_btn.button('loading');
                    },
                    success: function(data) {
                        if (data.status == true) {
                            reload(student_id);
                            toastr.success(data.message, 'Success');
                        } else {
                            toastr.error(data.message, 'Error');
                        }
                        submit_btn.button('reset');
                    },
                    error: function(xhr) {
                        toastr.error("Error occured. please try again", "Error");
                    },
                    complete: function() {
                        submit_btn.button('reset');
                    }
                });
            });
            $(document).on('click', '.is_default', function() {
                let row_id = $(this).data('row_id');
                let student_id = $(this).data('student_id');
                $('.is_default_' + student_id).prop('checked', false);
                $('#is_default_' + row_id).prop('checked', true);
                $("#default_" + student_id).val(row_id);
            });
            $(document).on('click', '.removrButton', function() {
                let div_id = $(this).data('div_id');
                let student_id = $(this).data('student_id');
                let record_id = $(this).data('record_id');

                if (record_id && student_id) {
                    $("#deleteRecord").modal('show');
                    $("#remove_record_id").val(record_id);
                    $("#remove_student_id").val(student_id);
                } else {
                    $('#div_id_' + student_id + div_id).remove();
                }
            });
            $(document).on('click', '#removeBtnSubmit', function(event) {
                event.preventDefault();
                let student_id = $("#remove_student_id").val();
                let record_id = $("#remove_record_id").val();
                var url = $("#url").val();
                console.log(student_id, record_id);
                $.ajax({
                    type: "POST",
                    data: {
                        student_id: student_id,
                        record_id: record_id
                    },
                    dataType: "json",
                    url: url + '/student-record-delete',
                    success: function(data) {
                        if (data.status == true) {
                            toastr.success(data.message, 'Success');
                            $('#div_id_' + student_id + record_id).remove();
                            $("#deleteRecord").modal('hide');
                            $("#remove_record_id").val('');
                            $("#remove_student_id").val('');
                        } else {
                            toastr.error(data.message, 'Error');
                            $("#deleteRecord").modal('hide');
                            $("#remove_record_id").val('');
                            $("#remove_student_id").val('');
                        }
                    },
                    error: function(data) {
                        console.log('error');
                    }
                })

            });

            let class_required = " *";
            let section_required = " *";

            $(document).on("change", ".classSelectAcademicYear", function() {
                var url = $("#url").val();
                var i = 0;
                var formData = {
                    id: $(this).val(),
                };
                var target_loader = $(this).closest('div.row').find('.select_class_loader');
                var target_select = $(this).closest('div.row').find("select.classSelectClass");

                $.ajax({
                    type: "GET",
                    data: formData,
                    dataType: "json",
                    url: url + "/" + "academic-year-get-class",

                    beforeSend: function() {
                        target_loader.addClass('pre_loader').removeClass('loader');
                    },

                    success: function(data) {
                        target_select.empty().append(
                            $("<option>", {
                                value: '',
                                text: window.jsLang('select_class') + class_required,
                            })
                        );

                        if (data[0].length) {
                            $.each(data[0], function(i, className) {
                                target_select.append(
                                    $("<option>", {
                                        value: className.id,
                                        text: className.class_name,
                                    })
                                );
                            });
                        }
                        target_select.niceSelect('update');
                        target_select.trigger('change');
                    },
                    error: function(data) {
                        console.log('Error:', data);
                    },
                    complete: function() {
                        i--;
                        if (i <= 0) {
                            target_loader.removeClass('pre_loader').addClass('loader');
                        }
                    }
                });
            });
            $(document).on("change", ".classSelectClass", function() {
                var url = $("#url").val();
                var i = 0;
                var formData = {
                    id: $(this).val(),
                };
                var target_loader = $(this).closest('div.row').find('.select_section_loader');
                var target_select = $(this).closest('div.row').find("select.classSelectSection");

                $.ajax({
                    type: "GET",
                    data: formData,
                    dataType: "json",
                    url: url + "/" + "ajaxStudentPromoteSection",

                    beforeSend: function() {
                        target_loader.addClass('pre_loader').removeClass('loader');
                    },

                    success: function(data) {
                        target_select.empty().append(
                            $("<option>", {
                                value: '',
                                text: window.jsLang('select_section') + class_required,
                            })
                        );

                        if (data[0].length) {
                            $.each(data[0], function(i, section) {
                                target_select.append(
                                    $("<option>", {
                                        value: section.id,
                                        text: section.section_name,
                                    })
                                );
                            });
                        }
                        target_select.niceSelect('update');
                        target_select.trigger('change');
                    },
                    error: function(data) {
                        console.log('Error:', data);
                    },
                    complete: function() {
                        i--;
                        if (i <= 0) {
                            target_loader.removeClass('pre_loader').addClass('loader');
                        }
                    }
                });
            });

            function reload(student_id) {
                var url = $("#url").val();
                $.ajax({
                    type: 'GET',
                    data: {
                        student_id: student_id
                    },
                    dataType: "html",
                    url: url + "/student-multi-record/" + student_id,
                    success: function(data) {
                        $('#student_rec_content_' + student_id).html(data);
                        $(".primary_select").niceSelect('destroy');
                        $(".primary_select").niceSelect();
                    },
                    error: function(error) {
                        console.log(error);
                    }
                })
            }
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\school\resources\views/backEnd/studentInformation/multi_class_student.blade.php ENDPATH**/ ?>