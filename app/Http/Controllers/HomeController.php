<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Bb;
use App\Models\Rubric;

class HomeController extends Controller
{

    private const BB_VALIDATOR = [
        "title" => "required|max:50",
        "rubric_id" => "required|numeric",
        "content" => "required",
        "adress" => "required|string|max:100",
        "price" => "required|numeric"
    ];
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //связывание посредника с контроллером
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home',['bbs' => Auth::user()->bbs()->latest()->get()]);
    }

    public function create() 
    {
        return view("user_bb.bb-create",["rubrics" => Rubric::whereNotNull("parent_id")->get()]);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate(self::BB_VALIDATOR);
        Auth::user()->bbs()->create([
            "title" => $request->title,
            "rubric_id" => $request->rubric_id,
            "content" => $request->content,
            "adress" => $request->adress,
            "price" => $request->price
        ]);
        return to_route("home")->with("success","Новое объявление успешно создано с названием $request->title");
    }

    public function edit(Bb $bb)
    {
        return view('users_bb.bb-edit', ["bb" => $bb]);
    }

    public function update(Request $request, Bb $bb)
    {
        $request->validate(self::BB_VALIDATOR);
        $bb->fill([
            "title" => $request->title,
            "content" => $request->content,
            "price" => $request->price
        ]);
    
        $bb->save();
        return redirect()->route("home");
    }

    public function delete(Bb $bb)
    {
        return view('users_bb.bb-delete', ["bb" => $bb]);
    }

    public function destroy(Bb $bb)
    {
        $bb->delete();
        return redirect()->route("home");
    }


}
