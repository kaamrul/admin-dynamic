<?php

namespace App\Http\Controllers\Admin;

use Throwable;
use App\Library\Enum;
use App\Models\Config;
use App\Library\Helper;
use App\Mail\DefaultMail;
use Illuminate\Http\Request;
use App\Models\EmailTemplate;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Artisan;
use App\Http\Requests\Admin\Config\SocialLinkRequest;
use App\Http\Requests\Admin\Config\EmailSettingsRequest;
use App\Http\Requests\Admin\EmailTemplates\UpdateRequest;
use App\Http\Requests\Admin\Config\GeneralSettingsRequest;

class GeneralSettingsController extends Controller
{
    public function systemDetails()
    {
        return view('admin.pages.config.general_settings.system_details', [
            'countries' => Helper::getCountries(),
        ]);
    }

    public function address()
    {
        return view('admin.pages.config.general_settings.address', [
            'countries' => Helper::getCountries(),
        ]);
    }

    public function communication()
    {
        return view('admin.pages.config.general_settings.communication', [
            'countries' => Helper::getCountries(),
        ]);
    }

    public function multimedia()
    {
        return view('admin.pages.config.general_settings.media', [
            'countries' => Helper::getCountries(),
        ]);
    }

    public function preference()
    {
        return view('admin.pages.config.general_settings.preference');
    }

    public function emailSettings()
    {
        return view('admin.pages.config.general_settings.email_settings');
    }

    public function contactUs()
    {
        return view('admin.pages.config.general_settings.contact_us');
    }

    public function updateEmailSettings(EmailSettingsRequest $request)
    {
        try {
            $data = $request->validated();

            $this->updateConfig($data);

            updateEnv($data);

            return back()->with('success', __('Successfully Updated'));
        } catch (Throwable $e) {
            Log::error($e->getMessage());

            return back()->with('error', __('Something went wrong! Please try again'));
        }
    }

    public function updateGeneralSettings(GeneralSettingsRequest $request)
    {
        $data = $request->validated();

        if (isset($data['logo'])) {
            $data['logo'] = Helper::uploadImage($data['logo'], Enum::CONFIG_IMAGE_DIR, 300, 50);
        }

        if (isset($data['favicon'])) {
            $data['favicon'] = Helper::uploadImage($data['favicon'], Enum::CONFIG_IMAGE_DIR, 32, 32);
        }

        if (isset($data['og_image'])) {
            $data['og_image'] = Helper::uploadImage($data['og_image'], Enum::CONFIG_IMAGE_DIR, 200, 200);
        }

        if (isset($data['invoice_logo'])) {
            $data['invoice_logo'] = Helper::uploadImage($data['invoice_logo'], Enum::CONFIG_IMAGE_DIR, 200, 200);
        }

        // if (isset($data['login_logo'])) {
        //     $data['login_logo'] = Helper::uploadImage($data['login_logo'], Enum::CONFIG_IMAGE_DIR, 200, 200);
        // }

        if (isset($data['login_bg_image'])) {
            $data['login_bg_image'] = Helper::uploadImage($data['login_bg_image'], Enum::CONFIG_IMAGE_DIR, '', '');
        }

        $this->updateConfig($data);

        unset($data['date_format'], $data['time_format']);

        if (isset($data['app_timezone'])) {
            updateEnv($data);
        }

        return back()->with('success', __('Successfully Updated'));
    }

    protected function updateConfig(array $data)
    {
        foreach ($data as $key => $value) {
            Config::where('key', $key)->update(['value' => $value]);
        }

        Artisan::call('cache:clear');
    }

    public function sendTestMail(Request $request)
    {
        $subject = 'Testing Email';
        $message = 'This is a test email, <br> please ignore if you are not meant to be get this email.';

        try {
            $emailDetails = [
                'email'   => $request->email,
                'subject' => $subject,
                'message' => $message,
            ];

            if ($emailDetails['email']) {
                Mail::to($emailDetails['email'])->send(new DefaultMail($emailDetails['subject'], $emailDetails['message']));
            }


            return back()->with('success', __('You will receive a test email soon'));
        } catch (Throwable $e) {
            Log::error($e->getMessage());

            return back()->with('error', __('please check your email settings'));
        }
    }
}
