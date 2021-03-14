$(function () {

    // ===Page1 選択した画像を表示===
    $('#logo_image').on('change', function () {
        var $fr = new FileReader();
        $fr.onload = function () {
            $('#logo_image_preview').attr('src', $fr.result);
        }
        $fr.readAsDataURL(this.files[0]);

        // ラグ対策でsettimeout入れてる
        setTimeout(() => {
            console.log($('#logo_image_preview')[0].naturalHeight);
            // 縦長の時
            if ($('#logo_image_preview')[0].naturalHeight >= $('#logo_image_preview')[0].naturalWidth) {
                $('#logo_image_preview').css({
                    width: 'auto',
                    height: '300px'
                });
            } else {
                $('#logo_image_preview').css({
                    width: '300px',
                    height: 'auto'
                });
            }
        }, 1000);
    });

    // ===Page2 選択colorによって表示変更===
    // for文で処理する用の配列
    // let colorArray = ['#191919', '#818181', '#1BB1E8', '#1E388E', '#981CA8', "#17AC34", "#E8E13A", "#964E21", "#FD6BCB", "#FC2222", "#FC8722", "#1B42E8"];
    // let innerHTMLArray = ['黒', 'グレー', '水色', '紺色', '紫色', '緑色', '黄色', '茶色', 'ピンク色', '赤色', 'オレンジ色', '青色'];

    function colorChecker(code,name) {
        let checkednumID;
        // ifで挟まないとundefinedになってエラーが出る
        if ($('input[name="logo_color"]:checked')[0] !== undefined && $('input[name="logo_color"]:checked')[0] !== null && $('input[name="logo_color"]:checked')[0] !== "") {
            checkednumID = $('input[name="logo_color"]:checked')[0].id;
        }
        for (let i = 0; i < $('.mypageD__post__P2__color').length; i++) {
            if (checkednumID == `colorBox${i + 1}`) {
                $(`.colorBox_check`).removeClass('colorBox_check_on');
                $(`.colorBox_check${i + 1}`).addClass('colorBox_check_on');
                $('.checkedColor').css({
                    'background-color': code
                });
                $('.checkedText')[0].innerHTML = name
            }
        }
    }
    //1回目
    colorChecker();

    // クリックしたとき
    $('input[name="logo_color"]').on('change', function (event) {
        let colorCode = event.target.getAttribute('colorcode');
        let colorName = event.target.getAttribute('colorname');
        colorChecker(colorCode,colorName);
    });


    // ===Page3 選択してるやつのCSS変更===
    function shapeChecker() {
        $('label').removeClass('oncheck_shape');
        // ifで挟まないとundefinedになってエラーが出る
        let id;
        if ($('input[name="logo_format"]:checked')[0] !== undefined && $('input[name="logo_format"]:checked')[0] !== null && $('input[name="logo_format"]:checked')[0] !== "") {
            id = $('input[name="logo_format"]:checked')[0].id;
        }
        $('label[for="' + id + '"]').addClass('oncheck_shape');
    }
    // 1回目
    shapeChecker();
    // クリックしたとき
    $('input[name="logo_format"]').on('change', function () {
        shapeChecker();
    });


    // ===Page4 選択してるやつのcss変更、選択上限設定===
    function imageChecker() {
        // 選択上限は2つまで
        let checked_image_length = $('input[name="logo_improve[]"]:checked').length;
        if (checked_image_length >= 2) {
            $('input[name="logo_improve[]"]:not(:checked)').prop('disabled', true);
        } else {
            $('input[name="logo_improve[]"]:not(:checked)').prop('disabled', false);
        }

        let checked_image = $('input[name="logo_improve[]"]:checked');
        $('label').removeClass('oncheck_image');
        for (let i = 0; i < checked_image.length; i++) {
            let id = checked_image[i].id;
            $('label[for="' + id + '"]').addClass('oncheck_image');
        }
    }
    // 1回目
    imageChecker();
    //クリックしたとき
    $('input[name="logo_improve[]"]').on('change', function () {
        imageChecker();
    });


    // ===Page5 親ジャンルの選択してるやつのcss変更、選択上限設定、子ジャンルの変更===
    function genreChecker() {
        let bigGenre_checked = $('input[name="logo_type[]"]:checked');
        // 2つまでに制限
        if (bigGenre_checked.length >= 2) {
            $('input[name="logo_type[]"]:not(:checked)').prop('disabled', true);
        } else {
            $('input[name="logo_type[]"]:not(:checked)').prop('disabled', false);
        }

        // 子ジャンルの表示
        // $(`label`).removeClass('displayOn');
        // $('.mypageD__post__P5__Box2__TitleBoxkind')[0].innerHTML = "";
        // $('.mypageD__post__P5__Box3__TitleBoxkind')[0].innerHTML = "";

        // // 親ジャンルによって子ジャンル表示
        // // 子ジャンル2つ文繰り返し
        // let genreList = ["飲食・グルメ", "美容・セラピー", "IT", "教育", "スポーツ", "音楽"];
        // for (let index = 0; index < 2; index++) {
        //     if ($('input[name="genre"]:checked')[index] !== undefined && $('input[name="genre"]:checked')[index] !== null && $('input[name="genre"]:checked')[index] !== "") {
        //         for (let i = 1; i < 7; i++) {
        //             if ($('input[name="genre"]:checked')[index].value == i) {
        //                 $(`.genre_kind${index + 1}_${i}`).addClass('displayOn');
        //                 $(`.mypageD__post__P5__Box${index + 2}__TitleBoxkind`)[0].innerHTML = genreList[i - 1];
        //             }
        //         }
        //         if ($('input[name="genre"]:checked')[index].value == 8) {
        //             $(`.genre_kind${index + 1}_8`).addClass('displayOn');
        //             $(`.mypageD__post__P5__Box${index + 2}__TitleBoxkind`)[0].innerHTML = "動物";

        //         }
        //         if ($('input[name="genre"]:checked')[index].value == 9) {
        //             $(`.genre_kind${index + 1}_9`).addClass('displayOn');
        //             $(`.mypageD__post__P5__Box${index + 2}__TitleBoxkind`)[0].innerHTML = "交流";
        //         }
        //         if ($('input[name="genre"]:checked')[index].value == 12) {
        //             $(`.genre_kind${index + 1}_12`).addClass('displayOn');
        //             $(`.mypageD__post__P5__Box${index + 2}__TitleBoxkind`)[0].innerHTML = "エンタメ";
        //         }
        //         if ($('input[name="genre"]:checked')[index].value == 16) {
        //             $(`.genre_kind${index + 1}_16`).addClass('displayOn');
        //             $(`.mypageD__post__P5__Box${index + 2}__TitleBoxkind`)[0].innerHTML = "乗り物";
        //         }
        //         if ($('input[name="genre"]:checked')[index].value == 22) {
        //             $(`.genre_kind${index + 1}_22`).addClass('displayOn');
        //             $(`.mypageD__post__P5__Box${index + 2}__TitleBoxkind`)[0].innerHTML = "季節";
        //         }
        //     }
        // }
    }
    // function smallgenreChecker(index) {
    //     let checked_image = $(`input[name="smallGenre${index}"]:checked`);
    //     $(`label[name="smallGenre${index}"]`).removeClass('oncheck_image');
    //     for (let i = 0; i < checked_image.length; i++) {
    //         let id = checked_image[i].id;
    //         console.log(id);
    //         $('label[for="' + id + '"]').addClass('oncheck_image');
    //     }
    // }

    // 1回目
    genreChecker();
    // smallgenreChecker(1);
    // smallgenreChecker(2);
    //クリックしたとき
    $('input[name="logo_type[]"]').on('change', function () {
        genreChecker();
    });
    // $('input[name="smallGenre1"]').on('change', function () {
    //     smallgenreChecker(1);
    // });
    // $('input[name="smallGenre2"]').on('change', function () {
    //     smallgenreChecker(2);
    // });

    // ===Page6 選択してるやつのcss変更、画像内のフォント変更===
    function fontChecker() {

        // css変更
        let checked_font = $('input[name="logo_font"]:checked');
        $('label').removeClass('oncheck_font');
        for (let i = 0; i < checked_font.length; i++) {
            let id = checked_font[i].id;
            $('label[for="' + id + '"]').addClass('oncheck_font');
        }
    }

    function fontChanger() {
        // 余分なclass削除
        $('#mypageD__post__P6__sampletext').removeClass();
        $('#mypageD__post__P6__sampletext').addClass('mypageD__post__P6__sampletext');

        // ロゴひろば の文字のフォントを変更
        if ($('input[name="logo_font"]:checked').id == 'font1') {
            $('.mypageD__post__P6__sampletext').addClass('font_gothic_serif')
        }
        else if ($('input[name="logo_font"]:checked').id == 'font2') {
            $('.mypageD__post__P6__sampletext').addClass('font_mintyo_san')
        }
        else if ($('input[name="logo_font"]:checked').id == 'font3') {
            if ($('.mypageD__post__P6__sampletext')[0].innerHTML == "ロゴひろば") {
                $('.mypageD__post__P6__sampletext').addClass('font_maru_jp');
            }
            else {
                $('.mypageD__post__P6__sampletext').addClass('font_maru_en');
            }
        }
        else if ($('input[name="logo_font"]:checked').id == 'font4') {
            if ($('.mypageD__post__P6__sampletext')[0].innerHTML == 'Logohiroba') {
                $('.mypageD__post__P6__sampletext').addClass('font_pop_jp');
            }
            else {
                $('.mypageD__post__P6__sampletext').addClass('font_pop_en');
            }
        }
    }
    // 1回目
    fontChecker();
    fontChanger();

    //フォント選んだとき 
    $('input[name="logo_font"]').on('change', function () {
        fontChecker();
        fontChanger();
    });

    //english押したとき
    $('.english').on('click', function () {

        $('.mypageD__post__P6__sampletext')[0].innerHTML = 'Logohiroba';
        $('.english').removeClass('mypageD__post__P6__nonselect');
        $('.japanese').addClass('mypageD__post__P6__nonselect');
        $('label[for="font1"]').innerHTML = 'ロゴひろば';

        // 文字を英語に変更
        $('label[for="font1"]')[0].innerHTML = 'Serif';
        $('label[for="font2"]')[0].innerHTML = 'San';
        $('label[for="font3"]')[0].innerHTML = 'Round Serif';
        $('label[for="font4"]')[0].innerHTML = 'Pop';

        // font変更
        $('label[for="font3"]').addClass('font_maru_en');
        $('label[for="font4"]').addClass('font_pop_en');
        $('label[for="font3"]').removeClass('font_maru_jp');
        $('label[for="font4"]').removeClass('font_pop_jp');

        fontChanger();

    });
    //japznese押したとき
    $('.japanese').on('click', function () {
        $('.mypageD__post__P6__sampletext')[0].innerHTML = 'ロゴひろば';
        $('.english').addClass('mypageD__post__P6__nonselect');
        $('.japanese').removeClass('mypageD__post__P6__nonselect');

        // 文字を日本語に変更
        $('label[for="font1"]')[0].innerHTML = 'ゴシック体';
        $('label[for="font2"]')[0].innerHTML = '明朝体';
        $('label[for="font3"]')[0].innerHTML = '丸ゴシック';
        $('label[for="font4"]')[0].innerHTML = 'ポップ';

        // font変更
        $('label[for="font3"]').addClass('font_maru_jp');
        $('label[for="font4"]').addClass('font_pop_jp');
        $('label[for="font3"]').removeClass('font_maru_en');
        $('label[for="font4"]').removeClass('font_pop_en');

        fontChanger();
    });

    // ===Page7 選択してるやつのcss変更===
    function priceChecker() {

        // css変更
        let checked_price = $('input[name="logo_price"]:checked');
        $('label').removeClass('oncheck_priceBox');
        for (let i = 0; i < checked_price.length; i++) {
            let id = checked_price[i].id;
            console.log(id);
            $('label[for="' + id + '"]').addClass('oncheck_priceBox');
        }
    }
    priceChecker();
    $('input[name="logo_price"]').on('change', function () {
        priceChecker();
    });

    // ===Page8 内容調整===



})