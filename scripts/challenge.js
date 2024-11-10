  // let filter = document.querySelector('.filter');
  // filter.appendChild(generateDropDown());

  // function generateDropDown() {
  //   let data = [];
  //   let wors
  // }

const currentPage = window.location.pathname.split("/").pop();
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
  

const searchBar = document.getElementById('searchBar');
const challengeList = document.querySelector('.challenge-list');
const challengeItems = challengeList.getElementsByClassName('challenge');

searchBar.addEventListener('input', function() {
  const keyword = searchBar.value.toLocaleLowerCase();

  Array.from(challengeItems).forEach(function(item) {
    const title = item.querySelector('h4').textContent.toLocaleLowerCase();
    const description = item.querySelector('p').textContent.toLocaleLowerCase();

    // tampilkan berita kalau keyword ditemukan
    if(title.includes(keyword) || description.includes(keyword)) {
      item.style.display = '';
    } else {
      item.style.display = 'none';
    }
  });
});