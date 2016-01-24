<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'email', 'password'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];


	public static function filterAndPaginate($name){
		//dd($name);
		return User::name($name)->paginate(4);
		//name($request->get('name'))->paginate(4)

	}



	public function setPasswordAttribute($value){

		if(! empty($value)){
			$this->attributes['password'] = bcrypt($value);


		}
	}

	public function ScopeName($query,$name){

		if(trim($name) !=""){

		$query->where('name','LIKE',"%$name%");
			
		}
	}

}
