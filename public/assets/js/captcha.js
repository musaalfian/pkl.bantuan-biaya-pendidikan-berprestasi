let captcha = new Array();

function createCaptcha() {
  const activeCaptcha = document.getElementById("captcha");
  for (q = 0; q < 6; q++) {
    captcha[q] = String.fromCharCode(Math.floor(Math.random() * 26 + 65));
    // if (q % 2 == 0) {
    // } else {
    //   captcha[q] = Math.floor(Math.random() * 10 + 0);
    // }
  }
  theCaptcha = captcha.join("");
  activeCaptcha.innerHTML = `${theCaptcha}`;
}

function validateCaptcha() {
  const errCaptcha = document.getElementById("errCaptcha");
  const reCaptcha = document.getElementById("reCaptcha");
  recaptcha = reCaptcha.value;
  let validateCaptcha = 0;
  for (var z = 0; z < 6; z++) {
    if (recaptcha.charAt(z) != captcha[z]) {
      validateCaptcha++;
    }
  }
  if (recaptcha == "") {
    errCaptcha.innerHTML = "Captcha harus diisi";
    errCaptcha.style.color = "red";
    // errCaptcha.style.fontWeight = '90  ;
  } else if (validateCaptcha > 0 || recaptcha.length > 6) {
    errCaptcha.innerHTML = "Captcha salah";
    errCaptcha.style.color = "red";
    // $("#submit_login").prop("disabled", true);
    // $("#submit_daftar").prop("disabled", true);
  } else {
    errCaptcha.innerHTML = "Captcha benar";
    errCaptcha.style.color = "green";
    $("#hasilCaptcha").val("benar");
    // $("form").submit();
    // $("#submit_login").prop("disabled", false);
    // $("#submit_daftar").prop("disabled", false);
  }
}
