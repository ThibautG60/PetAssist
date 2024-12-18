const form = document.getElementById('formV');
form.addEventListener('submit', checkForm);

function checkForm(e) {
    e.preventDefault();
    let valid = true;
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
    if (valid == true) {
        switch (document.getElementById('buttonSubmitForm').getAttribute('aria-details')) {
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
            case "login":
                location.href = "account.html";
                break;
        }
    }
}