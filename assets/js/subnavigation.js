$('document').ready(function() {
   $('nav.menu--sub li').on('click', function() {
       $('nav.menu--sub li.active').removeClass('active');
       $(this).addClass('active');
       $('.sub-item.sub-item--active').removeClass('sub-item--active');
       var section = $(this).data('section');
       $('.sub-item#' + section).addClass('sub-item--active');
   })
});