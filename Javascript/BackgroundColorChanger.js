/*
 * 
 * Temporary Code, will be revised.
 * 
 */


ColorChanger.prototype.TIME_UNTIL_NEXT_COLOR    = 5;
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
    
    this.start = function()
    {
        this.bgColorChangeInterval = this._setBgColorChangeInterval(this.elementThatChangesBG);

        this.elementThatChangesBG.style.transitionProperty = "background-color";  
        this.elementThatChangesBG.style.transitionDuration = this.TIME_UNTIL_NEXT_COLOR + "s";  

        var elements = document.getElementsByClassName("flexItem");

        for (var i = 0; i < elements.length; i++) 
        {
            elements[i].onmouseover    = this._onMouseOverHandler(elements[i]);
            elements[i].onmouseout     = this._onMouseOutHandler();
        }

    };

}





window.onload = function() 
{    
    if ("transitionProperty" in document.body.style)
    {
        var colorsForBackground = ["rgb(10, 35, 44)", "rgb(28, 14, 23)", "rgb(3, 7, 29)"];
        var bGColorChange = new ColorChanger(colorsForBackground, document.body);
        bGColorChange.start();
    }
    else
    {
        document.body.style.backgroundColor = "rgb(0,40,70)";
    }
};
