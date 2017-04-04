


function Animator(animation) 
{
    
    this._lastTime;
    this._animation = animation;
    this._stop = false;
    
    
    this.stop = function()
    {
        this._stop = true;
    };
    
    
    this.start = function()
    {
        this._stop = false;
        this.requestNextFrame();
   };
   
        
    this._step = function(now) 
    {
        if(this._stop)
        {
            return;
        }
        
        var deltaTime  = (now - (this.lastTime || now)) / 1000;
        
        //A simple fix so that the time scale isn't messed up when the user changes windows or tabs
        if(deltaTime > .03)
        {
            deltaTime = .016;
        }    

        this.lastTime = now;


        this._animation(deltaTime);
        this.requestNextFrame();
    };
    
    
    this.requestAnimationFramePolyFill = 
        window.requestAnimationFrame        || 
        window.webkitRequestAnimationFrame  || 
        window.mozRequestAnimationFrame     ||
        function(callback)
        {
            window.setTimeout(callback, 1000 / 60);
        };
        
        
    this.requestNextFrame = function()
    {
        var animatorObject = this;
        
        this.requestAnimationFramePolyFill.call
        (
            window,
            function(now)
            {
                animatorObject._step(now);
            }
        );  
    };    
    
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
        
        
        
        
        if(flexItems[i].getBoundingClientRect().left + flexItemHalfWidth > (box.left + box.width / 2) - flexItems[i].getBoundingClientRect().width &&
           flexItems[i].getBoundingClientRect().left + flexItemHalfWidth < (box.left + box.width / 2) + flexItems[i].getBoundingClientRect().width)
        {
            flexItems[i].querySelector('a').className = "hover";
        }
        else
        {
            flexItems[i].querySelector('a').className = "";
        }
        
        
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




var animator = new Animator(rotateFlexItems);

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

    animator.start();
}




function executeMobileJavascript()
{
    var elements    = document.getElementsByClassName("flex_item");

    for (var i = 0; i < elements.length; i++) 
    {
        elements[i].querySelector('a').className += " hover";
    }
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
    
}
/*self explanatory*/
runJavascript();