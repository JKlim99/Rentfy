<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    use HasFactory;
    protected $table = 'users';

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone_number',
        'password',
        'state',
        'user_type',
    ];

    public static function boot()
    {
        parent::boot();

        self::creating(function($model){
            $model->auth_key = $model->generateRandomString();
            $model->user_type = $model->user_type ?? 'tenant'; // tenant or owner
        });
    }

    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
