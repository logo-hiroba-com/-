$(function () {

    const menu_li = $('.mypage__setting__menu');

    // console.log($('.mypage__setting__menu')[0])

    // 色変更
    for (let i = 0; i < menu_li.length; i++) {
        menu_li.eq(i).click(function () {
            menu_li.css({
                color: '#707070'
            });
            menu_li.eq(i).css({
                color: '#B4BF5E'
            })
        });
    }

    // 内容変更
    // ユーザー設定押した時
    menu_li.eq(0).click(function () {
        $('.mypage__setting__right__user').css({
            display: 'block'
        })
        $('.mypage__setting__right__mail').css({
            display: 'none'
        })
        $('.mypage__setting__right__password').css({
            display: 'none'
        })
    });
    // メールアドレスの変更押した時
    menu_li.eq(1).click(function () {
        $('.mypage__setting__right__user').css({
            display: 'none'
        })
        $('.mypage__setting__right__mail').css({
            display: 'block'
        })
        $('.mypage__setting__right__password').css({
            display: 'none'
        })
    });
    // パスワードの変更押した時
    menu_li.eq(2).click(function () {
        $('.mypage__setting__right__user').css({
            display: 'none'
        })
        $('.mypage__setting__right__mail').css({
            display: 'none'
        })
        $('.mypage__setting__right__password').css({
            display: 'block'
        })
    });

})