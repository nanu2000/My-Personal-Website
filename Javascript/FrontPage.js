
function Animator(animation) 
{
    this._lastTime;
    this._animation = animation;
    this._stopped = true;
    this._deltaTimeResetBuffer = .1;
    
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
    
    this.requestAnimationFramePolyFill = 
        window.requestAnimationFrame        || 
        window.webkitRequestAnimationFrame  || 
        window.mozRequestAnimationFrame     ||
        function(callback)
        {
            window.setTimeout(callback, 1000 / 60);
        };
        
    this._step = function(now) 
    {
        if(this._stop)
        {
            return;
        }
        
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

function getBoundingClientRectWithCenter(element)
{
    return function()
    {
        var rect        = element.getBoundingClientRect();
        rect.center     = rect.left + rect.width / 2;
        return rect;
    };
}  

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

function Caurousel(containerElement, itemElements, pxPerSecond, operationsOnIndividualUpdate)
{
    
    this._container         = containerElement;
    this._items             = Array.from(itemElements);  
    this._pxPerSecond       = pxPerSecond;
    this._currentContainerOrientation;
    
    this._performOperationsOnIndividualUpdate    = operationsOnIndividualUpdate;
    this._container.getRectWithCenter            = getBoundingClientRectWithCenter(this._container);

    this.initialise = function()
    {
        
        for(var i = 0; i < this._items.length; i++)
        {
            this._items[i] = new CarouselItem(this._items[i]);
        }

        this._items.sort(function(a,b) 
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
        
        var brother = this._items[(flexItemToBeLooped + 1) % this._items.length];

        var positionBehindBrother   = 
            this._items[flexItemToBeLooped].getZeroPosition()    + 
            (brother.getRect().left - this._items[flexItemToBeLooped].getRect().width);
        
        this._items[flexItemToBeLooped].setXPosition(positionBehindBrother);       
        
    };
    
    
    this._updateItem = function(index, deltaTime)
    {
        var currentItem = this._items[index];
        
        if(currentItem.shouldLoop()) 
        {
            // if true then we cant loop the item here because perhaps not all of the items had pxPerSecond * deltaTime added to them. 
            // We return the index to notify the caller that this item needs to be looped and because we dont need to do anything else with this item.
            return index;         
        }    
        
        
        if(this._performOperationsOnIndividualUpdate(this._currentContainerOrientation, currentItem, deltaTime, this._pxPerSecond) === false)
        {
            return -1;
        }
        
        currentItem.addToXPosition(deltaTime * this._pxPerSecond);
        
        return -1;

    };
    
    this.update = function(deltaTime)
    {

        if(this._containerOrientationHasChanged())
        {
            this._initialiseAllItemPositionsBasedOnContainer();     
        }
                
        var flexItemToBeLooped = -1;
        
        for(var i = 0; i < this._items.length; i++)
        {
            var itemShouldBeLooped = this._updateItem(i, deltaTime);
            
            if(itemShouldBeLooped !== -1)
            {
                flexItemToBeLooped = itemShouldBeLooped;
            }
        }

        if(flexItemToBeLooped !== -1)
        {
            this._loopItem(flexItemToBeLooped);
        }
    };
}

/*******************************************************/

function performOperationsOnIndividualItemUpdate()
{
    return function(currentContainerOrientation, currentItem, deltaTime, pxPerSecond)
    {

        var itemRect = currentItem.getRect();

        if(itemRect.center > currentContainerOrientation.center - itemRect.width &&
           itemRect.center < currentContainerOrientation.center + itemRect.width) 
        {
            currentItem.getElement().querySelector('a').className = "hover";
        }
        else
        {
            currentItem.getElement().querySelector('a').className = "";
        }
    };
}

function initCarouselItems()
{ 

    var carousel = new Caurousel
    (
        document.getElementById('portfolio_item_container'),
        document.getElementsByClassName('portfolio_item'), 
        25,
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

function executeMobileJavascript()
{
    var elements    = document.getElementsByClassName("portfolio_item");

    for (var i = 0; i < elements.length; i++) 
    {
        elements[i].querySelector('a').className += "hover";
    }
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
    if ('ontouchstart' in window) 
    {     
        executeMobileJavascript();
    }
    
    initCarouselItems();
    
}
/*self explanatory*/
runJavascript();



//Used code from https://developer.mozilla.org/en/docs/Web/JavaScript/Reference/Global_Objects/Array/from
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