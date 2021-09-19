var counter=2;
var timer;
function SlideShow(){
    timer=setTimeout(SlideShow,3000);
    if(counter===4){
        counter++;
    }
    if(counter>6){
        
        counter=2;
    }
    document.getElementById("slidedivid").style.backgroundImage="url('images/"+counter+".png')";
    counter++;
}
SlideShow();
function OnRadioClick(image){
    
    document.getElementById("slidedivid").style.backgroundImage="url("+image+")";

}
function gotoupdate(){
    location.replace('Update.php');
}
function gotoadmin(){
    location.replace('adminpage.php');
}
function muteVideo(){  
    my=document.getElementById("myvideo");  
    if(!my.muted){
        my.muted=true;
        document.getElementById("mute").innerHTML="<h2><i class='fas fa-volume-mute'></i></h2>";
    }  
    else{
        my.muted=false;
        document.getElementById("mute").innerHTML="<h2><i class='fas fa-volume-up'></i></h2>";
    }        
   
}
