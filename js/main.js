const drop = document.getElementById('dropMenu');
const menuLat = document.getElementById('menuLat');

drop.addEventListener('click',()=>{
    menuLat.classList.toggle('hidden'),
    menuLat.classList.toggle('flex');
});
