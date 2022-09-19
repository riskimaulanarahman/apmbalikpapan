<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Mail\SendMail;
// Panggil support email dari Laravel
use Illuminate\Support\Facades\Mail;
use App\Model\LogMail;
use Exception;

class GenerateMailController extends Controller
{
    public function generateMail($module = null,$id_users = null,$email,$nama,$text) {
        try {

            Mail::to($email)->send(new SendMail($nama,$text,$module));

            LogMail::create([
               'module' => $module, 
               'id_users' => $id_users, 
               'mailto' => $email, 
               'status' => 'success', 
            ]);
        
        }  catch (\Exception $e){

            $data = array("status"=>"error","message"=>$e->getMessage());

            $log = LogMail::create([
                'module' => $module, 
                'id_users' => $id_users, 
                'mailto' => $email, 
                'status' => $e->getMessage(), 
             ]);

            print_r($data);
        }
    }
}
