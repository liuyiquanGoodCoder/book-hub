<?php
 
namespace App;
 
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;
 
class User extends Authenticatable implements JWTSubject
{
    use Notifiable;
 
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role',
    ];
 
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
 
    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
 
    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
    public function products()
    {
        return $this->hasMany(Product::class);
    }
    public function carts()
    {
        return $this->hasMany(Carts::class);
    }

    public function addresses()
    {
        return $this->hasMany(Addresses::class);
    }

    public function orders()
    {
        return $this->hasMany(Orders::class);
    }
    
    public function storeinfos()
    {
        return $this->hasMany(Storeinfo::class);
    }

    public function projects()
    {
        return $this->hasMany(Project::class);
    }

    public function books()
    {
        return $this->hasMany(Books::class);
    }

    public function projectrecords()
    {
        return $this->hasMany(Projectrecord::class);
    }

    public function payrolls()
    {
        return $this->hasOne(Payroll::class);
    }

    public function expenditures()
    {
        return $this->hasMany(Expenditure::class);
    }

    public function incomes()
    {
        return $this->hasMany(Income::class);
    }
}