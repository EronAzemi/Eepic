const form = document.querySelector('#create-account-form');
const usernameInput = document.querySelector('#username');
const emailInput = document.querySelector('#email');
const passwordInput = document.querySelector('#password');
const confirmPasswordInput = document.querySelector('#confirm-password');
const resultMessage = document.querySelector('#resultMessage');



form.addEventListener('submit', async (event) => {
    event.preventDefault();
    validateForm();

    if (isFormValid()) {
        try {
            const formData = new FormData(form);
            const response = await fetch(form.action, {
                method: 'POST',
                body: formData,
            });
            const data = await response.json();

            resultMessage.textContent = data.message;

            if (data.status === 'success') {
                // Redirect to another HTML page
                window.location.href = 'Login.html';
            }
        } catch (error) {
            console.error('Error:', error);
            resultMessage.textContent = 'An error occurred while processing the registration.';
        }
    }
});




function isFormValid() {
    const inputContainers = form.querySelectorAll('.input-group');
    let result = true;
    inputContainers.forEach((container) => {
        if (container.classList.contains('error')) {
            result = false;
        }
    });
    return result;
}

function setError(element, errorMessage) {
    const parent = element.parentElement;
    if (parent.classList.contains('success')) {
        parent.classList.remove('success');
    }
    parent.classList.add('error');
    const paragraph = parent.querySelector('p');
    paragraph.textContent = errorMessage;

    
    clearResultMessage();
}

function setSuccess(element) {
    const parent = element.parentElement;
    if (parent.classList.contains('error')) {
        parent.classList.remove('error');
    }
    parent.classList.add('success');

    
    clearResultMessage();
}

function clearResultMessage() {
    
    resultMessage.textContent = '';
}



