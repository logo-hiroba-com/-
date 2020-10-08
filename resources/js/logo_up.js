//写真の即表示
let file=document.getElementById("inputFile");
file.addEventListener('change', (event)=> {
    //名前、thumbを表示する仕組み
    $(".imageView").removeClass("hidden");
    if(window.File){
        let input = event.target.files[0];
        let image_file = window.URL.createObjectURL(input);
        document.getElementById("fileName").innerHTML = input.name;
        let photo_view = document.getElementById("photo_view");
        photo_view.setAttribute("src",`${image_file}`);
    }
});

//次への仕組み
let _step_area = $(".step-area");
let _step_menu = $(".step-menu li");

//次へボタン
let _next_btn = $(".next-btn");

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
});

//メニューを押したら切り替え
for(let i=0;i<_step_menu.length;i++){
    $(_step_menu[i]).on("click",()=>{
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
    });
}

//カラー
let _color_btn = $(".color_area li");

let _color_select = $(".color-select span")
let _color_input = $(".color-input");

_color_btn.on("click",(event)=>{
    let color_id = $(event.target).attr('id');
    let color_style = $(event.target).attr('style');
    _color_input.val(color_id);
    _color_select.attr('style',color_style);
    _color_btn.removeClass("color_select");
    $(event.target).addClass("color_select");
});

//タイプ
let type_area_li = $(".type_area li");
let type_child_area = $(".type_child_area");
let type_child_area_li = $(".type_child_area li");

let type_input = $(".type-input");
let select_id;

type_area_li.on("click",(event)=>{
    type_area_li.removeClass("select_now")
    $(event.target).addClass("select_now");

    let select_parent_id = $(event.target).attr('parent_id');

    select_id = $(event.target).attr('parent_id');
    type_child_area_li.addClass("hidden");
    for(let i=0;i<type_child_area_li.length;i++){
        if($(type_child_area_li[i]).attr('parent_id')==select_parent_id){
            $(type_child_area_li[i]).removeClass("hidden");
        }   
    }
    
    //IDを渡す
    select_id = $(event.target).attr('id');
    type_input.val(select_id);
});
type_child_area_li.on("click",(event)=>{
    type_child_area_li.removeClass("select_now");
    $(event.target).addClass("select_now");

    let select_parent_id = $(event.target).attr('parent_id');

    //IDを渡す
    select_id = $(event.target).attr('id');
    type_input.val(select_id);
});

//イメージ
let improve_area_li = $(".improve_area li");
improve_area_li.on("click",(event)=>{
    improve_area_li.removeClass("select_now");
    $(event.target).addClass("select_now");
    let improve_id = $(event.target).attr('id');
    $(".improve-input").val(improve_id);
});

//形
let format_area_li = $(".format_area li");
format_area_li.on("click",(event)=>{
    format_area_li.removeClass("select_now");
    $(event.target).addClass("select_now");
    let format_id = $(event.target).attr('id');
    $(".format-input").val(format_id);
});