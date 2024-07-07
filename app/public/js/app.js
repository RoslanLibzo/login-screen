(() => {
    'use strict'

    const form = document.getElementById('loginForm');
    const usernameInput = document.getElementById('username');
    const passwordInput = document.getElementById('password');
    const submitButton = document.getElementById('submitButton');

    // Password validation regex pattern
    const passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/;

    // Function to validate individual input
    const validateInput = (input, isValid) => {
        if (isValid) {
            input.classList.remove('is-invalid');
            input.classList.add('is-valid');
        } else {
            input.classList.remove('is-valid');
            input.classList.add('is-invalid');
        }
        checkFormValidity();
    };

    // Function to check overall form validity
    const checkFormValidity = () => {
        if (form.checkValidity()) {
            submitButton.removeAttribute('disabled');
        } else {
            submitButton.setAttribute('disabled', 'disabled');
        }
    };

    // Real-time validation for the username field
    usernameInput.addEventListener('input', () => {
        const isValid = usernameInput.value.trim().length > 0;
        validateInput(usernameInput, isValid);
    });

    // Real-time validation for the password field
    passwordInput.addEventListener('input', () => {
        const isValid = passwordPattern.test(passwordInput.value);
        validateInput(passwordInput, isValid);
    });

    // Validate the form on submission
    form.addEventListener('submit', (event) => {
        const isUsernameValid = usernameInput.value.trim().length > 0;
        const isPasswordValid = passwordPattern.test(passwordInput.value);

        if (!isUsernameValid || !isPasswordValid) {
            event.preventDefault();
            event.stopPropagation();

            // Validate and apply feedback
            validateInput(usernameInput, isUsernameValid);
            validateInput(passwordInput, isPasswordValid);
        } else {
            form.classList.add('was-validated');
        }
    }, false);




    // Section for show hide button for password

    const passwordField = document.getElementById('password');
    const togglePasswordBtn = document.getElementById('togglePassword');

    togglePasswordBtn.addEventListener('click', function() {
        const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
        passwordField.setAttribute('type', type);
        togglePasswordBtn.textContent = type === 'password' ? 'Show' : 'Hide';
    });

  })()