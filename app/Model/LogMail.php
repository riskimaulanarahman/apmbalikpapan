<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class LogMail extends Model
{
    protected $table = "log_sendmail";

    protected $fillable = ["module","id_users","mailto","status"];
}
