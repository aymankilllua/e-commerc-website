$(function(){
   let unselected = ["#men","#women","#child"];
    for(let i =0 ; i < unselected.length;i++){
        $(unselected[i]).addClass("d-none");
    }
    $("#sel1").on("change",function(){
        let select = $(this).val();
        $("#"+select).addClass("d-block");
        $(":not(#"+select+")").removeClass("d-block");
        
    })
})