
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
        
        var lengthOfSlides          = flexItems[i].getBoundingClientRect().width * flexItems.length;

        var startOfContainer         = (box.width - lengthOfSlides) / 2;
        
 
 
 
        flexItems[i].centerAdditor = startOfContainer;
        flexItems[i].updateXPosition(startOfContainer);
        flexItems[i].startPosition = flexItems[i].getBoundingClientRect();
        
    }
    
    
    
}  
    
    
var boxWidth = 0;
var flexItems;
var pxPerSecond = 30;
function rotateFlexItems(deltaTime)
{
    
    var flexItemToBeLooped = -1;
    
    var itemContainer = document.getElementById('flex_item_container');

    var box = itemContainer.getBoundingClientRect();
        
    if(boxWidth !== box.width)
    {
        resetFlexItemPositions();
        boxWidth = box.width;
    }
    
    
    for(var i = 0; i < flexItems.length; i++)
    {
       
    
        var lengthOfSlides = flexItems[i].getBoundingClientRect().width * flexItems.length;
        
        var flexItemHalfWidth = flexItems[i].getBoundingClientRect().width / 2;
        
        var sidePadding = (box.width - lengthOfSlides) / 2;
        
        
        if(flexItems[i].getBoundingClientRect().left >= box.right - sidePadding - flexItemHalfWidth) 
        {
            flexItemToBeLooped = i; // we cant loop the item here because perhaps not all of the items had pxPerSecond * deltaTime added to them.
        }    
        
            
        var finalTransformation = flexItems[i].lastTranslateX + deltaTime * pxPerSecond;
        flexItems[i].updateXPosition(finalTransformation);
    }
    
    
    
    if(flexItemToBeLooped !== -1)
    {
        var brother = flexItems[(flexItemToBeLooped + 1) % flexItems.length];

        var dist = -(flexItems[flexItemToBeLooped].startPosition.left - flexItems[flexItemToBeLooped].centerAdditor);

        dist += brother.getBoundingClientRect().left;

        dist -= brother.getBoundingClientRect().width;

        flexItems[flexItemToBeLooped].updateXPosition(dist);

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
    
    for(var i = 0; i < flexItems.length; i++)
    {
        flexItems[i].updateXPosition = function(newXPosition)
        {
            this.lastTranslateX = newXPosition;
            this.style.transform = "translateX(" + newXPosition + "px)";
        };
    }

        
    var itemContainer = document.getElementById('flex_item_container');

    var box = itemContainer.getBoundingClientRect();
    
    boxWidth = box.width;

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
    
    initFlexItems();
    
    setupMoreMenu();  
    
}
/*self explanatory*/
runJavascript();