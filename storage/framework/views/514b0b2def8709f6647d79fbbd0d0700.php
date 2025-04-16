
<?php
    $divButton = generalSetting()->multiple_roll == 1 ? 'col-sm-4 col-6' : 'col-sm-3 col-6';
?>

<?php $__env->startPush('css'); ?>
<style>
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

<?php $__currentLoopData = $student->studentRecords; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $record): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="row mb-4 align-items-end student-record-input" id="div_id_<?php echo e($record->student_id.$record->id); ?>">
    <div class="<?php echo e($divButton); ?>">
        <div class="primary_input">
            <select class="primary_select  classSelectClass class_<?php echo e($record->student_id); ?> form-control<?php echo e($errors->has('class') ? ' is-invalid' : ''); ?>"
                name="old_record[<?php echo e($record->id); ?>][class][]">
                <option data-display="<?php echo app('translator')->get('common.class'); ?> *" value="">
                    <?php echo app('translator')->get('common.class'); ?> *</option>
                   <?php if(isset($classes)): ?>
                        <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($class->id); ?>" <?php echo e($record->class_id == $class->id ? 'selected' : ''); ?>>
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
    <div class="<?php echo e($divButton); ?>">
        <div class="primary_input">
            <select class="primary_select  classSelectSection form-control<?php echo e($errors->has('section') ? ' is-invalid' : ''); ?>"
                name="old_record[<?php echo e($record->id); ?>][section][]" id="sectionSelectStudent">
                <option data-display="<?php echo app('translator')->get('common.section'); ?> *" value="">
                    <?php echo app('translator')->get('common.section'); ?> *</option>
                    <?php if(isset($record)): ?>
                        <?php if($record->session_id && $record->class_id): ?>
                            <?php $__currentLoopData = $record->class->classSection; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($section->sectionName->id); ?>"
                                    <?php echo e($record->section_id == $section->sectionName->id ? 'selected' : ''); ?>>
                                    <?php echo e($section->sectionName->section_name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    <?php endif; ?>
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
        <input type="checkbox" id="is_default_<?php echo e(@$record->id); ?>" data-student_id="<?php echo e($record->student_id); ?>"  data-row_id="<?php echo e($record->id); ?>" class="common-checkbox is_default is_default_<?php echo e(@$record->student_id); ?> form-control<?php echo e(@$errors->has('is_default') ? ' is-invalid' : ''); ?>" <?php echo e($record->is_default ? 'checked':''); ?>>
        <label class="mb-0" for="is_default_<?php echo e(@$record->id); ?>"><?php echo app('translator')->get('common.default'); ?></label>

    </div>
    <?php if(generalSetting()->multiple_roll == 1): ?>
        <div class="col-2">
            <div class="primary_input">
                <input oninput="numberCheck(this)" class="primary_input_field" type="text" id="roll_number" placeholder="<?php echo e(moduleStatusCheck('Lead') == true ? __('lead::lead.id_number') : __('student.roll')); ?><?php echo e(is_required('roll_number') == true ? ' *' : ''); ?>"
                    name="old_record[<?php echo e($record->id); ?>][roll_number][]" value="<?php echo e($record->roll_no ? $record->roll_no : old('roll_number')); ?>">
                
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
        <button class="primary-btn small fix-gr-bg icon-only removrButton" type="button" data-student_id="<?php echo e($record->student_id); ?>" data-record_id=<?php echo e($record->id); ?>><i class="ti-trash"></i></button>
    </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<div id="appendDiv_<?php echo e($student->id); ?>">

</div>
<?php /**PATH C:\xampp\htdocs\school\resources\views/backEnd/studentInformation/inc/_multiple_class_record.blade.php ENDPATH**/ ?>