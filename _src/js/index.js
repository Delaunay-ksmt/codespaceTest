// [SETTING]::::::::::::::::::::::::::::::
window.$ = window.jQuery = require("jquery"),
    require("jquery-ui");
require('jquery-ui/ui/widgets/datepicker');
require('jquery-ui/ui/i18n/datepicker-ja');
const easing = require("jquery-easing");
const TILE = require("./plugin/jquery.tile.min");
const Svguse = require("./plugin/svgxuse.min");
let ua = navigator.userAgent.toLowerCase();
let isiPhone = ua.indexOf("iphone") > -1;
let isiPad = ua.indexOf("ipad") > -1;
let isAndroid = ua.indexOf("android") > -1 && ua.indexOf("mobile") > -1;
let isAndroidTablet = ua.indexOf("android") > -1 && ua.indexOf("mobile") == -1;
let direction = Math.abs(window.orientation);
let directionAfter = direction;
const TB = 1000;
const SP = 680;
let Media = "PC";
// [SELECTOR・GLOBAL VARIABLES]::::::::::::::::::::::::::::::
const Body = $("body");
const Header = $("header");
const Footer = $("footer");
const Section = $("section");
let WindowH, WindowW, HeaderH, HeaderW, FooterH, FooterW, FooterT;
// [READY・LOAD・RESIZE]::::::::::::::::::::::::::::::::::::::
$(document).ready(function () {
    $("body").removeClass("ready");
});

$(window).on("load", function () {

    Load();
});

$(window).on("resize", function () {
    if (isiPhone || isiPad || isAndroid || isAndroidTablet) {
        direction = Math.abs(window.orientation);
        if (direction != directionAfter) {
            Init();
        }
        directionAfter = direction;
    } else {
        Init();
    }
});

let Guide = false;

function GuideSet() {
    if (Body.hasClass('is-guide')) {
        Body.removeClass('is-guide')
        Guide = false;
    } else {
        Body.addClass('is-guide')
        Guide = true;
    }
}

$(window).on("keydown", function (e) {
    if (e.keyCode == 71) {
        GuideSet();
    }
});

// [SCROLL]::::::::::::::::::::::::::::::::::::::::::
let Scroll = 0;
let ScrollAfter = 0;
$(window).scroll(function () {
    Scroll = $(window).scrollTop();
    scrollFunc();
    ScrollAfter = Scroll;
});

// :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
// [FUNCION] :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
// :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::
//
// Load()********* ロード時のみ
// Init()********* ロード時・リサイズ時
// scrollFunc()********* スクロール時
// MediaQueries()********* メディアクエリ判別
// LayoutSet()********* レイアウト調整
// TileSet()********* タイル（高さ揃え）
// MenuFunc()********* ハンバーガーボタン
// SlideFunc()********* スライドショー
// ModalFunc()********* モーダル
// PG_ModalFunc()********* フォトギャラリー
// ScrollActionFunc()********* スクロールアクション
// ParallaxFunc()********* パララックス
// MasonryFunc()********* メイソンリー
// GoogleMapFunc()********* Googleマップ
// Slick()********* Slick
// Accordion********* アコーディオン
//
// ::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::

function Load() {
    if ($(".js-lazy_bgi").length) {
        LazyBgi();
    }

    $("body").removeClass("ready");
    Body.addClass("is-load");

    if (Slick.length) {
        SlickFunc.Init();
    }

    Init();

    if (SlideWrap.length) {
        SlideFunc.Init();
    }
}

function Init() {
    //DATA SET::::::::::::
    WindowH = $(window).innerHeight();
    WindowW = $(window).width();
    HeaderH = Header.outerHeight();
    HeaderW = Header.width();
    FooterH = Footer.outerHeight();
    FooterW = Footer.width();
    FooterT = Footer.offset().top;

    //FUNCTION::::::::::::
    MediaQueries();
    LayoutSet();
    TileSet();

    if (MasonryItem.length) {
        MasonryFunc.Init();
    }

    if (GoogleMapWrap.length) {
        GoogleMapFunc.Init();
    }

    if (ScrollActionObject.length) {
        ScrollActionFunc.Init();
    }

    if (ParallaxObject.length) {
        ParallaxFunc.Init();
    }

    if (FloatTotop.length) {
        FloatTotopFunc.Init();
    }
    if (ModalOpenFlg) {
        ModalFunc.Set();
    }

    SectionFunc.Init();
    videoInit();
    var $html = $('html');
    if ($('.section__wrap').length) {
        var $html = $('html');
        var ml = $('.section__wrap').offset().left;
        var mr = WindowW - ml - $('.section__wrap').width();
        $html.css({
            '--margin_right': mr + 'px',
            '--margin_left': ml + 'px'
        });
    }
    $('form .hasDatepicker').attr('autocomplete', 'off');
}

function scrollFunc() {
    // console.log('Scroll : ' + Scroll);
    if (ScrollActionLoad) {
        ScrollActionFunc.Check();
    }
    if (ParallaxLoad) {
        ParallaxFunc.Check();
    }

    if (SectionLoad) {
        SectionFunc.Check();
    }

    if (FloatTotopLoad) {
        FloatTotopFunc.Check();
    }
    // MenuFunc.Close();
}

function MediaQueries() {
    if (WindowW > TB) {
        Media = "PC";
    } else if (WindowW > SP) {
        Media = "TB";
    } else {
        Media = "SP";
    }
    // console.log('Media : ' + Media);
}

function LayoutSet() {
    $("main").css({ "min-height": window.innerHeight - FooterH })
    // if (Media == "PC") {} else if (Media == "TB") {} else if (Media == "SP") {}
}

function TileSet() {
    if (Media == "PC") { } else if (Media == "TB") { } else if (Media == "SP") { }
}

function LazyBgi() {
    $(".js-lazy_bgi").each(function () {
        $(this).css({ "background-image": "url(" + $(this).data("bgi") + ")" });
    });
}
// MenuFunc()::::::::::::::::::::::::::::::::::::::::::::::::::
let MenuFunc = {};
let MenuOpenFlg = false;
$(".js-hbgicon").on("click", function () {

    if (MenuOpenFlg) {
        MenuFunc.Close();
    } else {
        MenuFunc.Open();
    }
});

$(".js-hbgmenu").on("click", function (e) {
    if (!$(e.target).closest("a,.has-child").length) {
        MenuFunc.Close();
    }
});

MenuFunc.Open = function () {
    Body.addClass("is-nav_open");
    $("#wrapAll").addClass("is-nav_open");
    MenuOpenFlg = true;
    $("#wrapAll.is-nav_open").on("click", function () {
        MenuFunc.Close();
    });
};

MenuFunc.Close = function () {
    Body.removeClass("is-nav_open");
    $("#wrapAll").removeClass("is-nav_open");
    MenuOpenFlg = false;
};
$(".l-hbg__modal__nav__li.has-child").on("click", function () {
    var child = $(this).find('.l-hbg__modal__nav__child');
    if ($(this).hasClass('is-active')) {
        $(this).removeClass('is-active')
        child.stop(false, false).slideUp(200);
    } else {
        $(this).addClass('is-active')
        child.stop(false, false).slideDown(200);
    }
});

// SlideFunc()::::::::::::::::::::::::::::::::::::::::::::::::::
let Slide = {};
let SlideWrap = $(".js-slide");
let SlideArray = [];
let SlideFunc = {};
let SlideTimer;
SlideFunc.Init = function () {
    for (var i = 0; i < SlideWrap.length; i++) {
        Slide = {};
        Slide.Num = i;
        Slide.Object = SlideWrap.eq(i).find(".js-slide_ul li");
        Slide.Length = Slide.Object.length;
        Slide.Idx = 0;
        Slide.Timer = null;
        Slide.Data = SlideWrap.eq(i).data("slide");
        Slide.Interval = Slide.Data["interval"];
        html = "";
        if (Slide.Data["dots"]) {
            html += "<ul class='p-slide_ctrl'>";
            if (SlideWrap.eq(i).find(".js-slide_ul li").eq(0).data("thum") == undefined) {
                for (let l = 0; l < Slide.Length; l++) {
                    html += "<li><a href='javascript:void(0)' class='slide_dots'></a></li>";
                }
            } else {
                for (let l = 0; l < Slide.Length; l++) {
                    src = SlideWrap.eq(i)
                        .find(".js-slide_ul li")
                        .eq(l)
                        .data("thum");
                    html +=
                        "<li><a href='javascript:void(0)' class='slide_thum' style='background-image:url(" +
                        src +
                        ")'></a></li>";
                }
            }
            html += "</ul>";
        }
        if (Slide.Data["arrows"]) {
            html += "<a href='javascript:void(0);' class='p-slide_arr prev'>PREV</a>";
            html += "<a href='javascript:void(0);' class='p-slide_arr next'>NEXT</a>";
        }
        SlideWrap.eq(i).append(html);
        Slide.arr = SlideWrap.eq(i).find(".p-slide_arr");
        Slide.Ctrl = SlideWrap.eq(i).find(".p-slide_ctrl li");
        SlideArray.push(Slide);
        SlideFunc.Set(Slide);
    }

    $(".p-slide_arr").on("click", function () {
        idx = SlideWrap.index($(this).parents(".js-slide"));
        Slide = SlideArray[idx];
        if ($(this).hasClass("next")) {
            SlideFunc.Next(Slide);
        } else {
            SlideFunc.Prev(Slide);
        }
    });

    $(".p-slide_ctrl li").on("click", function () {
        idx = SlideWrap.index($(this).parents(".js-slide"));
        Slide = SlideArray[idx];
        if (!$(this).hasClass("is-active")) {
            Slide.Idx = $(this)
                .parents(".p-slide_ctrl")
                .find("li")
                .index(this);
            SlideFunc.Set(Slide);
        }
    });
};

SlideFunc.Set = function (_Slide) {
    clearTimeout(_Slide.Timer);
    _Slide.Ctrl.removeClass("is-active");
    _Slide.Ctrl.eq(_Slide.Idx).addClass("is-active");
    _Slide.Object.removeClass("is-active");
    _Slide.Object.eq(_Slide.Idx).addClass("is-active");
    _Slide.Timer = setTimeout(function () {
        SlideFunc.Next(_Slide);
    }, _Slide.Interval);
};

SlideFunc.Prev = function (_Slide) {
    if (_Slide.Idx > 0) {
        _Slide.Idx--;
    } else {
        _Slide.Idx = _Slide.Length - 1;
    }
    SlideFunc.Set(_Slide);
};

SlideFunc.Next = function (_Slide) {
    if (_Slide.Idx < _Slide.Length - 1) {
        _Slide.Idx++;
    } else {
        _Slide.Idx = 0;
    }
    SlideFunc.Set(_Slide);
};

let SlideTouch,
    SlideTouchStartX,
    SlideTouchStartY,
    SlideTouchDiffX,
    SlideTouchDiffY;
const SlideTouchThreshold = 20;
SlideWrap.on("touchstart touchmove touchend", SlideTouchHandler, { passive: true });

function SlideTouchHandler(e) {
    SlideTouch = e.originalEvent.touches[0];
    idx = SlideWrap.index(this);
    Slide = SlideArray[idx];
    if (e.type == "touchstart") {
        SlideTouchStartX = SlideTouch.pageX;
        SlideTouchStartY = SlideTouch.pageY;
    } else if (e.type == "touchmove") {
        SlideTouchDiffX = SlideTouch.pageX - SlideTouchStartX;
        SlideTouchDiffY = SlideTouch.pageY - SlideTouchStartY;
        if (
            SlideTouchDiffX > SlideTouchThreshold ||
            -SlideTouchDiffX < SlideTouchThreshold
        ) {
            e.preventDefault();
        }
    } else if (e.type == "touchend") {
        if (
            SlideTouchDiffX > SlideTouchThreshold ||
            -SlideTouchDiffX > SlideTouchThreshold
        ) {
            if (SlideTouchDiffX > SlideTouchThreshold) {
                SlideFunc.Prev(Slide);
            } else if (SlideTouchDiffX < -SlideTouchThreshold) {
                SlideFunc.Next(Slide);
            }
        }
        SlideTouchDiffX = 0;
        SlideTouchDiffY = 0;
    }
}

// Accordion::::::::::::::::::::::::::::::::::::::::::::::::::
$(".js-accordion_head").on("click", function () {
    if ($(this).hasClass("is-active")) {
        $(this).removeClass("is-active");
        $(this)
            .next(".js-accordion_body")
            .stop(false, false)
            .slideUp(200, function () {
                Init();
            });
    } else {
        $(this).addClass("is-active");
        $(this)
            .next(".js-accordion_body")
            .stop(false, false)
            .slideDown(200, function () {
                Init();
            });
    }
});

// ModalFunc::::::::::::::::::::::::::::::::::::::::::::::::::

const Modal = $(".js-modal__window");
let ModalCloseBtn = $(".js-modal__close");
let ModalCloseBtnTop = $(".js-modal__close.top");
let ModalCloseBtnBottom = $(".js-modal__close.bottom");
let ModalOpenBtn = $(".js-modal__btn");
let ModalMaxH, ModalMaxW;
let ModalH, ModalW, ModalT, ModalL;
let ModalName;
let TargetModal;
let ModalOpenFlg = false;
let ModalFunc = {};

//開く
ModalOpenBtn.on("click", function () {
    ModalName = $(this).data("modal");
    if (ModalOpenFlg == false) {
        TargetModal = $(".js-modal[data-modal='" + ModalName + "']").find(
            ".js-modal__wrap"
        );
        ModalFunc.Set();
        ModalFunc.Open();
    } else {
        ModalCloseBtnTop.stop(false, false).fadeOut(300);
        ModalCloseBtnBottom.stop(false, false).fadeOut(300);
        TargetModal.stop(false, false).fadeOut(300, function () {
            $(this).css({
                "z-index": 0,
                position: "absolute",
                height: "auto",
                width: "100%",
                top: "auto",
                left: "auto",
            });
            TargetModal = $(".js-modal[data-modal='" + ModalName + "']").find(
                ".js-modal__wrap"
            );
            ModalFunc.Set();
            ModalFunc.Open();
        });
    }
});

//閉じる
ModalCloseBtn.on("click", function () {
    ModalFunc.Close();
});

ModalFunc.Set = function () {
    ModalMaxH = $(window).innerHeight() * 0.76;
    // ModalMaxW = $(window).width() * 0.8;
    ModalMaxH = $(window).innerHeight() * 0.85;
    if (Media == "PC") {
        ModalMaxW = $(window).width() * 0.8;
    } else {
        ModalMaxW = $(window).width() * 0.9;
    }
    if (TargetModal.outerWidth() < ModalMaxW) {
        ModalW = TargetModal.outerWidth();
    } else {
        ModalW = ModalMaxW;
    }
    ModalL = ($(window).width() - ModalW) / 2;
    TargetModal.css({
        "z-index": 99999999,
        position: "fixed",
        width: ModalW,
        left: ModalL,
    });

    if (TargetModal.outerHeight() < ModalMaxH) {
        ModalH = TargetModal.outerHeight();
    } else {
        ModalH = ModalMaxH;
    }

    ModalT = ($(window).innerHeight() - ModalH) / 2 - 15;

    TargetModal.css({
        height: ModalH,
        top: ModalT,
    });

    ModalCloseBtnTop.css({
        "z-index": 999999999,
        position: "fixed",
        top: ModalT,
        left: ModalL + ModalW,
    });

    ModalCloseBtnBottom.css({
        "z-index": 999999999,
        position: "fixed",
        top: ModalT + ModalH,
    });
};

ModalFunc.Open = function () {
    $("body").css({ overflow: "hidden" });
    ModalCloseBtnTop.stop(false, false).fadeIn(300);
    ModalCloseBtnBottom.stop(false, false).fadeIn(300);
    TargetModal.stop(false, false).fadeIn(300);
    Modal.stop(false, false).fadeIn(300);
    ModalOpenFlg = true;
};

ModalFunc.Close = function () {
    ModalOpenFlg = false;
    $("body").css({ overflow: "inherit" });
    ModalCloseBtnTop.stop(false, false).fadeOut(300);
    ModalCloseBtnBottom.stop(false, false).fadeOut(300);
    TargetModal.stop(false, false).fadeOut(300, function () {
        $(".js-modal__slide_content").removeClass("is-active");
        $(this).css({
            "z-index": 0,
            position: "absolute",
            height: "auto",
            // width: "100%",
            top: "auto",
            left: "auto",
        });
    });
    Modal.stop(false, false).fadeOut(300);
};

//モーダルスライド
let ModalSlideOpenBtn = $(".js-modal__slide__btn");
let ModalSlideIdx, ModalSlideLength;
let TargetModalSlide;
let ModalSlideArr = $(".js-modal__slide__arr");
ModalSlideOpenBtn.on("click", function () {
    ModalName = $(this).data("modal");
    TargetModal = $(".js-modal[data-modal='" + ModalName + "']").find(
        ".js-modal__wrap"
    );
    TargetModalSlide = TargetModal.find(".js-modal__slide__content");
    if (
        $(this).data("slide_num") != "" &&
        $(this).data("slide_num") != undefined
    ) {
        ModalSlideIdx = $(this).data("slide_num");
    } else {
        ModalSlideIdx = $(
            ".js-modal__slide_btn[data-modal='" + ModalName + "']"
        ).index(this);
    }

    ModalSlideLength = TargetModalSlide.length;
    // ModalFunc.Slide();
    TargetModalSlide.removeClass("is-active").hide();
    TargetModalSlide.eq(ModalSlideIdx)
        .addClass("is-active")
        .show();
    ModalFunc.Set();
    ModalFunc.Open();
});

ModalSlideArr.on("click", function () {
    if ($(this).hasClass("prev")) {
        if (ModalSlideIdx > 0) {
            ModalSlideIdx--;
        } else {
            ModalSlideIdx = ModalSlideLength - 1;
        }
    } else {
        if (ModalSlideIdx < ModalSlideLength - 1) {
            ModalSlideIdx++;
        } else {
            ModalSlideIdx = 0;
        }
    }
    ModalFunc.Slide();
});

ModalFunc.Slide = function () {
    $(".js-modal__slide__content.is-active")
        .stop(false, false)
        .fadeOut(300, function () {
            TargetModalSlide.removeClass("is-active");
            TargetModalSlide.eq(ModalSlideIdx).addClass("is-active");
            TargetModalSlide.scrollTop(0);
            $(".js-modal__slide__content.is-active")
                .stop(false, false)
                .fadeIn(300);
        });
};

// PG_ModalFunc::::::::::::::::::::::::::::::::::::::::::::::::::
const PG_Modal = $(".js-modal__window_pg");
const PG_ModalImg = $(".pg_img");
const PG_ModalTxt = $(".pg_txt");
let PG_ModalNewImg = new Image();
let PG_ModalNewTxt = "";
let PG_ModalCloseBtn = $(".pg_modal_close");
let PG_ModalArr = $(".pg_modal_arr");
let PG_ModalCloseBtnTop = $(".pg_modal_close.top");
let PG_ModalCloseBtnBottom = $(".pg_modal_close.bottom");
let PG_ModalOpenBtn = $(".gallery_pic");
let PG_ModalMaxH, PG_ModalMaxW;
let PG_ModalH, PG_ModalW, PG_ModalT, PG_ModalL, PG_ModalPicRatio;
let PG_ModalName;
let PG_Target;
let PG_ModalOpenFlg = false;
let PG_Idx, PG_Length;
let PG_ModalFunc = {};

PG_ModalOpenBtn.on("click", function () {
    PG_Target = $(this)
        .parents(".p-photo_gallery")
        .find(PG_ModalOpenBtn);
    PG_Idx = PG_Target.index(this);
    PG_Length = PG_Target.length;
    PG_ModalFunc.Init();
});

//閉じる
PG_ModalCloseBtn.on("click", function () {
    PG_ModalFunc.Close();
});

PG_ModalArr.on("click", function () {
    if ($(this).hasClass("prev")) {
        if (PG_Idx > 0) {
            PG_Idx--;
        } else {
            PG_Idx = PG_Length - 1;
        }
    } else {
        if (PG_Idx < PG_Length - 1) {
            PG_Idx++;
        } else {
            PG_Idx = 0;
        }
    }
    PG_ModalFunc.Init();
});

PG_ModalFunc.Init = function () {
    PG_ModalNewImg.src = PG_Target.eq(PG_Idx).data("src");
    if (
        PG_Target.eq(PG_Idx).data("txt") != "" &&
        PG_Target.eq(PG_Idx).data("txt") != undefined
    ) {
        PG_ModalNewTxt = PG_Target.eq(PG_Idx).data("txt");
    } else {
        PG_ModalNewTxt = "";
    }
    PG_ModalFunc.Set();
};

PG_Modal.click(function (event) {
    if (!$(event.target).closest(".pg_img").length) {
        PG_ModalFunc.Close();
    }
});

PG_ModalFunc.Set = function () {
    PG_ModalTxt.stop(false, false).fadeOut(300, function () {
        PG_ModalTxt.html(PG_ModalNewTxt);
    });

    PG_ModalImg.stop(false, false).fadeOut(300, function () {
        PG_ModalImg.css({ "background-image": "url(" + PG_ModalNewImg.src + ")" });
        PG_ModalW = PG_ModalNewImg.width;
        PG_ModalH = PG_ModalNewImg.height;
        PG_ModalPicRatio = PG_ModalW / PG_ModalH;
        var WinRatio = $(window).width() / $(window).innerHeight();
        var ScaleRatio = 0.8;
        PG_ModalImg.removeClass("h");
        if (WinRatio < PG_ModalPicRatio) {
            PG_ModalW = $(window).width() * ScaleRatio;
            PG_ModalH = PG_ModalW / PG_ModalPicRatio;
        } else {
            PG_ModalH = $(window).innerHeight() * ScaleRatio;
            PG_ModalW = PG_ModalH * PG_ModalPicRatio;
            PG_ModalImg.addClass("h");
        }
        PG_ModalL = ($(window).width() - PG_ModalW) / 2;
        PG_ModalT = ($(window).innerHeight() - PG_ModalH) / 2;
        PG_ModalImg.css({
            width: PG_ModalW,
            height: PG_ModalH,
        });
        PG_ModalFunc.Open();
    });
};

PG_ModalFunc.Open = function () {
    $("body").css({ overflow: "hidden" });
    PG_ModalCloseBtnTop.stop(false, false).fadeIn(300);
    PG_ModalTxt.stop(false, false).fadeIn(300);
    PG_Modal.stop(false, false).fadeIn(300);
    PG_ModalImg.stop(false, false).fadeIn(300);
    PG_ModalOpenFlg = true;
};

PG_ModalFunc.Close = function () {
    PG_ModalOpenFlg = false;
    $("body").css({ overflow: "inherit" });
    PG_ModalCloseBtnTop.stop(false, false).fadeOut(300);
    PG_ModalImg.stop(false, false).fadeOut(300, function () {
        $(this).css({
            height: "auto",
            width: "100%",
        });
    });
    PG_Modal.stop(false, false).fadeOut(300);
};

// ScrollActionFunc::::::::::::::::::::::::::::::::::::::::::::::::::
const ScrollActionObject = $(".js-sa");
let ScrollActionFunc = {};
let ScrollActionObjectLength;
let ScrollActionObjectArray;
let ScrollActionLoad = false;
let sa_BorderTop = 0.1;
let sa_BorderBottom = 0.9;
let sa_WindowTop, sa_WindowBottom;
let sa_AreaTop, sa_AreaBottom, sa_AreaHeight;
let ScrollActionCount;
let ScrollActionRemove = false; // 一度か毎回かtrueで毎回
ScrollActionFunc.Init = function () {
    $(".sa-active").removeClass("sa-active");
    ScrollActionObjectLength = ScrollActionObject.length;
    ScrollActionObjectArray = [];
    ScrollActionCount = 0;

    for (var i = 0; i < ScrollActionObjectLength; i++) {
        var sa = ScrollActionObject.eq(i);
        sa.Top = sa.offset().top;
        sa.Height = sa.innerHeight();
        sa.Bottom = sa.Top + sa.Height;
        sa.Flg = false;
        ScrollActionObjectArray.push(sa);
    }
    sa_WindowTop = WindowH * sa_BorderTop;
    sa_WindowBottom = WindowH * sa_BorderBottom;
    ScrollActionLoad = true;
    ScrollActionFunc.Check();
};

ScrollActionFunc.Check = function () {
    sa_AreaTop = Scroll + sa_WindowTop;
    sa_AreaBottom = Scroll + sa_WindowBottom;
    sa_AreaHeight = sa_AreaBottom - sa_AreaTop;
    for (var i = 0; i < ScrollActionObjectLength; i++) {
        var sa = ScrollActionObjectArray[i];
        if (sa_AreaBottom >= sa.Top && sa_AreaTop <= sa.Bottom) {
            sa.addClass("sa-active");
            if (ScrollActionRemove == false) {
                if (sa.Flg == false) {
                    sa.Flg = true;
                    ScrollActionCount++;
                    if (ScrollActionCount == ScrollActionObjectLength) {
                        ScrollActionLoad = false;
                    }
                }
            }
        } else {
            if (ScrollActionRemove) {
                sa.removeClass("sa-active");
            }
        }
    }
};

// ParallaxFunc::::::::::::::::::::::::::::::::::::::::::::::::::
const ParallaxObject = $(".pa");
let ParallaxFunc = {};
let ParallaxObjectLength;
let ParallaxObjectArray;
let ParallaxLoad = false;
let pa_BorderTop = 0.4;
let pa_BorderBottom = 0.9;
let pa_WindowTop, pa_WindowBottom;
let pa_AreaTop, pa_AreaBottom, pa_AreaHeight;
ParallaxFunc.Init = function () {
    $(".pa-active").removeClass("pa-active");
    ParallaxObjectLength = ParallaxObject.length;
    ParallaxObjectArray = [];
    for (var i = 0; i < ParallaxObjectLength; i++) {
        var pa = ParallaxObject.eq(i);
        pa.Top = pa.offset().top;
        pa.Height = pa.innerHeight();
        pa.Bottom = pa.Top + pa.Height;
        pa.Flg = false;
        pa.Per = 0;
        pa.Name = pa.data("name");

        ParallaxFunc.Style(pa);
        ParallaxObjectArray.push(pa);
    }

    pa_WindowTop = WindowH * pa_BorderTop;
    pa_WindowBottom = WindowH * pa_BorderBottom;
    ParallaxLoad = true;
};

ParallaxFunc.Check = function () {
    pa_AreaTop = Scroll + pa_WindowTop;
    pa_AreaBottom = Scroll + pa_WindowBottom;
    pa_AreaHeight = pa_AreaBottom - pa_AreaTop;
    for (var i = 0; i < ParallaxObjectLength; i++) {
        var pa = ParallaxObjectArray[i];
        if (pa_AreaBottom >= pa.Top && pa_AreaTop <= pa.Top) {
            pa.addClass("pa-active");
            pa.Per =
                Math.round(((pa_AreaBottom - pa.Top) / pa_AreaHeight) * 100) / 100;

            ParallaxFunc.Style(pa);
        } else {
            pa.removeClass("pa-active");
        }
    }
};

ParallaxFunc.Style = function (pa) {
    if (pa.Name == "xxxx") {
        pa.css({ opacity: pa.Per });
    }
};

// MasonryFunc::::::::::::::::::::::::::::::::::::::::::::::::::
let MasonryWrap = $(".js-masonry");
let MasonryItem = $(".js-masonry li");
let MasonryItemLength;
let MasonryItemArray = [];
let MasonryColumnNum;
let MasonryColumnWidth;
let MasonryColumnArray = [];
let MasonryTotalH;
let MasonryFunc = {};
let MasonryLoad = false;
let MasonryData;
MasonryFunc.Init = function () {
    // ItemInit
    if (MasonryLoad == false) {
        MasonryItemArray = [];
        MasonryItemLength = MasonryItem.length;
        for (var i = 0; i < MasonryItemLength; i++) {
            var Masonry = MasonryItem.eq(i);
            Masonry.Ratio = Masonry.width() / Masonry.innerHeight();
            MasonryItemArray.push(Masonry);
        }
        MasonryLoad = true;
    }

    // ColumnInit
    MasonryData = MasonryWrap.data("masonry");
    if (Media == "PC") {
        MasonryColumnNum = MasonryData["pc"];
    } else if (Media == "TB") {
        MasonryColumnNum = MasonryData["tb"];
    } else if (Media == "SP") {
        MasonryColumnNum = MasonryData["sp"];
    }

    MasonryColumnWidth = MasonryWrap.width() / MasonryColumnNum;
    MasonryColumnArray = [];
    for (var i = 0; i < MasonryColumnNum; i++) {
        var MasonryColumn = new Object();
        MasonryColumnArray.push(0);
    }
    MasonryFunc.Set();
};

MasonryFunc.Set = function () {
    for (var i = 0; i < MasonryItemLength; i++) {
        var Masonry = MasonryItemArray[i];
        if (i < MasonryColumnNum) {
            var idx = i % 4;
        } else {
            var idx = MasonryColumnArray.indexOf(
                Math.min.apply(null, MasonryColumnArray)
            );
        }

        Masonry.Left = MasonryColumnWidth * idx;
        Masonry.Top = MasonryColumnArray[idx];
        Masonry.Width = MasonryColumnWidth;
        Masonry.css({
            left: Masonry.Left,
            top: Masonry.Top,
            width: Masonry.Width,
        });

        MasonryColumnArray[idx] += Masonry.innerHeight();
    }
    var idx = MasonryColumnArray.indexOf(
        Math.max.apply(null, MasonryColumnArray)
    );
    MasonryWrap.css({ height: MasonryColumnArray[idx] });
};

// SectionFunc::::::::::::::::::::::::::::::::::::::::::::::::::
let SectionFunc = {};
let SectionArray = [];
let SectionIdx, SectionIdxAfter;
let SectionBorder;
let SectionLoad = false;
SectionFunc.Init = function () {
    SectionArray = [];
    for (var i = 0; i < Section.length; i++) {
        SectionArray.push(Section.eq(i).offset().top);
    }
    SectionBorder = WindowH * 0.4;
    SectionLoad = true;
    SectionFunc.Check();
};

SectionFunc.Check = function () {
    for (var i = 0; i < SectionArray.length; i++) {
        if (Scroll + SectionBorder >= SectionArray[i]) {
            SectionIdx = i;
        }
    }
    if (SectionIdxAfter != SectionIdx) {
        Section.removeClass("is-active");
        Section.eq(SectionIdx).addClass("is-active");
        $(".js-sec_nav").removeClass("is-active");
        $(".js-sec_nav")
            .parents("ul")
            .find(".js-sec_nav")
            .eq(SectionIdx)
            .addClass("is-active");
    }
    SectionIdxAfter = SectionIdx;
};

// GoogleMapFunc::::::::::::::::::::::::::::::::::::::::::::::::::
let GoogleMapFunc = {};
let GoogleMapWrap = $(".js-map");
let GoogleMap;
let markers = [];
GoogleMapFunc.Init = function () {
    GoogleMapWrap.each(function () {
        var TargetMapWrap = $(this);
        var mapLatLng = new google.maps.LatLng({
            lat: TargetMapWrap.data("lat"),
            lng: TargetMapWrap.data("lng"),
        });
        var TargetMap = TargetMapWrap.find(".js-map_area");
        TargetMap = TargetMap[0];
        map = new google.maps.Map(TargetMap, {
            center: mapLatLng,
            zoom: 16,
            panControl: false,
            zoomControl: true,
            mapTypeControl: false,
            scaleControl: false,
            streetViewControl: false,
            rotateControl: false,
            fullscreenControl: false,
        });

        map.setOptions({ styles: styleArray });

        marker = new google.maps.Marker({
            position: mapLatLng,
            map: map,
        });

        marker.setOptions({
            icon: {
                url: GoogleMapWrap.data("pin"),
                scaledSize: new google.maps.Size(56, 56),
            },
        });
    });
};

let styleArray = [{
    stylers: [{
        saturation: -100,
    },],
},];

// Slick::::::::::::::::::::::::::::::::::::::::::::::::::
let Slick = $(".js-slick");
let SlickFunc = {};
SlickFunc.Init = function () {
    for (var i = 0; i < Slick.length; i++) {
        Slick.eq(i).slick();
    }
};

// USEFULL::::::::::::::::::::::::::::::::::::::::::::::::::
$(".js-toggle").on("click", function () {
    $(this).toggleClass("is-active");
});

$('a[href^="#"]').on("click", function () {
    if (Header.length) {
        var adjust = HeaderH;
    } else {
        var adjust = 0;
    }
    var speed = 400;
    var href = $(this).attr("href");
    var target = $(href == "#" || href == "" ? "html" : href);
    var position = target.offset().top - adjust;
    $("body,html").animate({ scrollTop: position }, speed, "easeInOutQuart");
    return false;
});

// Totop::::::::::::::::::::::::::::::::::::::::::::::::::
let Totop = $(".js-totop,.js-totop__float");
const FloatTotop = $(".js-totop__float");
let FloatTotopFunc = {};
let FloatTotopLoad = false;
FloatTotopFunc.Init = function () {
    FloatTotop.removeClass("is-active");
    FloatTotopLoad = true;
    FloatTotopFunc.Check();
};

FloatTotopFunc.Check = function () {
    if (Scroll < WindowH * 0.5) {
        FloatTotop.removeClass("is-active");
    } else {
        if ((Scroll + WindowH) > FooterT) {
            FloatTotop.addClass("is-active");
        } else {
            if (Scroll < ScrollAfter) {
                FloatTotop.addClass("is-active");
            } else {
                FloatTotop.removeClass("is-active");
            }
        }

    }
};

Totop.on("click", function () {
    var speed = 1000;
    $("html, body").animate({ scrollTop: 0 }, speed, "easeInOutQuart");
    return false;
});



// Youtube::::::::::::::::::::::::::::::::::::::::::::::::::
var tag = document.createElement('script');
tag.src = "https://www.youtube.com/iframe_api";
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);
var player;
var ytData = [];

function onYouTubeIframeAPIReady() {
    if ($('.youtube').length) {
        for (let index = 0; index < $('.youtube').length; index++) {
            var arr = {};
            var thishtml = $('.youtube').eq(index);
            arr['id'] = thishtml.find('div').attr('id');
            arr['youtube'] = thishtml.find('div').data('youtube');
            ytData.push(arr);
        }
    }
    for (var i = 0; i < ytData.length; i++) {
        player = new YT.Player(ytData[i]['id'], {
            videoId: ytData[i]['youtube'],
            playerVars: {
                rel: 0,
                autoplay: 0,
                controls: 0,
                showinfo: 0,
            },
            events: {}
        });
    }
}
var firstplay = true;
$(".youtube .cover").click(function () {
    if (firstplay) {
        $(this).addClass("firstplay");
        firstplay = false;
    } else {
        $(this).removeClass("firstplay");
    }
    if ($(this).hasClass("off")) {
        $(this).removeClass("off");
        player.pauseVideo();
    } else {
        $(this).addClass("off");
        player.playVideo();
    }

})


function videoInit() {
    if ($(".youtube").length) {
        var videoW = $(".youtube").width();
        var videoH = videoW * 9 / 16;
        $(".youtube").height(videoH)
        $(".youtube iframe").height(videoH)
        $(".youtube iframe").width(videoW)
    }
}


$('a, input[type="button"], input[type="submit"], button, .touch-hover')
    .on('touchstart', function () {
        $(this).addClass('hover');
    }, { passive: true }).on('touchend', function () {
        $(this).removeClass('hover');
    });


$('.hasDatepicker').datepicker({
    dateFormat: 'yy-mm-dd',
    monthNames: ["1月", "2月", "3月", "4月", "5月", "6月", "7月", "8月", "9月", "10月", "11月", "12月"],
    monthNamesShort: ["1月", "2月", "3月", "4月", "5月", "6月", "7月", "8月", "9月", "10月", "11月", "12月"],
    showMonthAfterYear: true,
    changeMonth: true,
    changeYear: true,
    yearRange: '1901:'
});

$('#target').datepicker();
if ($(".h-adr").length) {
    var hadr = $(".h-adr"),
        cancelFlag = true,
        postalcode = $(".p-postal-code"),
        postalField = postalcode[postalcode.length - 1];

    // イベントをキャンセルするリスナ
    var onKeyupCanceller = function (e) {
        if (cancelFlag) {
            e.stopImmediatePropagation();
        }
        return false;
    };
    postalField.addEventListener("keyup", onKeyupCanceller, false);
    $(".postal-search").on("click", function (e) {
        // console.log("aaa");
        cancelFlag = false;
        let event;
        if (typeof Event === "function") {
            event = new Event("keyup");
        } else {
            event = document.createEvent("Event");
            event.initEvent("keyup", true, true);
        }
        postalField.dispatchEvent(event);
        cancelFlag = true;
    });
}

// function postData(url = '', data = {}) {
//     return fetch(url, {
//             method: "POST",
//             mode: "no-cors", // no-cors, cors, *same-origin
//             cache: "no-cache",
//             credentials: "same-origin",
//             headers: {
//                 "Content-Type": "application/json; charset=utf-8",
//             },
//             redirect: "follow",
//             referrer: "no-referrer",
//             body: JSON.stringify(data)
//         })
//         .then(response => response.json());
// }

// function bloginit() {
//   var articleBody = ".p-blog__detail .body";
//   var idcount = 1;
//   var toc = "";
//   var currentlevel = 0;
//   var level = 1;
//   $(articleBody + " h2," + articleBody + " h3", this).each(function() {
//     this.id = "toc_" + idcount;
//     idcount++;
//     if (this.nodeName.toLowerCase() == "h2") {
//       if (level == 1) {
//         toc +=
//           '<a href="#' +
//           this.id +
//           '" data-anc="' +
//           this.id +
//           '" class="anc level' +
//           level +
//           '">' +
//           $(this).html() +
//           "</a>";
//       } else if (level == 2) {
//         toc +=
//           '</div><a href="#' +
//           this.id +
//           '" data-anc="' +
//           this.id +
//           '" class="anc level' +
//           level +
//           '">' +
//           $(this).html() +
//           "</a>";
//       }
//       level = 1;
//     } else if (this.nodeName.toLowerCase() == "h3") {
//       if (level == 1) {
//         toc +=
//           '<div class="h3list"><a href="#' +
//           this.id +
//           '" data-anc="' +
//           this.id +
//           '" class="anc level' +
//           level +
//           '">' +
//           $(this).html() +
//           "</a>";
//       } else if (level == 2) {
//         toc +=
//           '<a href="#' +
//           this.id +
//           '" data-anc="' +
//           this.id +
//           '" class="anc level' +
//           level +
//           '">' +
//           $(this).html() +
//           "</a>";
//       }
//       level = 2;
//     }
//   });
//   if (toc != null) {
//     toc =
//       '<div class="agenda"><div class="agenda__ttl">目次</div><div class="h2list">' +
//       toc +
//       "</div></div>";
//   }
//   $(".p-blog__detail .head").append(toc);
// }
