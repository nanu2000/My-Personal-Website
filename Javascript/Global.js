/*Settings for flex items on hover.*/
ColorChanger.prototype.HIGHLIGHT_COLOR_PERCENT          = .6;
ColorChanger.prototype.SHADOW_COLOR_PERCENT             = -.3;
ColorChanger.prototype.TIME_UNTIL_HOVER_OVER_COLOR      = 1;
ColorChanger.prototype.TIME_UNTIL_HOVER_OUT_COLOR       = 3;

/*Changes backgroundColorElement's background color based on flexItems data-hovercolor when flex_item is hovered*/
function ColorChanger(backgroundColorElement)
{
    /*Default Background color when no flex_item is hovered. This is set to the backgroundColorElement's initial background color in the start function.*/
    this.defaultColor           = "black";
    this.backgroundColorElement   = backgroundColorElement;
 
    /*******************************************************************************************************
     * flexItems onMouseOver function
     * Changes backgroundColorElement's background color to flexItems data-hovercolor. 
     * Additionally will change backgroundColorElement's transition duration to TIME_UNTIL_HOVER_OVER_COLOR.
     *******************************************************************************************************/
    this._onMouseOverHandler = function() 
    {
        var colorChanger = this;
        var backgroundColorElementStyle = this.backgroundColorElement.style;

        return function() 
        {
            backgroundColorElementStyle.transitionDuration  = colorChanger.TIME_UNTIL_HOVER_OVER_COLOR + "s";  
            backgroundColorElementStyle.backgroundColor     = this.shadowHoverColor;
        };
    };
    
    /*******************************************************************************************************
     * flexItems onMouseOut function
     * Changes backgroundColorElement's background color to default color (initial)
     * Additionally will change backgroundColorElement's transition duration to TIME_UNTIL_HOVER_OUT_COLOR.
     *******************************************************************************************************/
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
    
    
    /*******************************************************************************************************
     * Takes a single flex_item, reads it's data-hovercolor and highlights + shadows it's text_bg borders + background.
     * Also set's onMouseOver and onMouseOut functions
    *******************************************************************************************************/
    this._processFlexItem = function(currentFlexItem)
    {
        
        currentFlexItem.hoverColor              = currentFlexItem.getAttribute('data-hovercolor');
        currentFlexItem.highlightHoverColor     = colorLuminance(currentFlexItem.hoverColor, this.HIGHLIGHT_COLOR_PERCENT);
        currentFlexItem.shadowHoverColor        = colorLuminance(currentFlexItem.hoverColor, this.SHADOW_COLOR_PERCENT);
        
        currentFlexItem.style.backgroundColor   = colorLuminance(currentFlexItem.hoverColor, this.SHADOW_COLOR_PERCENT * 2);

        var textWrapperStyle = currentFlexItem.querySelector('.text_bg').style;

        textWrapperStyle.backgroundColor   = currentFlexItem.hoverColor;
        textWrapperStyle.borderTopColor    = currentFlexItem.highlightHoverColor;
        textWrapperStyle.borderBottomColor = currentFlexItem.shadowHoverColor;

        currentFlexItem.onmouseover    = this._onMouseOverHandler();
        currentFlexItem.onmouseout     = this._onMouseOutHandler();
        
    };
    
    /*******************************************************************************************************
     * Initialises everything. (processes flexItems and retrieves initial background color)
    *******************************************************************************************************/
    this.start = function()
    {
        this.defaultColor = this.backgroundColorElement.style.backgroundColor;
        
        var elements = document.getElementsByClassName("flex_item");
        
        for (var i = 0; i < elements.length; i++) 
        {
            this._processFlexItem(elements[i]);
        }
    };

}

function colorLuminance(hex, lum) 
{
    hex = String(hex).replace(/[^0-9a-f]/gi, '');
    var rgb = "#";
    var color;
    for (i = 0; i < 3; i++) 
    {
        color = parseInt(hex.substr(i*2,2), 16);
        color = Math.round(Math.min(Math.max(0, color + (color * lum)), 255)).toString(16);
        rgb += ("00" + color).substr(color.length);
    }
    return rgb;
}

 /*******************************************************************************************************
 * Runs javascript needed for mobile. (hovering and such.)
 * Appends mobile class to text_links and appends hover class to flexItems 
 *******************************************************************************************************/
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

/*toggles more button to be selected. white with black text for button and children are set to block display.*/
function moreButtonOn(showNavbarAStyle, navbarMoreStyle)
{
    showNavbarAStyle.color              = "black";
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

/**************************
 *Runs when file is loaded.
 *This is the entry function.
 **************************/
function runJavascript()
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
}

/*self explanatory*/
runJavascript();