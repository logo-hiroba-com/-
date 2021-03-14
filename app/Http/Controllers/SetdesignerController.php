<?php

namespace App\Http\Controllers;

use App\User;
use App\Designer;
use App\Logo;
use App\logoImage;
use App\logoProperty;
use App\logoImprove;
use App\logoColor;
use App\logoFormat;
use App\logoType;
use App\Goodat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class SetdesignerController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //ロゴデータをデータベースに
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Designer  $designer
     * @return \Illuminate\Http\Response
     */
    public function show(Logo $logo)
    {
        //詳細
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Designer  $designer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //プロフィール修正画面
        $designers = Designer::where('user_id',$id)->first();
        $user_data = User::find($id);
        $goodat = Goodat::get();

        return view('designer.designer_profile')->with("id",$id)->with('user_datas',$user_data)->with('designers',$designers)->with('goodats',$goodat);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        // print($request->goodat);
        //プロフィール更新
        $username = $request->input("username");
        $designer_intro = $request->input("prText");
        $goodat = $request->goodat;

        $designer_image = [];
        foreach($goodat as $key=>$row){
            $designer_image[$key] = $row;
        }

        $user = User::find($id);
        $user->username = $username;
        $user->save();
        $designer = Designer::where('user_id',$id)->first();
        $designer->username = $username;
        $designer->designer_image1 = $designer_image[0];
        $designer->designer_image2 = $designer_image[1];
        $designer->designer_intro = $designer_intro;
        $designer_icon = $request->file('icon_file');
        if($request->hasFile('icon_file')){
            if($designer_icon->isValid()){
                $file_path = $designer_icon->store('public');
                $designer->designer_path = str_replace("public/",'',$file_path);
            }
        }
        $designer->save();

        return redirect(route('setting.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Designer  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
