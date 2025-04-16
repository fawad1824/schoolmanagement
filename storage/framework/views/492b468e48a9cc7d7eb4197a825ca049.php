<?php
    $school_config = schoolConfig();
    $isSchoolAdmin = Session::get('isSchoolAdmin');
?>

<style>
    a.d-block.mb-1 {
        color: black;
        text-decoration: blink;
    }

    nav#sidebar {
        background: #012f63;
    }

    a.d-block.mb-1 {
        color: #afafaf;
        text-decoration: blink;
    }

    .sidebar {
        width: 270px;
        height: 100vh;
        padding: 20px;
    }

    .sidebar1 {
        width: 270px;
        height: 100vh;
        /* padding: 20px; */
    }

    .main-content {
        flex: 1;
        padding: 50px;
    }

    .menu-header {
        cursor: pointer;
    }

    .menu-header i {
        margin-right: 10px;
    }
</style>
<!-- sidebar part here -->
<nav id="sidebar" class="sidebar">

    <div class="sidebar-header update_sidebar" style="text-align: center;">
        <?php if(Auth::user()->role_id != 2 && Auth::user()->role_id != 3 && Auth::user()->role_id != App\GlobalVariable::isAlumni()): ?>
            <?php if(userPermission('dashboard')): ?>
                <?php if(moduleStatusCheck('Saas') == true &&
                        Auth::user()->is_administrator == 'yes' &&
                        Session::get('isSchoolAdmin') == false &&
                        Auth::user()->role_id == 1): ?>
                    <a href="<?php echo e(url('superadmin-dashboard')); ?>" id="superadmin-dashboard">
                    <?php else: ?>
                        <a href="<?php echo e(url('admin-dashboard')); ?>" id="admin-dashboard">
                <?php endif; ?>
            <?php else: ?>
                <a href="<?php echo e(url('/')); ?>" id="admin-dashboard">
            <?php endif; ?>
        <?php else: ?>
            <a href="<?php echo e(url('/')); ?>" id="admin-dashboard">
        <?php endif; ?>
        <?php if(!is_null($school_config->logo)): ?>
            <img src="<?php echo e(asset($school_config->logo)); ?>" alt="logo">
        <?php else: ?>
            <img src="<?php echo e(asset('public/uploads/settings/logo.png')); ?>" alt="logo">
        <?php endif; ?>
        </a>
        <a id="close_sidebar" class="d-lg-none">
            <i class="ti-close"></i>
        </a>

    </div>


    <div class="sidebar1">
        <div class="sidebar">
            <!-- Dashboard -->
            <div>
                <div class="menu-header fw-bold mb-3" data-bs-toggle="collapse" data-bs-target="#dashboard">
                    Dashboard
                </div>
                <div class="collapse ps-3 mb-3" id="dashboard">
                    <a href="#" class="d-block mb-1">Super Admin Dashboard</a>
                    <a href="#" class="d-block mb-1">Admin Dashboard</a>
                    <a href="#" class="d-block mb-1">Teacher Dashboard</a>
                    <a href="#" class="d-block mb-1">Student Dashboard</a>
                    <a href="#" class="d-block mb-1">Parent Dashboard</a>
                    <a href="#" class="d-block mb-1">Library Dashboard</a>
                    <a href="#" class="d-block mb-1">Accountant Dashboard</a>
                    <a href="#" class="d-block mb-1">Staff Dashboard</a>
                </div>
            </div>

            <!-- Admission Management -->
            <div>
                <div class="menu-header fw-bold mb-3" data-bs-toggle="collapse" data-bs-target="#admissionManagement">
                    Admission Management
                </div>
                <div class="collapse ps-3 mb-3" id="admissionManagement">
                    <a href="<?php echo e(url('student-admission')); ?>" class="d-block mb-1">Admit Student</a>
                    <a href="<?php echo e(url('multi-class-student')); ?>" class="d-block mb-1">Admit Bulk Student</a>
                    <a href="<?php echo e(url('admission-query')); ?>" class="d-block mb-1">Admission Request</a>
                    <div>
                        <div class="menu-header mb-1" data-bs-toggle="collapse" data-bs-target="#admissionInquiries">
                            Admission Inquiries <i class="fas fa-angle-down"></i>
                        </div>
                        <div class="collapse ps-3" id="admissionInquiries">
                            <a href="<?php echo e(url('admission-query')); ?>" class="d-block mb-1">Manage Inquiries</a>
                            <a href="<?php echo e(url('studentabsentnotification')); ?>" class="d-block mb-1">Send SMS to
                                Inquiries</a>
                        </div>
                    </div>
                    <a href="<?php echo e(url('student-report')); ?>" class="d-block mb-1">Print Admission Form</a>
                </div>
            </div>

            <!-- Student Management -->
            <div>
                <div class="menu-header fw-bold mb-3" data-bs-toggle="collapse" data-bs-target="#studentManagement">
                    Student Management
                </div>
                <div class="collapse ps-3 mb-3" id="studentManagement">
                    <a href="<?php echo e(url('student-list')); ?>" class="d-block mb-1">Student Information</a>
                    <a href="<?php echo e(url('student-promote')); ?>" class="d-block mb-1">Student Promotion</a>
                    <a href="#" class="d-block mb-1">Student Birthdays</a>
                    <a href="#" class="d-block mb-1">Student Transfer</a>
                </div>
            </div>

            <!-- Parent Account -->
            <div>
                <div class="menu-header fw-bold mb-3" data-bs-toggle="collapse" data-bs-target="#parentAccount">
                    Parent Account
                </div>
                <div class="collapse ps-3 mb-3" id="parentAccount">
                    <a href="#" class="d-block mb-1">Manage Account</a>
                    <a href="#" class="d-block mb-1">Account Request</a>
                </div>
            </div>

            <!-- Staff Management -->
            <div>
                <div class="menu-header fw-bold mb-3" data-bs-toggle="collapse" data-bs-target="#staffManagement">
                    Staff Management
                </div>
                <div class="collapse ps-3 mb-3" id="staffManagement">
                    <a href="<?php echo e(url('staff-directory')); ?>" class="d-block mb-1">Staff Management</a>
                </div>
            </div>

            <!-- ID Card Print -->
            <div>
                <div class="menu-header fw-bold mb-3" data-bs-toggle="collapse" data-bs-target="#idCardPrint">
                    ID Card Print
                </div>
                <div class="collapse ps-3 mb-3" id="idCardPrint">
                    <a href="<?php echo e(url('student-id-card')); ?>" class="d-block mb-1">Print Student Card</a>
                    <a href="<?php echo e(url('generate-id-card')); ?>" class="d-block mb-1">Print Staff Card</a>
                    <a href="#" class="d-block mb-1">ID Card Setting</a>
                </div>
            </div>

            <!-- Manage Accounts -->
            <div>
                <div class="menu-header fw-bold mb-3" data-bs-toggle="collapse" data-bs-target="#manageAccounts">
                    Manage Accounts
                </div>
                <div class="collapse ps-3 mb-3" id="manageAccounts">
                    <a href="<?php echo e(url('bank-account')); ?>" class="d-block mb-1">Manage Accounts</a>
                </div>
            </div>

            <!-- Public Message -->
            <div>
                <div class="menu-header fw-bold mb-3" data-bs-toggle="collapse" data-bs-target="#publicMessage">
                    Public Message
                </div>
                <div class="collapse ps-3 mb-3" id="publicMessage">
                    <a href="/notice-list" class="d-block mb-1">Send Public Message</a>
                </div>
            </div>

            <!-- Classes -->
            <div>
                <div class="menu-header fw-bold mb-3" data-bs-toggle="collapse" data-bs-target="#classes">
                    Classes
                </div>
                <div class="collapse ps-3 mb-3" id="classes">
                    <a href="<?php echo e(url('class')); ?>" class="d-block mb-1">Manage Class</a>
                    <a href="#" class="d-block mb-1">Manage Section</a>
                </div>
            </div>

            <!-- Subject -->
            <div>
                <div class="menu-header fw-bold mb-3" data-bs-toggle="collapse" data-bs-target="#subject">
                    Subject
                </div>
                <div class="collapse ps-3 mb-3" id="subject">
                    <a href="<?php echo e(url('section')); ?>" class="d-block mb-1">Manage Subjects</a>
                </div>
            </div>

            <!-- Manage Attendance -->
            <div>
                <div class="menu-header fw-bold mb-3" data-bs-toggle="collapse" data-bs-target="#manageAttendance">
                    Manage Attendance
                </div>
                <div class="collapse ps-3 mb-3" id="manageAttendance">
                    <a href="<?php echo e(url('student-attendance')); ?>" class="d-block mb-1">Student Attendance</a>
                    <a href="<?php echo e(url('staff-attendance')); ?>" class="d-block mb-1">Staff Attendance</a>
                </div>
            </div>

            <!-- Online Class -->
            <div>
                <div class="menu-header fw-bold mb-3" data-bs-toggle="collapse" data-bs-target="#onlineClass">
                    Online Class
                </div>
                <div class="collapse ps-3 mb-3" id="onlineClass">
                    <a href="#" class="d-block mb-1">Manage Online Class</a>
                </div>
            </div>

            <!-- Timetable Management -->
            <div>
                <div class="menu-header fw-bold mb-3" data-bs-toggle="collapse"
                    data-bs-target="#timetableManagement">
                    Timetable Management
                </div>
                <div class="collapse ps-3 mb-3" id="timetableManagement">
                    <a href="#" class="d-block mb-1">Manage Timetable</a>
                </div>
            </div>

            <!-- Fee Payment -->
            <div>
                <div class="menu-header fw-bold mb-3" data-bs-toggle="collapse" data-bs-target="#feePayment">
                    Fee Payment
                </div>
                <div class="collapse ps-3 mb-3" id="feePayment">
                    <a href="#" class="d-block mb-1">Manage Fee Payment</a>
                </div>
            </div>

            <!-- Accounting -->
            <div>
                <div class="menu-header fw-bold mb-3" data-bs-toggle="collapse" data-bs-target="#accounting">
                    Accounting
                </div>
                <div class="collapse ps-3 mb-3" id="accounting">
                    <a href="#" class="d-block mb-1">General Monthly Fee</a>
                    <a href="#" class="d-block mb-1">General Custom Fee</a>
                    <a href="#" class="d-block mb-1">General Transport Fee</a>
                    <a href="#" class="d-block mb-1">Family Fee Calculator</a>
                    <a href="#" class="d-block mb-1">Direct Payment</a>
                    <div>
                        <div class="menu-header mb-1" data-bs-toggle="collapse" data-bs-target="#directPayment">
                            Direct Payment <i class="fas fa-angle-down"></i>
                        </div>
                        <div class="collapse ps-3" id="directPayment">
                            <a href="#" class="d-block mb-1">Student Payment</a>
                            <a href="#" class="d-block mb-1">Custom Payment</a>
                        </div>
                    </div>
                    <a href="#" class="d-block mb-1">SMS to Fee Defaulters</a>
                    <a href="#" class="d-block mb-1">Balance Sheet</a>
                    <a href="#" class="d-block mb-1">Delete Fees</a>
                    <a href="#" class="d-block mb-1">General Fee Increment</a>
                    <div>
                        <div class="menu-header mb-1" data-bs-toggle="collapse" data-bs-target="#feeIncrement">
                            General Fee Increment <i class="fas fa-angle-down"></i>
                        </div>
                        <div class="collapse ps-3" id="feeIncrement">
                            <a href="#" class="d-block mb-1">Increment by Percentage</a>
                            <a href="#" class="d-block mb-1">Increment by Amount</a>
                        </div>
                    </div>
                    <a href="#" class="d-block mb-1">General Fee Decrement</a>
                    <div>
                        <div class="menu-header mb-1" data-bs-toggle="collapse" data-bs-target="#feeDecrement">
                            General Fee Decrement <i class="fas fa-angle-down"></i>
                        </div>
                        <div class="collapse ps-3" id="feeDecrement">
                            <a href="#" class="d-block mb-1">Decrement by Percentage</a>
                            <a href="#" class="d-block mb-1">Decrement by Amount</a>
                        </div>
                    </div>
                    <a href="#" class="d-block mb-1">Discounted Student</a>
                    <a href="#" class="d-block mb-1">Print Fee Vouchers</a>
                </div>
            </div>

            <!-- Expense Management -->
            <div>
                <div class="menu-header fw-bold mb-3" data-bs-toggle="collapse" data-bs-target="#expenseManagement">
                    Expense Management
                </div>
                <div class="collapse ps-3 mb-3" id="expenseManagement">
                    <a href="#" class="d-block mb-1">Manage Expenses</a>
                </div>
            </div>

            <!-- Staff Salary Management -->
            <div>
                <div class="menu-header fw-bold mb-3" data-bs-toggle="collapse" data-bs-target="#salaryManagement">
                    Staff Salary Management
                </div>
                <div class="collapse ps-3 mb-3" id="salaryManagement">
                    <a href="#" class="d-block mb-1">General Salary</a>
                    <a href="#" class="d-block mb-1">Manage Salaries</a>
                    <a href="#" class="d-block mb-1">Loan Management</a>
                    <a href="#" class="d-block mb-1">Salary Setting</a>
                </div>
            </div>

            <!-- Reports -->
            <div>
                <div class="menu-header fw-bold mb-3" data-bs-toggle="collapse" data-bs-target="#reportArea">
                    Report Area
                </div>
                <div class="collapse ps-3 mb-3" id="reportArea">
                    <a href="#" class="d-block mb-1">Fee Defaulter Report</a>
                    <a href="#" class="d-block mb-1">Income & Expense Report</a>
                    <a href="#" class="d-block mb-1">List of Unpaid Invoice</a>
                    <a href="#" class="d-block mb-1">Fee Discount Report</a>
                    <a href="#" class="d-block mb-1">Account Summary Report</a>
                    <a href="#" class="d-block mb-1">Detailed Income Report</a>
                    <a href="#" class="d-block mb-1">Detailed Expense Report</a>
                    <a href="#" class="d-block mb-1">Staff Salary Report</a>
                    <a href="#" class="d-block mb-1">Admission Date Report</a>
                    <a href="#" class="d-block mb-1">Student Information Report</a>
                </div>
            </div>
        </div>
    </div>


    <?php $__env->startPush('script'); ?>
        <script>
            const items = document.querySelectorAll('.menu-item');

            items.forEach(item => {
                const title = item.querySelector('.nav_title');

                title.addEventListener('click', () => {
                    // Collapse all
                    items.forEach(i => i.classList.remove('active'));
                    // Expand current
                    item.classList.add('active');
                });
            });
        </script>
    <?php $__env->stopPush(); ?>

</nav>
<?php /**PATH C:\xampp\htdocs\school\resources\views/components/sidebar-component.blade.php ENDPATH**/ ?>