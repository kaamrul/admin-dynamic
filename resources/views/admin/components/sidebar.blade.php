@php
use App\Library\Helper;
@endphp

<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.home.dashboard') }}">
                <i class="fas fa-home mr-3 w-6 shrink-0"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>

        @if( Helper::hasAuthRolePermission('notification_index') )
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.notification.index') }}">
                <i class="icon-bell menu-icon"></i>
                <span class="menu-title">Notifications</span>
            </a>
        </li>
        @endif

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#users" aria-expanded="false" aria-controls="tables">
                <i class="mr-3 w-6 shrink-0 fa-solid fa-headset"></i>
                <span class="menu-title">Users</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="users">
                <ul class="nav flex-column sub-menu">

                    @if( Helper::hasAuthRolePermission('employee_index') )
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.user.employee.index') }}">Employee</a>
                    </li>
                    @endif

                    @if( Helper::hasAuthRolePermission('client_index') )
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.user.client.index') }}">Client</a>
                    </li>
                    @endif
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#support" aria-expanded="false" aria-controls="tables">
                <i class="mr-3 w-6 shrink-0 fa-solid fa-headset"></i>
                <span class="menu-title">Support</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="support">
                <ul class="nav flex-column sub-menu">

                    @if( Helper::hasAuthRolePermission('ticket_index') )
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.support.ticket.index') }}">Tickets</a>
                    </li>
                    @endif

                    @if( Helper::hasAuthRolePermission('contact_us_index') )
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.support.contact_us.index') }}">Contact</a>
                    </li>
                    @endif
                </ul>
            </div>
        </li>

        @if(Helper::hasAuthRolePermission('hero_slider')||
        Helper::hasAuthRolePermission('blog_index')||
        Helper::hasAuthRolePermission('testimonial_index'))
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#website" aria-expanded="false" aria-controls="tables">
                <i class="mr-3 w-6 shrink-0 fas fa-globe"></i>
                <span class="menu-title">Website</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="website">
                <ul class="nav flex-column sub-menu">
                    @if( Helper::hasAuthRolePermission('slider_index'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.website.slider.index') }}"> Hero Slider </a>
                    </li>
                    @endif

                    @if( Helper::hasAuthRolePermission('blog_index'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.website.blog.index') }}">Blog</a>
                    </li>
                    @endif

                    @if( Helper::hasAuthRolePermission('testimonial_index'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.website.testimonial.index') }}">Testimonial</a>
                    </li>
                    @endif

                    @if( Helper::hasAuthRolePermission('subscriber_index'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.website.testimonial.index') }}">Subscriber</a>
                    </li>
                    @endif
                </ul>
            </div>
        </li>
        @endif

        @if( 
            Helper::hasAuthRolePermission('general_settings_show') ||
            Helper::hasAuthRolePermission('role_index') ||
            Helper::hasAuthRolePermission('dropdown_index') ||
            Helper::hasAuthRolePermission('social_link_show')||
            Helper::hasAuthRolePermission('email_settings_show') ||
            Helper::hasAuthRolePermission('email_template_index') 
        )
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#settings" aria-expanded="false" aria-controls="settings">
                <i class="mr-3 w-6 shrink-0 fas fa-cogs"></i>
                <span class="menu-title">Configuration</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="settings">
                <ul class="nav flex-column sub-menu">
                    @if( Helper::hasAuthRolePermission('general_settings_show') )
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.config.general_settings.systemDetails') }}">General Settings</a>
                    </li>
                    @endif

                    @if( Helper::hasAuthRolePermission('role_index') )
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.config.role.index') }}"> Manage Roles </a>
                    </li>
                    @endif

                    @if( Helper::hasAuthRolePermission('dropdown_index') )
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.config.dropdown.menu') }}"> Dropdown List</a>
                    </li>
                    @endif

                    @if(
                        Helper::hasAuthRolePermission('social_link_show')||
                        Helper::hasAuthRolePermission('email_settings_show') ||
                        Helper::hasAuthRolePermission('email_template_index')
                    ) 
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.config.more_settings.index') }}">More Settings</a>
                    </li>
                    @endif

                </ul>
            </div>
        </li>
        @endif

        @if( 
            Helper::hasAuthRolePermission('report_user')
        )
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#reports" aria-expanded="false" aria-controls="reports">
                <i class="mr-3 w-6 shrink-0 fa-solid fa-chart-line"></i>
                <span class="menu-title">Report</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="reports">
                <ul class="nav flex-column sub-menu">
                    @if( Helper::hasAuthRolePermission('report_user') )
                    <li class="nav-item">
                        <a class="nav-link" href="">User Report</a>
                    </li>
                    @endif
            </div>
        </li>
        @endif

        @if( Helper::hasAuthRolePermission('log_login_index') ||
        Helper::hasAuthRolePermission('log_activity_index') ||
        Helper::hasAuthRolePermission('log_email_index'))
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#footprints" aria-expanded="false"
                aria-controls="footprints">
                <i class="mr-3 w-6 shrink-0 fas fa-shoe-prints"></i>
                <span class="menu-title">Foot Print</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="footprints">
                <ul class="nav flex-column sub-menu">
                    @if( Helper::hasAuthRolePermission('log_login_index') )
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.log.login.index') }}">Login History</a>
                    </li>
                    @endif

                    @if( Helper::hasAuthRolePermission('log_activity_index') )
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.log.activity.index') }}">Activity Logs</a>
                    </li>
                    @endif

                    @if( Helper::hasAuthRolePermission('log_email_index') )
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.log.email.index') }}">Email History</a>
                    </li>
                    @endif
                </ul>
            </div>
        </li>
        @endif
        
    </ul>
</nav>
