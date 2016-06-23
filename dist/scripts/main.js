( function( $ ) {

    /**
     * Add drop-down list functionality using `ul`
     * 
     * Usage:   `<ul class="dropdown">`
     *          `<button class="dropdown-link">Select</button>`
     *          `<ul class="dropdown-list">`
     *
     */
    $('.dropdown').click(function(event) {
        $(this).toggleClass('show');
        console.log('click');
    });  

    /**
     * Add back to top functionality
     * 
     * Usage:  `<a class="back-to-top" href="#"><i class="icon"></i><span class="screen-reader-text">Back to Top</span></a>`
     */
    $('a[href=#top]').click(function(event){
        $('html, body').animate({
            scrollTop:0
        }, 'slow');
        return false;
    });

    var offset = 250;
    var duration = 300;
     
    $(window).scroll(function() {
     
        if ($(this).scrollTop() > offset) {
         
            $('.back-to-top').fadeIn(duration);
         
        } else {
         
            $('.back-to-top').fadeOut(duration);
         
        }
     
    });
          
    $('.back-to-top').click(function(event) {
     
        event.preventDefault();
         
        $('html, body').animate({scrollTop: 0}, duration);
         
        return false;
     
    })

   
} )( jQuery );
