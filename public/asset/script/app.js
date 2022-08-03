

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