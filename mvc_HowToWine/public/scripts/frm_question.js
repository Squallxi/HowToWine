const inputs = document.querySelectorAll('input');
const btn = document.querySelector('button');

[].forEach.call( document.querySelectorAll('.hide-checkbox'), function(element) {
    element.style.display = 'none';
    });