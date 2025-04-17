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
                            <a href="#" class="d-block mb-1">Manage Inquiries</a>
                            
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
                    <a href="<?php echo e(url('create-id-card')); ?>" class="d-block mb-1">ID Card Setting</a>
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
                    <a href="<?php echo e(url('section')); ?>" class="d-block mb-1">Manage Section</a>
                </div>
            </div>

            <!-- Subject -->
            <div>
                <div class="menu-header fw-bold mb-3" data-bs-toggle="collapse" data-bs-target="#subject">
                    Subject
                </div>
                <div class="collapse ps-3 mb-3" id="subject">
                    <a href="<?php echo e(url('subject')); ?>" class="d-block mb-1">Manage Subjects</a>
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
                    <a href="<?php echo e(url('question-bank')); ?>" class="d-block mb-1">Manage Online Class</a>
                </div>
            </div>

            <!-- Timetable Management -->
            <div>
                <div class="menu-header fw-bold mb-3" data-bs-toggle="collapse"
                    data-bs-target="#timetableManagement">
                    Timetable Management
                </div>
                <div class="collapse ps-3 mb-3" id="timetableManagement">
                    <a href="<?php echo e(url('class-routine-new')); ?>" class="d-block mb-1">Manage Timetable</a>
                </div>
            </div>

            <!-- Fee Payment -->
            <div>
                <div class="menu-header fw-bold mb-3" data-bs-toggle="collapse" data-bs-target="#feePayment">
                    Fee Payment
                </div>
                <div class="collapse ps-3 mb-3" id="feePayment">
                    <a href="<?php echo e(url('fees/search-bank-payment')); ?>" class="d-block mb-1">Manage Fee Payment</a>
                </div>
            </div>

            <!-- Accounting -->
            <div>
                <div class="menu-header fw-bold mb-3" data-bs-toggle="collapse" data-bs-target="#accounting">
                    Accounting
                </div>
                <div class="collapse ps-3 mb-3" id="accounting">
                    <a href="#" class="d-block mb-1">General Monthly Fee</a>
                    <a href="<?php echo e(url('fees/fine-report')); ?>" class="d-block mb-1">General Custom Fee</a>
                    <a href="#" class="d-block mb-1">General Transport Fee</a>
                    <a href="#" class="d-block mb-1">Family Fee Calculator</a>
                    <a href="<?php echo e(url('wallet/wallet-transaction')); ?>" class="d-block mb-1">Direct Payment</a>
                    <div>
                        <div class="menu-header mb-1" data-bs-toggle="collapse" data-bs-target="#directPayment">
                            Direct Payment <i class="fas fa-angle-down"></i>
                        </div>
                        <div class="collapse ps-3" id="directPayment">
                            <a href="<?php echo e(url('fees/balance-report')); ?>" class="d-block mb-1">Student Payment</a>
                            <a href="#" class="d-block mb-1">Custom Payment</a>
                        </div>
                    </div>
                    <a href="#" class="d-block mb-1">SMS to Fee Defaulters</a>
                    <a href="<?php echo e(url('fees/balance-report')); ?>" class="d-block mb-1">Balance Sheet</a>
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
                    <a href="<?php echo e(url('add-expense')); ?>" class="d-block mb-1">Manage Expenses</a>
                </div>
            </div>

            <!-- Staff Salary Management -->
            <div>
                <div class="menu-header fw-bold mb-3" data-bs-toggle="collapse" data-bs-target="#salaryManagement">
                    Staff Salary Management
                </div>
                <div class="collapse ps-3 mb-3" id="salaryManagement">
                    <a href="<?php echo e(url('payroll')); ?>" class="d-block mb-1">General Salary</a>
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
                    <a href="<?php echo e(url('payroll-report')); ?>" class="d-block mb-1">Staff Salary Report</a>
                    <a href="#" class="d-block mb-1">Admission Date Report</a>
                    <a href="<?php echo e(url('student-attendance-report')); ?>" class="d-block mb-1">Student Information
                        Report</a>
                </div>
            </div>


            <!-- Stock inventory -->
            <div>
                <div class="menu-header fw-bold mb-3" data-bs-toggle="collapse" data-bs-target="#stock&inventory">
                    Stock & Inventory
                </div>
                <div class="collapse ps-3 mb-3" id="stock&inventory">
                    <a href="#" class="d-block mb-1">point Of Sale</a>
                    <a href="<?php echo e(url('item-category')); ?>" class="d-block mb-1">Management Categories</a>
                    <a href="<?php echo e(url('item-store')); ?>" class="d-block mb-1">Product & Stock</a>
                    <a href="#" class="d-block mb-1">Add Bulk Product</a>
                </div>
            </div>


            <!-- Exam Management -->
            <div>
                <div class="menu-header fw-bold mb-3" data-bs-toggle="collapse" data-bs-target="#ExamManagement">
                    Stock & Inventory
                </div>
                <div class="collapse ps-3 mb-3" id="ExamManagement">
                    <a href="<?php echo e(url('exam-type')); ?>" class="d-block mb-1">Exam Term/Semester list</a>
                    <a href="<?php echo e(url('marks-grade')); ?>" class="d-block mb-1">Assign Exam Grades</a>
                    <a href="<?php echo e(url('marks-register')); ?>" class="d-block mb-1">Marks entry</a>
                    <a href="<?php echo e(url('examplan/seatplan')); ?>" class="d-block mb-1">Teacher Remarks</a>
                    <a href="<?php echo e(url('tabulation-sheet-report')); ?>" class="d-block mb-1">Exam Timetable</a>
                    <a href="<?php echo e(url('exam')); ?>" class="d-block mb-1">Tabulatation Sheet</a>


                    <div>
                        <div class="menu-header mb-1" data-bs-toggle="collapse" data-bs-target="#positionholder">
                            Positation Holder <i class="fas fa-angle-down"></i>
                        </div>
                        <div class="collapse ps-3" id="positionholder">
                            <a href="<?php echo e(url('progress-card-report')); ?>" class="d-block mb-1">Term/Semester</a>
                            <a href="<?php echo e(url('merit-list-report')); ?>" class="d-block mb-1">Find Result</a>
                        </div>
                    </div>

                    <a href="<?php echo e(url('examplan/admitcard')); ?>" class="d-block mb-1">Print Admit Card/slip</a>
                    <a href="<?php echo e(url('student_incident_report')); ?>" class="d-block mb-1">Teacher Remarks</a>

                    <div>
                        <div class="menu-header mb-1" data-bs-toggle="collapse" data-bs-target="#termssemster">
                            Send Marks By SMS <i class="fas fa-angle-down"></i>
                        </div>
                        <div class="collapse ps-3" id="termssemster">
                            <a href="<?php echo e(url('send-marks-by-sms')); ?>" class="d-block mb-1">Term/Semester wise</a>
                            <a href="<?php echo e(url('send-marks-by-sms')); ?>" class="d-block mb-1">Find Result</a>
                        </div>
                    </div>

                    <div>
                        <div class="menu-header mb-1" data-bs-toggle="collapse" data-bs-target="#printMarks">
                            Print Mark Sheet <i class="fas fa-angle-down"></i>
                        </div>
                        <div class="collapse ps-3" id="printMarks">
                            <a href="<?php echo e(url('online-exam-report')); ?>" class="d-block mb-1">Term/Semester wise</a>
                            <a href="<?php echo e(url('merit-list-report')); ?>" class="d-block mb-1">Find Result</a>
                        </div>
                    </div>
                </div>
            </div>



            <div>
                <!-- 21. Certification -->
                <div class="menu-header fw-bold mb-3" data-bs-toggle="collapse" data-bs-target="#certification">
                    Certification
                </div>
                <div class="collapse ps-3 mb-3" id="certification">
                    <a href="<?php echo e(url('student-certificate')); ?>" class="d-block mb-1">Certificate Printing</a>
                    <a href="<?php echo e(url('student-certificate')); ?>" class="d-block mb-1">Certificate Template</a>
                </div>

                <!-- 22. Daily Homework Diary -->
                <div class="menu-header fw-bold mb-3" data-bs-toggle="collapse" data-bs-target="#homework-diary">
                    Daily Homework Diary
                </div>
                <div class="collapse ps-3 mb-3" id="homework-diary">
                    <a href="<?php echo e(url('homework-list')); ?>" class="d-block mb-1">Add & Manage Diary</a>
                    <a href="#" class="d-block mb-1">Send Diary via SMS</a>
                </div>

                <!-- 23. Student Materials - LMS -->
                <div class="menu-header fw-bold mb-3">
                    <a href="#" class="text-decoration-none">Student Materials - LMS</a>
                </div>

                <!-- 24. Leave Management -->
                <div class="menu-header fw-bold mb-3">
                    <a href="url('approve-leave')" class="text-decoration-none">Leave Management</a>
                </div>

                <!-- 25. SMS Management -->
                <div class="menu-header fw-bold mb-3" data-bs-toggle="collapse" data-bs-target="#sms-management">
                    SMS Management
                </div>
                <div class="collapse ps-3 mb-3" id="sms-management">
                    <a href="#" class="d-block mb-1">SMS to Parent</a>
                    <a href="#" class="d-block mb-1">SMS to Staff</a>
                    <a href="#" class="d-block mb-1">SMS to Specific Number</a>
                    <a href="#" class="d-block mb-1">SMS Template</a>
                    <a href="#" class="d-block mb-1">Sent SMS History</a>
                </div>

                <!-- 26. Email Alert -->
                <div class="menu-header fw-bold mb-3" data-bs-toggle="collapse" data-bs-target="#email-alert">
                    Email Alert
                </div>
                <div class="collapse ps-3 mb-3" id="email-alert">
                    <a href="<?php echo e(url('send-email-sms-view')); ?>" class="d-block mb-1">Message to Specific Email</a>
                    <a href="<?php echo e(url('email-sms-log')); ?>" class="d-block mb-1">Sent Email History</a>
                </div>

                <!-- 27. School Noticeboard -->
                <div class="menu-header fw-bold mb-3">
                    <a href="<?php echo e(url('notice-list')); ?>" class="text-decoration-none">School Noticeboard</a>
                </div>

                <!-- 28. Admin Role Management -->
                <div class="menu-header fw-bold mb-3">
                    <a href="<?php echo e(url('role')); ?>" class="text-decoration-none">Admin Role Management</a>
                </div>

                <!-- 29. Transport -->
                <div class="menu-header fw-bold mb-3">
                    <a href="<?php echo e(url('vehicle')); ?>" class="text-decoration-none">Transport</a>
                </div>

                <!-- 30. Management Biometric Device -->
                <div class="menu-header fw-bold mb-3">
                    <a href="#" class="text-decoration-none">Management Biometric Device</a>
                </div>

                <!-- 31. Website Management -->
                <div class="menu-header fw-bold mb-3" data-bs-toggle="collapse" data-bs-target="#website-management">
                    Website Management
                </div>
                <div class="collapse ps-3 mb-3" id="website-management">
                    <a href="<?php echo e(url('photo-gallery')); ?>" class="d-block mb-1">General & Gallery Setting</a>
                    <a href="#" class="d-block mb-1">Class To Show</a>
                </div>

                <!-- 32. Change Password -->
                <div class="menu-header fw-bold mb-3">
                    <a href="#" class="text-decoration-none">Change Password</a>
                </div>

                <!-- 33. Video Tutorials -->
                <div class="menu-header fw-bold mb-3">
                    <a href="#" class="text-decoration-none">Video Tutorials</a>
                </div>

                <!-- 34. Setting -->
                <div class="menu-header fw-bold mb-3" data-bs-toggle="collapse" data-bs-target="#settings">
                    Setting
                </div>
                <div class="collapse ps-3 mb-3" id="settings">
                    <a href="<?php echo e(url('base-setup')); ?>" class="d-block mb-1">General Setting</a>
                    <a href="<?php echo e(url('sms-settings')); ?>" class="d-block mb-1">SMS Setting</a>
                    <a href="<?php echo e(url('email-settings')); ?>" class="d-block mb-1">Email Setting</a>
                    <a href="<?php echo e(url('payment-method-settings')); ?>" class="d-block mb-1">Payment Setting</a>
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