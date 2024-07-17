const sidebar = document.querySelector('.sidebar');
const burgerIcon = document.querySelector('.burger-icon');

burgerIcon.addEventListener('click', () => {
    sidebar.classList.toggle('show');
});