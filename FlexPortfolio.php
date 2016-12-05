<?php 



function echoPortfolio()
{

echo('
            <ul class="flexItemContainter">
                <li class="DesktopNotifier flexItemTextSnippet">
                    <div class = "textCenter textItemHeader">
                        Hover over or click on some of the images below!
                    </div>
                    <div class = "textCenter textItemSmallText">
                        I support mobile browsers! •ᴗ•
                    </div>
                </li><!--
                    
                --><li class="flexItem flexItemMed" data-hovercolor="rgb(0,40,70)">
                    <a href ="ProjectPages/ComingSoonPage.php">
                        <div class ="flexItemDescription">
                            <div class="textBg bigTextBg">
                                <div class="textCenter flexTextWrapper">
                                    <span class="WrapperDescriptionText">
                                    Read about the current project I\'m working on in my blog!
                                    </span>
                                    <img class = "MobileLinkArrow" src = "Images/LinkArrow.png"/>
                                </div>
                            </div>
                        </div>
                        <img class = "flexBG" src ="Images/NextProjectMedium.png" alt="Link to Coming soon page"/>
                    </a>
                </li><!--
                
            --><li class="flexItem flexItemMed" data-hovercolor="rgb(0,60,0)">                        
                    <a href ="ProjectPages/CustomerSubmitFormPage.php">
                        <div class ="flexItemDescription">
                            <div class="textBg bigTextBg">
                                <div class="textCenter flexTextWrapper">
                                    <span class="WrapperDescriptionText">
                                    This project was made in PHP! (it was my first time using that language)
                                    <br>
                                    The code for this project is viewable on my github :)
                                    </span>
                                    <img class = "MobileLinkArrow" src = "Images/LinkArrow.png"/>
                                </div>
                            </div>
                        </div>
                        <img class = "flexBG" src ="Images/MediumPortfolio.png" alt="Link to Customer Submit Form Page"/>
                    </a>
                </li><!--

                --><li class="flexItem flexItemNormal" data-hovercolor="rgb(20,20,60)">                        
                    <a href ="ProjectPages/StarDivePage.php">   
                        <div class ="flexItemDescription">
                            <div class="textBg smallTextBg">
                                <div class="textCenter flexTextWrapper">
                                    <span class="WrapperDescriptionText">
                                    Stardive is my favorite out of all the games I have made..<br>So far.
                                    </span>
                                    <img class = "MobileLinkArrow" src = "Images/LinkArrow.png"/>
                                </div>
                            </div>
                        </div>
                        <img class = "flexBG" src ="Images/StarDiveWebBanner.png" alt="Link to StarDive game page"/>
                    </a>
                </li><!--

                --><li class="flexItem flexItemNormal" data-hovercolor="rgb(40,5,0)">                        
                    <a href ="ProjectPages/LoloGamePage.php">
                        <div class ="flexItemDescription">
                            <div class="textBg smallTextBg">
                                <div class="textCenter flexTextWrapper">
                                    <span class="WrapperDescriptionText">
                                    I made this game for the NES Box art jam in 2015!
                                    </span>
                                    <img class = "MobileLinkArrow" src = "Images/LinkArrow.png"/>
                                </div>
                            </div>
                        </div>
                        <img class = "flexBG" src ="Images/lolo.png" alt="Link to adventures of lolo game page"/>
                    </a>
                </li><!--
                
                
                --><li class="flexItem flexItemNormal" data-hovercolor="rgb(30,0,30)">                        
                    <a href ="ProjectPages/AeroFlightPage.php">      
                        <div class ="flexItemDescription">
                            <div class="textBg smallTextBg">
                                <div class="textCenter flexTextWrapper">
                                    <span class="WrapperDescriptionText">
                                    This the first game that I\'ve programmed! <br>Why not check it out?
                                    </span>
                                    <img class = "MobileLinkArrow" src = "Images/LinkArrow.png"/>
                                </div>
                            </div>
                        </div>
                        <img class = "flexBG" src ="Images/AeroFlightBanner.png" alt="Link to Aeroflight game page"/>
                    </a>    
                </li>
                
                
            </ul>');
}
?>