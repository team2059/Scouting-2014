$(document).ready(function(){
  $('#matchNumber').focus();
//  $("#submit").click(function() {
//    a();
//  });
  $('#matchNumber').blur(function(){
    $.ajax({
      type: "POST",
      url: 'register.php',
      data: {
        round:$('#matchNumber').val(),
        key:$("input:radio[name=scouterID]:checked").val()
      },
      success: function(data){
        if(data=="die"){
          alert("Database could not find match, probably because it does not exist");
        }else{
          $('#teamNumber').val(data);
        }
      }
    });
  });
  $("#scouting").submit(function() {
    if(!$("#teamNumber").val()||!$("#matchNumber").val()){
      alert("Enter a Team Number and Match Number");
      $("html, body").animate({ scrollTop: 0 }, "fast");
      return false;
    }else{
      a();
      return false;
    }
  });
  $(".increase").click(function(){
    $(this).parent().parent().prev().children().children().first().val(parseInt($(this).parent().parent().prev().children().children().first().val())+1);
  });
  $(".decrease").click(function(){
    if(parseInt($(this).parent().parent().next().children().children().first().val())>0){
      $(this).parent().parent().next().children().children().first().val(parseInt($(this).parent().parent().next().children().children().first().val())-1);
    }
  });
});
function a(){
  $(this).remove();
  $.ajax({
    type: "POST",
    url: "process.php",
    data: $("#scouting").serialize(),
    success: function(data) {
      window.location.href = window.location.href.split("?")[0].split("#")[0] + "?key="+$("input:radio[name=scouterID]:checked").val()+"&match="+(parseInt($('#matchNumber').val())+1);
      $('*').html('');
      //window.location.reload();
    }
  });
}
