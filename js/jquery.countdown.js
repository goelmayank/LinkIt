var m=getId('m'), s=getId('s'), btn=getId('btn'), status=getId('status'), inc =getId('inc') , dec =getId('dec'), interval=null, time=0, min=0;

btn.onclick = startCounter;
inc.onclick = incTime;
dec.onclick = decTime;

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

function incTime(){
    time++;
    setTime();
}

function decTime(){
    time--;
    setTime();
}

function setTime() { 
				m.textContent= 120*60;
        
}

function getId(x) {
    return document.getElementById(x);
}