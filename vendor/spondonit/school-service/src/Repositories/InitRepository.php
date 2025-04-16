<?php

namespace SpondonIt\SchoolService\Repositories;

use App\SmGeneralSettings;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Modules\RolePermission\Entities\InfixRole;
use Modules\RolePermission\Entities\AssignPermission;
use Modules\RolePermission\Entities\Permission;

class InitRepository {

    public function init() {
		config([
            'app.item' => '23876323',
            'spondonit.module_manager_model' => \App\InfixModuleManager::class,
            'spondonit.module_manager_table' => 'infix_module_managers',
            'spondonit.saas_module_name' => 'Saas',
            'spondonit.module_status_check_function' => 'moduleStatusCheck',

            'spondonit.settings_model' => SmGeneralSettings::class,
            'spondonit.module_model' => \Nwidart\Modules\Facades\Module::class,

            'spondonit.user_model' => \App\User::class,
            'spondonit.settings_table' => 'sm_general_settings',
            'spondonit.database_file' => 'infix_edu.sql',
            'spondonit.support_multi_connection' => true,
            'spondonit.php_version' => '8.2.0',
        ]);
    }

    public function config()
	{

        app()->singleton('dashboard_bg', function () {
            $dashboard_background = DB::table('sm_background_settings')->where([['is_default', 1], ['title', 'Dashboard Background']])->first();
            return $dashboard_background;
        });

         app()->singleton('school_info', function () {
            return DB::table('sm_general_settings')->where('school_id', app('school')->id)->first();
        });

       
        app()->singleton('permission', function () {
            if(!Auth::check()){
                return [];
            }
            $infixRole = InfixRole::find(Auth::user()->role_id);
            $permissionIds = AssignPermission::where('role_id', Auth::user()->role_id)
            ->when($infixRole->is_saas == 0, function($q) {
                $q->where('school_id', Auth::user()->school_id);
            })->pluck('permission_id')->toArray();

           return Permission::whereIn('id', $permissionIds)
                                ->pluck('route')->toArray();  
        });

	}

}
