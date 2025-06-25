<?php

use App\Http\Controllers\Admin\LogController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CacheController;
use App\Http\Controllers\Admin\ConfigController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\User\ClientController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\User\ProfileController;
use App\Http\Controllers\Admin\Website\BlogController;
use App\Http\Controllers\Admin\User\EmployeeController;
use App\Http\Controllers\Admin\Website\PagesController;
use App\Http\Controllers\Admin\Support\TicketController;
use App\Http\Controllers\Admin\Website\SliderController;
use App\Http\Controllers\Admin\GeneralSettingsController;
use App\Http\Controllers\Admin\Support\ContactUsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Auth::routes();

Route::group(['middleware' => 'role:admin'], function () {
    Route::get('/', function () {
        return redirect()->route('admin.login');
    });

    Route::get('/dashboard', 'HomeController@dashboard')->name('home.dashboard');

    //cache
    Route::get('/cache/clear/fd', [CacheController::class, 'clear'])->name('clear.cache');

    // <<========= Start Notification Group Route =========>>
    Route::group(['prefix' => 'notifications', 'as' => 'notification.', 'controller' => NotificationController::class], function () {
        Route::get('/', 'index')->name('index')->middleware('permission:notification_index');
        Route::get('/create', 'showCreateForm')->name('create')->middleware('permission:notification_create');
        Route::post('/create', 'create')->middleware('permission:notification_create');
        Route::get('/{notification}/show', 'show')->name('show')->middleware('permission:notification_show');
        Route::post('/{notification}/delete-api', 'deleteApi')->name('delete.api')->middleware('permission:notification_delete');
        Route::get('/{notification}/recipients', 'recipients')->name('recipients')->middleware('permission:notification_recipients');
        Route::post('/{recipient}/resend-api', 'resend')->name('resend.api')->middleware('permission:notification_resend');
    });
    // <<========= End Notification Group Route =========>>


    // <<========= Start User Group Route =========>>
    // Common Route
    Route::group(['prefix' => 'users', 'as' => 'user.', 'controller' => UserController::class], function () {
        Route::post('/{user}/update-status-api', 'updateStatusApi')->name('update_status.api')->middleware('permission:user_update_status');
        Route::post('/{user}/update-password-api', 'updatePasswordApi')->name('update_password.api')->middleware('permission:user_update_password');
        Route::post('/{user}/delete-api', 'deleteApi')->name('delete.api')->middleware('permission:user_delete');
        Route::post('/{id}/restore-api', 'restoreApi')->name('restore.api')->middleware('permission:user_restore');
    });

    Route::group(['prefix' => 'users', 'as' => 'user.'], function() {
        // Employees
        Route::group(['prefix' => 'employees', 'as' => 'employee.', 'controller' => EmployeeController::class], function () {
            Route::get('/', 'index')->name('index')->middleware('permission:employee_index');
            Route::get('/create', 'create')->name('create')->middleware('permission:employee_create');
            Route::post('/store', 'store')->name('store')->middleware('permission:employee_create');
            Route::get('/{user}/edit', 'edit')->name('edit')->middleware('permission:employee_update');
            Route::post('/{user}/update', 'update')->name('update')->middleware('permission:employee_update');
            Route::get('/{user}/show', 'show')->name('show')->middleware('permission:employee_show');

            Route::get('/{user}/details', 'details')->name('details')->middleware('permission:employee_details');
            Route::get('/{user}/security', 'security')->name('security')->middleware('permission:employee_security');
            Route::post('/{user}/security/update', 'securityUpdate')->name('security.update')->middleware('permission:employee_security_update');
            Route::post('/{user}/change_user_type', 'changeUserType')->name('change_user_type')->middleware('permission:employee_change_to_driver');
        });

        // Client
        Route::group(['prefix' => 'clients', 'as' => 'client.', 'controller' => ClientController::class], function () {
            Route::get('/', 'index')->name('index')->middleware('permission:client_index');
            Route::get('/create', 'showCreateForm')->name('create')->middleware('permission:client_create');
            Route::post('/create', 'create')->name('store')->middleware('permission:client_create');
            Route::get('/{user}/update', 'showUpdateForm')->name('update')->middleware(['permission:client_update']);
            Route::post('/{user}/update', 'update')->middleware(['permission:client_update']);
            Route::get('/{user}/show', 'show')->name('show');
        });
    });

    // Profile
    Route::group(['prefix' => 'profile', 'as' => 'profile.', 'controller' => ProfileController::class], function () {
        Route::get('/', 'index')->name('index')->middleware('permission:user_profile_index');
        Route::get('/update', 'showUpdateForm')->name('update')->middleware('permission:user_profile_update');
        Route::post('/update', 'update')->middleware('permission:user_profile_update');
        Route::get('/update-password', 'showUpdatePasswordForm')->name('update_password')->middleware('permission:user_update_password');
        Route::post('/update-password', 'updatePassword')->middleware('permission:user_update_password');
        Route::get('/notification/all', 'showAllNotifications')->name('notification')->middleware('permission:user_profile_all_notification');
    });
    // <<========= End User Group Route =========>>


    // <<========= Start Support Group Route =========>>
    Route::group(['prefix' => 'support', 'as' => 'support.'], function () {
        // Tickets
        Route::group(['prefix' => 'tickets', 'as' => 'ticket.', 'controller' => TicketController::class], function () {

            Route::get('/my-tickets', 'index')->name('index')->middleware('permission:ticket_my_ticket');
            Route::get('/create', 'showCreateForm')->name('create')->middleware('permission:ticket_create');
            Route::post('/create', 'create')->middleware('permission:ticket_create');
            Route::get('/{ticket}/update', 'showUpdateForm')->name('update')->middleware('permission:ticket_update');
            Route::post('/{ticket}/update', 'update')->middleware('permission:ticket_update');
            Route::get('/{ticket}/show', 'show')->name('show')->middleware('permission:ticket_show');
            Route::post('/{ticket}/reply', 'reply')->name('reply')->middleware('permission:ticket_reply');
            Route::post('/{ticket}/assignee', 'changeAssignee')->name('assignee')->middleware('permission:ticket_assignee');
            Route::post('/{ticket}/change-status', 'changeStatus')->name('change_status')->middleware('permission:ticket_change_status');
            Route::get('/{ticket}/reopen', 'reOpen')->name('reopen')->middleware('permission:ticket_reopen');
            Route::get('/all-tickets', 'allTickets')->name('all')->middleware('permission:ticket_all_ticket');
        });

        // Contact Us
        Route::group(['prefix' => 'contact_us', 'as' => 'contact_us.', 'controller' => ContactUsController::class], function () {

            Route::get('/', 'index')->name('index')->middleware('permission:contact_us_index');
            Route::get('/{contact_message}/get-message', 'getMessage')->name('getMessage')->middleware('permission:contact_us_index');
            Route::post('/{contact_message}/status-reply-change', 'changeRepliedStatus')->name('change_reply_status')->middleware('permission:contact_us_status');
            Route::post('/{contact_message}/delete', 'destroy')->name('delete')->middleware('permission:contact_us_delete');
        });


    });
    // <<========= End Support Group Route =========>>



    // <<========= Start Config Group Route =========>>
    Route::group(['prefix' => 'configs', 'as' => 'config.', 'controller' => ConfigController::class], function () {
        // Roles & Permissions
        Route::group(['prefix' => 'roles', 'as' => 'role.', 'controller' => RoleController::class], function () {
            Route::get('/', 'index')->name('index')->middleware('permission:role_index');
            Route::get('/{role}/show-api', 'showApi')->name('show.api')->middleware('permission:role_show');
            Route::post('/create', 'createApi')->name('create.api')->middleware('permission:role_create');
            Route::post('/{role}/update-api', 'updateApi')->name('update.api')->middleware('permission:role_update');
            Route::post('/{role}/delete-api', 'deleteApi')->name('delete.api')->middleware('permission:role_delete');
            Route::get('/{role}/permissions', 'permissions')->name('permission')->middleware('permission:role_permission');
            Route::post('/{role}/permissions/update', 'updatePermissions')->name('permission.update')->middleware('permission:role_permission_update');
        });

        // Dropdowns
        Route::group(['prefix' => 'dropdowns', 'as' => 'dropdown.'], function () {
            Route::get('/', 'dropdownMenu')->name('menu')->middleware('permission:dropdown_index');
            Route::get('/{dropdown}', 'dropdowns')->name('index')->middleware('permission:dropdown_index');
            Route::post('/{dropdown}/create-api', 'createDropdownApi')->name('create.api')->middleware('permission:dropdown_create');
            Route::post('/{dropdown}/{id}/update-api', 'updateDropdownApi')->name('update.api')->middleware('permission:dropdown_update');
            Route::post('/{dropdown}/{id}/delete-api', 'deleteDropdownApi')->name('delete.api')->middleware('permission:dropdown_delete');
        });

        // Route::get('/general-settings', 'general')->name('general.settings')->middleware('permission:config_genaral_settings_show');
        Route::post('/general', 'updateGeneralSettings')->name('general.settings.update')->middleware('permission:genaral_settings_update');

        Route::group(['prefix' => 'more-settings', 'as' => 'more_settings.', 'controller' => ConfigController::class], function () {
            Route::get('/', 'moreSettings')->name('index');
            Route::get('/email-settings', 'emailSettings')->name('email.settings')->middleware('permission:email_settings_show');
            Route::post('/update-email-settings', 'updateEmailSettings')->name('email.settings.update')->middleware('permission:email_settings_update');
            Route::post('/send-test-email', 'sendTestMail')->name('send.test.email')->middleware('permission:email_settings_show');
            Route::get('/social-link', 'socialLink')->name('social.link')->middleware('permission:social_link_show');
            Route::post('/social-link', 'updateSocialLink')->name('social.link.update')->middleware('permission:social_link_update');


            // Email templates
            Route::group(['prefix' => 'email-templates', 'as' => 'email_template.'], function () {
                Route::get('/', 'emailTemplates')->name('index')->middleware('permission:email_template_index');
                Route::get('/{email_template}/update', 'updateEmailTemplateForm')->name('update')->middleware('permission:email_template_update');
                Route::post('/{email_template}/update', 'updateEmailTemplate')->middleware('permission:email_template_update');
            });
        });

        Route::group(['prefix' => 'general-settings', 'as' => 'general_settings.', 'controller' => GeneralSettingsController::class], function () {
            Route::get('/system-details', 'systemDetails')->name('systemDetails')->middleware('permission:general_settings_show');
            Route::get('/address', 'address')->name('address')->middleware('permission:general_settings_show');
            Route::get('/communication', 'communication')->name('communication')->middleware('permission:general_settings_show');
            Route::get('/multimedia', 'multimedia')->name('multimedia')->middleware('permission:general_settings_show');
            Route::get('/preference', 'preference')->name('preference')->middleware('permission:general_settings_show');
            Route::get('/contact-us', 'contactUs')->name('contact_us');

            Route::get('/email-settings', 'emailSettings')->name('email.settings');
            Route::post('/update-email-settings', 'updateEmailSettings')->name('email.settings.update');
            Route::post('/send-test-email', 'sendTestMail')->name('send.test.email');

            Route::post('/update', 'updateGeneralSettings')->name('update')->middleware('permission:general_settings_update');
        });
    });
    // <<========= End Config Group Route =========>>

    // <<========= Start Website Group Route =========>>
    Route::group(['prefix' => 'website'], function () {
         // Hero Slider
         Route::group(['prefix' => 'sliders', 'as' => 'slider.', 'controller' => SliderController::class], function () {
            Route::get('/', 'index')->name('index')->middleware('permission:slider_index');
            Route::post('/store', 'store')->name('store')->middleware('permission:slider_create');
            Route::get('/{slider}/edit', 'edit')->name('edit')->middleware('permission:slider_update');
            Route::post('/{slider}/update', 'update')->name('update')->middleware('permission:slider_update');
            Route::get('/{slider}/delete', 'destroy')->name('delete')->middleware('permission:slider_delete');
            Route::post('/{slider}/status-change', 'changeStatus')->name('change_status')->middleware('permission:slider_status');
            Route::post('/{slider}/featured-change', 'changeFeatured')->name('change_featured')->middleware('permission:slider_status');
        });

        // Blogs
        Route::group(['prefix' => 'blogs', 'as' => 'blog.', 'controller' => BlogController::class], function () {
            Route::get('/', 'index')->name('index')->middleware('permission:blog_index');
            Route::get('/create', 'showCreateForm')->name('create')->middleware('permission:blog_create');
            Route::post('/create', 'create')->middleware('permission:blog_create');
            Route::get('/{blog}/update', 'showUpdateForm')->name('update')->middleware('permission:blog_update');
            Route::post('/{blog}/update', 'update')->middleware('permission:blog_update');
            Route::get('/{blog}/show', 'show')->name('show')->middleware('permission:blog_show');
            Route::post('/{blog}/change-status', 'changeStatus')->name('change_status')->middleware('permission:blog_update_status');
            Route::post('/{blog}/change-featured', 'changeFeatured')->name('change_featured')->middleware('permission:blog_update_status');
            Route::post('/{blog}/delete', 'delete')->name('delete')->middleware('permission:blog_delete');
        });

        // Testimonial
        Route::group(['prefix' => 'pages', 'as' => 'page.', 'controller' => PagesController::class], function () {
            Route::get('/', 'index')->name('index')->middleware('permission:page_index');
            Route::get('/create', 'showCreateForm')->name('create')->middleware('permission:page_create');
            Route::post('/create', 'create')->middleware('permission:page_create');
            Route::get('/{page}/update', 'showUpdateForm')->name('update')->middleware('permission:page_update');
            Route::post('/{page}/update', 'update')->middleware('permission:page_update');
            Route::get('/{page}/show', 'show')->name('show')->middleware('permission:page_show');
            Route::post('/{page}/change-status', 'changeStatus')->name('change_status')->middleware('permission:page_update_status');
            Route::post('/{page}/delete', 'delete')->name('delete')->middleware('permission:page_delete');
        });
    });
    // <<========= End Website Group Route =========>>



    // <<========= Start Footprint Group Route =========>>
    // Logins & Activities
    Route::group(['prefix' => 'logs', 'as' => 'log.', 'controller' => LogController::class], function () {
        Route::get('/logins', 'loginIndex')->name('login.index')->middleware('permission:log_login_index');
        Route::post('/{login}/delete-api', 'deleteLoginApi')->name('delete_login.api')->middleware('permission:log_delete_login');

        Route::get('/activity', 'activityIndex')->name('activity.index')->middleware('permission:log_activity_index');
        Route::get('/activity/{activity}/show', 'activityShow')->name('activity.show')->middleware('permission:log_activity_show');
        Route::post('/activity/{activity}/delete', 'deleteActivity')->name('activity.delete')->middleware('permission:log_activity_delete');

        Route::get('/emails', 'emailIndex')->name('email.index')->middleware('permission:log_email_index');
        Route::get('/emails/{email}/show', 'emailShow')->name('email.show')->middleware('permission:log_email_show');
        Route::post('/emails/{email}/delete', 'deleteEmail')->name('email.delete')->middleware('permission:log_email_delete');
    });
    // <<========= End Footprint Group Route =========>>

    // <<========= Start Report Group Route =========>>
    Route::group(['prefix' => 'report', 'as' => 'report.', 'controller' => ReportController::class], function () {
        Route::get('/users', 'users')->name('users')->middleware('permission:report_user');
    });
    // <<========= End Report Group Route =========>>
});
