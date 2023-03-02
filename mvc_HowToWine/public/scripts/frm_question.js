const inputs = document.querySelectorAll('input');
const checkbox = document.querySelectorAll('.hide-checkbox');
const btn = document.querySelector('button');
const submitBox = document.querySelector('#submitButton');
const validWhithoutAccount = document.getElementById('getNote');

[].forEach.call( document.querySelectorAll('.hide-checkbox'), function(element) {
    element.style.display = 'none';
    });


console.log(validWhithoutAccount);
let note = 0;
let howManyGoodAnswer = 0;

checkbox.forEach(function(input){
    if(input.getAttribute("data-value") == 1){
        howManyGoodAnswer++;
    }
});

validWhithoutAccount.addEventListener('click', function(){
    checkbox.forEach(function(input){
        if(input.getAttribute("data-value") == 1 && input.checked){
            note++;
        }
    });
    console.log(note);
    const noteBox = document.createElement("div");
    let noteBoxContent = document.createTextNode('Votre note est de ' + note + howManyGoodAnswer);
    noteBox.appendChild(noteBoxContent);
    submitBox.appendChild(noteBox);
});

console.log(note);

