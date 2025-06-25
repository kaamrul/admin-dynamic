<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Carbon\Carbon;
use App\Library\Enum;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Vite;
use App\Permissions\HasPermissionsTrait;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;
    use HasPermissionsTrait;
    use SoftDeletes;

    protected $fillable = [
        'first_name',
        'last_name',
        'username',
        'phone_number',
        'email',
        'user_type',
        'gender',
        'description',
        'status',
        'avatar',
        'operator_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime'
    ];

    protected $appends = [
        'avatar_image'
    ];

    public $afterCommit = true;

    /*=====================Eloquent Relations======================*/
    public function operator()
    {
        return $this->belongsTo(self::class, 'operator_id');
    }

    /**
     * Get all of the user's attachments.
     */
    public function attachments(): MorphMany
    {
        return $this->morphMany(Attachment::class, 'attachable');
    }

    public static function getAuthUser()
    {
        return auth()->user();
    }

    public static function getAll()
    {
        return self::all();
    }

    public function role()
    {
        return $this->roles()->first();
    }

    public function getRole()
    {
        return $this->roles()->get();
    }

    public function isSuperAdmin()
    {
        return $this->user_type == Enum::USER_TYPE_SUPER_ADMIN;
    }

    public function isAdmin()
    {
        return $this->user_type == Enum::USER_TYPE_ADMIN;
    }

    public function isEmployee()
    {
        return $this->user_type == Enum::USER_TYPE_EMPLOYEE;
    }

    public function isTeacher()
    {
        return $this->user_type == Enum::USER_TYPE_TEACHER;
    }

    public function isStudent()
    {
        return $this->user_type == Enum::USER_TYPE_STUDENT;
    }

    public function isParent()
    {
        return $this->user_type == Enum::USER_TYPE_PARENT;
    }

    public function isAlumni()
    {
        return $this->user_type == Enum::USER_TYPE_ALUMNI;
    }

    public static function getAuthUserRole()
    {
        return auth()->user()->roles()->first();
    }

    public static function getUsersByType(string $type)
    {
        return self::where('user_type', $type)->get();
    }

    public function getAvatarImageAttribute(): string
    {
        $path = public_path($this->avatar);

        if ($this->avatar && is_file($path) && file_exists($path)) {
            return asset($this->avatar);
        }

        return Vite::asset(Enum::NO_IMAGE_PATH);
    }

    public function getAvatar(): string
    {
        $path = public_path($this->avatar);

        if ($this->avatar && is_file($path) && file_exists($path)) {
            return asset($this->avatar);
        }

        return Vite::asset(Enum::NO_AVATAR_PATH);
    }

    public static function getActiveTeacher()
    {
        return self::with('teacher')
            ->where('user_type', Enum::USER_TYPE_TEACHER)
            ->where('status', Enum::USER_STATUS_ACTIVE)
            ->get()->sortBy('full_name');
    }

    public function scopeWithoutDatabaseUser($query)
    {
        return $query->whereNot('id', 1);
    }

    public function scopeHasAdminPanelAccess($query)
    {
        return $query->whereIn('user_type', [Enum::USER_TYPE_ADMIN, Enum::USER_TYPE_TEACHER]);
    }

    public static function getActiveAdminTeacherByStatus(int $status)
    {
        return self::whereHas('teacher')->with('teacher')
            ->withoutDatabaseUser()
            ->hasAdminPanelAccess()
            ->where('status', $status)
            ->get()->sortBy('full_name');
    }

    public static function getTeacherByStatus(string $status)
    {
        return User::whereIn('user_type', [Enum::USER_TYPE_ADMIN, Enum::USER_TYPE_TEACHER])
            ->whereNot('id', 1)
            ->where('status', $status)
            ->get()->sortBy('full_name');
    }

    public function setDobAttribute($value)
    {
        $this->attributes['dob'] = Carbon::parse($value)->format('Y-m-d');
    }

    public static function scopeActive($query)
    {
        return $query->where('status', Enum::USER_STATUS_ACTIVE);
    }

    public static function scopeStudent($query)
    {
        return $query->where('user_type', Enum::USER_TYPE_STUDENT);
    }
}
