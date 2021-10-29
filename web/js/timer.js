var min, sec;

$(function(){
    //если есть таймер
    if($('#timer').length)
    {
        min = $('#timer').data('min');
        sec = $('#timer').data('sec');
        console.log(min, sec);
        refresh();
    }
});

function refresh()
{
    console.log(min, sec);
    var time, inter;
    sec--;
    if(sec==-1){
        sec=59;
        min = min-1;
    }
    else{min=min;}
    if(sec<=9){sec="0" + sec;}
    time=(min<=9 ? "0"+min : min) + ":" + sec;
    if(document.getElementById){timer.innerHTML=time;}
    inter=setTimeout(refresh, 1000);

    // действие, если таймер 00:00
    if(min=='00' && sec=='00'){
        sec="00";
        clearInterval(inter);

        setTimeout(function () {
            console.log('Перезагрузка');
            location.reload();
        }, 2000);
    }
}