<?php $__env->startPush('css'); ?>
<link rel="stylesheet" href="<?php echo e(asset('public/backEnd/vendors/css/daterangepicker.css')); ?>" />
<?php $__env->stopPush(); ?>

<?php $__env->startPush('script'); ?>
<script src="<?php echo e(asset('public/backEnd/')); ?>/vendors/js/daterangepicker.min.js"></script>
<script type="text/javascript">
    <?php if(@$date_from && @$date_to): ?>
        $('input[name="date_range"]').daterangepicker({
            ranges: {
                <?php echo json_encode(__('calender.Today')); ?>: [moment(), moment()],
                <?php echo json_encode(__('calender.Yesterday')); ?>: [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                <?php echo json_encode(__('calender.Last 7 Days')); ?>: [moment().subtract(6, 'days'), moment()],
                <?php echo json_encode(__('calender.Last 30 Days')); ?>: [moment().subtract(29, 'days'), moment()],
                <?php echo json_encode(__('calender.This Month')); ?>: [moment().startOf('month'), moment().endOf('month')],
                <?php echo json_encode(__('calender.Last Month')); ?>: [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            },
            "locale": {
                "separator": <?php echo json_encode(__('calender.separator')); ?>,
                "applyLabel": <?php echo json_encode(__('calender.applyLabel')); ?>,
                "cancelLabel": <?php echo json_encode(__('calender.cancelLabel')); ?>,
                "fromLabel": <?php echo json_encode(__('calender.fromLabel')); ?>,
                "toLabel": <?php echo json_encode(__('calender.toLabel')); ?>,
                "customRangeLabel": <?php echo json_encode(__('calender.customRangeLabel')); ?>,
                "weekLabel": <?php echo json_encode(__('calender.weekLabel')); ?>,
                "daysOfWeek": <?php echo json_encode(__('calender.daysMin')); ?>,
                "monthNames": <?php echo json_encode(__('calender.months')); ?>

            },
            "startDate": '<?php echo e(\Carbon\Carbon::parse($date_from)->format('m/d/Y')); ?>',
            "endDate": '<?php echo e(\Carbon\Carbon::parse($date_to)->format('m/d/Y')); ?>'
            }, function(start, end, label) {
            console.log('New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')');
        });
    <?php else: ?>
        $('input[name="date_range"]').daterangepicker({
                ranges: {
                    <?php echo json_encode(__('calender.Today')); ?>: [moment(), moment()],
                    <?php echo json_encode(__('calender.Yesterday')); ?>: [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    <?php echo json_encode(__('calender.Last 7 Days')); ?>: [moment().subtract(6, 'days'), moment()],
                    <?php echo json_encode(__('calender.Last 30 Days')); ?>: [moment().subtract(29, 'days'), moment()],
                    <?php echo json_encode(__('calender.This Month')); ?>: [moment().startOf('month'), moment().endOf('month')],
                    <?php echo json_encode(__('calender.Last Month')); ?>: [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                "locale": {
                    "separator": <?php echo json_encode(__('calender.separator')); ?>,
                    "applyLabel": <?php echo json_encode(__('calender.applyLabel')); ?>,
                    "cancelLabel": <?php echo json_encode(__('calender.cancelLabel')); ?>,
                    "fromLabel": <?php echo json_encode(__('calender.fromLabel')); ?>,
                    "toLabel": <?php echo json_encode(__('calender.toLabel')); ?>,
                    "customRangeLabel": <?php echo json_encode(__('calender.customRangeLabel')); ?>,
                    "weekLabel": <?php echo json_encode(__('calender.weekLabel')); ?>,
                    "daysOfWeek": <?php echo json_encode(__('calender.daysMin')); ?>,
                    "monthNames": <?php echo json_encode(__('calender.months')); ?>

                },
                "startDate": moment().subtract(7, 'days'),
                "endDate": moment()
                }, function(start, end, label) {
                console.log('New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')');
            });
    <?php endif; ?>
</script>
<?php $__env->stopPush(); ?><?php /**PATH C:\xampp\htdocs\school\resources\views/backEnd/partials/date_range_picker_css_js.blade.php ENDPATH**/ ?>