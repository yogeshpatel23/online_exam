function openPopwin(){
    $('.pop-win').removeClass('hide');
  };
  
  function closePopwin(){
    $('.pop-win').addClass('hide');
  };
  
// ------------------------------------------------------- //
// Sidebar Functionality
// ------------------------------------------------------ //
$('#toggle-btn').on('click', function (e) {
    e.preventDefault();
    $(this).toggleClass('active');
    
    $('.side-navbar').toggleClass('shrinked');
    $('.content-inner').toggleClass('active');
    
    if ($(window).outerWidth() > 1183) {
        if ($('#toggle-btn').hasClass('active')) {
            $('.navbar-header .brand-small').hide();
            $('.navbar-header .brand-big').show();
        } else {
            $('.navbar-header .brand-small').show();
            $('.navbar-header .brand-big').hide();
        }
    }
    
    if ($(window).outerWidth() < 1183) {
        $('.navbar-header .brand-small').show();
    }
    });
    