<?php

namespace App\Http\Controllers;

use App\Logo;
use App\logoImage;
use App\logoProperty;
use App\logoImprove;
use App\logoColor;
use App\logoFormat;
use App\logoType;
use Illuminate\Http\Request;


class LogoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $logos = Logo::get();
        // $like_datas = session()->get('logo_like');
        $logo_formats = logoFormat::get();
        $logo_improves = logoImprove::get();
        $logo_colors = logoColor::get();
        $logo_type_parents = logoType::where('type_child_id',0)->get();

        //気になる処理
        if(!empty($like_datas)){
            foreach($like_datas as $like_data){
                foreach($logos as $logo){
                    if($like_data == $logo->id){
                        $logo->like_num = 1;
                    }
                }
            }//foreach
        }//if
        
        //ロゴ一覧ページ
        return view('logo.logo_list')->with('logos',$logos)->with(['logo_improves'=>$logo_improves,'logo_colors'=>$logo_colors,'logo_formats'=>$logo_formats,'logo_type_parents'=>$logo_type_parents]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $logo_improves = logoImprove::get();
        $logo_colors = logoColor::get();
        $logo_formats = logoFormat::get();
        $logo_type_parents = logoType::where('type_child_id',0)->get();
        $logo_types = logoType::where('type_child_id','>',0)->get();
        
        //ロゴを新しく作るページ
        return view('logo.logo_up')->with(['logo_improves'=>$logo_improves,'logo_colors'=>$logo_colors,'logo_formats'=>$logo_formats,'logo_type_parents'=>$logo_type_parents,'logo_types'=>$logo_types]);
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
        $logo = new Logo;
        $logo->logo_price = $request->logo_price;
        $logo->user_id = session('user_datas')["id"];
        $logo->save();

        $logo_now = Logo::orderBy('id','desc')->first();

        $improves = explode(',',$request->logo_improve);
        foreach($improves as $improve){
            $logo->logoImprove()->attach(['improve_id'=>$improve]);
        }

        $types = explode(',',$request->logo_type);
        foreach($types as $type){
            $logo->logoType()->attach(['type_id'=>$type]);
        }

        $logo_property = new logoProperty;
        $logo_property->logo_id = $logo_now->id;
        $logo_property->logo_concept = $request->input('logo_desc');
        $logo_property->logo_title = $request->input('logo_name');
        $logo_property->logo_format = $request->logo_format;
        // $logo_property->logo_image = $request->logo_improve;
        $logo_property->logo_color = $request->logo_color;
        // $logo_property->type_num = $request->logo_type;
        $logo_property->save();
        
        $logo_image = new logoImage;
        $logo_image->logo_id = $logo_now->id;
        $logo_photo = $request->file('logo_photo');
        if($request->hasFile('logo_photo')){
            if($logo_photo->isValid()){
                $file_path = $logo_photo->store('public');
                $logo_image->cust_before_path = str_replace("public/",'',$file_path);
                $logo_image->cust_date = now();
            }
        }
        $logo_image->save();
        return redirect('logos/');
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
        $logo_id = $logo["id"];
        $logo_now = Logo::find($logo_id);

        $logos = Logo::get();

        return view('logo.logo_detail')->with('logo_now',$logo_now)->with('logos',$logos);
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

    //検索
    public function logo_search(Request $request)
    {
        // $logo_property = logoProperty::inRandomOrder()->first();
        $back_data = [];
        $logo_data = [];
        $num = 0;
        
        $search_text = $request->input('search_text');
        $logo_color = $request->color;
        $logo_format = $request->format;
        $logo_price = $request->price;
        $logo_improve = $request->improve;
        $logo_type_parent = $request->type_parent;

        if($logo_color!=""){
            foreach($logo_color as $value){
                $color_id = $value;
                if($value != ""){
                    $logo_data = Logo::whereHas('logoProperty',function($query) use($color_id) {
                            $query->where('logo_color',$color_id);
                        })->get();
                    foreach($logo_data as $key=>$data){
                        $logo_path = $data->logoImage;
                        $logo_title = $data->logoProperty;
                        $logo_user = $data->user;
                    }
                }

                foreach($logo_data as $value){
                    $back_data[$num] = $value;
                    $price_view = $value->logo_price();
                    $back_data[$num]["price_view"] = $price_view;
                    $num++;
                }
                $logo_data = [];
            }
        }
        else if($logo_format!=""){
            foreach($logo_format as $value){
                $format_id = $value;
                if($value != ""){
                    $logo_data = Logo::whereHas('logoProperty',function($query) use($format_id) {
                            $query->where('logo_format',$format_id);
                        })->get();
                    foreach($logo_data as $key=>$data){
                        $logo_path = $data->logoImage;
                        $logo_title = $data->logoProperty;
                        $logo_user = $data->user;
                    }
                }
                foreach($logo_data as $value){
                    $back_data[$num] = $value;
                    $price_view = $value->logo_price();
                    $back_data[$num]["price_view"] = $price_view;
                    $num++;
                }
                $logo_data = [];
            }
        }
        else if($logo_price!=""){
            foreach($logo_price as $value){
                $logo_price = $value;
                if($value != ""){
                    $logo_data = Logo::where('logo_price',$logo_price)->get();
                    foreach($logo_data as $key=>$data){
                        $logo_path = $data->logoImage;
                        $logo_title = $data->logoProperty;
                        $logo_user = $data->user;
                    }
                }
                foreach($logo_data as $value){
                    $back_data[$num] = $value;
                    $price_view = $value->logo_price();
                    $back_data[$num]["price_view"] = $price_view;
                    $num++;
                }
                $logo_data = [];
            }
        }
        else if($logo_improve!=""){
            $improve_logo_data = [];
            foreach($logo_improve as $improve_id){
                // $logo_improve = $improve_id;
    
                $improve_data = logoImprove::find($improve_id);
                foreach($improve_data->logo as $key=>$value){
                    $logo_data[$key] = $value;
                }

                foreach($logo_data as $key=>$data){
                    $logo_path = $data->logoImage;
                    $logo_title = $data->logoProperty;
                    $logo_user = $data->user;
                }
                $improve_flag = true;
                foreach($logo_data as $value){
                    //重複削り
                    foreach($improve_logo_data as $data){
                        if($data->id == $value->id){
                            $improve_flag = false;
                        }
                    }
                    if($improve_flag){
                        $improve_logo_data[$num] = $value;
                        $price_view = $value->logo_price();
                        $improve_logo_data[$num]["price_view"] = $price_view;
                        $num++;
                    }
                }
                $back_data = $improve_logo_data;

                $logo_data = [];
            }
        }
        else if($logo_type_parent!=""){
            $type_logo_data = [];
            foreach($logo_type_parent as $type_id){
    
                $type_parent_data = logoType::find($type_id);
                foreach($type_parent_data->logo as $key=>$value){
                    $logo_data[$key] = $value;
                }

                foreach($logo_data as $key=>$data){
                    $logo_path = $data->logoImage;
                    $logo_title = $data->logoProperty;
                    $logo_user = $data->user;
                }
                foreach($logo_data as $value){
                    $type_logo_data[$num] = $value;
                    $price_view = $value->logo_price();
                    $type_logo_data[$num]["price_view"] = $price_view;
                    $num++;
                }
                $back_data = $type_logo_data;

                $logo_data = [];
            }
        }
        else if($search_text!=""){
            $logo_data = Logo::whereHas('logoProperty',function($query) use($search_text) {
                $query->where('logo_title','LIKE','%'.$search_text.'%');
            })->get();
            foreach($logo_data as $key=>$data){
                $logo_path = $data->logoImage;
                $logo_title = $data->logoProperty;
                $logo_user = $data->user;
            }
            foreach($logo_data as $value){
                $back_data[$num] = $value;
                $price_view = $value->logo_price();
                $back_data[$num]["price_view"] = $price_view;
                $num++;
            }
            $logo_data = [];
        }
        else{
            $logo_data = Logo::get();
            foreach($logo_data as $key=>$data){
                $logo_path = $data->logoImage;
                $logo_title = $data->logoProperty;
                $logo_user = $data->user;
            }
            foreach($logo_data as $value){
                $back_data[$num] = $value;
                $price_view = $value->logo_price();
                $back_data[$num]["price_view"] = $price_view;
                $num++;
            }
            $logo_data = [];
        }
    
        return response()->json($back_data);
    }

    //気になる
    public function logo_like(Request $request)
    {
        //気になるロゴのID
        $logo_id = $request->id;

        //気になる配列作成
        $logo_like = [];
        if(!empty(session()->get("logo_like"))){
            $logo_like = session()->get("logo_like");
        }

        $like_flag = true;
        //重複チェック
        foreach($logo_like as $like){
            if($like == $logo_id){
                $like_flag = false;
            }
        }

        if($like_flag){
            array_push($logo_like,$logo_id);
            session()->put("logo_like",$logo_like);
        }else{
            $logo_like = array_diff($logo_like,array("{$logo_id}"));
            $logo_like = array_values($logo_like);
            session()->put("logo_like",$logo_like);
        }
        
        return redirect('logo/logos/');
    }
}
