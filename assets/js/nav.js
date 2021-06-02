/*===== SHOW NAVBAR  =====*/ 
const showNavbar = (toggleId, navId, bodyId, headerId) =>{
    const toggle = document.getElementById(toggleId),
    nav = document.getElementById(navId),
    bodypd = document.getElementById(bodyId),
    headerpd = document.getElementById(headerId)

    // Validate that all variables exist
    if(toggle && nav && bodypd && headerpd){
        toggle.addEventListener('click', ()=>{
            // show navbar
            nav.classList.toggle('showing')
            // change icon
            toggle.classList.toggle('bx-x')
            // add padding to body
            bodypd.classList.toggle('body-pd')
            // add padding to header
            headerpd.classList.toggle('body-pd')
        })
    }
}

showNavbar('header-toggle','nav-bar','body-pd','header')

/*===== LINK ACTIVE  =====*/ 

function admin() {
    let pageName = location.pathname.split('/').slice(-1)[0];
    let currentLink = $('.admin_nav_list a[href*="/admin/'+pageName+'"]');
    if (currentLink) {
      $('.admin_nav_list .admin_nav_link').removeClass('active');
      currentLink.addClass('active');
    }
}

function users() {
    let pageName = location.pathname.split('/').slice(-1)[0];
    let currentLink = $('.user_nav_list a[href*="/users/'+pageName+'"]');
    if (currentLink) {
      $('.user_nav_list .user_nav_link').removeClass('active');
      currentLink.addClass('active');
    }
}

     
        
        
        
        
        
        
        
        
        
        
    
        modal.find('.modal-body #subuser_id').val(accountant_id);
        
 
