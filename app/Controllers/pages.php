<?php

namespace App\Controllers;

use CodeIgniter\Config\ForeignCharacters;

class pages extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Home | Muhammad Nur Wahid                                                                                                                '
        ];
        return view('pages/home',$data);
    }

    public function about()         
    {
        $data = [
            'title' => 'About'
        ];
        return view('pages/about',$data);
    }

    public function contact()
    {
        $data = [
            'title' => 'Contact'
        ];
        return view('pages/contact',$data);
    }
    public function portofolio(){
        $data = [
            'title'=>'Portofolio | Muhammad Nur Wahid'
        ];
        return view('pages/portofolio',$data);
    }
}
