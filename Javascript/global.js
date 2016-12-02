function getCookie(cname) 
{
    var name = cname + "=";
    
    var ca = document.cookie.split(';');
    
    for(var i = 0; i <ca.length; i++) 
    {
        
        var c = ca[i];
        
        while (c.charAt(0)===' ') 
        {
            c = c.substring(1);
        }
        if (c.indexOf(name) === 0) 
        {
            return c.substring(name.length,c.length);
        }
        
    }
    
    return "";
}

(function(exports, d) 
{
    function domReady(fn, context) 
    {

        function onReady(event) 
        {
            d.removeEventListener("DOMContentLoaded", onReady);
            fn.call(context || exports, event);
        }

        function onReadyIe(event) 
        {
            if (d.readyState === "complete") 
            {
                d.detachEvent("onreadystatechange", onReadyIe);
                fn.call(context || exports, event);
            }
        }
        
        d.addEventListener && d.addEventListener("DOMContentLoaded", onReady) ||
        d.attachEvent      && d.attachEvent("onreadystatechange", onReadyIe);
    }
    
    exports.domReady = domReady;
    
})(window, document);


if(getCookie("startTime") === "")
{
    document.cookie = "startTime="+Date.now();    
}


function setBackgroundDelay()
{
    document.getElementsByTagName("body")[0].style.WebkitAnimationDelay = -(Date.now() - getCookie("startTime"))+"ms";
    document.getElementsByTagName("body")[0].style.animationDelay =  -(Date.now() - getCookie("startTime"))+"ms";
}


domReady(function(event) {
  setBackgroundDelay();
});
