//写真の即表示
let file=document.getElementById("inputFile");
file.addEventListener('change', (event)=> {
    //名前、thumbを表示する仕組み
    $(".imageView").removeClass("hidden");
    if(window.File){
        let input = event.target.files[0];
        let image_file = window.URL.createObjectURL(input);
        let photo_view = document.getElementById("photoView");
        $(photo_view).removeClass("hidden");
        $(".imageView .startWord").css('display','none');
        photo_view.setAttribute('src',`${image_file}`);
        photo_view.setAttribute('alt',`${input.name}`);

        //確認
        $(".contentImg img").attr('src',`${image_file}`);
        $(".contentImg img").attr('alt',`${input.name}`);
    }
});

//次への仕組み
let _step_area = $(".logoUp__upArea__stepArea");
let _step_menu = $(".logoUp__upArea__stepMenu li");

//次へボタン
let _next_btn = $(".logoUp__upArea__nextBtn .nextBtn");

let num=0;
_next_btn.on("click",(event)=>{
    console.log("今："+num);
    console.log("全部："+_step_menu.length);
    
    //切り替え
    $(_step_menu).removeClass("now");
    $(_step_area).addClass("hidden");
    num++;
    $(_step_menu[num]).addClass("now");
    $(_step_area[num]).removeClass("hidden");
    
    //ボタン消える操作
    if(num>_step_menu.length-2){
        _next_btn.addClass("hidden");
    }

    //確認に入れる
    let _logo_name = $(".titleInput input").val();
    let _logo_desc = $(".content textarea").val();
    console.log($(".titleInput input").val());
    $(".contentText.title").text(_logo_name);
    $(".contentText.consept").text(_logo_desc);
});

//メニューを押したら切り替え
for(let i=0;i<_step_menu.length;i++){
    $(_step_menu[i]).on("click",(event)=>{
        //次へ
        if(i<_step_menu.length-1){
            _next_btn.removeClass("hidden");
        }else{
            _next_btn.addClass("hidden");
        }
        //整理
        $(_step_menu).removeClass("now");
        $(_step_area).addClass("hidden"); 
        //追加
        num = i;
        $(_step_menu[num]).addClass("now");
        $(_step_area[num]).removeClass("hidden");
        //確認に入れる
        if($(event.target).text()=="投稿"){
            let _logo_name = $(".titleInput input").val();
            let _logo_desc = $(".content textarea").val();
            console.log($(".titleInput input").val());
            $(".contentText.title").text(_logo_name);
            $(".contentText.consept").text(_logo_desc);
        }
    });
}

//カラー
let _color_btn = $(".colorArea li");

let _color_select = $(".colorSelectArea .color");
let _color_name = $(".colorSelectArea .colorName");
let _color_input = $(".colorInput");

_color_btn.on("click",(event)=>{
    let color_id = $(event.target).attr('id');
    let color_style = $(event.target).attr('style');
    let color_name = $(event.target).attr('name');
    _color_input.val(color_id);
    _color_select.attr('style',color_style);
    _color_name.text(color_name);
    _color_btn.removeClass("colorSelect");
    $(event.target).addClass("colorSelect");

    //カラー
    $(".contentColor .color").attr('style',color_style);
    $(".contentColor .colorName").text(color_name);
});

//タイプ
let type_area_li = $(".typeArea li");
let type_child_area = $(".typeChildArea");
let type_child_area_li = $(".typeChildArea li");

//表示用
let type_li_view = $(".typeArea li,.typeChildArea li");
//確認の表示
let type_check_view = (array,array_content,view_content)=>{
    let now_data = "";
    for(let i=0;i<array.length;i++){
        let now_num = array[i];
        for(let j=0;j<array_content.length;j++){
            if(now_num == $(array_content[j]).attr('id')){
                now_data += `${$(array_content[j]).attr('typename')}　`;
            }
        }
    }
    $(view_content).text(now_data);
};

let type_input = $(".typeInput");
let select_id;
// let type_num = 0;
let type_array = [];
//子ジャンルあるかどうかのflag
let child_type_flag = false;
// let improve_area_li = $(".improveArea li");
type_area_li.on("click",(event)=>{
    // type_area_li.removeClass("selectNow");
    select_id = $(event.target).attr('parent_id');
    let select_parent_id = $(event.target).attr('parent_id');
    type_child_area_li.addClass("hidden");
    // if($(event.target).children("span").text()==""){
    if($("span",event.target).text()==""){ 
        $("span",event.target).text("✓");

        select_id = $(event.target).attr('id');
        type_array.push(select_id);
        type_input.val(type_array);

        for(let i=0;i<type_child_area_li.length;i++){
            if($(type_child_area_li[i]).attr('parent_id')==select_parent_id){
                $(type_child_area_li[i]).removeClass("hidden");
                // child_type_flag = true;
            }
        }//for
        type_check_view(type_array,type_li_view,".contentText.type");
    }else{
        $("span",event.target).text("");
        for(let i=0;i<type_child_area_li.length;i++){
            if($(type_child_area_li[i]).attr('parent_id')==select_parent_id){
                $(type_child_area_li[i]).removeClass("hidden");
                $(type_child_area_li[i]).removeClass("selectNow");
                
                select_id = $(type_child_area_li[i]).attr('id');
                for(let j=0;j<type_array.length;j++){
                    if(type_array[j]==select_id){
                        type_array.splice(j,1);
                    }
                }

                // child_type_flag = true;
            }
        }//for

        select_id = $(event.target).attr('id');
        for(let i=0;i<type_array.length;i++){
            if(type_array[i]==select_id){
                type_array.splice(i,1);
            }
        }
        type_check_view(type_array,type_li_view,".contentText.type");
    }
});
type_child_area_li.on("click",(event)=>{
    select_id = $(event.target).attr('id');
    if($(event.target).hasClass("selectNow")){
        $(event.target).removeClass("selectNow");
        for(let i=0;i<type_array.length;i++){
            if(type_array[i]==select_id){
                type_array.splice(i,1);
            }
        }
        type_input.val(type_array);
        type_check_view(type_array,type_li_view,".contentText.type");
    }else{
        $(event.target).addClass("selectNow");
        //IDを渡す
        type_array.push(select_id);
        type_input.val(type_array);
        type_check_view(type_array,type_li_view,".contentText.type");
    }
   
    // let select_parent_id = $(event.target).attr('parent_id');
});

//確認の表示
let check_view = (array,array_content,view_content)=>{
    let now_data = "";
    for(let i=0;i<array.length;i++){
        let now_num = array[i];
        now_data += `${$(array_content[now_num]).text()}　`;
    }
    $(view_content).text(now_data);
};

//イメージ
let improve_num = 0;
let improve_array = [];
let improve_area_li = $(".improveArea li");
improve_area_li.on("click",(event)=>{
    select_id = $(event.target).attr('id');
    if($(event.target).hasClass("selectNow")){
        $(event.target).removeClass("selectNow");
        for(let i=0;i<improve_array.length;i++){
            if(improve_array[i]==select_id){
                improve_array.splice(i,1);
            }
        }
        $(".improveInput").val(improve_array);

        check_view(improve_array,improve_area_li,".contentText.improve");
    }else{
        // improve_area_li.removeClass("selectNow");
        $(event.target).addClass("selectNow");
        let improve_id = $(event.target).attr('id');
        improve_array.push(improve_id);
        $(".improveInput").val(improve_array);
        console.log(improve_array);
        // improve_num++;
        // console.log(improve_num);
        check_view(improve_array,improve_area_li,".contentText.improve");
    }
});

//形
let format_area_li = $(".formatArea li");
format_area_li.on("click",(event)=>{
    format_area_li.removeClass("selectNow");
    $(event.target).addClass("selectNow");
    let format_id = $(event.target).attr('id');
    $(".formatInput").val(format_id);

    //確認に入れる
    $(".contentText.format").text($(event.target).text());
});

//値段
let price_area_li = $(".priceArea li");
price_area_li.on("click",(event)=>{
    price_area_li.removeClass("selectNow");
    $(event.target).addClass("selectNow");
    let price_id = $(event.target).attr('id');
    $(".priceInput").val(price_id);

    //確認に入れる
    $(".contentText.price").text($(event.target).text());

});