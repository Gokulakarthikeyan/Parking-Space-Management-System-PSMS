let setForm = document.querySelector('.settings-form-container');

document.querySelector('#settings-btn').onclick = () =>{
  setForm.classList.toggle('active');
}

document.querySelector('#close-settings-btn').onclick = () =>{
  setForm.classList.remove('active');
}
function myFunction() {
var element = document.body;
element.classList.toggle("dark-mode");
}