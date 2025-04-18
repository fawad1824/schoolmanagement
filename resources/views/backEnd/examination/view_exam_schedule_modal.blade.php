<script src="{{asset('public/backEnd/')}}/js/main.js"></script>

<div class="container-fluid mt-30">
    <div class="student-details">
        <div class="student-meta-box">
            <div class="single-meta">
                <div class="row">
                    <div class="col-lg-4 no-gutters">
                        <div class="main-title">
                            <h3 class="mb-0">@lang('common.class'): {{$class->class_name}} ({{$section->section_name}})</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <table id="" class="school-table-data school-table shadow-none" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>@lang('common.subjects')</th>
                                    <th>@lang('common.date')</th>
                                    <th>@lang('exam.start_time')</th>
                                    <th>@lang('exam.end_time')</th>
                                    <th>@lang('exam.full_marks')</th>
                                    <th>@lang('exam.passing_marks')</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($assign_subjects as $assign_subject)
                                <tr>
                                    <td>{{$assign_subject->subject !=""?$assign_subject->subject->subject_name:""}}</td>
                                    <td>
                                       
                                        {{$assign_subject->date != ""? dateConvert($assign_subject->date):''}}


                                    </td>
                                    <td>{{$assign_subject->start_time}}</td>
                                    <td>{{$assign_subject->end_time}}</td>
                                    <td>{{$assign_subject->full_mark}}</td>
                                    <td>{{$assign_subject->pass_mark}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="col-lg-12 mt-30">
                            <div class="row">
                                <div class="col-md-12">
                                    <button class="primary-btn fix-gr-bg pull-right" data-dismiss="modal">
                                        <span class="ti-check"></span>
                                        @lang('common.cancel')
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@include('backEnd.partials.data_table_js')
<script type="text/javascript">

   $('#table_id, .school-table-data').DataTable({
        bLengthChange: false,
        language: {
            search: "<i class='ti-search'></i>",
            searchPlaceholder: 'Search...',
            paginate: {
                next: "<i class='ti-arrow-right'></i>",
                previous: "<i class='ti-arrow-left'></i>"
            }
        },
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'copyHtml5',
                text: '<i class="fa fa-files-o"></i>',
                titleAttr: 'Copy'
            },
            {
                extend: 'excelHtml5',
                text: '<i class="fa fa-file-excel-o"></i>',
                titleAttr: 'Excel'
            },
            {
                extend: 'csvHtml5',
                text: '<i class="fa fa-file-text-o"></i>',
                titleAttr: 'CSV'
            },
            {
                extend: 'pdfHtml5',
                text: '<i class="fa fa-file-pdf-o"></i>',
                titleAttr: 'PDF'
            },
            {
                extend: 'print',
                text: '<i class="fa fa-print"></i>',
                titleAttr: 'Print'
            },
            {
                extend: 'colvis',
                text: '<i class="fa fa-columns"></i>',
                postfixButtons: [ 'colvisRestore' ]
            }
        ],
        columnDefs: [
            {
                visible: false
            }
        ],
        responsive: true,
        bDestroy: true
    });

</script>
