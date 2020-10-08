$(()=>{
//条件の切り替え
let _search_list = $(".index__search__navi__box");
let _search_btn = $(".index__search__navi ul li");
let _search_btn_span = $(".index__search__navi ul li span");

//ajax通信
let search_ajax = ()=>{
  $.ajax({
    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
    method: 'POST',   
    url: '/search',
    data: _search_data,
    dataType: 'json'
  })
  .done((data)=>{
    console.log(data);
    _logo_box_warp.html("");
    
    if(data !== "データなし"){
      //データの表示
      data.forEach((value,key)=>{
        let logo_id = value["id"]; 
        let logo_image = value["logo_image"]["cust_before_path"];
        let logo_title = value["logo_property"]["logo_title"];
        let logo_user = value["user"]["username"];
        let logo_price = value["price_view"];
        let logo_element = `
          <a href="http://homestead.test/logos/${logo_id}">
          <div class="index__logobox">
              <img src="/storage/${logo_image}" alt="${logo_title}">
          </div>
          <div class="index__logo__text">
              <p class="index__logo__text__price">¥${logo_price}</p>
              <p class="index__logo__text__by">by ${logo_user}</p>
          </div>
          </a>
        `;
      _logo_box_warp.append(logo_element);
      });
    }
  })
  .fail((error)=>{
    console.log(error);
  });
};

// let option_num = 0;

for(let i=0; i<_search_btn.length; i++){
  $(_search_btn[i]).on("click",(event)=>{
    _search_btn.removeClass("listChoose");
    $(event.target).addClass("listChoose");
    
    if($(_search_list[i]).hasClass("searchListHidden")){
      _search_list.removeClass("searchListView");
      _search_list.addClass("searchListHidden");
      $(_search_list[i]).removeClass("searchListHidden");
      $(_search_list[i]).addClass("searchListView");
    }
  });
}

//条件を送る
let _search_condition = $(".index__search__navi__box input,.index__search__price input");
let _search_condition_main = $(".index__search__navi__box input");
// _search_condition.off("change");

//検索データ
let _search_data = {"color":[],"improve":[],"type_parent":[],"format":[],"price":[],"improve":[],"type_parent":[]};

//ロゴを入れる箱
let _logo_box_warp = $(".index__logobox__wrap");

let choose_sum = 0;
let list_num = 0;
//ロードチェック
for(let i=0;i<_search_condition_main.length;i++){
  let prev_name = $(_search_condition_main[i-1]).attr('genre');
  let now_name = $(_search_condition_main[i]).attr('genre');

  if(_search_condition_main[i].checked){
    choose_sum++;
    $(_search_condition_main[i]).attr('status',1);
    // console.log(choose_sum);
    $(_search_btn_span[list_num]).addClass("optionNumChoose");
    $(_search_btn_span[list_num]).text(choose_sum);

    let _name = $(_search_condition_main[i]).attr('name');
    let _value = $(_search_condition_main[i]).val();
    _search_data[`${_name}`].push(_value);
  }

  if((prev_name !== undefined)&&(now_name !== prev_name)){
    choose_sum = 0;
    list_num++;
    console.log(list_num);
  }
};

console.log(_search_data);
search_ajax();


//絞り数の表示
_search_condition.on("change",(event)=>{
  let _option_num_view = $(".listChoose .optionNum");
  let _option_num_now = Number(_option_num_view.text());
  if(_option_num_now == ""){
    _option_num_now = 0;
  }

  let _name = $(event.target).attr('name');
  let _value = $(event.target).val();
  if($(event.target).attr('status')==0){
    $(event.target).attr('status',1);
    _search_data[`${_name}`].push(_value);
    _option_num_now++;
    _option_num_view.addClass("optionNumChoose");
    _option_num_view.text(_option_num_now);
  }else{
    $(event.target).attr('status',0);
    _search_data[`${_name}`].forEach((value,key)=>{
      if(value == _value){
        _search_data[`${_name}`].splice(key,1);
      }
    });
    _option_num_now--;
    if(_option_num_now>0){
      _option_num_view.text(_option_num_now);
      _option_num_view.addClass("optionNumChoose");
    }else{
      _option_num_view.text("");
      _option_num_view.removeClass("optionNumChoose");
    }
  }

  console.log(_search_data);
  search_ajax();
});

//検索ボタンを押す時
let _search = $(".index__search__keyword__box .input__search__btn");
let _header_search = $(".header__saerch__btn");

_search.on("click",()=>{
  let search_text = $(".index__search__keyword__box .input__text").val();
  _search_data["search_text"] = search_text;
  search_ajax();
});

_header_search.on("click",()=>{
  let search_text = $(".header__search__text").val();
  _search_data["search_text"] = search_text;
  search_ajax();
});

});
 
