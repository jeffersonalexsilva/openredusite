jQuery(document).ready(function(){
    var customGalleries = jQuery('.responsive-lightbox-popup'),
        selector = 'a[href$=".gif"], a[href$=".jpg"], a[href$=".jpeg"], a[href$=".png"], a[href$=".bmp"], a[href*="youtube.com/w"], a[href*="youtu.be"], a[href*="vimeo.com/c"]',
        galleryOptions = { selector: selector };

    /**
     * If there are custom elements defined as lightbox galleries, initialize the lightGallery on each gallery separately,
     * otherwise initialize it on whole page
     */
    if(customGalleries.length){
        customGalleries.lightGallery(galleryOptions);
    }else{
        jQuery('body').lightGallery(galleryOptions);
    }
});