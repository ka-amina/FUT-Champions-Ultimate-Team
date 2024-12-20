// navigation to forms
const pesonalInfo = document.getElementById("personal-info");
const rating = document.getElementById("rating");
const form = document.getElementById("show-form");
const showForm = document.getElementById("show-form-button");
const closeForm = document.querySelectorAll(".close-form");
const table = document.querySelector(".players-table");
const position = document.getElementById("position");
const gkFields = [
  "diving-field",
  "Handling-field",
  "Kicking-field",
  "reflexes-field",
  "speed-field",
  "positioning-field",
];

const playerRating = [
  "pace-field",
  "shooting-field",
  "passing-field",
  "dribbling-field",
  "defending-field",
  "physical-field",
];

showForm.addEventListener("click", (e) => {
  e.preventDefault();
  form.classList.remove("hidden");
  table.classList.add("hidden");
});
function closeForms() {
  form.classList.add("hidden");
  table.classList.remove("hidden");
}
closeForm.forEach((button) => {
  button.addEventListener("click", (e) => {
    e.preventDefault();
    closeForms();
  });
});


// position2.addEventListener("change", (e) => {
//     e.preventDefault();
//     if (position.value === "GK") {
//       gkFields.forEach((field) => {
//         const input = document.getElementById(field);
//         input.classList.remove("hidden");
//       });
//       playerRating.forEach((field) => {
//         const input = document.getElementById(field);
//         input.classList.add("hidden");
//       });
//     } else {
//       gkFields.forEach((field) => {
//         const input = document.getElementById(field);
//         input.classList.add("hidden");
//       });
//       playerRating.forEach((field) => {
//         const input = document.getElementById(field);
//         input.classList.remove("hidden");
//       });
//     }
//   });


  position.addEventListener("change", (e) => {
    e.preventDefault();
    console.log(`La valeur est : ${position.value}`);
    if (position.value === "GK") {
      gkFields.forEach((field) => {
        const input = document.getElementById(field);
        input.classList.remove("hidden");
      });
      playerRating.forEach((field) => {
        const input = document.getElementById(field);
        input.classList.add("hidden");
      });
    } else {
      gkFields.forEach((field) => {
        const input = document.getElementById(field);
        input.classList.add("hidden");
      });
      playerRating.forEach((field) => {
        const input = document.getElementById(field);
        input.classList.remove("hidden");
      });
    }
  });
