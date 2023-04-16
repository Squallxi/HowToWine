const mainCards = document.querySelectorAll('.main_cards');
const mainCard = document.querySelector('#main_card');
const logosTheme = document.querySelectorAll(".logoTheme");

window.addEventListener('scroll', () => {

    const {scrollTop, clientHeight} = document.documentElement;
    const topElementToTopViewport = mainCard.getBoundingClientRect().top;

    if(scrollTop > (scrollTop + topElementToTopViewport).toFixed() - clientHeight * 0.8){
        mainCards.forEach((element) => {
            element.classList.add('appearFromLeft');
          });
          logosTheme.forEach((element) => {
            element.classList.add('logoThemeAppear');
          });
    }
});

