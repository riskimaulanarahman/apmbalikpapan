<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class SA_MasterUser extends Model
{
    protected $table = "users";

    protected $guarded = ['id_users'];

    protected $primaryKey = 'id_users';

    // protected $fillable = [
    //     'example'
    // ];

    protected $hidden = [
        'password',
        'pass_txt',
        'remember_token',
        'created_at',
        'updated_at'
    ];

    public function rt()
    {
        return $this->belongsTo('App\Model\RT','nomor_rt','nomor_rt');
    }

    // public function kelurahan()
    // {
    //     return $this->belongsTo('App\Model\Kelurahan','kode_kelurahan','kode_kelurahan');
    // }

}
