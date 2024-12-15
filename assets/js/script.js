// navigation to forms
const NavigateToNextForm = document.getElementById("NavigateToNextForm");
const pesonalInfo = document.getElementById("personal-info");
const rating = document.getElementById("rating");
const backToPreviousForm = document.getElementById("backToPreviousForm");
const form = document.getElementById("show-form");
const showForm = document.getElementById("show-form-button");
const closeForm = document.querySelectorAll(".close-form");

NavigateToNextForm.addEventListener("click", (e) => {
  e.preventDefault();
  pesonalInfo.classList.add("hidden");
  rating.classList.remove("hidden");
});

backToPreviousForm.addEventListener("click", (e) => {
  e.preventDefault(e);
  pesonalInfo.classList.remove("hidden");
  rating.classList.add("hidden");
});

showForm.addEventListener("click", (e) => {
  e.preventDefault();
  form.classList.remove("hidden");
  showForm.classList.add("hidden");
});
function closeForms() {
  form.classList.add("hidden");
  showForm.classList.remove("hidden");
  playerschange.classList.add("hidden");
}
closeForm.forEach((button) => {
  button.addEventListener("click", (e) => {
    e.preventDefault();
    closeForms();
  });
});
