const mobileMenuButton = document.getElementById('mobileMenuButton');
const mobileDrawer = document.getElementById('mobileDrawer');
const mobileDrawerClose = document.getElementById('mobileDrawerClose');
const mobileDrawerBackdrop = document.getElementById('mobileDrawerBackdrop');

function openDrawer() {
    mobileDrawer.classList.add('open');
    mobileDrawerBackdrop.classList.add('open');
    document.body.style.overflow = 'hidden';
}

function closeDrawer() {
    mobileDrawer.classList.remove('open');
    mobileDrawerBackdrop.classList.remove('open');
    document.body.style.overflow = '';
}

mobileMenuButton.addEventListener('click', openDrawer);
mobileDrawerClose.addEventListener('click', closeDrawer);
mobileDrawerBackdrop.addEventListener('click', closeDrawer);

document.addEventListener('keydown', (event) => {
    if (event.key === 'Escape') {
        closeDrawer();
    }
});