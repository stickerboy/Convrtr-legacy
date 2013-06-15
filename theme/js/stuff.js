$(document).ready(function() {

    var $window = $(window)
    
    $('.selectAll').click(function(){
        $(this).closest('.convrt-box').find('textarea, code').select();
    });

    $(".sh").click(function(e){
        e.preventDefault(); 
        var thish = $(this);
        var ccs = $(this).closest('.convrt-box').find('.shh');					
    
        $(ccs).toggle(function() {
            if ($(this).css('display')=='none') {
                $(thish).text('Show');
            }
            else {
                $(thish).text('Hide');
            }
        });        
    });
    
    // make code pretty
    window.prettyPrint && prettyPrint();
});