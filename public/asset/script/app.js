

// Setting popup 

const showSetting = () => {

    let icon = document.getElementById('icon_settings');
    let  settings = document.getElementById('settings');

    if(icon.click){

        if(settings.style.display === 'none'){

            settings.style.display = 'flex';
        }

        else {

            settings.style.display='none';
        }


    }
    
}

// add toggle 

const showForm = () => {

    let add = document.getElementById('add_toggle');    
    let form = document.getElementById('form_container');
    let arrow = document.getElementById('arrow');

    if(add.click){

        if(form.style.display === "none"){


            arrow.style.position='sticky';
            arrow.style.transform='rotate(180deg)';
            arrow.style.animationDelay='0.25s';
            arrow.style.animationDuration=' 0.75s';
            form.style.display = 'flex';        

        }

        else {

            arrow.style.transform='rotate(0deg)';
            form.style.display='none';

        }
    }

}


// stop the form from getting submitted in case of error 

const error= document.getElementById('error');

if(error.hasChildNodes){

    let form = document.getElementById('form_container');

        form.style.display='flex';





}



//  show edit form 


const body= document.getElementById('body');
 body.onload=   function () { 
    
    const container = document.getElementById('edit_container');
    
    const blurred = [

        document.getElementById('dashboard'),
        document.getElementById('nav_container'),
        document.getElementById('data_table'),
        document.getElementById('add_container'),
    ];

    for(let i = 0;  i < blurred.length; i++){

        blurred[i].style.filter='blur(1.5rem)';
    }
    container.style.display='flex';
}


// hide edit form 

const close = document.getElementById('c');

close.onclick = function (){

    const blurred = [

        document.getElementById('dashboard'),
        document.getElementById('nav_container'),
        document.getElementById('data_table'),
        document.getElementById('add_container'),
    ];

    for(let i = 0;  i < blurred.length; i++){

        blurred[i].style.filter='blur(0)';
    }

    document.getElementById('edit_container').style.display='none';
}