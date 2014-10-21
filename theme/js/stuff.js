$(document).ready(function() {

    var $window = $(window)
    
    $('.selectAll').click(function(){
        $(this).closest('.convrt-box').find('textarea').select();
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

// Borrowed from phpBB's forum_fn.js file
function selectCode(a)
{
    // Get ID of code block
    var e = a.parentNode.parentNode.parentNode.getElementsByTagName('PRE')[0];

    // Not IE and IE9+
    if (window.getSelection)
    {
        var s = window.getSelection();
        // Safari
        if (s.setBaseAndExtent)
        {
            s.setBaseAndExtent(e, 0, e, e.innerText.length - 1);
        }
        // Firefox and Opera
        else
        {
            // workaround for bug # 42885
            if (window.opera && e.innerHTML.substring(e.innerHTML.length - 4) == '<BR>')
            {
                e.innerHTML = e.innerHTML + '&nbsp;';
            }

            var r = document.createRange();
            r.selectNodeContents(e);
            s.removeAllRanges();
            s.addRange(r);
        }
    }
    // Some older browsers
    else if (document.getSelection)
    {
        var s = document.getSelection();
        var r = document.createRange();
        r.selectNodeContents(e);
        s.removeAllRanges();
        s.addRange(r);
    }
    // IE
    else if (document.selection)
    {
        var r = document.body.createTextRange();
        r.moveToElementText(e);
        r.select();
    }
}