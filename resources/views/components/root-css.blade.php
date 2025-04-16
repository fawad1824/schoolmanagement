<style>
    /* for toastr dynamic start*/
    .toast-success {
        background-color: !important;
    }

    .primary-btn.fix-gr-bg {
        background: #e74c3c !important;
    }

    table.dataTable.dtr-inline.collapsed>tbody>tr[role=row]>td:first-child:before,
    table.dataTable.dtr-inline.collapsed>tbody>tr[role=row]>th:first-child:before {
        background: #e74c3c !important;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button.current,
    .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
        background: #e74c3c !important;
    }

    .CRM_dropdown.dropdown .dropdown-toggle {
        background: transparent;
        color: #e74c3c;
        font-size: 12px;
        font-weight: 500;
        border: 1px solid #e74c3c;
        border-radius: 32px;
        padding: 2px 20px 5px 23px;
        text-transform: uppercase;
        overflow: hidden;
        transition: 0.3s;
        height: 32px;
    }

    .sms-breadcrumb .bc-pages a:last-child {
        margin-right: 0px;
        color: #e74c3c;
    }

    .sms-breadcrumb .bc-pages a:hover {
        color: #e74c3c;
    }

    .crm_tab_header ul li a.active,
    .dataTables_paginate a:hover,
    .pos_tab_btn ul li a.active,
    .pos_tab_btn ul li a:hover,
    .primary_btn:hover,
    .primary_btn_1,
    .primary_btn_1:hover,
    .primary_btn_2,
    .primary_btn_2:hover,
    .primary_btn_circle:hover,
    .primary_btn_large,
    .primary_btn_large:hover,
    .primary_color_btn,
    .primary_color_btn2,
    .switch_toggle input:checked+.slider:before,
    a.dt-button:hover:not(.disabled),
    button.dt-button:hover:not(.disabled),
    div.dt-button:hover:not(.disabled) {
        background: #e74c3c !important;
    }


    :root {
        --primary-color: #e74c3c;
    }

    .header_iner .header_right .header_notification_warp li>a>span.notification_count {
        background: #e74c3c !important;
    }

    .CRM_dropdown.dropdown .dropdown-toggle:focus,
    .CRM_dropdown.dropdown .dropdown-toggle:hover {
        background: #e74c3c !important;
    }

    .toast-message {
        color: ;
    }

    .toast-title {
        color: ;

    }

    .toast {
        color: ;
    }

    .toast-error {
        background-color: !important;
    }

    .toast-warning {
        background-color: !important;
    }
</style>
<style>
    :root {
        --base_font: {{ in_array(session()->get('locale', Config::get('app.locale')), ['ar']) ? 'Cairo,' : '' }}Poppins, sans-serif;
        --box_shadow: {{ $color_theme->box_shadow ? 'var(--box_shadow)' : 'none' }};

        @foreach ($color_theme->colors as $color)
            --{{ $color->name }}: {{ $color->pivot->value }};

            @if (in_array($color->name, ['success', 'danger']))
                --{{ $color->name }}_with_opacity: {{ $color->pivot->value }}23;
            @endif
        @endforeach
    }
</style>
