<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $primaryKey = 'id_users';
    
    protected $fillable = [
        'name', 'username' , 'email','notelp','nik','password','pass_txt', 'role','isvalid'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','pass_txt'
    ];

    // public function hasRole($role){
    //     if ($this->roles()->where('role', $role)->first()) {
    //         return true;
    //     }
    //     return false;
    // }
    // public function hasRole($roles)
    // {
    //     $this->have_role = $this->getUserRole();
        
    //     if(is_array($roles)){
    //         foreach($roles as $need_role){
    //             if($this->cekUserRole($need_role)) {
    //                 return true;
    //             }
    //         }
    //     } else{
    //         return $this->cekUserRole($roles);
    //     }
    //     return false;
    // }

    // private function getUserRole()
    // {
    //    return $this->role()->getResults();
    // }
    
    // private function cekUserRole($role)
    // {
    //     return (strtolower($role)==strtolower($this->have_role->nama)) ? true : false;
    // }
}
