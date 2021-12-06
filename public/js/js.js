const caret = document.querySelector("#caret");
const link = document.querySelector(".link");
function linkHandle() {
  link.classList.toggle("links");
}
caret.addEventListener("click", linkHandle);
