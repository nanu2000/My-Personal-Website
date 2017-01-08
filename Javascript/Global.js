/*
 * 
 * Temporary Code, will be revised.
 * 
 */


ColorChanger.prototype.TIME_UNTIL_NEXT_COLOR    = 3;
ColorChanger.prototype.TIME_UNTIL_HOVER_COLOR   = 0.8;

function ColorChanger(colorsToChange, backgroundColorElement)
{
    
    var lastColor = 0;
    var reverting = true;
    var bgColorChangeInterval = null;
    
    this.colorsForBackground = colorsToChange;
    this.elementThatChangesBG = backgroundColorElement;
        
    this._bGColorChanger = function(element)
    {

        if(this.lastColor < this.colorsForBackground.length - 1)
        {
            this.lastColor++;
        }
        else
        {
            this.lastColor = 0;
        }

        if(this.reverting)
        {
            element.style.transitionDuration = this.TIME_UNTIL_NEXT_COLOR + "s"; 
            this.reverting = false;
        }

        element.style.backgroundColor = this.colorsForBackground[this.lastColor];            

    };
    
    this._setIntervalHandler = function(colorChanger, element)
    {
        return function() 
        {
            colorChanger._bGColorChanger(element); 
        };
    };
    
    this._onMouseOverHandler = function(element) 
    {
        var colorChanger = this;

        return function() 
        {
            if(colorChanger.bgColorChangeInterval !== null)
            {
                colorChanger.elementThatChangesBG.style.transitionDuration = colorChanger.TIME_UNTIL_HOVER_COLOR + "s";  
                colorChanger.elementThatChangesBG.style.backgroundColor = element.getAttribute('data-hovercolor');
                clearInterval(colorChanger.bgColorChangeInterval);
                colorChanger.bgColorChangeInterval = null;
            }
        };
    };
    
    this._setBgColorChangeInterval = function(element)
    {
        return window.setInterval( this._setIntervalHandler(this, element), this.TIME_UNTIL_NEXT_COLOR * 1000); 
    };
    
    this._onMouseOutHandler = function() 
    {
        var colorChanger = this;

        return function() 
        {
            if(colorChanger.bgColorChangeInterval === null)
            {
                colorChanger._bGColorChanger(colorChanger.elementThatChangesBG);
                colorChanger.bgColorChangeInterval = colorChanger._setBgColorChangeInterval(colorChanger.elementThatChangesBG);
                colorChanger.reverting = true;
            }
        };
    };
    
    this._initialize = function()
    {
        
        this.bgColorChangeInterval = this._setBgColorChangeInterval(this.elementThatChangesBG);

        this.elementThatChangesBG.style.transitionProperty = "background-color";  
        this.elementThatChangesBG.style.transitionDuration = this.TIME_UNTIL_NEXT_COLOR + "s";  

        this._bGColorChanger(this.elementThatChangesBG);         
    
    };
    this.start = function()
    {
        this._initialize();
        
        var elements = document.getElementsByClassName("flexItem");
        
        for (var i = 0; i < elements.length; i++) 
        {
            
            var textWrapper = elements[i].querySelector('.textBg');
            
            textWrapper.style.backgroundColor   = elements[i].getAttribute('data-hovercolor');
            
            textWrapper.style.borderTopColor    = ColorLuminance(elements[i].getAttribute('data-hovercolor'), .6);
            textWrapper.style.borderBottomColor = ColorLuminance(elements[i].getAttribute('data-hovercolor'), -.3);
                        
            elements[i].onmouseover    = this._onMouseOverHandler(elements[i]);
            elements[i].onmouseout     = this._onMouseOutHandler();
        }
        

    };

}
function ColorLuminance(hex, lum) 
{

	// validate hex string
	hex = String(hex).replace(/[^0-9a-f]/gi, '');
	if (hex.length < 6) {
		hex = hex[0]+hex[0]+hex[1]+hex[1]+hex[2]+hex[2];
	}
	lum = lum || 0;

	// convert to decimal and change luminosity
	var rgb = "#", c, i;
	for (i = 0; i < 3; i++) {
		c = parseInt(hex.substr(i*2,2), 16);
		c = Math.round(Math.min(Math.max(0, c + (c * lum)), 255)).toString(16);
		rgb += ("00"+c).substr(c.length);
	}

	return rgb;
}

function shadeColor(color, percent) 
{   
    var f=parseInt(color.slice(1),16),t=percent<0?0:255,p=percent<0?percent*-1:percent,R=f>>16,G=f>>8&0x00FF,B=f&0x0000FF;
    return "#"+(0x1000000+(Math.round((t-R)*p)+R)*0x10000+(Math.round((t-G)*p)+G)*0x100+(Math.round((t-B)*p)+B)).toString(16).slice(1);
}

window.onload = function() 
{        
    if ("transitionProperty" in document.body.style)
    {
        var colorsForBackground = ["rgb(10, 35, 44)", "rgb(28, 14, 23)", "rgb(3, 7, 29)"];
        var bGColorChange = new ColorChanger(colorsForBackground, document.body);
        bGColorChange.start();
    }
    
    if ('ontouchstart' in window) 
    {
        var elements = document.getElementsByClassName("flexItem");

        for (var i = 0; i < elements.length; i++) 
        {
            elements[i].querySelector('a').className += " hover";
        }
    }  
    
    

    // media query event handler
    if (typeof window.matchMedia == 'function') 
    { 
      var mq = window.matchMedia("(max-width: 999px)");
      mq.addListener(WidthChange);
      WidthChange(mq);
    }

setupMoreMenu();

    
    
};
// media query change
function WidthChange(mq) {

    var elements = document.getElementsByClassName("flexItem");

    if (mq.matches) 
    {
        for (var i = 0; i < elements.length; i++) 
        {
            elements[i].style.backgroundColor = shadeColor(elements[i].getAttribute('data-hovercolor'), -.5);
        }
    } 
    else 
    {        
        for (var i = 0; i < elements.length; i++) 
        {
            elements[i].style.backgroundColor = shadeColor(elements[i].getAttribute('data-hovercolor'), .3);
        }
    }

}
function setDefaultBackgroundColor()
{
    if (!("transitionProperty" in document.body.style))
    {
        document.body.style.backgroundColor = "rgb(0,40,70)";
    }
};

function setupMoreMenu()
{
    
    var moreMenu = document.getElementById("show_navbar");
    
    document.getElementById("navbar_more").style.display = "none";
    
    moreMenu.onclick = function()
    {
        if(document.getElementById("navbar_more").style.display !== "none")
        {
            document.getElementById("navbar_more").style.display = "none";
        }
        else
        {
            document.getElementById("navbar_more").style.display = "block";
        }
    };
    
    
};