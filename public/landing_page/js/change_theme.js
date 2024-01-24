var toggle_desktop = document.getElementById('theme-toggle-mobile');
if(toggle_desktop){
    init_theme();

    toggle_desktop.addEventListener('change', function(event){
        resetTheme();
    });

    function init_theme(){
        var darkThemeSelected = (localStorage.getItem('toggle_desktop') !== null && localStorage.getItem('toggle_desktop') === 'is-dark');
        toggle_desktop.checked = darkThemeSelected;
        darkThemeSelected ? document.body.classList.add('is-dark') : document.body.classList.remove('is-dark');
    }

    function resetTheme() {
        if(toggle_desktop.checked) { 
            document.body.classList.add('is-dark')
            localStorage.setItem('toggle_desktop', 'is-dark');
            localStorage.setItem('toggle_mobile', 'is-dark');
        } else {
            document.body.classList.remove('is-dark')
            localStorage.setItem('toggle_desktop', '');
            localStorage.setItem('toggle_mobile', '');
        } 
    }
    
}

var toggle_mobile = document.getElementById('theme-toggle');
if(toggle_mobile){
    init_theme();

    toggle_mobile.addEventListener('change', function(event){
        resetTheme();
    });

    function init_theme(){
        var darkThemeSelected = (localStorage.getItem('toggle_mobile') !== null && localStorage.getItem('toggle_mobile') === 'is-dark');
        toggle_mobile.checked = darkThemeSelected;
        darkThemeSelected ? document.body.classList.add('is-dark') : document.body.classList.remove('is-dark');
    }

    function resetTheme() {
        if(toggle_mobile.checked) { 
            document.body.classList.add('is-dark')
            localStorage.setItem('toggle_mobile', 'is-dark');
            localStorage.setItem('toggle_desktop', 'is-dark');
        } else {
            document.body.classList.remove('is-dark')
            localStorage.setItem('toggle_mobile', '');
            localStorage.setItem('toggle_desktop', '');
        } 
    }
    
}