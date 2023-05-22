let captchaInput = document.getElementById("captchaInput");
let submitBtn = document.getElementById("submitBtn");

submitBtn.disabled = true;

captchaInput.addEventListener("input", function() {
  if (captchaInput.value === "") {
    submitBtn.disabled = true;
  } else {
    submitBtn.disabled = false;
  }
});
