<?php

namespace App\Models;

use Throwable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Email extends Model
{
    use HasFactory;

    protected $fillable = [
        'subject',
        'message',
        'group',
        'operator_id',
        'sending_at',
    ];

    public static function insert($emailData, $recipientData, $post_id)
    {
        $formattedData = [];
        $emailData['operator_id'] = auth()->id();

        try {
            DB::beginTransaction();

            $email = Email::create($emailData);

            foreach ($recipientData as $data) {
                $formattedData[] = [
                    'email_id'   => $email->id,
                    'user_id'    => $data,
                    'post_id'    => $post_id,
                    'created_at' => now()
                ];
            }

            EmailRecipient::insert($formattedData);
            DB::commit();

            return true;
        } catch (Throwable $e) {
            DB::rollback();
            Log::info($e->getMessage());
        }
    }

    public function recipients()
    {
        return $this->hasMany(EmailRecipient::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
