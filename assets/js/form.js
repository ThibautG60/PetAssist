const form = document.getElementById('formV');
form.addEventListener('submit', checkForm);

function checkForm(e) {
    e.preventDefault();
    let valid = true;
    let ariraDetails = document.getElementById('buttonSubmitForm').getAttribute('aria-details');
    form.querySelectorAll('.error-msg').forEach(function (span) {
        span.remove();
    });

    for (let element of form.elements) {
        if (element.classList.contains('form-error')) {
            element.classList.remove('form-error');
        }
        else if (element.classList.contains('form-success')) {
            element.classList.remove('form-success');
        }
        if (!element.validity.valid) {
            element.classList.add('form-error');
            let span = document.createElement('span');
            span.classList.add('error-msg');
            span.textContent = element.validationMessage;
            element.insertAdjacentElement('afterend', span);
            valid = false;
        }
        else {
            element.classList.add('form-success');
        }
    }
    if (ariraDetails == 'passlost') {
        let pass1 = form.querySelector('#password');
        let pass2 = form.querySelector('#password2');
        if (pass1.value != pass2.value) {
            let span = document.createElement('span');
            span.classList.add('error-msg');
            pass2.classList.add('form-error');
            span.textContent = "Les mots de passes ne correspondent pas";
            pass2.insertAdjacentElement('afterend', span);
            valid = false;
        }
    }
    if (valid == true) {
        switch (ariraDetails) {
            case "create":
                alert('create');
                break;
            case "modify":
                alert('modify');
                break;
            case "lost":
                alert('lost');
                break;
            case "found":
                alert('found');
                break;
            case "passlost":
                alert('Mot de passe modifié avec succès.');
                location.href = "login.html";
                break;
            case "login":
                location.href = "account.html";
                break;
        }
    }
}