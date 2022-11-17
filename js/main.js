const photoFileBtn = document.getElementById("file-img");/*
const customBtnPhoto = document.getElementById("custom-button-photo");


customBtnPhoto.addEventListener("click", function() {
    photoFileBtn.click();
});

photoFileBtn.addEventListener("change", function() {
  if (photoFileBtn.value) {
    customBtnPhoto.innerHTML = photoFileBtn.value.match(
      /[\/\\]([\w\d\s\.\-\(\)]+)$/
    )[1];
  } else {
    customTxt.innerHTML = "No file chosen, yet.";
  }
});
*/
const cinFileBtn = document.getElementById("file-cin");
const customBtncin = document.getElementById("custom-button-cin");


customBtncin.addEventListener("click", function() {
    cinFileBtn.click();
});

cinFileBtn.addEventListener("change", function() {
  if (cinFileBtn.value) {
    customBtncin.innerHTML = cinFileBtn.value.match(
      /[\/\\]([\w\d\s\.\-\(\)]+)$/
    )[1];
  } else {
    customTxt.innerHTML = "No file chosen, yet.";
  }
});



const recuFileBtn = document.getElementById("file-recu");
const customBtnrecu = document.getElementById("custom-button-recu");


customBtnrecu.addEventListener("click", function() {
    recuFileBtn.click();
});

recuFileBtn.addEventListener("change", function() {
  if (recuFileBtn.value) {
    customBtnrecu.innerHTML = recuFileBtn.value.match(
      /[\/\\]([\w\d\s\.\-\(\)]+)$/
    )[1];
  } else {
    customTxt.innerHTML = "No file chosen, yet.";
  }
});

