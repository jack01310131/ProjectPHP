$("#hello1").hide(1);
$("#hello2").hide(1);
$("#hello3").hide(1);
$("#hello4").hide(1);

$( "#clickme1" ).on('click',function(){
  if ($('#hello1').is(':hidden')==true && $('#hello0').is(':hidden')==true ) {
    $("#hello0").hide(1);
    $("#hello1").hide(1);
  };
  if($('#hello2').is(':hidden')==false){
    $("#hello2").slideToggle();
    $("#hello1").slideToggle();
  }
  if($('#hello3').is(':hidden')==false){
    $("#hello3").slideToggle();
    $("#hello1").slideToggle();
  }
  if($('#hello4').is(':hidden')==false){
    $("#hello4").slideToggle();
    $("#hello1").slideToggle();
  }
  if($('#hello0').is(':hidden')==false){
    $("#hello0").slideToggle();
    $("#hello1").slideToggle();
  }

});
$( "#clickme2" ).on('click',function(){
  if ($('#hello2').is(':hidden')==true && $('#hello0').is(':hidden')==true ) {
    $("#hello0").hide(1);
    $("#hello2").hide(1);
  };
  if($('#hello1').is(':hidden')==false){
    $("#hello1").slideToggle();
    $("#hello2").slideToggle();
  }
  if($('#hello3').is(':hidden')==false){
    $("#hello3").slideToggle();
    $("#hello2").slideToggle();
  }
  if($('#hello4').is(':hidden')==false){
    $("#hello4").slideToggle();
    $("#hello2").slideToggle();
  }
  if($('#hello0').is(':hidden')==false){
    $("#hello0").slideToggle();
    $("#hello2").slideToggle();
  }

});
$( "#clickme3" ).on('click',function(){
  if ($('#hello3').is(':hidden')==true && $('#hello0').is(':hidden')==true ) {
    $("#hello0").hide(1);
    $("#hello3").hide(1);
  };
  if($('#hello2').is(':hidden')==false){
    $("#hello2").slideToggle();
    $("#hello3").slideToggle();
  }
  if($('#hello1').is(':hidden')==false){
    $("#hello1").slideToggle();
    $("#hello3").slideToggle();
  }
  if($('#hello4').is(':hidden')==false){
    $("#hello4").slideToggle();
    $("#hello3").slideToggle();
  }
  if($('#hello0').is(':hidden')==false){
    $("#hello0").slideToggle();
    $("#hello3").slideToggle();
  }
});
$( "#clickme4" ).on('click',function(){
  if ($('#hello4').is(':hidden')==true && $('#hello0').is(':hidden')==true ) {
    $("#hello0").hide(1);
    $("#hello4").hide(1);
  };
  if($('#hello2').is(':hidden')==false){
    $("#hello2").slideToggle();
    $("#hello4").slideToggle();
  }
  if($('#hello3').is(':hidden')==false){
    $("#hello3").slideToggle();
    $("#hello4").slideToggle();
  }
  if($('#hello1').is(':hidden')==false){
    $("#hello1").slideToggle();
    $("#hello4").slideToggle();
  }
  if($('#hello0').is(':hidden')==false){
    $("#hello0").slideToggle();
    $("#hello4").slideToggle();
  }

});