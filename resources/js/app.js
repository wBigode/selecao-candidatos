import "./bootstrap";

jQuery(function () {
    var form_1 = $(".form_1");
    var form_2 = $(".form_2");
    var form_3 = $(".form_3");

    var form_1_btns = $(".form_1_btns");
    var form_2_btns = $(".form_2_btns");
    var form_3_btns = $(".form_3_btns");

    var form_1_next_btn = $(".form_1_btns .btn_next");
    var form_2_back_btn = $(".form_2_btns .btn_back");
    var form_2_next_btn = $(".form_2_btns .btn_next");
    var form_3_back_btn = $(".form_3_btns .btn_back");

    var b1 = $(".b1");
    var b2 = $(".b2");

    var icon1 = $(".icon1");
    var icon2 = $(".icon2");

    var btn_done = $(".btn_done");
    var modal_wrapper = $(".modal_wrapper");

    $(form_1_next_btn).on("click", function () {
        $(form_1).css("display", "none");
        $(form_2).css("display", "block");

        $(form_1_btns).css("display", "none");
        $(form_2_btns).css("display", "flex");

        $(b1).attr("hidden", true);
        $(icon1).removeAttr("hidden");
    });

    $(form_2_back_btn).on("click", function () {
        $(form_1).css("display", "block");
        $(form_2).css("display", "none");

        $(form_1_btns).css("display", "flex");
        $(form_2_btns).css("display", "none");

        $(b1).removeAttr("hidden");
        $(icon1).attr("hidden", true);
    });

    $(form_2_next_btn).on("click", function () {
        $(form_2).css("display", "none");
        $(form_3).css("display", "block");

        $(form_3_btns).css("display", "flex");
        $(form_2_btns).css("display", "none");

        $(b2).attr("hidden", true);
        $(icon2).removeAttr("hidden", true);
    });

    $(form_3_back_btn).on("click", function () {
        $(form_2).css("display", "block");
        $(form_3).css("display", "none");

        $(form_3_btns).css("display", "none");
        $(form_2_btns).css("display", "flex");

        $(b2).removeAttr("hidden");
        $(icon2).attr("hidden", true);
    });

    $(btn_done).on("click", function () {
        $(modal_wrapper).addClass("active");
    });

});
