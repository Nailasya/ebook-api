<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Authcontroller extends Controller
{
    public function me(){
        return [
            'NIS' => 3103120157,
            'Name' => 'Naila',
            'Phone' => '082313552882',
            'Class' => 'XII RPL 5'
        ];
    }
}
