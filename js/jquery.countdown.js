var m=getId('m'), s=getId('s'), btn=getId('btn'), status=getId('status'), interval=null, time=0, min=0;
// var inc =getId('inc') , dec =getId('dec');
btn.onclick = startCounter;
// inc.onclick = incTime;
// dec.onclick = decTime;

$(document).ready(function() {
    time=120;
    m.textContent= '02';
});
function startCounter() {

    if (time<=0) {
        status.textContent='Increase the timer first!';
        time=0;
        return;
    }
    status.textContent='Counting!';
    btn.textContent = 'Stop';
    btn.onclick = stopCounter;
    interval = setInterval(function(){
        time--;
        if (time<=0) {
            stopCounter();
            status.textContent='Time\'s Up';
        }
        setTime();        
    },200);
}

function stopCounter() {
    btn.textContent = 'Start';
    btn.onclick = startCounter;
    status.textContent='Stopped!';
    if (interval) clearInterval(interval);
}

// function incTime(){
//     time++;
//     setTime();
// }

// function decTime(){
//     time--;
//     setTime();
// }

function setTime() { 
    min= time/60;
    if (time<10) s.textContent= '0'+Math.floor(time%60);
    else s.textContent= Math.floor(time%60);
    if (min<0) m.textContent= '00';
    else if (min<10) m.textContent= '0'+Math.floor(min);
    else m.textContent= Math.floor(min);
    console.log(s.textContent);
    
}

function getId(x) {
    return document.getElementById(x);
}