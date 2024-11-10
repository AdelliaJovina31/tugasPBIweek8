document.getElementById('logout-button').addEventListener('click', (e) => {
    //localStorage.removeItem('isLoggedIn');
    e.preventDefault();
    window.location.href = 'login.html';
});

fetch('http://localhost/dicoding_landing_page/php/akun.php')
.then(response => response.text())
.then(text => {
    console.log('Raw response Akun: ', text);

    try {
        const data = JSON.parse(text);
        if(data.success) {
           document.getElementById('nama').value = data.user.nama;
           document.getElementById('email').value = data.user.email;
           document.getElementById('password').value = data.user.password;
        } else {
            console.log('Data gagal dimuat(JS): ', data.error);
            alert(data.error);
        }
    } catch (error) {
        console.log('Parsing error: ', error);
        alert('Response is not valid JSON');
    }
})
.catch((error) => {
    console.log('Error: ', error);
    alert('Load data user gagal');
});

document.getElementById('edit-button').addEventListener('click', (e) => {
    e.preventDefault();

    const passwordInput = document.getElementById('password');
    passwordInput.readOnly = false;
    passwordInput.required = true;
    passwordInput.style.border = '1px solid grey';
    passwordInput.style.borderRadius = '5px';

    const leftButton = document.getElementById('edit-button');
    leftButton.id = 'cancel-button';
    leftButton.innerText = 'Cancel';

    leftButton.addEventListener('onclick', () => {
        leftButton.id = 'edit-button';
        leftButton.innerText = 'Edit';
        passwordInput.readOnly = true;
        passwordInput.required = false;
    });

    const rightButton = document.getElementById('logout-button');
    rightButton.style.display = 'none';

    const action = document.querySelector('.action');

    const button = document.createElement('button');
    // button.classList.add = 'simpan-button';
    button.setAttribute('class', 'button');
    button.setAttribute('id', 'simpan-button');
    button.setAttribute('type', 'submit');
    button.innerText = 'Simpan';

    action.appendChild(button);

    // rightButton.id = 'simpan-button';
    // rightButton.setAttribute('type', 'submit');
    // rightButton.innerText = 'Simpan';
    
    const username = document.getElementById('email');
    const passwordBaru = document.getElementById('password');
    const simpanButton = document.getElementById('simpan-button')

    simpanButton.addEventListener('click', (e) => {
        e.preventDefault();
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
                // rightButton.id = 'logout-button';
                // rightButton.innerText = 'Logout';

                rightButton.style.display = 'flex';
                rightButton.style.justifyContent = 'center';
                // button.classList.add = 'logout-button';
                // button.innerText = 'Logout';
                simpanButton.style.display = 'none';

                action.appendChild(button);

                passwordInput.readOnly = true;
                passwordInput.required = false;
                passwordInput.style.border = '1px solid transparent';
            } else {
                console.log('Ubah password gagal(JS): ', data.error);
                alert(data.error);
            }
        })
        .catch((error) => {
            console.log('Error akun.js: ', error);
            alert('Ubah password gagal');
        })
    });
});