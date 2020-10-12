'use strict';

{
    function update(){
        document.querySelectorAll('p').forEach((p,i)=>{

            p.textContent = `さおり${i}です`;
        });
    }

    setTimeout(update, 5000);

    const open = document.getElementById('open');
    const close = document.getElementById('close');
    const modal = document.getElementById('modal');
    const mask = document.getElementById('mask');

    open.addEventListener('click',()=>{
        modal.classList.remove('hidden');
        mask.classList.remove('hidden');
    });
    close.addEventListener('click',()=>{
        modal.classList.add('hidden');
        mask.classList.add('hidden');
    });
    add.addEventListener('click',()=>{
        close.click();
    });



    
}