document.addEventListener('DOMContentLoaded', () => {
    const username = document.getElementById('username');
    const passwordBaru = document.getElementById('password-baru');
    const passwordConfirm = document.getElementById('password-baru-confirmation');
    const forgotPassword = document.getElementById('forgot-password');
    const usernameError = document.getElementById('username-error');
    const passwordError = document.getElementById('password-error');
    const confirmPasswordError = document.getElementById('confirm-error');
    const saveButton = document.querySelector('button[type="submit"]');

    forgotPassword.addEventListener('submit', (e) => {
        e.preventDefault();

        let isValid = false;

        usernameError.innerText = '';
        passwordError.innerText = '';
        confirmPasswordError.innerText = '';

        if(username.value === "" || username.value == null) {
            usernameError.innerText = 'Username harus diisi';
            isValid = false;
        }

        var emailPattern = /^[^@]+@[^@]+\.[^@]+$/; // set format email char@char.char
        if (emailPattern.test(username.value)) {
            isValid = true;
        } else {
            usernameError.innerText = 'Email tidak valid';
            isValid = false;
        }

        if(passwordBaru.value === "" || passwordBaru.value == null) {
            passwordError.innerText = 'Password harus diisi';
            isValid = false;
        } else if(passwordBaru.value.length < 8) {
            passwordError.innerText = 'Panjang password minimal 8 karakter';
            isValid = false;
        } else {
            isValid = true;
        }

        if(passwordConfirm.value === "" || passwordConfirm.value == null) {
            confirmPasswordError.innerText = 'Konfirmasi password harus diisi';
            isValid = false;
        } else if (passwordConfirm.value !== passwordBaru.value) {
            confirmPasswordError.innerText = 'Input tidak sesuai dengan password';
            isValid = false;
        } else {
            isValid = true;
        }

        if(!isValid) {
            return;
        }

        // kirim data dengan fetch
        fetch('http://localhost/dicoding_landing_page/php/ganti_password.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ // ubah JS object menjadi JSON
                username: username.value,
                passwordBaru: passwordBaru.value
            })
        })
        .then(response => response.json())
        .then(data => {
            if(data.success) {
                console.log('Changing password success: ', data);
                alert('Password berhasil diubah!');
                window.location.href = 'login.html';
            } else {
                console.log('Ubah password gagal(JS): ', data.error);
                alert(data.error);
            }
        })
        .catch((error) => {
            console.log('Error: ', error);
            alert('Ubah password gagal');
        })
    });

    // saveButton.addEventListener('click', function() {
    //     inputs.forEach(input => {
    //         input.value = '';
    //     });
    // });

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