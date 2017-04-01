
/*toggles more button to be selected. white with black text for button and children are set to block display.*/
function moreButtonOn(showNavbarAStyle, navbarMoreStyle)
{
    showNavbarAStyle.color              = "#040b25";
    showNavbarAStyle.backgroundColor    = "white";
    navbarMoreStyle.display             = "block";
}

/*toggles more button to be not selected. (initial coloring and children hidden)*/
function moreButtonOff(showNavbarAStyle, navbarMoreStyle)
{
    showNavbarAStyle.color              = "";
    showNavbarAStyle.backgroundColor    = "";
    navbarMoreStyle.display             = "none";
}


 /*******************************************************************************************************
 *Javascipt to be ran when the more button is pressed.
 *Toggles display of more Items and adds selection coloring 
 *******************************************************************************************************/
moreMenuOnclickHandler = function(showNavbarAStyle, navbarMoreStyle) 
{
    return function() 
    {
        if(navbarMoreStyle.display !== "none")
        {
            moreButtonOff(showNavbarAStyle, navbarMoreStyle);
        }
        else
        {
            moreButtonOn(showNavbarAStyle, navbarMoreStyle);
        }
    };
};
   
 /*******************************************************************************************************
 * Sets onclick handler for 'more' button, and toggles the more button to be off.
 *******************************************************************************************************/
function setupMoreMenu()
{    
    var showNavbarAStyle = document.getElementById("show_navbar").querySelector('a').style;
    var navbarMoreStyle = document.getElementById("navbar_more").style;
    
    moreButtonOff(showNavbarAStyle, navbarMoreStyle);
    
    document.getElementById("show_navbar").onclick = moreMenuOnclickHandler(showNavbarAStyle, navbarMoreStyle);
};

function executeMobileJavascript()
{
    var elements    = document.getElementsByClassName("flex_item");
    var navElements = document.getElementsByClassName("text_link");

    for (var i = 0; i < navElements.length; i++) 
    {
         navElements[i].className += " mobile";
    }
    for (var i = 0; i < elements.length; i++) 
    {
        elements[i].querySelector('a').className += " hover";
    }
}



function resetFlexItemPositions()
{
        
    var itemContainer = document.getElementById('flex_item_container');

    var box = itemContainer.getBoundingClientRect();


        
    for(var i = 0; i < flexItems.length; i++)
    {
        
        var lengthOfSlides      = flexItems[i].getBoundingClientRect().width * flexItems.length;

        var sidePadding         = (box.width - lengthOfSlides) / 2;
        
        var startOfContainer    = Math.round(sidePadding);
 
 
 
        flexItems[i].centerAdditor = startOfContainer;
        flexItems[i].style.left = startOfContainer + "px";
        flexItems[i].startPosition = flexItems[i].getBoundingClientRect();
        flexItems[i].accumulator = 0;
    }
    
    
    
}

var resizeFunction = function()
{
    resetFlexItemPositions();
};

window.addEventListener("resize", resizeFunction);
    
    
    
    
    
var flexItems;
var pxPerSecond = 100;
function rotateFlexItems(deltaTime)
{
    
    var flexItemToBeLooped = -1;
    
    for(var i = 0; i < flexItems.length; i++)
    {
        
        
        var leftAdditionFloat = parseFloat(flexItems[i].style.left, 10) + deltaTime * pxPerSecond;
        
        var finalTransformation = Math.round(leftAdditionFloat);
       
       
        var itemContainer = document.getElementById('flex_item_container');

        var box = itemContainer.getBoundingClientRect();
        
    
        var lengthOfSlides = flexItems[i].getBoundingClientRect().width * flexItems.length;
        
        var flexItemHalfWidth = flexItems[i].getBoundingClientRect().width / 2;
        
        var sidePadding = (box.width - lengthOfSlides) / 2;
        
        
        if(flexItems[i].getBoundingClientRect().left >= box.right - sidePadding - flexItemHalfWidth) 
        {
            
            flexItemToBeLooped = i; // we cant loop the item here because perhaps not all of the items had pxPerSecond * deltaTime added to them.
                    
        }    
        
            
        flexItems[i].style.left = finalTransformation + "px";
        
    }
    
    
    
    if(flexItemToBeLooped !== -1)
    {
        var brother = flexItems[(flexItemToBeLooped + 1) % flexItems.length];

        var dist = -(flexItems[flexItemToBeLooped].startPosition.left - flexItems[flexItemToBeLooped].centerAdditor);

        dist += brother.getBoundingClientRect().left;

        dist -= brother.getBoundingClientRect().width;

        flexItems[flexItemToBeLooped].style.left = dist + "px";

    }
    
}
function initFlexItems()
{ 
    var items = document.getElementsByClassName("flex_item");
    
    flexItems = Array.prototype.slice.call(items, 0);
    
    flexItems.sort(function(a,b) 
    {
        return a.getBoundingClientRect().left > b.getBoundingClientRect().left;
    });
    
    resetFlexItemPositions();   

    window.requestAnimFrame(step);
}

window.requestAnimFrame = 
(
    function()
    {
        return      window.requestAnimationFrame        ||
                    window.webkitRequestAnimationFrame  ||
                    window.mozRequestAnimationFrame     ||
                    function( callback )
                    {
                        window.setTimeout(callback, 1000 / 60);
                    };
})();

var time;
function step(timestamp) 
{
    
    var now = timestamp;
    var dt = (now - (time || now)) / 1000;
 
    //A simple fix so that the time scale isn't messed up when the user changes windows or tabs
    if(dt > .03)
    {
        dt = .016;
    }    
 
    time = now;
    
    
    rotateFlexItems(dt);
    window.requestAnimFrame(step);  
}



/**************************
 *Runs when file is loaded.
 *This is the entry function.
 **************************/
function runJavascript()
{
    
    if ('ontouchstart' in window) 
    {     
        executeMobileJavascript();
    }
    
    setupMoreMenu();  
    
    
}
window.addEventListener("DOMContentLoaded", function() {
    initFlexItems();
    });
/*self explanatory*/
runJavascript();