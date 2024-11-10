document.addEventListener('DOMContentLoaded', () => {
    const username = document.getElementById('username');
    const password = document.getElementById('password');
    const login = document.getElementById('login');
    const usernameError = document.getElementById('username-error');
    const passwordError = document.getElementById('password-error');
    const loginButton = document.querySelector('button[type="submit"]');

    login.addEventListener('submit', (e) => {
        e.preventDefault();

        let isValid = false;

        usernameError.innerText = '';
        passwordError.innerText = '';

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

        if(password.value === "" || password.value == null) {
            passwordError.innerText = 'Password harus diisi';
            isValid = false;
        } else if(password.value.length < 8) {
            passwordError.innerText = 'Panjang password minimal 8 karakter';
            isValid = false;
        } else {
            isValid = true;
        }

        if(!isValid) {
            return;
        }

        // kirim data dengan fetch
        fetch('http://localhost/dicoding_landing_page/php/login.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ // ubah JS object menjadi JSON
                username: username.value,
                password: password.value
            })
        })
        .then(response => response.text())
        .then(text => {
            console.log('Raw response: ', text);

            try {
                const data = JSON.parse(text);
                if(data.success) {
                    //localStorage.setItem('isLoggedIn', 'true')
                    console.log('Login success: ', data);
                    // alert('Login berhasil!');
                    window.location.href = 'index.php';
                } else {
                    console.log('Login gagal(JS): ', data.error);
                    alert(data.error);
                }
            } catch (error) {
                console.log('Parsing error: ', error);
                alert('Rsponse is not valid JSON');
            }
        })
        .catch((error) => {
            console.log('Error: ', error);
            alert('Login gagal');
        })

        // if(username.value === 'admin@gmail.com' && password.value === 'admin123') {
        //     localStorage.setItem('isLoggedIn', 'true');
        //     window.location.href = 'index.html'; // ke index kalau berhasil login
        // } else {
        //     alert('Username atau password salah');
        // }

        // if(!isValid) {
        //     e.preventDefault();
        // }
    });

    // loginButton.addEventListener('click', function() {
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