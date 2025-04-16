@php
    $generalSetting = generalSetting();
    $languages = systemLanguage();
    $styles = userColorThemes(auth()->user()->id);

@endphp
<link rel="stylesheet" href="{{ asset('/public/css/adminpanel.css') }}">


@php
    $coltroller_role = 1;
@endphp

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
        width: calc(100% - 265px);
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
</style>

<div style="padding: 12px;">
    <div class="row">
        <div class="col-lg-12 p-0">
            <div class="header_iner d-flex justify-content-between align-items-center">
                <div class="small_logo_crm d-lg-none">
                    <a href="#">
                        @if (!is_null($generalSetting->logo))
                            <img src="{{ asset($generalSetting->logo) }}" alt="logo">
                        @else
                            <img src="{{ asset('public/uploads/settings/logo.png') }}" alt="logo">
                        @endif
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


                    <div class="header-icons d-flex align-items-center">
                        <button class="icon-btn" title="Notifications">
                            <i class="fas fa-bell"></i>
                        </button>
                        <button class="icon-btn" title="Profile">
                            <i class="fas fa-user-circle"></i>
                        </button>
                        <a class="logout-btn" href="#"
                            onclick="event.preventDefault(); const form = document.getElementById('logout-form'); console.log(form); form?.submit();">
                            Logout
                        </a>

                        <form method="POST"
                            action="{{ Auth::user()->role_id == 2 ? route('logout') : route('logout') }}">
                            @csrf

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@if (moduleStatusCheck('AiContent'))
    @include('aicontent::content_generator_modal')
@endif

@if (moduleStatusCheck('WhatsappSupport'))
    @include('whatsappsupport::partials._popup')
@endif

<style>
    .messengerContainer:hover {
        cursor: pointer;
    }
</style>
@if ($messenger_position == 'right')
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
@elseif($messenger_position == 'left')
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
@endif

@php
    $school_id = @Auth::user()->school_id;
    $tawk_is_enable = @App\Models\Plugin::where('school_id', $school_id)->where('name', 'tawk')->first()->is_enable;
    $messenger_is_enable = @App\Models\Plugin::where('school_id', $school_id)->where('name', 'messenger')->first()
        ->is_enable;
@endphp

@if ($tawk_is_enable == 1)
    <div class="tawk-min-container tawk-test">
        <script type="text/javascript">
            var Tawk_API = Tawk_API || {},
                Tawk_LoadStart = new Date();
            (function() {
                var s1 = document.createElement("script"),
                    s0 = document.getElementsByTagName("script")[0];
                s1.async = true;
                s1.src = `https://embed.tawk.to/@include('plugins.tawk_to')`;
                s1.charset = 'UTF-8';
                s1.setAttribute('crossorigin', '*');
                s0.parentNode.insertBefore(s1, s0);
            })();
        </script>
    </div>
@endif

@if ($messenger_is_enable == 1)
    <div class="messengerContainer">
        <!-- Messenger Chat Plugin Code -->
        <div id="fb-root"></div>

        <!-- Your Chat Plugin code -->
        <div id="fb-customer-chat" class="fb-customerchat">
        </div>

        <script>
            var chatbox = document.getElementById('fb-customer-chat');
            chatbox.setAttribute("page_id", "@include('plugins.messenger')");
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
@endif

<script>
    var position = '{{ $position }}';
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
@section('script')
@endsection
