<?php

namespace tj_core\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class Post extends Model implements AuthenticatableContract, CanResetPasswordContract
{
    use Authenticatable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'mkt_posts';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['owner_id', 'title','description'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['id'];

    public function owner()
    {
        return $this->hasOne('tj_core\Models\Post', 'owner_id', 'id');
    }

//    /**
//     * Get a user by email, throws exception if email not found
//     * @param string $email email of user
//     * @return bool Need to throw an exception here.
//     */
//    public static function getUserByEmail($email)
//    {
//        if (empty($email)) {
//            return false;
//        }
//
//        $user = User::where("email", "=", $email)->first();
//        return $user;
//    }
}
