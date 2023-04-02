let countdown = document.getElementById("counter");
let x = document.getElementById("ready");
let timer = 6;
let counter = setInterval(function Return(){
        if(timer==6){
            x.textContent="Pret?";
            x.style.color="rgb(19, 134, 201)";//*blue
            countdown.style.color="rgb(196, 14, 81)";//*pink
        }else if(timer==5){
            countdown.style.color="rgb(221, 165, 9)";//*yellow
        }else if(timer ==4){
            countdown.style.color="rgb(72, 129, 11)";//*green
        }else if(timer==3){
            x.textContent="Sur?";
            x.style.color="rgb(196, 14, 81)";//*pink
            countdown.style.color="rgb(19, 134, 201)";//*blue
        }else if(timer==2){
            countdown.style.color= "rgb(76, 6, 185)";//*purple
        }else if(timer==1){
        x.textContent="On-y-va!";
        x.style.color="rgb(72, 129, 11)";
        countdown.style.color="rgb(196, 14, 81)";//*pink
        }
        if (timer>0){
            countdown.textContent= timer--;
        }else{
            clearInterval(counter);
            window.location.href = history.go(-1);
        }}, 1000);

