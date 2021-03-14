
$(()=>{
//条件の切り替え
let _search_list = $(".index__search__navi__box");
let _search_btn = $(".index__search__navi ul li");
let _search_btn_span = $(".index__search__navi ul li span");

//ページネション 関係
let _prev_page = $(".pagenatoin__back");
let _next_page = $(".pagination__next");

console.log(localStorage.getItem("now_page"));
//今のページ
let current_page = Number(localStorage.getItem("now_page"));
console.log(current_page);

//ajax通信
let search_ajax = ()=>{
  console.log(_search_data);
  //ローカルに保存
  localStorage.setItem("now_page",current_page);
  //今のページ
  _search_data["current_page"] = current_page;
  //リセット
  _logo_box_warp.html("");
  $.ajax({
    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
    method: 'GET',   
    url: 'http://localhost/logo/search',
    data: _search_data,
    dataType: 'json'
  })
  .done((data)=>{
    console.log(data);
    //ページネーション処理
    $(".pagenatoin__pagebox").html("");
    //ページ総数    
    let total_page = data["page_data"]["total_page"];
    //一ページの表示数
    let per_page = data["page_data"]["per_page"];
    //始まるロゴ番号
    let start_num = data["page_data"]["start_num"];
    //表示するページ
    current_page = data["page_data"]["current_page"];
    console.log("current_page:"+current_page);

    let _page_box = $(".pagenatoin__pagebox");

    //点点々
    let reader_html = `<li class="pagenatoin__reader">…</li>`;

    //ページ場所の表示
    $(".index__logobar__num1").text(data["page_data"]["total"]);
    $(".index__logobar__num2 .startNum").text(start_num);
    if(current_page < total_page){
      $(".index__logobar__num2 .endNum").text(start_num+per_page-1);
    }else{
      $(".index__logobar__num2 .endNum").text(data["page_data"]["total"]);
    }

    //前へ後ろへの表示
    if(total_page == 1){
      _prev_page.removeClass("flex");
      _prev_page.addClass("none");
      _next_page.removeClass("flex");
      _next_page.addClass("none");
    }
    else if(current_page == 1){
      _prev_page.removeClass("flex");
      _prev_page.addClass("none");
      _next_page.removeClass("none");
      _next_page.addClass("flex");
    }
    else if(current_page == total_page){
      _next_page.removeClass("flex");
      _next_page.addClass("none");
      _prev_page.removeClass("none");
      _prev_page.addClass("flex");
    }
    else{
      _prev_page.removeClass("none");
      _prev_page.addClass("flex");
      _next_page.removeClass("none");
      _next_page.addClass("flex");
    }

    //ページ貼り付ける関数
    let page_add = (p_num,p_current)=>{
      let page_html;
      if(p_num==p_current){
        page_html = `<li class="pagenatoin__num pagenation__now">
          <div>${p_num}</div>
        </li>`;
      }else{
        page_html = `<li class="pagenatoin__num">
          <div>${p_num}</div>
        </li>`;
      }

      _page_box.append(page_html);
    };

    if(total_page <= 5){
      //5ページ以下は全て表示
      for(let i=1;i<total_page+1;i++){
        page_add(i,current_page);
      }
    }
    else{
      if(current_page < 4){
        //4ページ以下を選んだ場合
        // for(let i=1;i<total_page;i++){
        //   if(i<5){
        //     page_add(i,current_page);
        //   }else{
        //     _page_box.append(reader_html);
        //     page_add(total_page,current_page);
        //   }
        // }
        for(let i=1;i<=4;i++){
          page_add(i,current_page);
        }
        _page_box.append(reader_html);
        page_add(total_page,current_page);
      }else if(current_page > (total_page - 3)){
        //4ページ以上を選んだ場合
        page_add(1,current_page);
        _page_box.append(reader_html);
        for(let i=total_page-3; i<=total_page; i++){
          page_add(i,current_page);
        }
      }else{
        page_add(1,current_page);
        _page_box.append(reader_html);
        for(let i=current_page-1;i<=current_page+1;i++){
          page_add(i,current_page);
        }
        _page_box.append(reader_html);
        page_add(total_page,current_page);
      }
    }//if

    //データ処理
    if(data !== "データなし"){
      //データの表示
      logo_data = data["logo_data"];
      logo_data.forEach((value,key)=>{
        let logo_id = value["logo_id"]; 
        let logo_image = value["cust_before"];
        let logo_title = value["logo_title"];
        let logo_user = value["logo_user"];
        let logo_price = value["price_view"];
        let logo_element = `
        <div class="logo__logobox__wrap">
          <div class="heart">
            <label for="heart${key+1}">
              <input id="heart${key+1}" logo="${logo_id}" type="checkbox" name="heart"><img src="img/index_heart_non.svg" alt="いいね">
            </label>
          </div>
          <a href="logos/${logo_id}">
          <div class="index__logobox">
            <img src="${logo_image}" alt="${logo_title}">
          </div>
          <div class="index__logo__text">
            <p class="index__logo__text__price">¥${logo_price}</p>
            <p class="index__logo__text__by">by ${logo_user}</p>
          </div>
          </a>
        </div>
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
let _search_condition = $(".index__search__navi__box input");
let _search_condition_main = $(".index__search__navi__box input");
// _search_condition.off("change");

//検索データ
let _search_data = {"color":[],"improve":[],"type_parent":[],"format":[],"price":[],"improve":[],"type_parent":[],"current_page":[],"per_page":[],"total_page":[]};

//ロゴを入れる箱
let _logo_box_warp = $(".index__logobox__container");

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
    _search_data[`${_name}`].push(Number(_value));
  }

  if((prev_name !== undefined)&&(now_name !== prev_name)){
    choose_sum = 0;
    list_num++;
    console.log(list_num);
  }
};
search_ajax();

//ページ番号を送る
let _page_box = $(".pagenatoin__pagebox");
let _page_num = $(".pagenatoin__num div");
_page_box.on("click",_page_num,(event)=>{
  if($(event.target).hasClass("pagenatoin__num")){
    current_page = Number($(event.target).text());
    // _search_data["current_page"] = current_page;
    search_ajax();
    location.reload("#pageStart");
  }
});

//前へ
_prev_page.on("click",()=>{
  current_page = Number($(".pagenation__now").text())-1;
  // _search_data["current_page"] = current_page;
  search_ajax();
  location.reload("#pageStart");
});

//後ろへ
_next_page.on("click",()=>{
  current_page = Number($(".pagenation__now").text())+1;
  // _search_data["current_page"] = current_page;
  search_ajax();
  location.reload("#pageStart");
});


//絞り数の表示
_search_condition.on("change",(event)=>{
  current_page = 1;

  let _option_num_view = $(".listChoose .optionNum");
  let _option_num_now = Number(_option_num_view.text());
  if(_option_num_now == ""){
    _option_num_now = 0;
  }

  let _name = $(event.target).attr('name');
  let _value = $(event.target).val();
  if($(event.target).attr('status')==0){
    $(event.target).attr('status',1);
    _search_data[`${_name}`].push(Number(_value));
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

  search_ajax();
});

//検索ボタンを押す時
let _search = $(".index__search__keyword__box .input__search__btn");
let _header_search = $(".header__saerch__btn");

_search.on("click",()=>{
  let search_text = $(".index__search__keyword__box .input__text").val();
  _search_data["search_text"] = search_text;
  current_page = 1;
  search_ajax();
});

_header_search.on("click",()=>{
  let search_text = $(".header__search__text").val();
  _search_data["search_text"] = search_text;
  current_page = 1;
  search_ajax();
});

$(".index__search__price__box input").on("change",(event)=>{
  let logo_price = Number($(event.target).val());
  
  if($(event.target).attr('status')==0){
    $(event.target).attr('status',1);
    _search_data["price"].push(logo_price);
    current_page = 1;
    search_ajax();
  }else{
    $(event.target).attr('status',0);
    _search_data["price"].forEach((value,key)=>{
      if(value == logo_price){
        _search_data["price"].splice(key,1);
      }
    });
    current_page = 1;
    search_ajax();
  }
});

});
 
