const currentPage = window.location.pathname.split("/").pop();

if (currentPage === 'program_terbaru.html') {
  // dari Swiper
  const swiper = new Swiper('#daftar_program', {
    loop: true,
    
    // bullet page
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
      dynamicBullets: true
    },
    
    // navigation arrows (panah kiri-kanan)
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },

    breakpoints: {
      0: {
        slidesPerView: 1
      },
      768: {
        slidesPerView: 2
      },
      1200: {
        slidesPerView: 3
      }
    }
  });

  swiper.update();  
}
  
  // let filter = document.querySelector('.filter');
  // filter.appendChild(generateDropDown());

  // function generateDropDown() {
  //   let data = [];
  //   let wors
  // }

const navLinks = document.querySelectorAll('.navbar ul li a');

navLinks.forEach(link => {
  if ((link.getAttribute('href') === currentPage) || (currentPage === 'index.php' && link.getAttribute('href') === 'index.php')) {
    link.classList.add('active');
  }
}); 

// const isLoggedIn = localStorage.getItem('isLoggedIn');
const akunMenu = document.getElementById('akun');
const akunPC = document.getElementById('akun-pc');

if(isLoggedIn) {
  // hide <ul id="akun">
  akunMenu.style.display = 'none';
  akunPC.style.display = 'none';

  // elemen baru penggantinya
  const list = document.createElement('li');
  const akunLink = document.createElement('a');
  akunLink.href = 'akun.php';
  akunLink.innerText = 'Akun';

  list.appendChild(akunLink);

  // tambahkan elemen baru ke navbar
  document.querySelector('.navbar .notPC .sidebar').appendChild(list.cloneNode(true));
  document.querySelector('.navbar ul.pcNavbar').appendChild(list.cloneNode(true));

  console.log('Current Page:', currentPage);
  console.log('Is Logged In:', isLoggedIn);
}

const hamburgerMenu = document.getElementById('hamburger-menu');
const hamburgerMenuList = document.querySelector('.navbar div');
const closeSidebar = document.getElementById('close-icon');
if (hamburgerMenu) {
  hamburgerMenu.addEventListener('click', (e) => {
    hamburgerMenuList.style.display = 'flex';
  });

  closeSidebar.addEventListener('click', (e) => {
    hamburgerMenuList.style.display = 'none';
  });
}



// tampilkan modal
// addDataBtn.onclick = function() {
//   addPeserta.style.display = "block";
//   modal.style.display = "block";
// }

// // close modal saat klik simbol x
// closeModal.onclick = function() {
//   addPeserta.style.display = "none";
//   modal.style.display = "none";
// }

// // close modal saat klik di luar modal
// window.onclick = function(event) {
//   if (event.target == addPeserta) {
//     addPeserta.style.display = "none";
//     modal.style.display = "none";
//   }
// }
  