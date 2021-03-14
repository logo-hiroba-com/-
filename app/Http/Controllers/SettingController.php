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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //マンページのファスト画面
        if(isset(session('user_datas')->id)){
            $user_id = session('user_datas')->id;
            $user_data = User::find($user_id);
            $designer = Designer::where('user_id',$user_id)->first();

            if($user_data->user_type == 1){
                return view('customer.customer_history')->with('user_datas',$user_data)->with('designers',$designer);
            }else{
                return view('designer.designer_news')->with('user_datas',$user_data)->with('designers',$designer);
            }
        }
        else{
            $logos = Logo::paginate(12);
            // $like_datas = session()->get('logo_like');
            $logo_formats = logoFormat::get();
            $logo_improves = logoImprove::get();
            $logo_colors = logoColor::get();
            $logo_type_parents = logoType::where('type_child_id',0)->get();
            
            return view('logo.logo_list')->with('logos',$logos)->with(['logo_improves'=>$logo_improves,'logo_colors'=>$logo_colors,'logo_formats'=>$logo_formats,'logo_type_parents'=>$logo_type_parents]);
        }
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Logo $logo)
    {
        //詳細
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        if(isset(session('user_datas')->id)){
            if($id == isset(session('user_datas')->id)){
                $user_data = User::find($id);
                $designer = Designer::where('user_id',$id)->first();
                if($user_data->now_type == 0){
                    return view('designer.designer_setting')->with('user_datas',$user_data)->with('designers',$designer);
                }else{
                    return view('customer.customer_setting')->with('user_datas',$user_data)->with('designers',$designer);
                }
            }
        }else{
            $logos = Logo::paginate(12);
            // $like_datas = session()->get('logo_like');
            $logo_formats = logoFormat::get();
            $logo_improves = logoImprove::get();
            $logo_colors = logoColor::get();
            $logo_type_parents = logoType::where('type_child_id',0)->get();
            
            return view('logo.logo_list')->with('logos',$logos)->with(['logo_improves'=>$logo_improves,'logo_colors'=>$logo_colors,'logo_formats'=>$logo_formats,'logo_type_parents'=>$logo_type_parents]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }



    public function type_change()
    {
        if(isset(session('user_datas')->id)){
            $user_id = session('user_datas')->id;
            $user_data = User::find($user_id);
            $designer = Designer::where('user_id',$user_id)->first();

            if($user_data->now_type == 0){
                $user_data->now_type = 1;
                $user_data->save();
                return view('customer.customer_history')->with('user_datas',$user_data);
            }else{
                $user_data->now_type = 0;
                $user_data->save();
                return view('designer.designer_news')->with('user_datas',$user_data)->with('designers',$designer);
            }
        }else{
            $logos = Logo::paginate(12);
            // $like_datas = session()->get('logo_like');
            $logo_formats = logoFormat::get();
            $logo_improves = logoImprove::get();
            $logo_colors = logoColor::get();
            $logo_type_parents = logoType::where('type_child_id',0)->get();
            
            return view('logo.logo_list')->with('logos',$logos)->with(['logo_improves'=>$logo_improves,'logo_colors'=>$logo_colors,'logo_formats'=>$logo_formats,'logo_type_parents'=>$logo_type_parents]);
        }
    }

    //お知らせ
    public function news_list()
    {
        if(isset(session('user_datas')->id)){
            $user_id = session('user_datas')->id;
            $user_data = User::find($user_id);
            $designer = Designer::where('user_id',$user_id)->first();

            if($user_data->now_type == 0){
                return view('designer.designer_news')->with('user_datas',$user_data)->with('designers',$designer);
            }else{
                return view('customer.customer_news')->with('user_datas',$user_data);
            }
        }else{
            $logos = Logo::paginate(12);
            // $like_datas = session()->get('logo_like');
            $logo_formats = logoFormat::get();
            $logo_improves = logoImprove::get();
            $logo_colors = logoColor::get();
            $logo_type_parents = logoType::where('type_child_id',0)->get();
            
            return view('logo.logo_list')->with('logos',$logos)->with(['logo_improves'=>$logo_improves,'logo_colors'=>$logo_colors,'logo_formats'=>$logo_formats,'logo_type_parents'=>$logo_type_parents]);
        }
    }

    //購入一覧
    public function buy_list(){
        if(isset(session('user_datas')->id)){
            $user_id = session('user_datas')->id;
            $user_data = User::find($user_id);
            // $designer = Designer::where('user_id',$user_id)->first();

            return view('customer.customer_history')->with('user_datas',$user_data);
        }else{
            $logos = Logo::paginate(12);
            // $like_datas = session()->get('logo_like');
            $logo_formats = logoFormat::get();
            $logo_improves = logoImprove::get();
            $logo_colors = logoColor::get();
            $logo_type_parents = logoType::where('type_child_id',0)->get();
            
            return view('logo.logo_list')->with('logos',$logos)->with(['logo_improves'=>$logo_improves,'logo_colors'=>$logo_colors,'logo_formats'=>$logo_formats,'logo_type_parents'=>$logo_type_parents]);
        }
    }

    //いいね一覧
    public function like_list(){
        if(isset(session('user_datas')->id)){
            $user_id = session('user_datas')->id;
            $user_data = User::find($user_id);
            // $designer = Designer::where('user_id',$user_id)->first();

            return view('customer.customer_fav')->with('user_datas',$user_data);
        }else{
            $logos = Logo::paginate(12);
            // $like_datas = session()->get('logo_like');
            $logo_formats = logoFormat::get();
            $logo_improves = logoImprove::get();
            $logo_colors = logoColor::get();
            $logo_type_parents = logoType::where('type_child_id',0)->get();
            
            return view('logo.logo_list')->with('logos',$logos)->with(['logo_improves'=>$logo_improves,'logo_colors'=>$logo_colors,'logo_formats'=>$logo_formats,'logo_type_parents'=>$logo_type_parents]);
        }
    }
}
