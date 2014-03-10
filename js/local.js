  $(".increase").click(function(){
    $(this).parent().parent().prev().children().children().first().val(parseInt($(this).parent().parent().prev().children().children().first().val())+1);
    //alert("closing");
  });
  $(".decrease").click(function(){
    if(parseInt($(this).parent().parent().next().children().children().first().val())>0){
      $(this).parent().parent().next().children().children().first().val(parseInt($(this).parent().parent().next().children().children().first().val())-1);
    }
  });
//  $("#submit").click(function() {
//    a();
//  });
$(document).ready(function(){
});
function a(){
  if(!$("#teamNumber").val()||!$("#matchNumber").val()){
    alert("Enter a Team Number and Match Number");
    $("html, body").animate({ scrollTop: 0 }, "fast");
    return false;
  } else {
    //scouting.Submit.disabled=true;
    $("#submit").unbind();
    $('#scouting').submit();
  }
}
