@extends('backEnd.master')
@section('title')
    {{ @Auth::user()->roles->name }} @lang('common.dashboard')
@endsection
@push('css')
    <link rel="stylesheet" href="{{ asset('public/backEnd/assets/vendors/css/fullcalendar.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/backEnd/assets/vendors/calender_js/core/main.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/backEnd/assets/vendors/calender_js/daygrid/main.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/backEnd/assets/vendors/calender_js/timegrid/main.css') }}" />
    <link rel="stylesheet" href="{{ asset('public/backEnd/assets/vendors/calender_js/list/main.css') }}" />
    <style>
        .ti-calendar:before {
            position: absolute;
            bottom: 17px !important;
            right: 18px !important;
        }

        .fc-icon-chevron-left::before {
            content: "";
        }

        .fc-icon-chevron-right::before {
            content: "";
        }

        .fc-button {
            width: auto;
        }

        .white-box.single-summery {
            margin-top: 0px
        }

        @media (max-width: 1399px) {
            .chart_grid.chart_container {
                display: grid;
                grid-template-columns: repeat(1, 1fr);
                gap: 40px
            }
        }

        @media (min-width: 1400px) {
            .chart_grid.chart_container {
                display: grid;
                grid-template-columns: repeat(2, 1fr);
                gap: 30px
            }
        }

        .chart_container h1 {
            font-size: 14px
        }

        .chart_container p {
            font-size: 13px
        }

        a {
            color: #ffffff;
            text-decoration: none;
            background-color: transparent;
        }

        .serach_field-area .search_inner button {
            position: absolute;
            left: 0;
            top: -3px;
            height: 100%;
            background: transparent;
            font-size: 12px;
            border: 0;
            padding-left: 0px;
            padding-right: 11px;
        }

        .collaspe_icon.open_miniSide {
            position: absolute;
            top: 46%;
            transform: translateY(-50%);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .serach_field-area .search_inner input {
            color: white;
            font-size: 13px;
            height: 40px;
            width: 100%;
            padding-left: 32px;
            border: 0;
            padding-right: 15px;
            border-bottom: 1px solid rgba(130, 139, 178, 0.3);
            padding-bottom: 6px;
            background: transparent !important;
        }
    </style>
@endpush


<style>
    .dashboard-card {
        padding: 20px;
        border-radius: 12px;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
        transition: all 0.3s ease;
        height: 100%;
        position: relative;
        overflow: hidden;
    }

    .dashboard-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 30px rgba(0, 0, 0, 0.1);
    }

    .dashboard-card i {
        display: block;
        font-size: 2rem;
        margin-bottom: 10px;
    }

    .dashboard-card a {
        text-decoration: none;
        color: inherit;
    }

    .dashboard-card h6 {
        margin: 0;
        font-size: 16px;
        font-weight: 400;
        color: whitesmoke;
    }

    .col-12.col-sm-6.col-md-4.col-lg-3 {
        padding: 8px;
    }
</style>


<style>
    /* Dashboard Box Base Style */
    .dashboard-box {
        background-color: #fff;
        padding: 25px 20px;
        border-radius: 15px;
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.05);
        transition: 0.3s ease;
        text-align: left;
        height: 100%;
        position: relative;
    }

    .dashboard-box:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
    }

    .dashboard-box .box-icon {
        font-size: 2.5rem;
        margin-bottom: 15px;
    }

    .dashboard-box h4 {
        font-size: 2rem;
        font-weight: bold;
        margin-bottom: 5px;
    }

    .dashboard-box p {
        font-size: 1rem;
        margin-bottom: 10px;
        color: #444;
    }

    .dashboard-box a {
        font-weight: 500;
        font-size: 0.95rem;
        text-decoration: none;
    }

    /* Background Color Classes */
    .red-bg {
        background: #f44336;
        color: #fff;
    }

    .blue-bg {
        background: #2196f3;
        color: #fff;
    }

    .green-bg {
        background: #4caf50;
        color: #fff;
    }

    .orange-bg {
        background: #ff9800;
        color: #fff;
    }

    .gray-bg {
        background: #607d8b;
        color: #fff;
    }

    /* Override inner text color for contrast */
    .dashboard-box.red-bg a,
    .dashboard-box.blue-bg a,
    .dashboard-box.green-bg a,
    .dashboard-box.orange-bg a,
    .dashboard-box.gray-bg a {
        color: #fff;
    }

    .dashboard-box i {
        transition: transform 0.3s ease;
    }

    .dashboard-box:hover i {
        transform: scale(1.2);
    }

    .col-lg-3.col-md-6.col-sm-12 {
        padding: 3px;
    }
</style>

<link rel="stylesheet" href="{{ asset('/public/css/adminpanel.css') }}">
@section('mainContent')
    <section class="mb-40">
        <div class="container-fluid p-0">
            <div class="white-box">
                <div class="container">
                    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                        <h1>Admin Dashboard</h1>
                    </div>
                    <div class="row g-3 py-2">

                        <!-- Student List -->
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                            <div class="dashboard-card bg-success text-white text-center">
                                <a href="{{ url('/student-list') }}" class="stretched-link">
                                    <i class="fas fa-users"></i>
                                    <h6>All Students</h6>
                                </a>
                            </div>
                        </div>

                        <!-- Collect Fees -->
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                            <div class="dashboard-card bg-danger text-white text-center">
                                <a href="{{ url('/fees/due-fees') }}" class="stretched-link">
                                    <i class="fas fa-dollar-sign"></i>
                                    <h6>Collect Fees</h6>
                                </a>
                            </div>
                        </div>

                        <!-- Examination -->
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                            <div class="dashboard-card bg-info text-white text-center">
                                <a href="{{ url('exam') }}" class="stretched-link">
                                    <i class="fas fa-file-alt"></i>
                                    <h6>Examination</h6>
                                </a>
                            </div>
                        </div>

                        <!-- Certificate -->
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                            <div class="dashboard-card bg-primary text-white text-center">
                                <a href="{{ url('/student-certificate') }}" class="stretched-link">
                                    <i class="fas fa-certificate"></i>
                                    <h6>Certificate</h6>
                                </a>
                            </div>
                        </div>

                        <!-- Attendance -->
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                            <div class="dashboard-card bg-info text-white text-center">
                                <a href="{{ url('student-attendance-report') }}" class="stretched-link">
                                    <i class="fas fa-calendar-check"></i>
                                    <h6>Attendance</h6>
                                </a>
                            </div>
                        </div>

                        <!-- All Staff -->
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                            <div class="dashboard-card bg-secondary text-white text-center">
                                <a href="{{ url('/staff-directory') }}" class="stretched-link">
                                    <i class="fas fa-users-cog"></i>
                                    <h6>All Staff</h6>
                                </a>
                            </div>
                        </div>

                        <!-- Reports -->
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                            <div class="dashboard-card bg-success text-white text-center">
                                <a href="{{ url('/search-profit-by-date') }}" class="stretched-link">
                                    <i class="fas fa-chart-line"></i>
                                    <h6>Reports</h6>
                                </a>
                            </div>
                        </div>

                        <!-- Users -->
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                            <div class="dashboard-card bg-danger text-white text-center">
                                <a href="{{ url('staff-directory') }}" class="stretched-link">
                                    <i class="fas fa-user"></i>
                                    <h6>Users</h6>
                                </a>
                            </div>
                        </div>

                        <!-- Backups -->
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                            <div class="dashboard-card bg-info text-white text-center">
                                <a href="{{ url('/backup-settings') }}" class="stretched-link">
                                    <i class="fas fa-database"></i>
                                    <h6>Backups</h6>
                                </a>
                            </div>
                        </div>

                        <!-- Settings -->
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                            <div class="dashboard-card bg-primary text-white text-center">
                                <a href="#" class="stretched-link">
                                    <i class="fas fa-cog"></i>
                                    <h6>Settings</h6>
                                </a>
                            </div>
                        </div>

                        <!-- Library -->
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                            <div class="dashboard-card text-white text-center" style="background-color: rgb(30, 53, 74);">
                                <a href="{{ url('all-issed-book') }}" class="stretched-link">
                                    <i class="fas fa-book"></i>
                                    <h6>Library</h6>
                                </a>
                            </div>
                        </div>

                        <!-- Unpaid Vouchers -->
                        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                            <div class="dashboard-card text-white text-center" style="background-color: rgb(242, 153, 19);">
                                <a href="{{ url('fees/bank-payment') }}" class="stretched-link">
                                    <i class="fas fa-file-invoice-dollar"></i>
                                    <h6>Unpaid Vouchers</h6>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>


    <div class="container my-4">
        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <h1>Income Details</h1>
        </div>
        <div class="row g-4">
            <!-- Dues -->
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="dashboard-box red-bg">
                    <div class="box-icon"><i class="fas fa-file-invoice-dollar"></i></div>
                    <h4>27</h4>
                    <p>Dues - Amount 64750</p>
                    <a href="#">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <!-- Total Income This Year -->
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="dashboard-box blue-bg">
                    <div class="box-icon"><i class="fas fa-coins"></i></div>
                    <h4>{{ $y_total_income }}</h4>
                    <p>Total Income This Year</p>
                    <a href="#">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <!-- Income This Month -->
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="dashboard-box green-bg">
                    <div class="box-icon"><i class="fas fa-chart-line"></i></div>
                    <h4>{{ $m_total_income }}</h4>
                    <p>Income This Month</p>
                    <a href="#">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <!-- Profit This Month -->
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="dashboard-box green-bg">
                    <div class="box-icon"><i class="fas fa-hand-holding-usd"></i></div>
                    <h4>{{ $m_total_income - $m_total_expense }}</h4>
                    <p>Profit This Month</p>
                    <a href="#">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <!-- Expense This Year -->
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="dashboard-box orange-bg">
                    <div class="box-icon"><i class="fas fa-money-check-alt"></i></div>
                    <h4>{{ $y_total_expense }} </h4>
                    <p>Expense This Year</p>
                    <a href="#">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <!-- Expense This Month -->
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="dashboard-box orange-bg">
                    <div class="box-icon"><i class="fas fa-wallet"></i></div>
                    <h4>{{ $m_total_expense }}</h4>
                    <p>Expense This Month</p>
                    <a href="#">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <!-- Income Today -->
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="dashboard-box gray-bg">
                    <div class="box-icon"><i class="fas fa-calendar-day"></i></div>
                    <h4>{{ $today_income }}</h4>
                    <p>Income Today</p>
                    <a href="#">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <!-- Expense Today -->
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="dashboard-box gray-bg">
                    <div class="box-icon"><i class="fas fa-calendar-check"></i></div>
                    <h4>{{ $today_expense }}</h4>
                    <p>Expense Today</p>
                    <a href="#">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
    </div>




    <div class="col-12 col-sm-6 col-md-4 col-lg-3">
        <h1>Expense Details Records</h1>
    </div>


    <div class="container my-4">
        <div class="row">

            <div class="col-lg-8">
                <div class="income-chart">
                    <div class="d-flex justify-content-between align-items-center flex-wrap">
                        <h5 class="mb-5">Income & Expenses</h5>
                        <div class="d-flex justify-content-end mb-5">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="incomeToggle" id="monthlyRadio"
                                    value="monthly" checked>
                                <label class="form-check-label" for="monthlyRadio">Monthly</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="incomeToggle" id="annuallyRadio"
                                    value="annually">
                                <label class="form-check-label" for="annuallyRadio">Annually</label>
                            </div>
                        </div>
                    </div>


                    @php
                        // Income query
                        $day_incomes = DB::table('sm_add_incomes')
                            ->where('academic_id', getAcademicId())
                            ->where('name', '!=', 'Fund Transfer')
                            ->where('school_id', Auth::user()->school_id)
                            ->where('active_status', 1)
                            ->where('date', '>=', date('Y') . '-01-01')
                            ->where('date', '<=', date('Y-m-d'))
                            ->get(['amount', 'date']);

                        // Expense query (make sure this table/model exists)
                        $day_expenses = DB::table('sm_add_expenses')
                            ->where('academic_id', getAcademicId())
                            ->where('name', '!=', 'Fund Transfer')
                            ->where('school_id', Auth::user()->school_id)
                            ->where('active_status', 1)
                            ->where('date', '>=', date('Y') . '-01-01')
                            ->where('date', '<=', date('Y-m-d'))
                            ->get(['amount', 'date']);

                        // Setup day-wise buckets for current month
                        $daysInMonth = date('t');
                        $incomeData = array_fill(1, $daysInMonth, 0);
                        $expenseData = array_fill(1, $daysInMonth, 0);

                        foreach ($day_incomes as $income) {
                            $day = (int) date('j', strtotime($income->date)); // day of month
                            $incomeData[$day] += $income->amount;
                        }

                        foreach ($day_expenses as $expense) {
                            $day = (int) date('j', strtotime($expense->date));
                            $expenseData[$day] += $expense->amount;
                        }

                    @endphp



                    <div class="row text-center">
                        <div class="col">
                            <h6>Income</h6>
                            <p>{{ generalSetting()->currency_symbol }} <strong id="incomeAmount"></strong></p>
                        </div>
                        <div class="col">
                            <h6>Expenses</h6>
                            <p>{{ generalSetting()->currency_symbol }} <strong id="expenseAmount"></strong></p>
                        </div>
                        <div class="col">
                            <h6>Profit</h6>
                            <p>{{ generalSetting()->currency_symbol }} <strong id="profitAmount"></strong></p>
                        </div>

                    </div>
                    <canvas id="incomeExpenseChart" height="100"></canvas>
                </div>
            </div>

            @php
                use Carbon\Carbon;

                $currentDate = Carbon::now()->format('Y-m-d'); // Get current date in 'Y-m-d' format

                $pStudent = DB::table('sm_student_attendances')
                    ->where('attendance_type', 'P')
                    ->where('attendance_date', $currentDate)
                    ->count();

                $lStudent = DB::table('sm_student_attendances')
                    ->where('attendance_type', 'L')
                    ->where('attendance_date', $currentDate)
                    ->count();

                $aStudent = DB::table('sm_student_attendances')
                    ->where('attendance_type', 'A')
                    ->where('attendance_date', $currentDate)
                    ->count();

                $pStaff = DB::table('sm_staff_attendences')
                    ->where('attendence_type', 'P')
                    ->where('attendence_date', $currentDate)
                    ->count();

                $lStaff = DB::table('sm_staff_attendences')
                    ->where('attendence_type', 'L')
                    ->where('attendence_date', $currentDate)
                    ->count();

                $aStaff = DB::table('sm_staff_attendences')
                    ->where('attendence_type', 'A')
                    ->where('attendence_date', $currentDate)
                    ->count();

                $tStudent = DB::table('sm_students')->count();
                $tStudentM = DB::table('sm_students')->where('gender_id', '1')->count();
                $tStudentF = DB::table('sm_students')->where('gender_id', '2')->count();

            @endphp
            <div class="col-lg-4">
                <div class="sidebar-widget green-sidebar">
                    <h6>Staff Attendance Overview</h6>
                    <p style="color: white">Present: {{ $pStaff ?? '0' }}, Absent: {{ $aStaff ?? '0' }}, Late:
                        {{ $lStaff }}</p>
                </div>
                <div class="sidebar-widget blue-sidebar">
                    <h6>Student Attendance Overview</h6>
                    <p style="color: white">Present: {{ $pStudent ?? '0' }}, Absent: {{ $aStudent ?? '0' }}, Late:
                        {{ $aStudent }}</p>
                </div>
                <div class="sidebar-widget purple-sidebar">
                    <h6>Total Students: {{ $tStudent ?? '0' }}</h6>
                    <p style="color: white">Girls: {{ $tStudentF ?? '0' }}, Boys: {{ $tStudentM ?? '0' }}</p>
                </div>
                <div class="sidebar-widget orange-sidebar">
                    <h6>Session Year</h6>
                    <p style="color: white">Session: 2025-26</p>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        let chart;

        function renderChart(labels, incomeData, expenseData) {
            const ctx = document.getElementById('incomeExpenseChart').getContext('2d');

            if (chart) chart.destroy();

            chart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                            label: 'Income',
                            data: incomeData,
                            backgroundColor: '#3498db'
                        },
                        {
                            label: 'Expenses',
                            data: expenseData,
                            backgroundColor: '#e74c3c'
                        }
                    ]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        }



        function fetchChartData(type) {
            fetch(`{{ url('/income-expense-chart-data?filter=${type}') }}`)
                .then(res => res.json())
                .then(data => {
                    console.log(data);

                    renderChart(data.labels, data.income, data.expense);

                    // Total income and expenses
                    const totalIncome = data.income.reduce((acc, val) => acc + val, 0);
                    const totalExpense = data.expense.reduce((acc, val) => acc + val, 0);
                    const profit = totalIncome - totalExpense;

                    document.getElementById('incomeAmount').innerText = totalIncome;
                    document.getElementById('expenseAmount').innerText = totalExpense;
                    document.getElementById('profitAmount').innerText = profit;
                });
        }

        // Listen to radio buttons
        document.querySelectorAll('input[name="incomeToggle"]').forEach(radio => {
            radio.addEventListener('change', function() {
                fetchChartData(this.value);
            });
        });

        // Load default data
        fetchChartData('monthly');
    </script>
@endsection
