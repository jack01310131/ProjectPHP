$("#hello1").hide(1);
$("#hello2").hide(1);
$("#hello3").hide(1);
$("#hello4").hide(1);
$( "#clickme1" ).on('click',function(){
  $("#hello1").slideToggle();
  $("#hello2").hide(1);
  $("#hello3").hide(1);
  $("#hello4").hide(1);
  $("#hello0").hide(1);
});
$( "#clickme2" ).on('click',function(){
  $("#hello2").slideToggle();
  $("#hello1").hide(1);
  $("#hello3").hide(1);
  $("#hello4").hide(1);
  $("#hello0").hide(1);
});
$( "#clickme3" ).on('click',function(){
  $("#hello3").slideToggle();
  $("#hello2").hide(1);
  $("#hello1").hide(1);
  $("#hello4").hide(1);
  $("#hello0").hide(1);
});
$( "#clickme4" ).on('click',function(){
  $("#hello4").slideToggle();
  $("#hello2").hide(1);
  $("#hello3").hide(1);
  $("#hello1").hide(1);
  $("#hello0").hide(1);
});