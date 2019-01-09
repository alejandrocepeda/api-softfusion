<?php

namespace App;

use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\Traits\TransformDates;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Storage;
use Laravel\Passport\HasApiTokens;
use Laravel\Scout\Searchable;
use Spatie\Permission\Traits\HasRoles;

/**
 * Class User.
 *
 * @property \Carbon\Carbon                                                      $created_at
 * @property int                                                                 $id
 * @property \Carbon\Carbon                                                      $updated_at
 * @property \Carbon\Carbon                                                      $deleted_at
 * @property string                                                              $name
 * @property string                                                              $email
 * @property string                                                              $password
 * @property string|null                                                         $remember_token
 * @property \Illuminate\Database\Eloquent\Collection|\Laravel\Passport\Client[] $clients
 * @property \Illuminate\Database\Eloquent\Collection|\Laravel\Passport\Token[]  $tokens
 * @property int|null                                                            $personal_info_id
 * @property int                                                                 $status
 */
class User extends Authenticatable
{
	use HasApiTokens, Notifiable, SoftDeletes, HasRoles, TransformDates, Searchable;
	
	public    $class              = User::class;
	public    $resource           = UserResource::class;
	public    $resourceCollection = UserCollection::class;
	protected $fillable           = ['name', 'email', 'password', 'contact_id', 'status', 'broker_status_id'];
	protected $hidden             = ['password', 'remember_token'];
	protected $dates              = ['created_at', 'updated_at', 'deleted_at'];
	public    $relationships      = ['contact.address.zipcode.city.state',
									 'contact.leads',
									 'contact.business',
									 'contact.image',
									 'contact.user',
									 'roles',
									 'image',];
	
	/**
	 * @param $value
	 * @return string
	 */
	public function setNameAttribute($value)
	{
		return $this->attributes['name'] = strtolower($value);
	}
	
	/**
	 * @param $value
	 * @return string
	 */
	public function getNameAttribute($value)
	{
		return ucwords($value);
	}
	
	public function toSearchableArray()
	{
		$array = $this->toArray();
		
		if($this->contact){
			$array['business_name'] = $this->contact['name'];
			$array['phone_number']  = $this->contact['phone'];
		}
		
		if($this->roles->first()){
			$array['rol'] = $this->roles->first()->name;
			
		}
		
		return $array;
	}
	//TODO el usuario simpre debe estar sincronizado con el contacto.
	// (es decir un usuario siempre tendra contacto, pero un contacto puede no tener usuario)
	// además el nombre y el email al cambiar en usuario debe cambiar tambien en contacto
	
	/**
	 * Si el usuario no diligencia la contraseña se le asiganara una automaticamente.
	 *
	 * @param Request $request
	 */
	public static function fillPassword($request)
	{
		if(!$request->password){
			$request->merge(['password' => bcrypt(str_random(10))]);
		}else {
			$request->merge(['password' => bcrypt($request->password)]);
		}
	}
	
	/**
	 * Si tiene imagen se optimiza y se guarda.
	 *
	 * @param $request
	 * @return $this|\Illuminate\Database\Eloquent\Model
	 */
	public static function fillImage($request, $user)
	{
		if($request->hasfile('image')){
			//Verificamos si el lender ya tiene imagen si es true la borramos
			if($user->image){
				Storage::disk('public')->delete($user->image->url);
				Image::destroy($user->image->id);
			}
			
			$image = Image::storageImage($request->file('image'), 'users');
			$user->image()->save($image);
			$user->refresh();
		}
	}
	
	/*
	 |--------------------------------------------------------------------------
	 | Relations database
	 |--------------------------------------------------------------------------
	 |
	 */
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function activities()
	{
		return $this->hasMany(Activity::class);
	}
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function applications()
	{
		return $this->hasMany(Application::class, 'processor_id');
	}
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\MorphMany
	 */
	public function broker()
	{
		return $this->morphMany(BrokerInfo::class, 'brokertable');
	}
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
	 */
	public function broker_team()
	{
		return $this->belongsToMany('broker_team', 'user_broker_team');
	}
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function broker_status()
	{
		return $this->belongsTo(BrokerStatus::class);
	}
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function contact()
	{
		return $this->belongsTo(Contact::class);
	}
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\MorphMany
	 */
	public function image()
	{
		return $this->morphOne(Image::class, 'imagentable')->withDefault(['url' => 'http://i.pravatar.cc/150']);
	}
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function hasoffers()
	{
		return $this->hasMany(HasOffers::class, 'broker_id');
	}
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function leads()
	{
		return $this->hasMany(Lead::class, 'executive_id');
	}
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\MorphMany
	 */
	public function read()
	{
		return $this->morphMany(ReadItem::class, 'readtable');
	}
	
	/**
	 * @return \Illuminate\Database\Eloquent\Relations\MorphMany
	 */
	public function emails()
	{
		return $this->morphMany(Email::class, 'sendertable');
	}
	
	public function team()
	{
		return $this->belongsToMany(Team::class, 'user_team');
	}
}
