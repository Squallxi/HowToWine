const cards = document.querySelectorAll('.card_questionnaire');
const buttons = document.querySelectorAll('.card_button');
const SubThemeTabler = document.querySelector('.consulter_subTheme');

buttons.forEach(function(button){
    button.addEventListener('click', function(event){
        let myParent =  event.target.parentNode.parentNode.parentNode;
        cards.forEach(function(card){
            if (myParent === card){
                card.classList.add("consulter_card");
                card.querySelector('table').classList.add('displayBlock');
                card.querySelector('button').innerHTML = '<a href="index.php?page=listExo"><- Retour</a>';
                card.querySelector('button').classList.add('card_buttonReturn');
            }else{
                card.classList.add('displayNone');
            }
        })
    })
})

