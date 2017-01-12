/*
 * 
 * Temporary Code, will be revised.
 * 
 */

ColorChanger.prototype.HIGHLIGHT_COLOR_PERCENT          = .6;
ColorChanger.prototype.SHADOW_COLOR_PERCENT             = -.3;
ColorChanger.prototype.TIME_UNTIL_HOVER_OVER_COLOR      = 1;
ColorChanger.prototype.TIME_UNTIL_HOVER_OUT_COLOR       = 3;

function ColorChanger(backgroundColorElement)
{
    this.defaultColor           = "black";
    this.backgroundColorElement   = backgroundColorElement;
 
    this._onMouseOverHandler = function(element) 
    {
        var colorChanger = this;
        var backgroundColorElementStyle = this.backgroundColorElement.style;

        return function() 
        {
            backgroundColorElementStyle.transitionDuration  = colorChanger.TIME_UNTIL_HOVER_OVER_COLOR + "s";  
            backgroundColorElementStyle.backgroundColor     = element.shadowHoverColor;
        };
    };
    
    this._onMouseOutHandler = function() 
    {
        var colorChanger = this;
        var backgroundColorElementStyle = this.backgroundColorElement.style;

        return function() 
        {
            backgroundColorElementStyle.transitionDuration  = colorChanger.TIME_UNTIL_HOVER_OUT_COLOR + "s";  
            backgroundColorElementStyle.backgroundColor     = colorChanger.defaultColor;
        };
    };
    
    this._processFlexItem = function(currentFlexItem)
    {
        
        currentFlexItem.hoverColor              = currentFlexItem.getAttribute('data-hovercolor');
        currentFlexItem.highlightHoverColor     = colorLuminance(currentFlexItem.hoverColor, this.HIGHLIGHT_COLOR_PERCENT);
        currentFlexItem.shadowHoverColor        = colorLuminance(currentFlexItem.hoverColor, this.SHADOW_COLOR_PERCENT);
        
        currentFlexItem.style.backgroundColor   = currentFlexItem.shadowHoverColor;

        var textWrapperStyle = currentFlexItem.querySelector('.textBg').style;

        textWrapperStyle.backgroundColor   = currentFlexItem.hoverColor;
        textWrapperStyle.borderTopColor    = currentFlexItem.highlightHoverColor;
        textWrapperStyle.borderBottomColor = currentFlexItem.shadowHoverColor;

        currentFlexItem.onmouseover    = this._onMouseOverHandler(currentFlexItem);
        currentFlexItem.onmouseout     = this._onMouseOutHandler();
        
    };
    
    this.start = function()
    {
        this.defaultColor = this.backgroundColorElement.style.backgroundColor;
        
        var elements = document.getElementsByClassName("flexItem");
        
        for (var i = 0; i < elements.length; i++) 
        {
            this._processFlexItem(elements[i]);
        }
    };

}

function colorLuminance(hex, lum) 
{
    // validate hex string
    hex = String(hex).replace(/[^0-9a-f]/gi, '');

    if (hex.length < 6)
    {
            hex = hex[0]+hex[0]+hex[1]+hex[1]+hex[2]+hex[2];
    }

    lum = lum || 0;

    // convert to decimal and change luminosity
    var rgb = "#", c, i;

    for (i = 0; i < 3; i++) 
    {
        c = parseInt(hex.substr(i*2,2), 16);
        c = Math.round(Math.min(Math.max(0, c + (c * lum)), 255)).toString(16);
        rgb += ("00"+c).substr(c.length);
    }

    return rgb;
}

function executeMobileJavascript()
{
    var elements    = document.getElementsByClassName("flexItem");
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

moreMenuOnclickHandler = function(showNavbarAStyle, navbarMoreStyle) 
{
    return function() 
    {
        if(navbarMoreStyle.display !== "none")
        {
            showNavbarAStyle.color              = "";
            showNavbarAStyle.backgroundColor    = "";
            navbarMoreStyle.display             = "none";
        }
        else
        {
            showNavbarAStyle.color              = "black";
            showNavbarAStyle.backgroundColor    = "white";
            navbarMoreStyle.display             = "block";
        }
    };
};
    
function setupMoreMenu()
{
    document.getElementById("navbar_more").style.display = "none";
    document.getElementById("show_navbar").onclick = moreMenuOnclickHandler
    (
        document.getElementById("show_navbar").querySelector('a').style,
        document.getElementById("navbar_more").style
    );
};

window.onload = function() 
{        
    if ("transitionProperty" in document.body.style)
    {
        var bGColorChange = new ColorChanger(document.body);
        bGColorChange.start();
    }
        
    if ('ontouchstart' in window) 
    {     
        executeMobileJavascript();
    }
    
    setupMoreMenu();
};




