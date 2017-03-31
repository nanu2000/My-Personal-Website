
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



    
var flexItems;

var resizeFunction = function()
{
    resetFlexItemPositions();
};

window.addEventListener("resize", resizeFunction);

function rotateFlexItems(deltaTime)
{
    
    var itemContainer = document.getElementById('flex_item_container');
    
    var box = itemContainer.getBoundingClientRect();
        
    
    for(var i = 0; i < flexItems.length; i++)
    {
        
        flexItems[i].style.left = parseFloat(flexItems[i].style.left, 10) + 3 + "px";
       
        
        var carouselRightRect = document.getElementById('carousel_right').getBoundingClientRect();
        var carouselLeftRect  = document.getElementById('carousel_left').getBoundingClientRect();
        
        if( (parseFloat(flexItems[i].getBoundingClientRect().left) > carouselRightRect.left) || 
            (parseFloat(flexItems[i].getBoundingClientRect().right) < carouselLeftRect.right))
        {
            //flexItems[i].style.visibility = "hidden";
        }
        else
        {
            flexItems[i].style.visibility = "visible";            
        }
        
        
        
        
        
    
        if(parseFloat(flexItems[i].getBoundingClientRect().left) > box.right )
        {
            
            flexItems[i].style.left = 
            (
            //-(box.width) (0-flexItems[i].startPosition.left = absolute left of screen)
           -flexItems[i].startPosition.left + box.left
                 
            ) + "px"; 
//          
//                
//                flexItems[i].style.left = 
//               -flexItems[i].startPosition.left + 
//                (flexItems[(i + 1) % flexItems.length].getBoundingClientRect().left - 
//                flexItems[i].getBoundingClientRect().width ) + "px";
        
        }      
        
       // flexItems[i].style.left = box.left - (flexItems[i].startPosition.left * itemContainer.percentComparedToStartWidth);
        
        
        
    }
    
    
    
}
function resetFlexItemPositions()
{
    for(var i = 0; i < flexItems.length; i++)
    {
        flexItems[i].style.left = "0px";
        flexItems[i].startPosition = flexItems[i].getBoundingClientRect();
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




var deltaTime = 0;
var lastTime = 0;

function step(timestamp) 
{
    if(lastTime === null)
    {
        lastTime = timestamp;
    }

    deltaTime = (timestamp - lastTime) / 1000;
    rotateFlexItems(deltaTime);
    window.requestAnimFrame(step);  
    lastTime = timestamp;
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
    initFlexItems();
    
    
}

/*self explanatory*/
runJavascript();