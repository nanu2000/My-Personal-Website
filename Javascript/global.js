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
function createCookie(name, value, hours)
{
    if (hours)
    {
        var date = new Date();
        date.setTime(date.getTime()+(hours*60*60*1000));
        var expires = "; expires="+date.toGMTString();
    }
    else
    {
        var expires = "";
    }

    document.cookie = name+"="+value+expires+"; path=/";
}

function setBackgroundDelay()
{
    var time = -(Date.now() - getCookie("startTime"))+"ms";

    if(document.body !== null)
    {
        document.body.style.WebkitAnimationDelay     =  time;
        document.body.style.animationDelay           =  time;
    }
}

if(getCookie("startTime") === "")
{
   createCookie("startTime", Date.now(), 12);    
}
