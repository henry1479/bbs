<?php

namespace App\Http\Controllers;

use App\Models\Bb;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BbsController extends Controller
{
    public function index() {

        $content = Bb::latest()->get();
        return view("index", ["content" => $content]);
    }

    public function detail(Bb $bb)
    {
        return view("user_bb.detail", ["bb" => $bb]);
            
    }
}
