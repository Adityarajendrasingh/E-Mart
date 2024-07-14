$(document).ready(function(){
    $('#index_banner .owl-carousel').owlCarousel({
        nav:true,
        loop:true,
        dots:false,
        items:1
    })
    $('#top-sale .owl-carousel').owlCarousel({
        loop:true,
        nav:true,
        dots:false,
        responsiveClass:true,
        responsive:{
            0:{
                items:2,
                
            },
            
            750:{
                items:2,
                
            },
            850:{
                items:3
            },
            1200:{
                items:4,
                
             }
        }
      
    })
    $('#new-brand .owl-carousel').owlCarousel({
        loop:true,
        nav:false,
        dots:false,
        responsiveClass:true,
        responsive:{
            0:{
                items:2,
                
            },
            
            750:{
                items:2,
                
            },
            850:{
                items:3
            },
            1200:{
                items:4,
                
             }
        }
      
    })
    $('#comment_section .owl-carousel').owlCarousel({
        loop:true,
        nav:true,
        dots:true,
        responsiveClass:true,
        lazyLoad:true,
        loop:true,
        items:1
        
    })
    //isotop
    var $grid = $(".grid").isotope({
        itemSelector:'.grid-item',
        layoutMode:'fitRows'
    })

    //filter items on button click
    $(".button-group").on("click","button",function(){
        var filterValue = $(this).attr('data-filter');
        $grid.isotope({filter:filterValue});
    });

    //blogs
    $("#blogs .owl-carousel").owlCarousel({
        loop:true,
        nav:false,
        dots:true,
        responsive:{
            0:{
                items:1,
                
            },
            530:{
                items:2,
            },
            
            800:{
                items:3,
                
            }
         }

    })
    
});

