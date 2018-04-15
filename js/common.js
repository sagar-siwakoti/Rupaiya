function nowLoading(){


}

function showMessage(msg){
$('body').append(
'<div id="messageBlink" class="alert alert-success fixed-top blink-message"><button type="button" class="close" data-dismiss="alert">x</button>'+msg+'</div>');
setTimeout(function(){$('body').find('div#messageBlink').remove();},3000);
}

function showError(msg){
$('body').append(
'<div id="errorBlink" class="alert alert-danger fixed-top blink-message"><button type="button" class="close" data-dismiss="alert">x</button>'+msg+'</div>');
setTimeout(function(){$('body').find('div#errorBlink').remove();},3000);
}

function popup(htm){

}