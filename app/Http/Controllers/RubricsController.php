<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rubric;

class RubricsController extends Controller
{
    public function index()
    {
        $rubrics = Rubric::whereNull("parent_id")->get();
        return view('rubrics.index',["rubrics" => $rubrics]);
    }

    public function show($parentRubric) {
        // dd($parentRubric->rubrics);
        return view("rubrics.show",["rubrics" => $parentRubric->rubrics, "title" => $parentRubric->title]);
    }

    public function showBbs(Rubric $rubric) {
        // dump(request()->url());
        return view("rubrics.show_bbs_on_rubric", ["content"=>$rubric->bbs, "title" => $rubric->title, "parent" => $rubric->parent]);
    }
}
