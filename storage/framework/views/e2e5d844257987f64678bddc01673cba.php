
<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get('fees.bank_payment'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('mainContent'); ?>
    <?php $__env->startPush('css'); ?>
        <style>
            table.dataTable.row-border tbody th,
            table.dataTable.row-border tbody td,
            table.dataTable.display tbody th,
            table.dataTable.display tbody td {
                border-bottom: 1px solid rgba(130, 139, 178, 0.15) !important;
            }
        </style>
    <?php $__env->stopPush(); ?>
    <section class="sms-breadcrumb mb-20 up_breadcrumb">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <h1><?php echo app('translator')->get('fees.bank_payment'); ?></h1>
                <div class="bc-pages">
                    <a href="<?php echo e(route('dashboard')); ?>"><?php echo app('translator')->get('common.dashboard'); ?></a>
                    <a href="#"><?php echo app('translator')->get('fees.fees_collection'); ?></a>
                    <a href="#"><?php echo app('translator')->get('fees.bank_payment'); ?></a>
                </div>
            </div>
        </div>
    </section>

    <section class="admin-visitor-area up_admin_visitor">
        <div class="container-fluid p-0">
            <div class="row">
                <div class="col-lg-12">
                    <div class="white-box">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="main-title mt_0_sm mt_0_md">
                                    <h3 class="mb-15"><?php echo app('translator')->get('common.select_criteria'); ?> </h3>
                                </div>
                            </div>
                        </div>
                        <?php echo e(Form::open(['class' => 'form-horizontal', 'files' => true, 'route' => 'fees.search-bank-payment', 'method' => 'post'])); ?>

                        <div class="row">
                            <input type="hidden" name="url" id="url" value="<?php echo e(URL::to('/')); ?>">
                            <div class="col-lg-3 col-md-3 mt-30-md">
                                <div class="primary_input">
                                    <label class="primary_input_label" for="">
                                        <?php echo e(__('common.date_range')); ?>

                                            <span class="text-danger"> </span>
                                    </label>
                                    <input class="primary_input_field primary_input_field form-control" type="text" name="payment_date" value="" placeholder="">

                                    <?php if($errors->has('payment_date')): ?>
                                        <span class="text-danger" >
                                            <?php echo e($errors->first('payment_date')); ?>

                                        </span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <?php echo $__env->make('backEnd.common.search_criteria',[
                                'div'=>'col-lg-3',
                                'visiable'=>['class', 'section']
                            ], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <div class="col-lg-3 col-md-3 ">
                                <label class="primary_input_label" for="">
                                    <?php echo e(__('common.status')); ?>

                                        <span class="text-danger"> </span>
                                </label>
                                <select
                                    class="primary_select  form-control<?php echo e($errors->has('approve_status') ? ' is-invalid' : ''); ?>"
                                    name="approve_status">
                                    <option data-display="<?php echo app('translator')->get('common.status'); ?>" value=""><?php echo app('translator')->get('common.status'); ?></option>
                                    <option value="pending"
                                        <?php echo e(isset($approve_status) ? ($approve_status == 'pending' ? 'selected' : '') : ''); ?>>
                                        <?php echo app('translator')->get('common.pending'); ?></option>
                                    <option value="approve"
                                        <?php echo e(isset($approve_status) ? ($approve_status == 'approve' ? 'selected' : '') : ''); ?>>
                                        <?php echo app('translator')->get('common.approved'); ?></option>
                                    <option value="reject"
                                        <?php echo e(isset($approve_status) ? ($approve_status == 'reject' ? 'selected' : '') : ''); ?>>
                                        <?php echo app('translator')->get('common.reject'); ?></option>
                                </select>
                                <?php if($errors->has('approve_status')): ?>
                                    <span class="text-danger invalid-select" role="alert">
                                        <?php echo e($errors->first('approve_status')); ?>

                                    </span>
                                <?php endif; ?>
                            </div>
                            <div class="col-lg-12 mt-20 text-right">
                                <?php if(userPermission('fees.search-bank-payment')): ?>
                                    <button type="submit" class="primary-btn small fix-gr-bg">
                                        <span class="ti-search pr-2"></span>
                                        <?php echo app('translator')->get('common.search'); ?>
                                    </button>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php echo e(Form::close()); ?>

                    </div>
                </div>
            </div>


            <div class="row mt-40">
                <div class="col-lg-12">
                    <div class="white-box">
                        <div class="row">
                            <div class="col-lg-4 no-gutters">
                                <div class="main-title">
                                    <h3 class="mb-15"> <?php echo app('translator')->get('fees.bank_payment_list'); ?></h3>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <?php if (isset($component)) { $__componentOriginal163c8ba6efb795223894d5ffef5034f5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal163c8ba6efb795223894d5ffef5034f5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.table','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('table'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                    <table id="table_id" class="table " cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th><?php echo app('translator')->get('student.student_name'); ?></th>
                                                <th><?php echo app('translator')->get('fees::feesModule.view_transcation'); ?></th>
                                                <th><?php echo app('translator')->get('common.date'); ?></th>
                                                <th><?php echo app('translator')->get('fees::feesModule.amount'); ?></th>
                                                <th><?php echo app('translator')->get('common.note'); ?></th>
                                                <th><?php echo app('translator')->get('common.file'); ?></th>
                                                <th><?php echo app('translator')->get('common.status'); ?></th>
                                                <th><?php echo app('translator')->get('common.actions'); ?></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if(isset($feesPayments)): ?>
                                                <?php $__currentLoopData = $feesPayments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bank_payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php
                                                        $paid_amount = $bank_payment->PaidAmount;
                                                    ?>
                                                    <tr>
                                                        <td><?php echo e(@$bank_payment->feeStudentInfo->full_name); ?></td>
    
                                                        <td>
                                                            <a class="text-color" data-toggle="modal"
                                                                data-target="#showTranscation<?php echo e($bank_payment->id); ?>"
                                                                href="#"><?php echo app('translator')->get('common.details'); ?></a>
                                                            <div class="modal fade admin-query"
                                                                id="showTranscation<?php echo e($bank_payment->id); ?>">
                                                                <div class="modal-dialog modal-dialog-centered large-modal">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h4 class="modal-title"><?php echo app('translator')->get('fees::feesModule.payment_method'); ?> :
                                                                                <?php echo e($bank_payment->payment_method); ?></h4>
                                                                            <button type="button" class="close"
                                                                                data-dismiss="modal">&times;</button>
                                                                        </div>
                                                                        <div class="modal-body p-0 mt-30">
                                                                            <div class="container student-certificate">
                                                                                <div class="row justify-content-center">
                                                                                    <div class="col-lg-12 text-center">
                                                                                        <table
                                                                                            class="table school-table-style shadow-done"
                                                                                            cellspacing="0" width="100%">
                                                                                            <thead>
                                                                                                <tr>
                                                                                                    <th><?php echo app('translator')->get('fees::feesModule.fees_type'); ?></th>
                                                                                                    <th><?php echo app('translator')->get('fees::feesModule.paid_amount'); ?></th>
                                                                                                </tr>
                                                                                            </thead>
                                                                                            <tbody>
                                                                                                <?php $__currentLoopData = $bank_payment->transcationDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $details): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                                                    <tr>
                                                                                                        <td><?php echo e(@$details->transcationFeesType->name); ?>

                                                                                                        </td>
                                                                                                        <td><?php echo e(@$details->paid_amount); ?>

                                                                                                        </td>
                                                                                                    </tr>
                                                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                                                <?php if(@$bank_payment->add_wallet_money > 0): ?>
                                                                                                    <tr>
                                                                                                        <td><strong><?php echo app('translator')->get('fees::feesModule.wallet_money'); ?></strong>
                                                                                                        </td>
                                                                                                        <td><strong><?php echo e($bank_payment->add_wallet_money); ?></strong>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                <?php endif; ?>
                                                                                            </tbody>
                                                                                        </table>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
    
                                                        </td>
                                                        <td><?php echo e(dateConvert($bank_payment->created_at)); ?></td>
                                                        <td><?php echo e($paid_amount + $bank_payment->add_wallet_money); ?></td>
                                                        <td>
                                                            <?php if($bank_payment->payment_note): ?>
                                                                <a class="text-color" data-toggle="modal"
                                                                    data-target="#showNote<?php echo e($bank_payment->id); ?>"
                                                                    href="#"><?php echo app('translator')->get('common.note'); ?></a>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td>
                                                            <?php if(!empty($bank_payment->file)): ?>
                                                                <a class="text-color" data-toggle="modal"
                                                                    data-target="#bankPaymentFile<?php echo e($bank_payment->id); ?>"
                                                                    href="#"><?php echo app('translator')->get('common.file'); ?></a>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td>
                                                            <?php if($bank_payment->paid_status == 'pending'): ?>
                                                                <button
                                                                    class="primary-btn small bg-warning text-white border-0"><?php echo app('translator')->get('common.pending'); ?></button>
                                                            <?php elseif($bank_payment->paid_status == 'approve'): ?>
                                                                <button
                                                                    class="primary-btn small bg-success text-white border-0  tr-bg"><?php echo app('translator')->get('common.approved'); ?></button>
                                                            <?php else: ?>
                                                                <button
                                                                    class="primary-btn small bg-danger text-white border-0"><?php echo app('translator')->get('common.reject'); ?></button>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td>
                                                            <?php if (isset($component)) { $__componentOriginalf5ee9bc45d6af00850b10ff7521278be = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf5ee9bc45d6af00850b10ff7521278be = $attributes; } ?>
<?php $component = App\View\Components\DropDown::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('drop-down'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\DropDown::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
                                                            <?php if($bank_payment->paid_status == 'pending'): ?>
                                                                <?php if(userPermission("fees.approve-bank-payment")): ?>
                                                                    <a onclick="enableId(<?php echo e($bank_payment->id); ?>);"
                                                                        class="dropdown-item" href="#" data-toggle="modal"
                                                                        data-target="#approvePayment"
                                                                        data-id="<?php echo e($bank_payment->id); ?>">
                                                                        <?php echo app('translator')->get('common.approve'); ?>
                                                                    </a>
                                                                <?php endif; ?>
                                                                <?php if(userPermission("fees.reject-bank-payment")): ?>
                                                                    <a onclick="rejectPayment(<?php echo e($bank_payment->id); ?>);"
                                                                        class="dropdown-item" href="#" data-toggle="modal"
                                                                        data-id="<?php echo e($bank_payment->id); ?>">
                                                                        <?php echo app('translator')->get('accounts.reject'); ?>
                                                                    </a>
                                                                <?php endif; ?>
                                                            <?php endif; ?>
                                                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf5ee9bc45d6af00850b10ff7521278be)): ?>
<?php $attributes = $__attributesOriginalf5ee9bc45d6af00850b10ff7521278be; ?>
<?php unset($__attributesOriginalf5ee9bc45d6af00850b10ff7521278be); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf5ee9bc45d6af00850b10ff7521278be)): ?>
<?php $component = $__componentOriginalf5ee9bc45d6af00850b10ff7521278be; ?>
<?php unset($__componentOriginalf5ee9bc45d6af00850b10ff7521278be); ?>
<?php endif; ?>
                                                    </td>
                                                </tr>
    
                                            <div class="modal fade admin-query" id="showNote<?php echo e($bank_payment->id); ?>">
                                                <div class="modal-dialog modal-dialog-centered large-modal">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title"><?php echo app('translator')->get('fees.note'); ?></h4>
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>
                                                        <div class="modal-body p-0 mt-30">
                                                            <div class="container student-certificate">
                                                                <div class="row justify-content-center">
                                                                    <div class="col-lg-12 text-center mb-30">
                                                                        <p><?php echo e($bank_payment->payment_note); ?></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
    
                                            <div class="modal fade admin-query" id="bankPaymentFile<?php echo e($bank_payment->id); ?>">
                                                <div class="modal-dialog modal-dialog-centered large-modal">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title"><?php echo app('translator')->get('common.file'); ?></h4>
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>
                                                        <div class="modal-body p-0 mt-30">
                                                            <div class="container student-certificate">
                                                                <div class="row justify-content-center">
                                                                    <div class="col-lg-12 text-center">
                                                                        <?php
                                                                            $pdf = $bank_payment->file ? explode('.', $bank_payment->file) : [];
                                                                            $for_pdf = $pdf[1] ?? null;
                                                                        ?>
                                                                        <?php if(@$for_pdf == 'pdf'): ?>
                                                                            <div class="mb-5">
                                                                                <a href="<?php echo e(asset($bank_payment->file)); ?>"
                                                                                    download><?php echo app('translator')->get('common.download'); ?> <span
                                                                                        class="pl ti-download"></span></a>
                                                                            </div>
                                                                        <?php else: ?>
                                                                            <div class="mb-5">
                                                                                <img class="img-fluid" src="<?php echo e(asset($bank_payment->file)); ?>">
                                                                                </br>
                                                                                <a href="<?php echo e(asset($bank_payment->file)); ?>"
                                                                                    download><?php echo app('translator')->get('common.download'); ?> <span
                                                                                        class="pl ti-download"></span></a>
                                                                            </div>
                                                                        <?php endif; ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal163c8ba6efb795223894d5ffef5034f5)): ?>
<?php $attributes = $__attributesOriginal163c8ba6efb795223894d5ffef5034f5; ?>
<?php unset($__attributesOriginal163c8ba6efb795223894d5ffef5034f5); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal163c8ba6efb795223894d5ffef5034f5)): ?>
<?php $component = $__componentOriginal163c8ba6efb795223894d5ffef5034f5; ?>
<?php unset($__componentOriginal163c8ba6efb795223894d5ffef5034f5); ?>
<?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <div class="modal fade admin-query" id="approvePayment">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><?php echo app('translator')->get('fees::feesModule.approve_payment'); ?></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <div class="text-center">
                        <h4><?php echo app('translator')->get('fees.are_you_sure_to_approve'); ?></h4>
                    </div>
                    <div class="mt-40 d-flex justify-content-between">
                        <button type="button" class="primary-btn tr-bg" data-dismiss="modal"><?php echo app('translator')->get('common.cancel'); ?></button>
                        <?php echo e(Form::open(['route' => 'fees.approve-bank-payment', 'method' => 'POST'])); ?>

                        <input type="hidden" name="transcation_id" value="<?php echo e(@$bank_payment->id); ?>">
                        <button class="primary-btn fix-gr-bg" type="submit"><?php echo app('translator')->get('common.approve'); ?></button>
                        <?php echo e(Form::close()); ?>

                    </div>
                </div>

            </div>
        </div>
    </div>


    <!-- modal start here  -->

    <div class="modal fade admin-query" id="rejectPaymentModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><?php echo app('translator')->get('fees::feesModule.bank_payment_reject'); ?> </h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="text-center">
                        <h4><?php echo app('translator')->get('fees::feesModule.are_you_sure_to_reject'); ?></h4>
                    </div>
                    <?php echo e(Form::open(['route' => 'fees.reject-bank-payment', 'method' => 'POST'])); ?>

                    <div class="form-group">
                        <input type="hidden" name="transcation_id" value="<?php echo e(@$bank_payment->id); ?>">
                        <label><strong><?php echo app('translator')->get('fees::feesModule.reject_note'); ?></strong></label>
                        <textarea name="payment_reject_reason" class="form-control" rows="6"></textarea>
                    </div>

                    <div class="mt-40 d-flex justify-content-between">
                        <button type="button" class="primary-btn tr-bg" data-dismiss="modal"><?php echo app('translator')->get('common.close'); ?></button>
                        <button class="primary-btn fix-gr-bg" type="submit"><?php echo app('translator')->get('common.submit'); ?></button>
                    </div>
                    <?php echo e(Form::close()); ?>


                </div>

            </div>
        </div>
    </div>

    <div class="modal fade admin-query" id="showReasonModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><?php echo app('translator')->get('lang.reject_note'); ?></h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label><strong><?php echo app('translator')->get('lang.reject_note'); ?></strong></label>
                        <textarea readonly class="form-control" rows="4"></textarea>
                    </div>
                    <div class="mt-40 d-flex justify-content-between">
                        <button type="button" class="primary-btn fix-gr-bg" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('backEnd.partials.data_table_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('backEnd.partials.date_picker_css_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('backEnd.partials.date_range_picker_css_js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->startPush('script'); ?>
    <script>
        $('input[name="payment_date"]').daterangepicker({
            ranges: {
                'Today': [moment(), moment()],
                'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                'This Month': [moment().startOf('month'), moment().endOf('month')],
                'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf(
                    'month')]
            },
            "startDate": moment().subtract(7, 'days'),
            "endDate": moment()
        }, function(start, end, label) {
            console.log('New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format(
                'YYYY-MM-DD') + ' (predefined range: ' + label + ')');
        });
    </script>

    <script>
        function rejectPayment(id) {
            var modal = $('#rejectPaymentModal');
            modal.find('#showId').val(id)
            modal.modal('show');

        }

        function viewReason(id) {
            var reason = $('.reason' + id).data('reason');
            var modal = $('#showReasonModal');
            modal.find('textarea').val(reason)
            modal.modal('show');
        }
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backEnd.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\school\Modules/Fees\Resources/views/bankPayment.blade.php ENDPATH**/ ?>