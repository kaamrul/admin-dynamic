@php
    use App\Library\Helper;
@endphp

@extends('admin.layouts.master')

@section('title', 'More Settings')

@section('content')

<div class="content-wrapper">

    <div class="content-header d-flex justify-content-start">
        <div class="d-block">
            <h4 class="content-title">{{ strtoupper(__('More Settings' )) }}</h4>
        </div>
    </div>
    <div class="card shadow-sm col-md-12">
        <div class="card-body">

            <div class="row">

                @if( Helper::hasAuthRolePermission('social_link_show') )
                <div class="col-lg-3 col-md-6 col-sm-6 m-b30 pt-4">
                    <div class="rounded-team">
                        <a href="{{ route('admin.config.more_settings.social.link') }}">
                            <div class="round-box bg-light2-secondary">
                                <div class="team-mamber">
                                    <div class="team-mamber">
                                    <i class="fa-sharp fa-solid fa-link"></i>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <div class="border-1 team-info text-center p-4 p-t40">
                            <h4 class="dlab-title" style="padding-top: 15px">
                                <b> <a href="{{ route('admin.config.more_settings.social.link') }}" style="color:black">Social Link</a></b>
                            </h4>
                        </div>
                    </div>
                </div>
                @endif

                @if( Helper::hasAuthRolePermission('email_settings_show') )
                <div class="col-lg-3 col-md-6 col-sm-6 m-b30 pt-4">
                    <div class="rounded-team">
                        <a href="{{ route('admin.config.more_settings.email.settings') }}">
                            <div class="round-box bg-light2-secondary">
                                <div class="team-mamber">
                                    <div class="team-mamber">
                                        <i class="fa-solid fa-envelope-circle-check"></i>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <div class="border-1 team-info text-center p-4 p-t40">
                            <h4 class="dlab-title" style="padding-top: 15px">
                                <b> <a href="{{ route('admin.config.more_settings.email.settings') }}" style="color:black">Email Settings</a></b>
                            </h4>
                        </div>
                    </div>
                </div>
                @endif

                @if( Helper::hasAuthRolePermission('email_template_index') )
                <div class="col-lg-3 col-md-6 col-sm-6 m-b30 pt-4">
                    <div class="rounded-team">
                        <a href="{{ route('admin.config.more_settings.email_template.index') }}">
                            <div class="round-box bg-light2-secondary">
                                <div class="team-mamber">
                                    <div class="team-mamber">
                                    <i class="fa-solid fa-envelope-open-text"></i>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <div class="border-1 team-info text-center p-4 p-t40">
                            <h4 class="dlab-title" style="padding-top: 15px">
                                <b> <a href="{{ route('admin.config.more_settings.email_template.index') }}" style="color:black">Email Templates</a></b>
                            </h4>
                        </div>
                    </div>
                </div>
                @endif

            </div>
        </div>
    </div>
</div>
@stop

