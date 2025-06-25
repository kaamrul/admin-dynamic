<?php

namespace App\Library;

class Html
{
    public static function linkBack(string $route)
    {
        return '<a href="' . $route . '" class="btn btn-sm btn2-secondary btn-back "><i class="fas fa-long-arrow-alt-left"></i> Back</a>';
    }

    public static function linkAdd(string $route, string $label, string $size = 'btn-sm')
    {
        return '<a href="' . $route . '" class="btn btn-sm btn2-secondary ' . $size . '"><i class="fas fa-plus"></i> ' . $label . '</a>';
    }

    public static function btnSubmit($size = '')
    {
        return '<button type="submit" class="btn mr-3 my-3 btn2-secondary submitBtn ' . $size . '"><i class="fas fa-save"></i> Save</button>';
    }

    public static function btnReset()
    {
        return '<button type="reset" class="btn mr-3 my-3 btn2-light-secondary"><i class="fas fa-sync-alt"></i> Reset</button>';
    }

    public static function btnClose()
    {
        return '<button type="button" class="btn btn2-light-secondary mr-3 btn-close" data-dismiss="modal"><i class="fas fa-times"></i> Close</button>';
    }

    public static function btnSignIN($size = '')
    {
        return '<button type="submit" class="btn mr-3 my-3 btn2-secondary ' . $size . '"><i class="fa-solid fa-right-to-bracket"></i> Sign In </button>';
    }

    public static function btnSignOut($size = '')
    {
        return '<button type="submit" class="btn mr-3 my-3 btn2-danger-active ' . $size . '"><i class="fa-solid fa-right-from-bracket"></i> Sign Out </button>';
    }

    public static function breadcrumbsSection($name = '', $route = '', $route_name = '', $tournament_page = false)
    {
        $break_route = $route ? '<li><a href="' . $route . '">' . $route_name . '</a></li>' : '';

        $clubRecordHtml = '';

        // if ($tournament_page) {
        //     $clubRecordHtml .= '<div class="col-4" style="text-align: right;">' .
        //         '<a href="#">Club Records</a>' .
        //     '</div>';
        // };

        $html = '<div class="breadcrumbs">' .
        '<div class="page-header d-flex align-items-center">' .
            '<div class="container position-relative">' .
                '<div class="row d-flex justify-content-center">' .
                    '<div class="col-lg-6 text-center">' .
                        '<h2>' . $name . '</h2>' .
                    '</div>' .
                '</div>' .
            '</div>' .
        '</div>' .
        '<nav>' .
            '<div class="container">' .
                '<div class="row">' .
                    '<div class="col-8">' .
                        '<ol>' .
                            '<li><a href="' . url('/') . '">Home</a></li>' .
                            $break_route . '<li>' . $name . '</li>' .
                        '</ol>' .
                    '</div>' .

                    $clubRecordHtml .

                '</div>' .
            '</div>' .
        '</nav>' .
    '</div>';

    return $html;
    }

    public static function getUserStatusIcon($status)
    {
        if($status == Enum::USER_STATUS_ACTIVE) {
            $icon = '<i class="fas fa-circle-check text-success" title="Active"></i>';
        } elseif($status == Enum::USER_STATUS_PENDING) {
            $icon = '<i class="fas fa-circle-exclamation text-warning" title="Pending"></i>';
        } else {
            $icon = '<i class="fas fa-circle-xmark text-danger" title="Suspended"></i>';
        }

        return $icon;
    }

    public static function getUserStatusAlert($status)
    {
        $icon = '';
        $alert = '';
        $message = '';

        $route = '<a href="' . route('member.dashboard.profile.verify') . '" target="_target" class="text-success"> Please Verify </a>';

        if($status == Enum::USER_STATUS_PENDING) {

            $icon = '<i class="fas fa-circle-exclamation text-warning" title="Pending"></i>';
            $alert = 'alert-warning';

            if(!authMember()->nominated_by ||
                !authMember()->seconded_by ||
                !authMember()->is_nominated ||
                !authMember()->is_seconded) {

                $message = 'Your Account is Not Verified !!!, ' . $route;
            } else {
                $message = 'Your Account is Verified By Nominees , Now Wait For Active Your Account.';
            }
        }

        if($status == Enum::USER_STATUS_SUSPENDED) {
            $icon = '<i class="fas fa-circle-xmark text-danger" title="Suspended"></i>';
            $alert = 'alert-danger';
            $message = 'Your Account is Suspended !!!, Please Active.';
        }

        return '<div class="row">' .
                    '<div class="col-lg-12 ps-xxl-4">' .
                        '<div class="alert ' . $alert . ' text-center" role="alert">' .
                        $icon . ' ' . $message .
                        '</div>' .
                    '</div>' .
                '</div>';
    }
}
