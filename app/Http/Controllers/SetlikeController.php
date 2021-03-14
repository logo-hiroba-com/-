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


class SetlikeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = session('user_datas')->id;
        $user_data = User::find($user_id);

        if($user_data->status == 0){
            return view('customer.customer_fav')->with('user_datas',$user_data);
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



    public function statu_change(Request $request)
    {
        $user_id = session('user_datas')->id;
        $user_data = User::find($user_id);

        $stuats = $request->status;

        if($stuats == 0){
            return view('customer.customer_history')->with('user_datas',$user_data);
        }else{
            return view('designer.customer_news')->with('user_datas',$user_data);
        }
    }

    public function news_list()
    {
        $user_id = session('user_datas')->id;
        $user_data = User::find($user_id);

        if($user_data->status == 0){
            return view('customer.customer_news')->with('user_datas',$user_data);
        }else{
            return view('designer.customer_news')->with('user_datas',$user_data);
        }
    }
}
