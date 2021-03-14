$(function () {

    // いいねのハートの調整
    function colorOn() {
        for (let i = 0; i < $('[name="heart"]:checked').length; i++) {
            let id = $('[name="heart"]:checked')[i].id;
            $('label[for="' + id + '"]')[0].lastElementChild.src = "img/index_heart_on.svg";
        }
    }

    function colorOff() {
        for (let i = 0; i < $('[name="heart"]:not(:checked)').length; i++) {
            let id = $('[name="heart"]:not(:checked)')[i].id;
            $('label[for="' + id + '"]')[0].lastElementChild.src = "img/index_heart_non.svg";
        }
    }

    $(".index__logobox__container").on("click",'[name="heart"]',function() {
        colorOn();
        colorOff();
    });
    colorOn();
    colorOff();
});