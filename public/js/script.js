
let bot= document.querySelector('.buttonBot');

function scrollTop(e) {

    if(scrollY > document.documentElement.clientHeight){
        bot.style.display = "block";
    }else{
        bot.style.display = "none";
    }
    bot.style.top = scrollY + Math.round(window.innerHeight/1.2) + "px";
}

window.addEventListener("scroll" , scrollTop);


function goTop(e){

    $('html, body').animate({scrollTop:0}, 'slow');
}

bot.addEventListener('click', goTop)

let like = document.querySelectorAll('.like')
let totalLike = document.querySelector('.totalLike')
let totalDislike = document.querySelector('.totalDislike')
let nLike = 0;
let nDislike = 0;

//console.log(like)

function liker(e){
    //console.log(e.target.value)
    if(e.target.value == 'like'){
        nLike += 1;
        //console.log(nLike)
        totalLike.innerHTML = nLike

    }else{
        nDislike -= 1;
        //console.log(nDislike)
        totalDislike.innerHTML = nDislike
    }
}

like.forEach(element => {
    element.addEventListener('click', liker)
});

/*console.log(nLike)
console.log(nDislike)*/
