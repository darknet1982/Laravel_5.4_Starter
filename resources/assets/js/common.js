
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
require('./bootstrap');

// Contact Form
(() => {
    const form = document.getElementById("contact-form");
    form.addEventListener("submit", function (e) {
        e.preventDefault();
        formSubmit();
    });

    const formSubmit = function() {
        const submit = form.querySelector(".form-submit");
        const text = submit.querySelector(".text");
        const loading = submit.querySelector(".loading");
        const name = document.getElementsByName('name')[0];
        const email = document.getElementsByName('email')[0];
        const phone = document.getElementsByName('phone')[0];
        const enquiry = document.getElementsByName('enquiry')[0];
        const token = document.getElementsByName('_token')[0];
        const confirmation = document.getElementById('confirmation');

        text.style.display = 'none';
        loading.classList.add('show');
        submit.classList.add('disabled');
        submit.disabled = true;

        const data = {
            'name': name.value,
            'email': email.value,
            'phone': phone.value,
            'enquiry': enquiry.value,
            '_token': token.value,
            'method': 'post',
            'ajax': true
        };
        const request = new XMLHttpRequest();
        request.onreadystatechange = function() {
            if (request.readyState == XMLHttpRequest.DONE ) {
                if (request.status == 200) {
                    let response = JSON.parse(request.response);
                    if (response.success) {
                        // Success
                        submit.classList.remove('disabled');
                        submit.disabled = false;
                        text.innerHTML = "SENT!";
                        text.style.display = 'block';
                        loading.classList.remove('show');
                        setTimeout(function() {
                            text.innerHTML = "SUBMIT";
                            name.value = '';
                            email.value = '';
                            phone.value = '';
                            enquiry.value = '';
                            submit.classList.add('disabled');
                            submit.disabled = true;
                        }, 2000);
                        setTimeout(function() {
                            confirmation.classList.add('fade-in');
                            confirmation.style.display = 'block';
                        }, 1500);
                    } else {
                        // Failed
                        failedForm();
                    }
                } else {
                    // Failed
                    failedForm();
                }
            }
        }
        const value = JSON.stringify(data);
        request.open('POST', '/contact', true);
        request.setRequestHeader('Content-Type', 'application/json; charset=utf-8');
        request.send(value);

        return false;
    }

    const failedForm = function () {
        const submit = form.querySelector(".form-submit");
        const text = submit.querySelector(".text");
        const loading = submit.querySelector(".loading");
        text.innerHTML = "FAILED!";
        text.style.display = 'block';
        loading.classList.remove('show');
        setTimeout(function() {
            text.innerHTML = "SUBMIT";
            submit.classList.remove('disabled');
            submit.disabled = false;
        }, 3000);
    }

    const formValidate = function() {
        const submit = form.querySelector(".form-submit");
        const text = submit.querySelector(".text");
        const loading = submit.querySelector(".loading");
        const name = document.getElementsByName('name')[0];
        const email = document.getElementsByName('email')[0];
        const phone = document.getElementsByName('phone')[0];
        const enquiry = document.getElementsByName('enquiry')[0];
        let valid = true;

        if (name.value.trim() === '') { // Name is required
            valid = false;
            name.classList.add('invalid');
        } else {
            name.classList.remove('invalid');
        }
        if(email.value.trim() === '' || !validateEmail(email.value.trim())) {
            valid = false;
            email.classList.add('invalid');
        } else {
            email.classList.remove('invalid');
        }
        if (enquiry.value === '') {
            valid = false;
            enquiry.classList.add('invalid');
        } else {
            enquiry.classList.remove('invalid');
        }

        if (valid) {
            submit.classList.remove('disabled');
            submit.disabled = false;
        } else {
            submit.classList.add('disabled');
            submit.disabled = true;
        }
    }

    const validateEmail = function(email) {
        var re = /\S+@\S+\.\S+/;
        return re.test(email);
    }

    // Bind validation
    const inputs = document.getElementsByClassName('form-text');
    for (var i = 0; i < inputs.length; i++) {
        inputs[i].addEventListener("keyup", formValidate);
    }
    document.querySelector('.form-textarea').addEventListener("keyup", formValidate);
})();