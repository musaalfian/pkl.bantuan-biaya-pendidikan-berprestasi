let timeout;
    let password = document.getElementById("sandi");
    let strengthBadge = document.getElementById('StrengthDisp');
    let strongPassword = new RegExp('(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[^A-Za-z0-9])(?=.{8,})')
    let mediumPassword = new RegExp('((?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[^A-Za-z0-9])(?=.{6,}))|((?=.*[a-z])(?=.*[A-Z])(?=.*[^A-Za-z0-9])(?=.{8,}))')

    function StrengthChecker(PasswordParameter) {
        if(strongPassword.test(PasswordParameter)) {
            strengthBadge.style.color = "green";
            strengthBadge.textContent = 'Sandi kuat';
        } else if(mediumPassword.test(PasswordParameter)) {
            strengthBadge.style.color = 'blue';
            strengthBadge.textContent = 'Sandi medium';
        } else {
            strengthBadge.style.color = 'red';
            strengthBadge.textContent = 'sandi lemah';
        }
    }
    password.addEventListener("input", () => {
        strengthBadge.style.display = 'block';
        clearTimeout(timeout);
        timeout = setTimeout(() => StrengthChecker(password.value), 500);
        if(password.value.length !== 0) {
            strengthBadge.style.display != 'block';
        } else {
            strengthBadge.style.display = 'none';
        }
    });