
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
    var navElements = document.getElementsByClassName("text_link");

    for (var i = 0; i < navElements.length; i++) 
    {
         navElements[i].className += " mobile";
    }
}


/***************************************
*Appends the .fading_in class to all 
*elements that have the .fade_in class. 
****************************************/
function triggerFadeIn()
{
    
    var itemsFadingIn = document.getElementsByClassName("fade_in");

    for (var i = 0; i < itemsFadingIn.length; i++) 
    {
         itemsFadingIn[i].className += " fading_in";
    }
}

/*********************
 * Lazy Loads Images
 *********************/
function lazyLoadImages()
{
    var images = document.getElementsByClassName('lazy_load_image');
    
    for (var i = 0; i < images.length; i++) 
    {
        
        var image_wrapper               = images[i];

        for (var j = 0; j < image_wrapper.childNodes.length; j++) {
            
            if (image_wrapper.childNodes[j].className == "img") 
            {
                
                var image = image_wrapper.childNodes[j];

                image.setAttribute('src', image_wrapper.getAttribute('data-src'));
        
                image.onload = function(){

                    for (var j = 0; j < this.parentNode.childNodes.length; j++) {
                        if (this.parentNode.childNodes[j].className == "loading_text") 
                        {
                          this.parentNode.childNodes[j].style.display = "none";  
                        }        
                    }

                };              
            }    
        }
        
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
    
    setupMoreMenu();  
    
    window.onload = function()
    { 
        triggerFadeIn(); 
        lazyLoadImages();
    };    
    
}
/*self explanatory*/
runJavascript();