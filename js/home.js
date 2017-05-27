$("#hello1").hide(1);
$("#hello2").hide(1);
$("#hello3").hide(1);
$("#hello4").hide(1);
$( "#clickme1" ).on('click',function(){
  if ($('#hello1').is(':hidden')==true && $('#hello0').is(':hidden')==true ) {
    $("#hello0").hide(1);
    $("#hello1").show(1);
  };
  
  $("#hello1").slideToggle();
  $("#hello2").hide(1);
  $("#hello3").hide(1);
  $("#hello4").hide(1);
  $("#hello0").slideToggle();

});
$( "#clickme2" ).on('click',function(){
  if ($('#hello2').is(':hidden')==true && $('#hello0').is(':hidden')==true ) {
    $("#hello0").hide(1);
    $("#hello2").show(1);
  };
  
  $("#hello2").slideToggle();
  $("#hello1").hide(1);
  $("#hello3").hide(1);
  $("#hello4").hide(1);
  $("#hello0").slideToggle();

});
$( "#clickme3" ).on('click',function(){
  if ($('#hello3').is(':hidden')==true && $('#hello0').is(':hidden')==true ) {
    $("#hello0").hide(1);
    $("#hello3").show(1);
  };

  $("#hello3").slideToggle();
  $("#hello2").hide(1);
  $("#hello1").hide(1);
  $("#hello4").hide(1);
  $("#hello0").slideToggle();

});
$( "#clickme4" ).on('click',function(){
  if ($('#hello4').is(':hidden')==true && $('#hello0').is(':hidden')==true ) {
    $("#hello0").hide(1);
    $("#hello4").show(1);
  };
  $("#hello4").slideToggle();
  $("#hello2").hide(1);
  $("#hello3").hide(1);
  $("#hello1").hide(1);
  $("#hello0").slideToggle();

});