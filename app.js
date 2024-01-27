const registrationForm = document.querySelector('#create-account-form');
const usernameInput = document.querySelector('#username');
const emailInput = document.querySelector('#email');
const passwordInput = document.querySelector('#password');
const confirmPasswordInput = document.querySelector('#confirm-password');

registrationForm.addEventListener('submit', (event) => {
    event.preventDefault(); 

    if (validateRegistrationForm()) {
        registrationForm.submit(); 
    }
});

function validateRegistrationForm() {
    let isValid = true;

    // Validate username
    if (usernameInput.value.trim() === '') {
        setError(usernameInput, 'Username cannot be empty');
        isValid = false;
    } else if (usernameInput.value.trim().length < 5 || usernameInput.value.trim().length > 15) {
        setError(usernameInput, 'Username must be between 5 and 15 characters');
        isValid = false;
    } else {
        setSuccess(usernameInput);
    }

    // Validate email
    if (emailInput.value.trim() === '') {
        setError(emailInput, 'Email cannot be empty');
        isValid = false;
    } else if (!isEmailValid(emailInput.value.trim())) {
        setError(emailInput, 'Invalid email format');
        isValid = false;
    } else {
        setSuccess(emailInput);
    }

    // Validate password
    if (passwordInput.value.trim() === '') {
        setError(passwordInput, 'Password cannot be empty');
        isValid = false;
    } else if (passwordInput.value.trim().length < 6 || passwordInput.value.trim().length > 20) {
        setError(passwordInput, 'Password must be between 6 and 20 characters');
        isValid = false;
    } else {
        setSuccess(passwordInput);
    }

   // konfirmo password
    if (passwordInput.value.trim() == '') {
        setError(passwordInput, 'Password cannot be empty');
    } else if (passwordInput.value.trim().length < 6 || passwordInput.value.trim().length > 20) {
        setError(passwordInput, 'Password must be between 6 and 20 characters');
    } else {
        setSuccess(passwordInput);
    }

    return isValid;
}

function setError(element, errorMessage) {
    const parent = element.parentElement;
    if (parent.classList.contains('success')) {
        parent.classList.remove('success');
    }
    parent.classList.add('error');
    const paragraph = parent.querySelector('p');
    paragraph.textContent = errorMessage;
}

function setSuccess(element) {
    const parent = element.parentElement;
    if (parent.classList.contains('error')) {
        parent.classList.remove('error');
    }
    parent.classList.add('success');
}

function isEmailValid(email) {
    const reg = /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
    return reg.test(email);
}
