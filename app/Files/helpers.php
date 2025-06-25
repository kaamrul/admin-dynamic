<?php

use App\Library\Enum;
use App\Models\Order;
use App\Models\Config;
use App\Library\Helper;
use App\Models\Attachment;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;
use App\Library\Services\Admin\ConfigService;

/**
 * Fetch config data by key
 *
 * @param  $key
 *
 * @return mixed
 */
function settings($key)
{
    // static $config;

    // if (is_null($config)) {
    //     $config = Cache::remember('config', 24 * 60, function () {
    //         return Config::pluck('value', 'key')->toArray();
    //     });
    // }

    $config = Config::pluck('value', 'key')->toArray();

    return (is_array($key)) ? Arr::only($config, $key) : $config[$key];
}

/**
 * Update env file
 *
 * @param  $data - key value pair data
 *  key is the key of env file
 *  and the value is associated value of the key
 *
 * @return mixed
 */
function updateEnv(array $data)
{
    foreach ($data as $key => $value) {
        $key = strtoupper($key);
        $updatedEnvData = str_replace($key . '="' . env($key) . '"', $key . '="' . $value . '"', file_get_contents(app()->environmentFilePath()));

        file_put_contents(app()->environmentFilePath(), $updatedEnvData);
    }
}

/**
 * Delete file
 *
 * @param  $path
 *
 * @return void
 */
function deleteFile($path)
{
    $paths = is_array($path) ? $path : [$path];

    foreach ($paths as $item) {
        if (File::exists(public_path($item))) {
            File::delete(public_path($item));
        }
    }
}

/**
 *
 * @param  $key
 *
 * @return mixed
 */
function getDropdown(string $key)
{
    return ConfigService::getDropdown($key);
}

function formatPrice($price)
{
    // Format the price with 2 decimal places and a comma as the thousands separator
    $formattedPrice = number_format($price, 2, '.', ',');

    // Add a dollar sign to the beginning of the formatted price
    $formattedPrice = settings('currency_symbol') != '' ? settings('currency_symbol') . $formattedPrice : config('app.currency_sign') . $formattedPrice;

    return $formattedPrice;
}

function getSubscriptionExpDate()
{
    return now()->startOfYear()->addMonths(5)->lastOfMonth();
}

function getCompanyFullAddress()
{

    if(settings('address') ||
    settings('zip_code') ||
    settings('state') ||
    settings('city') ||
    settings('country')) {
        $address = settings('address') ? (settings('address') . ', ') : '';
        $address .= settings('state') ? (settings('state') . ', ') : '';
        $address .= settings('city') ? (settings('city') . ', ') : '';
        $address .= settings('country') ? (settings('country') . ', ') : '';
        $address .= settings('zip_code') ? (settings('zip_code') . '.') : '';
    } else {
        $address = '12 Esplanade, Whitianga, 3510 NZ';
    }

    return $address;
}

function authUser()
{
    return auth()->user();
}

function authId()
{
    return auth()->id();
}

function authMember()
{
    return auth()->user()->member;
}

function authMemberId()
{
    return auth()->user()->member->id;
}

function getPaymentStatusBadge($status)
{
    $class = 'bg-success';
    $status_name = Enum::getPaymentStatus(Enum::PAYMENT_STATUS_SUCCESS);

    if ($status == Enum::PAYMENT_STATUS_FAILED) {
        $class = 'bg-danger';
        $status_name = Enum::getPaymentStatus(Enum::PAYMENT_STATUS_FAILED);
    }

    return '<div class="badge ' . $class . '"><strong class="px-2">' . $status_name . '</strong></div>';
}

function getFormattedAmount($amount)
{
    $symbol = settings('currency_symbol') ? settings('currency_symbol') : '$';
    // $position = settings('currency_position') ? settings('currency_position') : "left";
    // $decimalSeparator = settings('decimal_separator') ? settings('decimal_separator') : '.';
    // $thousandSeparator = settings('thousand_separator') ? settings('thousand_separator') : 'comma';
    // $numberOfDecimal = settings('number_of_decimal') ? settings('number_of_decimal') : '0';

    // if ($thousandSeparator == 'comma') {
    //     $thousandSeparator = ',';
    // } else {
    //     $thousandSeparator = ' ';
    // }

    // $formattedAmount = number_format($amount, $numberOfDecimal, $decimalSeparator, $thousandSeparator);

    // // set currency position
    // if ($position == 'left') {
    //     $formattedAmount = $symbol . $formattedAmount;
    // } else {
    //     $formattedAmount = $formattedAmount . $symbol;
    // }
    $formattedAmount = $symbol . $amount;

    return $formattedAmount;
}


function getOrderStatus($status)
{
    $statusClasses = [
        Enum::ORDER_STATUS_TYPE_PENDING => 'bg-warning',
        Enum::ORDER_STATUS_TYPE_CANCELED => 'bg-danger',
        Enum::ORDER_STATUS_TYPE_PROCESSING => 'bg-primary',
        Enum::ORDER_STATUS_TYPE_SHIPPED => 'bg-success',
        Enum::ORDER_STATUS_TYPE_DELIVERED => 'bg-success',
        Enum::ORDER_STATUS_TYPE_NOT_RECEIVED => 'bg-danger',
        Enum::ORDER_STATUS_TYPE_RETURNED => 'bg-danger',
        Enum::ORDER_STATUS_TYPE_PARTIAL_RETURNED => 'bg-danger',
        Enum::ORDER_STATUS_TYPE_INCOMPLETE => 'bg-warning'
    ];

    $class = $statusClasses[$status] ?? 'bg-warning';

    return '<div class="badge ' . $class . '" style="color: #fff;">' . Enum::getOrderStatusType($status) . '</div>';
}

function getOrderPaymentStatus($status)
{
    $statusClasses = [
        Enum::ORDER_PAYMENT_STATUS_UNPAID => 'bg-danger',
        Enum::ORDER_PAYMENT_STATUS_PARTIAL => 'bg-warning',
        Enum::ORDER_PAYMENT_STATUS_PAID => 'bg-success',
        Enum::ORDER_PAYMENT_STATUS_REFUNDED => 'bg-secondary',
    ];

    $class = $statusClasses[$status] ?? 'bg-warning';

    return '<div class="badge ' . $class . '" style="color: #fff;">' . Enum::getPaymentStatusType($status) . '</div>';
}


function generateInvoiceId()
{
    $invoice_prefix = settings('invoice_prefix') ? settings('invoice_prefix') : '';
    $invoice_start_from = settings('invoice_start_from') ? settings('invoice_start_from') : 0; //1000

    // $order = Order::latest()->first();
    $order = Order::orderBy('id', 'desc')->first();

    if ($order) {
        return $invoice_prefix ? ($invoice_prefix . '-' . ($order->id + 1) + abs($invoice_start_from)) : ($order->id + 1 + abs($invoice_start_from));
    }

    return $invoice_prefix ? ($invoice_prefix . '-' . abs($invoice_start_from) + 1) : (abs($invoice_start_from) + 1);
}

function generateQuotationId()
{
    $invoice_prefix = settings('invoice_prefix') ? settings('invoice_prefix') : '';
    $invoice_start_from = settings('invoice_start_from') ? settings('invoice_start_from') : 0; //1000

    // $order = Order::latest()->first();
    $order = Order::orderBy('id', 'desc')->first();

    if ($order) {
        return $invoice_prefix ? ($invoice_prefix . '-' . ($order->id + 1) + abs($invoice_start_from)) : ($order->id + 1 + abs($invoice_start_from));
    }

    return $invoice_prefix ? ($invoice_prefix . '-' . abs($invoice_start_from) + 1) : (abs($invoice_start_from) + 1);
}

function generateUniqueSlug($title, $model, $id = null, $column = 'slug', $separator = '-')
{
    $slug = Str::slug($title, $separator);
    $query = $model::where($column, 'like', '%' . $slug . '%');

    if($id) {
        $query->where('id', '!=', $id);
    }

    $count = $query->count();

    return $count > 0 ? "{$slug}-" . ($count + 1) : $slug;
}


function attachmentStore($name = null, $file, $model, $path = null, $attachment_for = null, $w = null, $h = null)
{
    $file_path = storeFile($file, $path, $w, $h);

    $attachment = new Attachment();
    $attachment->name = $name;
    $attachment->attachment = $file_path;
    $attachment->mime_type = $file->getClientOriginalExtension();
    $attachment->for = $attachment_for;
    $attachment->operator_id = auth()->id();

    return $model->attachments()->save($attachment);
}


function attachmentCloneStore($attachment, $model)
{
    $attach = new Attachment();
    $attach->attachment = $attachment->attachment;
    $attach->attachable_type = $attachment->attachable_type;
    $attach->attachable_id = $model->id;
    $attach->mime_type = $attachment->mime_type;
    $attach->for = $attachment->for;

    return $model->attachments()->save($attach);
}

function storeFile($file, $path, $w = null, $h = null)
{
    $file_extension = $file->getClientOriginalExtension();

    if ($file_extension == 'pdf' || $file_extension == 'svg') {
        return Helper::uploadFile($file, $path);
    }

    return Helper::uploadImage($file, $path, $w, $h);
}



function has_key($array, $in_array)
{
    foreach ($array as $key => $value) {
        if ($in_array->has($value)) :
            return true;
        endif;
    }

    return false;
}



/**
 * Generate a toggle switch HTML component.
 *
 * @param mixed  $rowId       Unique identifier for the row.
 * @param bool   $rowValue    Value to determine if the switch is checked.
 * @param string $fieldName   Field name for identification.
 * @param string $permission  Permission string to check access.
 * @param string $route       Route or JS path for status change.
 * @param bool   $isDisabled  Force disable the toggle.
 *
 * @return string
 */
function getToggleSwitch($rowId, $rowValue, $fieldName = null, $permission = null, $route = null, $isDisabled = false)
{
    $is_check = $rowValue ? "checked" : "";
    $disabled = '';
    $onchange = '';

    if ($isDisabled || !Helper::hasAuthRolePermission($permission)) {
        $disabled = 'disabled';
    } else {
        $onchange = 'onchange="changeStatus(event, ' . $route . ')"';
    }

    return '<div class="custom-control custom-switch">
                <input type="checkbox" ' . $disabled . ' ' . $onchange . '
                    class="custom-control-input"
                    id="switch_' . $rowId . '_' . $fieldName . '" ' . $is_check . ' >
                <label class="custom-control-label" for="switch_' . $rowId . '_' . $fieldName . '"></label>
            </div>';
}
