<?php
    $generalSetting = generalSetting();
    $languages = systemLanguage();
    $styles = userColorThemes(auth()->user()->id);

?>

<?php
    $coltroller_role = 1;
?>

<style>
    .fas.fa-robot.menu-only {
        font-size: 20px;
        color: #828bb2;
        margin-right: 5px;
    }

    a.pulse.theme_color.bell_notification_clicker {
        margin-right: 15px !important;
    }

    @media (min-width: 1350px) {
        .header_middle {
            display: block !important;
        }
    }

    .header_iner {
        background: rgb(1, 47, 99) !important;
        position: fixed !important;
        /* width: calc(100% - 265px); */
        box-shadow: 0 4px 20px rgba(39, 32, 120, .1);
        /* margin-left: -30px !important; */
        /* padding-left: 30px !important; */
        padding-right: 30px !important;
        /* z-index: 999; */
    }

    .collaspe_icon.open_miniSide i {
        color: #ffffff;
        cursor: pointer;
        font-size: 18px;
        margin-right: 15px;
    }

    .sidebar #sidebar_menu,
    #sidebar .sidebar-header {
        color: white;
        background: rgb(1, 47, 99) !important;

    }

    .menu_seperator {
        color: white;
    }

    .serach_field-area .search_inner button i {
        font-size: 17px;
        color: white;
    }


    .logout-btn {
        background-color: #e74c3c;
        box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 12px;
        border: none;
        color: #fff;
        border-radius: 20px;
        padding: 5px 15px;
        margin-left: 15px;
        font-size: 14px;
    }
</style>

<div class="container-fluid no-gutters" id="main-nav-for-chat">
    <div class="row">
        <div class="col-lg-12 p-0">
            <div class="header_iner d-flex justify-content-between align-items-center">
                <div class="small_logo_crm d-lg-none">
                    <a href="#">
                        <?php if(!is_null($generalSetting->logo)): ?>
                            <img src="<?php echo e(asset($generalSetting->logo)); ?>" alt="logo">
                        <?php else: ?>
                            <img src="<?php echo e(asset('public/uploads/settings/logo.png')); ?>" alt="logo">
                        <?php endif; ?>
                    </a>
                </div>
                <div id="sidebarCollapse" class="sidebar_icon  d-lg-none">
                    <i class="ti-menu"></i>
                </div>
                <div class="collaspe_icon open_miniSide">
                    <i class="ti-menu"></i>
                </div>

                <div class="serach_field-area ml-40">
                    <div class="search_inner">
                        <form action="#">
                            <div class="search_field">
                                <input type="text" class="form-control primary_input_field input-left-icon"
                                    placeholder="Search" id="search" onkeyup="showResult(this.value)">
                            </div>
                            <button type="submit" style="padding-top: 3px"><i
                                    style="font-size: 13px; padding-left: 13px;" class="ti-search"></i></button>
                        </form>
                    </div>
                    <div id="livesearch" style="display: none;"></div>
                </div>
                <div class="header_right d-flex justify-content-between align-items-center">


                    <ul class="header_notification_warp d-flex align-items-center m-0 p-0 list-unstyled pr-10">
                        
                        <li class="scroll_notification_list">
                            <a class="pulse theme_color bell_notification_clicker show_notifications" href="#">
                                <!-- bell   -->
                                <i class="fas fa-bell"></i>
                                <!--/ bell   -->
                                <span
                                    class="notificationCount notification_count"><?php echo e(count($notifications ?? [])); ?></span>
                                <span class="pulse-ring notification_count_pulse"></span>
                            </a>
                            <!-- Menu_NOtification_Wrap  -->
                            <div class="Menu_NOtification_Wrap notifications_wrap">
                                <div style="background: #012f63;" class="notification_Header">
                                    <h4><?php echo e(__('common.no_unread_notification')); ?></h4>
                                </div>
                                <div class="Notification_body">
                                    <!-- single_notify  -->
                                    <?php $__empty_1 = true; $__currentLoopData = $notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <div class="single_notify d-flex align-items-center"
                                            id="menu_notification_show_<?php echo e($notification->id); ?>">
                                            <div class="notify_thumb">
                                                <i class="fa fa-bell"></i>
                                            </div>
                                            <a href="#" class="unread_notification flex-grow-1"
                                                title="Mark As Read" data-notification_id="<?php echo e($notification->id); ?>">
                                                <div class="notify_content">
                                                    <p class="notification_title"><?php echo strip_tags(\Illuminate\Support\Str::limit(@$notification->message, 70, $end = '...')); ?></p>
                                                </div>
                                            </a>
                                            <h5 class="notification_time text-nowrap">
                                                <?php echo e(formatedDate($notification->created_at)); ?></h5>
                                            <a href="<?php echo e(route('view-single-notification', $notification->id)); ?>">
                                                <svg width="20" height="20" class="notification_close_icon"
                                                    viewBox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <circle opacity="0.5" cx="12" cy="12" r="10"
                                                        stroke="currentColor" stroke-width="1.5"></circle>
                                                    <path d="M14.5 9.50002L9.5 14.5M9.49998 9.5L14.5 14.5"
                                                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round">
                                                    </path>
                                                </svg>
                                            </a>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <span class="text-center"><?php echo e(__('common.no_unread_notification')); ?></span>
                                    <?php endif; ?>

                                </div>
                                <div class="nofity_footer">
                                    <div class="submit_button text-center pt_20">
                                        <a href="<?php echo e(route('view/all/notification', Auth()->user()->id)); ?>"
                                            class="primary-btn radius_30px text_white  fix-gr-bg mark-all-as-read"><?php echo e(__('common.mark_all_as_read')); ?></a>
                                        <a href="<?php echo e(route('all-notification')); ?>"
                                            class="primary-btn radius_30px text_white  fix-gr-bg see_all_notification"><?php echo e(__('common.see_more')); ?></a>
                                    </div>
                                </div>
                            </div>
                            <!--/ Menu_NOtification_Wrap  -->
                        </li>
                        
                    </ul>

                    <div class="profile_info">

                        <div class="user_avatar_div">
                            <img id="profile_pic"
                                src="<?php echo e(@profile() && file_exists(@profile()) ? asset(profile()) : asset('public/backEnd/assets/img/avatar.png')); ?>"
                                alt="">
                        </div>

                    </div>

                    <a class="logout-btn" title="Logout"
                        href="<?php echo e(Auth::user()->role_id == 2 ? route('student-logout') : route('logout')); ?>"
                        onclick="event.preventDefault();

                                      document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt me-1"></i> Logout
                    </a>

                    <form id="logout-form"
                        action="<?php echo e(Auth::user()->role_id == 2 ? route('student-logout') : route('logout')); ?>"
                        method="POST" class="d-none">

                        <?php echo csrf_field(); ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php if(moduleStatusCheck('AiContent')): ?>
    <?php echo $__env->make('aicontent::content_generator_modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>

<?php if(moduleStatusCheck('WhatsappSupport')): ?>
    <?php echo $__env->make('whatsappsupport::partials._popup', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>

<style>
    .messengerContainer:hover {
        cursor: pointer;
    }
</style>
<?php if($messenger_position == 'right'): ?>
    <style>
        .messengerContainer {
            position: fixed;
            bottom: 85px;
            right: 22px;
            width: 48px;
            height: 45px;
            border-radius: 50%;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 24px;
            z-index: 3;
            box-shadow: rgba(0, 0, 0, 0.1) 0px 10px 50px;
        }
    </style>
<?php elseif($messenger_position == 'left'): ?>
    <style>
        .messengerContainer {
            position: fixed;
            bottom: 85px;
            width: 48px;
            height: 45px;
            left: 22px;
            border-radius: 50%;
            color: white;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 24px;
            z-index: 3;
            box-shadow: rgba(0, 0, 0, 0.1) 0px 10px 50px;
        }
    </style>
<?php endif; ?>

<?php
    $school_id = @Auth::user()->school_id;
    $tawk_is_enable = @App\Models\Plugin::where('school_id', $school_id)->where('name', 'tawk')->first()->is_enable;
    $messenger_is_enable = @App\Models\Plugin::where('school_id', $school_id)->where('name', 'messenger')->first()
        ->is_enable;
?>

<?php if($tawk_is_enable == 1): ?>
    <div class="tawk-min-container tawk-test">
        <script type="text/javascript">
            var Tawk_API = Tawk_API || {},
                Tawk_LoadStart = new Date();
            (function() {
                var s1 = document.createElement("script"),
                    s0 = document.getElementsByTagName("script")[0];
                s1.async = true;
                s1.src = `https://embed.tawk.to/<?php echo $__env->make('plugins.tawk_to', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>`;
                s1.charset = 'UTF-8';
                s1.setAttribute('crossorigin', '*');
                s0.parentNode.insertBefore(s1, s0);
            })();
        </script>
    </div>
<?php endif; ?>

<?php if($messenger_is_enable == 1): ?>
    <div class="messengerContainer">
        <!-- Messenger Chat Plugin Code -->
        <div id="fb-root"></div>

        <!-- Your Chat Plugin code -->
        <div id="fb-customer-chat" class="fb-customerchat">
        </div>

        <script>
            var chatbox = document.getElementById('fb-customer-chat');
            chatbox.setAttribute("page_id", "<?php echo $__env->make('plugins.messenger', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>");
            chatbox.setAttribute("attribution", "biz_inbox");
        </script>

        <!-- Your SDK code -->
        <script>
            window.fbAsyncInit = function() {
                FB.init({
                    xfbml: true,
                    version: 'v18.0'
                });
            };

            (function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s);
                js.id = id;
                js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
        </script>
    </div>
<?php endif; ?>

<script>
    var position = '<?php echo e($position); ?>';
    var tawkposition = '';

    if (position == 'left') {
        tawkposition = 'bl';
    } else {
        tawkposition = 'br';
    }
    var Tawk_API = Tawk_API || {};

    Tawk_API.customStyle = {
        visibility: {
            desktop: {
                position: tawkposition,
                xOffset: 0,
                yOffset: 20
            },
            mobile: {
                position: tawkposition,
                xOffset: 0,
                yOffset: 0
            },
            bubble: {
                rotate: '0deg',
                xOffset: -20,
                yOffset: 0
            }
        }
    };
</script>
<?php $__env->startSection('script'); ?>
<?php $__env->stopSection(); ?>
<?php /**PATH C:\xampp\htdocs\school\resources\views/backEnd/partials/menu.blade.php ENDPATH**/ ?>