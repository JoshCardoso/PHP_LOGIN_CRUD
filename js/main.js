const drop = document.getElementById('dropMenu');
const menuLat = document.getElementById('menuLat');
const modal_perm = document.querySelector('.modal_perm');
const showModal_perm = document.querySelectorAll('.show_modalPerm');

drop.addEventListener('click',()=>{
    menuLat.classList.toggle('hidden'),
    menuLat.classList.toggle('flex');
});

showModal_perm.forEach(e => {
    e.addEventListener('click', () => {
        modal_perm.classList.toggle('hidden'),
        modal_perm.classList.toggle('flex');
    });
});
