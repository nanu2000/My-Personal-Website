
/***************************************************************************
 * The Carousel Items are moved by their local position, not absolute. This
 * makes it hard to calculate new positions because the getBoundingClientRect Function
 * returns an absolute position, and not a relative position. 
 * The Carousel Object contains functions that convert local positions to absolute positions
 * making it easier to compare positions with other Carousel Objects.
 ***************************************************************************
 
 *****************************************************************************
 * This Object represents a single item on the carousel. 
 * An array of these Items are created and updated in the carousel object.
 ***************************************************************************/

function CarouselItem(element)
{
    this._element = element;
    this._startPosition;
    this._centerAdditor;
    this._currentTranslateX;
    this._currentLoopPosition;
    this._element.getRectWithCenter     = getBoundingClientRectWithCenter(this._element);
    this._currentOrientation            = this._element.getRectWithCenter();
    
    this.initialiseBasedOnContainer = function(containerOrientation, amountOfItemsInContainer)
    {
        
        //The containers width minus the width of all the carousel Items widths combined, divided by two.
        //if we use this as the new translateX position, it will align all of the carousel items right next to eachother
        //and center all of them as a group inside of the container.
        var newLocationBasedOnContainerWidth = (containerOrientation.width - (this._currentOrientation.width * amountOfItemsInContainer)) / 2;
        
        this._centerAdditor = newLocationBasedOnContainerWidth;
        this.setXPosition(newLocationBasedOnContainerWidth);
        this._startPosition = this._currentOrientation;
        
        this._currentLoopPosition = this._getNewLoopPosition(containerOrientation, amountOfItemsInContainer);
        
    };
    
    //returns the absolute position at the end of the container bounds (the loop position) 
    //
    //right side of container - 
    //(container width - (width of all items)) / 2 -
    //half the width of an item    
    this._getNewLoopPosition = function(containerOrientation, amountOfItemsInContainer)
    {
        return      containerOrientation.right  - 
                    (containerOrientation.width - (this._currentOrientation.width * amountOfItemsInContainer)) / 2 - 
                    this._currentOrientation.width / 2;
    };    
    
    this.getCurrentXTranslation = function()
    {
        return this._currentTranslateX;
    };
    
    this.getRect = function()
    {
        return this._currentOrientation;
    };
    
    this.getElement = function()
    {
        return this._element;
    };
    
    //returns the relative position x needs to be to get an absolute position of zero (x).
    this.getZeroPosition = function()
    {
        return -(this._startPosition.left - this._centerAdditor);  
    };
        
    this.getCurrentLoopPosition = function()
    {
        return this._currentLoopPosition;
    };
    
    this.shouldLoop = function()
    {
        return this._currentOrientation.left >= this._currentLoopPosition;
    };
    
    this.setXPosition = function(newXPosition)
    {
        this._currentTranslateX         = newXPosition;
        this._element.style.transform   = "translateX(" + newXPosition + "px)";
        this._currentOrientation        = this._element.getRectWithCenter();
    };
    
    this.addToXPosition = function(additor)
    {
        this.setXPosition(this._currentTranslateX + additor);   
    };
    
    this.isGreaterThan = function(other)
    {
        return this._element.getBoundingClientRect().left > other._element.getBoundingClientRect();
    };
    
}

 /***************************************************************************
 * The Carousel Object Creates and Controls a group of Carousel Items.
 * The update function will update the Carousel one tick. Because of that, it is best
 * to pass the update function to an animator class and then run it. 
 ***************************************************************************/

function Caurousel(containerElement, itemElements, pxPerSecond, operationsOnIndividualUpdate)
{
    this._container         = containerElement;
    this._items             = Array.from(itemElements);  
    this._pxPerSecond       = pxPerSecond;
    
    this._performOperationsOnIndividualUpdate    = operationsOnIndividualUpdate;
    this._container.getRectWithCenter            = getBoundingClientRectWithCenter(this._container);
    
    this._currentContainerOrientation;
    

    this.initialise = function()
    {
        
        for(var i = 0; i < this._items.length; i++)
        {
            this._items[i] = new CarouselItem(this._items[i]);
        }

        this._items.sort(function(a, b) 
        {
            return a.isGreaterThan(b);
        });

        this._currentContainerOrientation = this._container.getRectWithCenter();
        
        this._initialiseAllItemPositionsBasedOnContainer();   
        
    };
    
    this._initialiseAllItemPositionsBasedOnContainer = function()
    {
        for(var i = 0; i < this._items.length; i++)
        {
            this._items[i].initialiseBasedOnContainer(this._currentContainerOrientation, this._items.length);
        }
    };
    
    this._containerOrientationHasChanged = function()
    {
        var newOrientation = this._container.getRectWithCenter();
        
        if(this._currentContainerOrientation.width !== newOrientation.width)
        {
            this._currentContainerOrientation = newOrientation;
            return true;
        }
        
        return false;
    };
    
    
    this._loopItem = function(flexItemToBeLooped)
    {
        //The Item that's in front of the flexItemToBeLooped
        var brotherItem = this._items[(flexItemToBeLooped + 1) % this._items.length];

        var positionBehindBrother   = 
            this._items[flexItemToBeLooped].getZeroPosition()    + 
            (brotherItem.getRect().left - this._items[flexItemToBeLooped].getRect().width);
        
        this._items[flexItemToBeLooped].setXPosition(positionBehindBrother);       
        
    };
    
    
    this._updateItem = function(item, deltaTime)
    {
        
        var operationInfo =
        {
            carouselItemContainerOrientation    : this._currentContainerOrientation, 
            currentItem                         : item, 
            deltaTime                           : deltaTime, 
            pxPerSecond                         : this._pxPerSecond
        };
        
        this._performOperationsOnIndividualUpdate(operationInfo);
        
        item.addToXPosition(deltaTime * this._pxPerSecond);
        
    };
    
    this.update = function(deltaTime)
    {

        if(this._containerOrientationHasChanged())
        {
            this._initialiseAllItemPositionsBasedOnContainer();     
        }
        
        var flexItemToBeLooped = false;

        for(var i = 0; i < this._items.length; i++)
        {
            
            if(this._items[i].shouldLoop())
            {
                flexItemToBeLooped = i;
                continue;   //Since we are going to loop this item we don't need to update it.
            }
            
            this._updateItem(this._items[i], deltaTime);
        }
        
        if(flexItemToBeLooped !== false)
        {
            this._loopItem(flexItemToBeLooped);
        }
    };
}


 /*********************************************************************************************
 * The Animator Object will execute the animation function passed into it's constructor
 * every ~~.016 seconds (60fps).
 * if the deltaTime (normally valued at about .016) is greater than the deltaTimeResetBuffer
 * then the deltaTime will set itself to .016.
 **********************************************************************************************/

function Animator(animation, deltaTimeResetBuffer) 
{
    this._lastTime;
    this._animation = animation;
    this._stopped = true;
    this._deltaTimeResetBuffer = deltaTimeResetBuffer || .1;
    
    this.stop = function()
    {
        this._stopped = true;
    };
    
    this.start = function()
    {
        this._stopped = false;
        this._requestNextFrame();
    };

    this.isRunning = function()
    {
        return !this._stopped;
    };
    
    this._requestAnimationFramePolyFill = 
        window.requestAnimationFrame        || 
        window.webkitRequestAnimationFrame  || 
        window.mozRequestAnimationFrame     ||
        function(callback)
        {
            window.setTimeout(callback, .016);
        };
        
    this._step = function(now) 
    {
        if(this._stop)
        {
            return;
        }
        
        //Simple deltaTime Calculation
        var deltaTime  = (now - (this.lastTime || now)) / 1000;
        
        //A simple fix so that the time scale isn't messed up when the user changes windows or tabs
        if(deltaTime > this._deltaTimeResetBuffer)
        {
            deltaTime = .016;
        }    

        this.lastTime = now;
        this._animation(deltaTime);
        this._requestNextFrame();
    };
    
    this._requestNextFrame = function()
    {
        var animatorObject = this;
        
        this._requestAnimationFramePolyFill.call
        (
            window,
            function(now)
            {
                animatorObject._step(now);
            }
        );  
    };    
}

function getBoundingClientRectWithCenter(element)
{
    return function()
    {
        var rect        = element.getBoundingClientRect();
        rect.center     = rect.left + rect.width / 2;
        return rect;
    };
}  

/*******************************************************/
/*******************************************************/

function performOperationsOnIndividualItemUpdate()
{
    return function(operationInfo)
    {

        var itemRect = operationInfo.currentItem.getRect();

        if(itemRect.center > operationInfo.carouselItemContainerOrientation.center - itemRect.width &&
           itemRect.center < operationInfo.carouselItemContainerOrientation.center + itemRect.width) 
        {
            operationInfo.currentItem.getElement().querySelector('a').className = "hover";
        }
        else
        {
            operationInfo.currentItem.getElement().querySelector('a').className = "";
        }
    };
}

function runCarousel()
{ 

    var carousel = new Caurousel
    (
        document.getElementById         ('portfolio_item_container'),
        document.getElementsByClassName ('portfolio_item'), 
        20,
        performOperationsOnIndividualItemUpdate()
    );
    
    carousel.initialise();
    
    var animator = new Animator
    (
        function(dt)
        {
            carousel.update(dt);
        }
    );

    animator.start();
}

/**************************
 *Runs when file is loaded.
 *This is the entry function.
 **************************/
function runJavascript()
{
    
    if (!Array.from) 
    {
        Array.from = getArrayFromPolyfill() ;
    }
    
    runCarousel();
    
}
/*self explanatory*/
runJavascript();



/*---------------------------------------------------------------------------------------------------------|
|**********************************************************************************************************|
|**********************************************************************************************************|
| Used code from https://developer.mozilla.org/en/docs/Web/JavaScript/Reference/Global_Objects/Array/from  |
|**********************************************************************************************************|
|**********************************************************************************************************|
-----------------------------------------------------------------------------------------------------------*/
function getArrayFromPolyfill() 
{
    var toStr = Object.prototype.toString;

    var isCallable = function (fn) 
    {
        return typeof fn === 'function' || toStr.call(fn) === '[object Function]';
    };

    var toInteger = function (value) 
    {
        var number = Number(value);
        if (isNaN(number)) 
        { 
            return 0; 
        }
        if (number === 0 || !isFinite(number)) 
        { 
            return number; 
        }
        return (number > 0 ? 1 : -1) * Math.floor(Math.abs(number));
    };
    var maxSafeInteger = Math.pow(2, 53) - 1;
    var toLength = function (value) 
    {
        var len = toInteger(value);
        return Math.min(Math.max(len, 0), maxSafeInteger);
    };
    /*Used code from https://developer.mozilla.org/en/docs/Web/JavaScript/Reference/Global_Objects/Array/from*/
    return function from(arrayLike) 
    {
        var C = this;
        var items = Object(arrayLike);
        if (arrayLike === null) 
        {
          throw new TypeError("Array.from requires an array-like object - not null or undefined");
        }
        var mapFn = arguments.length > 1 ? arguments[1] : void undefined;
        var T;
        if (typeof mapFn !== 'undefined') 
        {
            if (!isCallable(mapFn)) 
            {
                throw new TypeError('Array.from: when provided, the second argument must be a function');
            }

            if (arguments.length > 2) 
            {
                T = arguments[2];
            }
        }
        var len = toLength(items.length);
        var A = isCallable(C) ? Object(new C(len)) : new Array(len);
        var k = 0;
        var kValue;
        while (k < len) 
        {
          kValue = items[k];
          if (mapFn) 
          {
            A[k] = typeof T === 'undefined' ? mapFn(kValue, k) : mapFn.call(T, kValue, k);
          } 
          else 
          {
            A[k] = kValue;
          }
          k += 1;
        }
        A.length = len;
        return A;
    };
    
}
/*End of used code from https://developer.mozilla.org/en/docs/Web/JavaScript/Reference/Global_Objects/Array/from*/