let modal = document.getElementById("myModal");

// Get the button that opens the modal
let showModal = document.getElementById("showModal");

// Get the <span> element that closes the modal
let closeModal = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
showModal.addEventListener('click', function() {
  modal.style.display = "block";
});

// When the user clicks on <span> (x), close the modal
// closeModal.addEventListener('click', ()=>{
//   modal.style.display = "none";
// });

// When the user clicks anywhere outside of the modal, close it
window.addEventListener('click', function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
});