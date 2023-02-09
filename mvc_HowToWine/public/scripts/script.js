let rookyLvl = document.querySelector("#cercle1");
let mediumLvl = document.querySelector("#cercle2");
let confirmLvl = document.querySelector("#cercle3");
let rookyContent = document.querySelector(".content1");
let mediumContent = document.querySelector(".content2");
let confirmContent = document.querySelector(".content3");
let cancelBox = document.querySelector(".cancel");

document.querySelectorAll('[name=btcircle]').forEach(function(btcircle){
    btcircle.addEventListener('click', function(event){
        if (event.target.id == rookyLvl.id){
            rookyLvl.classList.remove("appearByOpacity");
            mediumLvl.classList.remove("appearByOpacity");
            confirmLvl.classList.remove("appearByOpacity");
            rookyContent.classList.remove("disappearByDisplay");
            rookyContent.classList.add("appearByDisplay");
            mediumLvl.classList.add("disapearByOpacity");
            confirmLvl.classList.add("disapearByOpacity");
        }else if (event.target.id == confirmLvl.id){
            confirmContent.classList.remove("disappearByDisplay");
            rookyLvl.classList.remove("appearByOpacity");
            mediumLvl.classList.remove("appearByOpacity");
            confirmLvl.classList.remove("appearByOpacity");
            rookyLvl.classList.add("disapearByOpacity");
            mediumLvl.classList.add("disapearByOpacity");
            confirmContent.classList.add("appearByDisplay");
        }
        else if(event.target.id == mediumLvl.id){
            mediumContent.classList.remove("disappearByDisplay");
            rookyLvl.classList.remove("appearByOpacity");
            mediumLvl.classList.remove("appearByOpacity");
            confirmLvl.classList.remove("appearByOpacity");
            rookyLvl.classList.add("disapearByOpacity");
            mediumContent.classList.add("appearByDisplay");
            confirmLvl.classList.add("disapearByOpacity");
        }
        else if(event.target.id == cancelBox.id){
            rookyLvl.classList.remove("disapearByOpacity");
            mediumLvl.classList.remove("disapearByOpacity");
            confirmLvl.classList.remove("disapearByOpacity");
            rookyLvl.classList.add("appearByOpacity");
            mediumLvl.classList.add("appearByOpacity");
            confirmLvl.classList.add("appearByOpacity");
            rookyContent.classList.add("disappearByDisplay");
            mediumContent.classList.add("disappearByDisplay");
            confirmContent.classList.add("disappearByDisplay");
        }
    })
})