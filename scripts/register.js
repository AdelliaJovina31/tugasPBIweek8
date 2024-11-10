document.addEventListener('DOMContentLoaded', () => {
    const register = document.getElementById('registerForm');
    const firstName = document.getElementById('first-name');
    const lastName = document.getElementById('last-name');
    const email = document.getElementById('email');
    const password = document.getElementById('password');
    const passwordConfirm = document.getElementById('password-confirmation');
    const firstNameError = document.getElementById('first-error');
    const emailError = document.getElementById('email-error');
    const passwordError = document.getElementById('password-error');
    const confirmPasswordError = document.getElementById('confirm-error');
    const submitButton = document.querySelector('button[type="submit"]');

    let isValid = false;

    firstName.value = '';
    lastName.value = '';
    email.value = '';
    firstNameError.innerText = '';
    emailError.innerText = '';
    passwordError.innerText = '';
    confirmPasswordError.innerText = '';

    register.addEventListener('submit', (e) => {
        e.preventDefault()

        if(firstName.value === "" || firstName.value == null) {
            firstNameError.innerText = 'Nama harus diisi';
            isValid = false;  // form tidak bisa di-submit
        }

        if(email.value === "" || email.value == null) {
            emailError.innerText = 'Email harus diisi';
            isValid = false;
        }

        var emailPattern = /^[^@]+@[^@]+\.[^@]+$/; // set format email char@char.char
        if (emailPattern.test(email.value)) {
            isValid = true;
        } else {
            emailError.innerText = 'Email tidak valid';
            isValid = false;
        }

        if(password.value === "" || password.value == null) {
            passwordError.innerText = 'Password harus diisi';
            isValid = false;
        } else if(password.value.length < 8) {
            passwordError.innerText = 'Panjang password minimal 8 karakter';
            isValid = false;
        } else {
            isValid = true;
        }

        if(passwordConfirm.value === "" || passwordConfirm.value == null) {
            confirmPasswordError.innerText = 'Konfirmasi password harus diisi';
            isValid = false;
        } else if (passwordConfirm.value !== password.value) {
            confirmPasswordError.innerText = 'Input tidak sesuai dengan password';
            isValid = false;
        } else {
            isValid = true;
        }

        if (!isValid) {
            return;
        }

        // kirim data dengan fetch
        fetch('http://localhost/dicoding_landing_page/php/register.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ // ubah JS object menjadi JSON
                firstName: firstName.value,
                lastName: lastName.value,
                email: email.value,
                password: password.value
            })
        })
        .then(response => response.json())
        .then(data => {
            if(data.success) {
                console.log('Register success: ', data);
                // alert('Login berhasil!');
                window.location.href = 'login.html';
            } else {
                console.log('Register gagal(JS): ', data.error);
                alert(data.error);
            }
        })
        .catch((error) => {
            console.log('Error: ', error);
            alert('Register gagal');
        })
    });

    submitButton.addEventListener('click', function() {
        inputs.forEach(input => {
            input.value = '';
        });
    });

    // styling transition label
    document.querySelectorAll('.input-field input').forEach(input => {
        input.addEventListener('input', function() {
            if(this.value) {
                this.classList.add('filled');
            } else {
                this.classList.remove('filled');
            }
        });
    });
});