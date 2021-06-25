require('./bootstrap');

const delForm = document.querySelectorAll('.delete');



delForm.forEach(element => {
    
    element.addEventListener('click', function(e){
        const control = confirm('sei sicuro di voler eliminare il post?');

        console.log(control);
        if(control == false){
            e.preventDefault();
        }

    })
})