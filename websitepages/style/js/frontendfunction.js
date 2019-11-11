$(function(){
    $("#menuopen").click(function(){
        console.log("hello");
        $(".navvbar").css({
            "width":"250px"
        })
        $(".navvbardiv").css({
            "transform":"translateX(0px)"
        })
    })
    $("#menuclose").click(function(){
        console.log("hello");
        $(".navvbar").css({
            "width":"50px"
        })
        $(".navvbardiv").css({
            "transform":"translateX(250px)"
        })
    })

    $("#sel12").on("change",function(){
        var $select = $(this).val();
        var $select2 = $("#mainprice").val();
        console.log($select * $select2);
        var $select3 = $select * $select2 ;
        $("#price").val($select3);
    })
    $(".owl-carousel").owlCarousel({
        animateOut: 'fadeOut',
    animateIn: 'fadeIn',
        loop:true,
    margin:10,
    responsiveClass:true,
    responsive:{
        0:{
            items:1,
            dots:false,
            nav:false,
            loop:false
        },
        600:{
            items:1,
            dots:false,
            nav:false,
            loop:false
        },
        1000:{
            items:1,
            dots:false,
            nav:true,
            loop:false
        }
    }
    });
})