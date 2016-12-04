/*
 * 
 * Temporary Code, will be revised.
 * 
 */


ColorChanger.prototype.secondsUntilChange = 8;
ColorChanger.prototype.secondsOnHoverChange = 3;


function ColorChanger(colorsToChange, backgroundColorElement)
{
    this.lastColor = 0;
    this.reverting = true;
    this.bgColorChangeInterval = null;
    this.colorsForBackground = colorsToChange;
    this.elementThatChangesBG = backgroundColorElement;
}


ColorChanger.prototype.bGColorChanger = function(element)
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
        element.style.transitionDuration = this.secondsUntilChange + "s"; 
        this.reverting = false;
    }
    
    element.style.backgroundColor = this.colorsForBackground[this.lastColor];            

};

ColorChanger.prototype.setIntervalHandler = function(colorChanger, element)
{
    return function() 
    {
        colorChanger.bGColorChanger(element); 
    };
};

ColorChanger.prototype.setBgColorChangeInterval = function(element)
{
    return window.setInterval( this.setIntervalHandler(this, element), this.secondsUntilChange * 1000); 
};

ColorChanger.prototype.onMouseOverHandler = function(element) 
{
    var colorChanger = this;
    
    return function() 
    {
        if(colorChanger.bgColorChangeInterval !== null)
        {
            colorChanger.elementThatChangesBG.style.transitionDuration = colorChanger.secondsOnHoverChange + "s";  
            colorChanger.elementThatChangesBG.style.backgroundColor = element.getAttribute('data-hovercolor');
            clearInterval(colorChanger.bgColorChangeInterval);
            colorChanger.bgColorChangeInterval = null;
        }
    };
};

ColorChanger.prototype.onMouseOutHandler = function() 
{
    var colorChanger = this;
    
    return function() 
    {
        if(colorChanger.bgColorChangeInterval === null)
        {
            colorChanger.bGColorChanger(colorChanger.elementThatChangesBG);
            colorChanger.bgColorChangeInterval = colorChanger.setBgColorChangeInterval(colorChanger.elementThatChangesBG);
            colorChanger.reverting = true;
        }
    };
};

ColorChanger.prototype.start = function()
{
    this.bgColorChangeInterval = this.setBgColorChangeInterval(this.elementThatChangesBG);
    
    this.elementThatChangesBG.style.transitionProperty = "background-color";  
    this.elementThatChangesBG.style.transitionDuration = "";  

    var elements = document.getElementsByClassName("flexItem");
    
    for (var i = 0; i < elements.length; i++) 
    {
        elements[i].onmouseover    = this.onMouseOverHandler(elements[i]);
        elements[i].onmouseout     = this.onMouseOutHandler();
    }

};


window.onload = function() 
{    
    var colorsForBackground = ["rgb(10, 35, 44)", "rgb(48, 14, 23)", "rgb(3, 7, 29)"];
    var bGColorChange = new ColorChanger(colorsForBackground, document.body);
    bGColorChange.start();

};
