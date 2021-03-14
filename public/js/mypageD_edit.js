$(function () {

    let notGoodat = $('.goodat:not(:checked)');


    // -----1回目-----

    let checked_length = $('.goodat:checked').length;

    // 選択上限は2つまで
    if (checked_length >= 2) {
        $('.goodat:not(:checked)').prop('disabled', true);
    } else {
        $('.goodat:not(:checked)').prop('disabled', false);
    }
    // check付きのlabelを緑に
    for (let i = 0; i < $('.goodat:checked').length; i++) {
        let id = $('.goodat:checked')[i].id;
        $('.goodatLabel[for="' + id + '"]').css({
            background: '#B4BF5E',
            color: '#fff'
        });
    }

    // check無しのlabelをデフォルトに
    for (let i = 0; i < notGoodat.length; i++) {
        let id = notGoodat[i].id
        $('.goodatLabel[for="' + id + '"]').css({
            background: 'none',
            color: '#707070'
        });
    }

    // クリックしたときにも同じ処理
    $('.goodat').click(function () {
        let checked_length = $('.goodat:checked').length;

        // 選択上限は2つまで
        if (checked_length >= 2) {
            $('.goodat:not(:checked)').prop('disabled', true);
        } else {
            $('.goodat:not(:checked)').prop('disabled', false);
        }

        // ---labelに色を付ける---
        for (let i = 0; i < $('.goodat:checked').length; i++) {
            let id = $('.goodat:checked')[i].id;
            $('.goodatLabel[for="' + id + '"]').css({
                background: '#B4BF5E',
                color: '#fff'
            });
        }

        // ---labelの色を消す---
        let notGoodat = $('.goodat:not(:checked)');
        for (let i = 0; i < notGoodat.length; i++) {
            let id = notGoodat[i].id
            $('.goodatLabel[for="' + id + '"]').css({
                background: 'none',
                color: '#707070'
            });
        }
    });
});