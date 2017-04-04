
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


function CarouselItem(element)
{
    
    this._element = element;
    
    this._startPosition;
    this._centerAdditor;
    this._currentTranslateX;
    
    
    this.getCurrentXTranslation = function()
    {
        return this._currentTranslateX;
    };
    
    
    this.updateXPosition = function(newXPosition)
    {
        this._currentTranslateX = newXPosition;
        this._element.style.transform = "translateX(" + newXPosition + "px)";
    };
    
    
    this.getRect = function()
    {
        return this._element.getBoundingClientRect();
    };
    
    
    this.getCenter = function()
    {
        return this.getRect().left + this.getRect().width / 2;
    };
    
    
    this.getZeroPosition = function()
    {
        return -(this._startPosition.left - this._centerAdditor);  
    };
        
        
    this.getLoopPosition = function(containerOrientation, amountOfItemsInContainer)
    {
        
        var lengthOfSlides      = this.getRect().width * amountOfItemsInContainer;

        var flexItemHalfWidth   = this.getRect().width / 2;

        var sidePadding         = (containerOrientation.width - lengthOfSlides) / 2;

        return containerOrientation.right - sidePadding - flexItemHalfWidth;

    };
    
    
    this.recalculateAndResetToNewPosition = function(containerWidth, amountOfItems)
    {
        
        var lengthOfAllSlides   = this.getRect().width * amountOfItems;

        var startOfContainer    = (containerWidth - lengthOfAllSlides) / 2;
        
        this._centerAdditor = startOfContainer;
        this.updateXPosition(startOfContainer);
        this._startPosition = this.getRect();
    };
    
}

function Caurousel(containerAlias, itemAlias, pxPerSecond)
{
    
    this.container;
    this.items = Array();

    this.currentContainerOrientation;
    
    this._pxPerSecond = pxPerSecond;
    
    
    this.initialise = function()
    {
        var domItems    = document.getElementsByClassName(itemAlias);
        this.container  = document.getElementById(containerAlias);


        for(var i = 0; i < domItems.length; i++)
        {
            this.items.push(new CarouselItem(domItems[i]));
        }

        this.items.sort(function(a,b) 
        {
            return a.getRect().left > b.getRect().left;
        });

        this.currentContainerOrientation = this.container.getBoundingClientRect();

        this.resetAllItemPositions();   
    };
    
    
    this.resetAllItemPositions = function()
    {
        for(var i = 0; i < this.items.length; i++)
        {
            this.items[i].recalculateAndResetToNewPosition(this.currentContainerOrientation.width, this.items.length);
        }
    };
    
    
    this.containerOrientationHasChanged = function()
    {
        var newRect = this.container.getBoundingClientRect();
        if
        (
            this.currentContainerOrientation.width  !== newRect.width || 
            this.currentContainerOrientation.left   !== newRect.left || 
            this.currentContainerOrientation.top    !== newRect.top 
        )
        {
            this.currentContainerOrientation = newRect;
            return true;
        }
        
        return false;
    };
    
    
    this.getContainerCenter = function()
    {
        return this.currentContainerOrientation.left + this.currentContainerOrientation.width / 2;
    };
    
    
    this.loopItem = function(flexItemToBeLooped)
    {
        
        var brother = this.items[(flexItemToBeLooped + 1) % this.items.length];

        var positionBehindBrother   = 
            this.items[flexItemToBeLooped].getZeroPosition()    + 
            (brother.getRect().left - this.items[flexItemToBeLooped].getRect().width);
        
        this.items[flexItemToBeLooped].updateXPosition(positionBehindBrother);       
        
    };
    
    
    this.updateItem = function(index, deltaTime)
    {
        var itemRect = this.items[index].getRect();

        if(itemRect.left >= this.items[index].getLoopPosition(this.currentContainerOrientation, this.items.length)) 
        {
            // we cant loop the item here because perhaps not all of the items had pxPerSecond * deltaTime added to them. 
            // We return the index to notify the caller that this item needs to be looped
            return index;         
        }    

        if(this.items[index].getCenter() > this.getContainerCenter() - itemRect.width &&
           this.items[index].getCenter() < this.getContainerCenter() + itemRect.width)
        {
            this.items[index]._element.querySelector('a').className = "hover";
        }
        else
        {
            this.items[index]._element.querySelector('a').className = "";
        }
        
        var finalTransformation = this.items[index].getCurrentXTranslation() + deltaTime * this._pxPerSecond;
        
        this.items[index].updateXPosition(finalTransformation);
        
        return -1;

    };
    
    
    this.update = function(deltaTime)
    {

        if(this.containerOrientationHasChanged())
        {
            this.resetAllItemPositions();
        }
        
        var flexItemToBeLooped = -1;
        
        for(var i = 0; i < this.items.length; i++)
        {
            var itemShouldBeLooped = this.updateItem(i, deltaTime);
            
            if(itemShouldBeLooped !== -1)
            {
                flexItemToBeLooped = itemShouldBeLooped;
            }
        }

        if(flexItemToBeLooped !== -1)
        {
            this.loopItem(flexItemToBeLooped);
        }
    };
    
}


function initFlexItems()
{ 
    
    var carousel = new Caurousel('flex_item_container', 'flex_item', 30);
    
    carousel.initialise();
    
    var animator = new Animator(carousel.update.bind(carousel));

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