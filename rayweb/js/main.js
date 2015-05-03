$(document).ready(function(){ 

    $('#examples img').hover(function () { 
        var $imgObj = $(this);

        // class name
        var sClass = $(this).attr('class');

        // radius
        var iRad = 0;

        // interval
        var iInt;
        if (iInt) window.clearInterval(iInt);

        // loop until end
        iInt = window.setInterval(function() {
            var iWidth = $imgObj.width();
            var iHalfWidth = iWidth / 2;
            var iHalfHeight = $imgObj.height() / 2;

            if (sClass == 'type1') {
                $imgObj.css('-webkit-mask', '-webkit-gradient(radial, '+iHalfWidth+' '+iHalfHeight+', '+ iRad +', '+iHalfWidth+' '+iHalfHeight+', '+ (iRad + 30) +', from(rgb(0, 0, 0)), color-stop(0.5, rgba(0, 0, 0, 0.2)), to(rgb(0, 0, 0)))');
            } else if (sClass == 'type2') {
                $imgObj.css('-webkit-mask', '-webkit-gradient(radial, '+iHalfHeight+' '+iHalfHeight+', '+ iRad +', '+iHalfHeight+' '+iHalfHeight+', '+ (iRad + 30) +', from(rgb(0, 0, 0)), color-stop(0.5, rgba(0, 0, 0, 0.2)), to(rgb(0, 0, 0)))');
            }

            // when radius is more than our width - stop loop
            if (iRad > iWidth) {
                window.clearInterval(iInt);
            }

            iRad+=2;
        }, 10);
    }); 
});