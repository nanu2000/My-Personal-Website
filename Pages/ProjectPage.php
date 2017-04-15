<?php
include ('GenericPage.php');

class ProjectPage   extends GenericPage
{
    
    private $images         = array();
    private $bannerImage    = null;
    
    function addAppStoreImage($imageUrl, $link, $alt)
    {
        array_push($this->images, array($link, $alt, $imageUrl));
    }
    
    function setBannerImage($imageUrl, $alt)
    {
        $this->bannerImage = array($imageUrl, $alt);
    }
    
    function outputAppStoreImages()
    {
        ?>
        
        <div class="app_store_images">
            
            <?php 
            foreach($this->images as $appImage)
            {
            ?>

                <a href = "<?php echo($appImage[0]);?>">

                    <img alt = "<?php echo($appImage[1]); ?>"
                         src = "<?php echo($appImage[2]); ?>"/>

                </a> 

            <?php
            }                
            ?>
            
        </div>
        
        <?php
    }
    
    function outputBannerImage()
    {
        ?>
        <img alt = "<?php echo($this->bannerImage[1]); ?>" src = "<?php echo($this->bannerImage[0]); ?>" class ="project_page_banner" />
        <?php
    }
    
    
    function startContent()
    {
        //call GenericPage startContent function
        parent::startContent();
        
        
        if($this->bannerImage)
        {
            $bannerImage = new GenericContent(array($this, 'outputBannerImage'));
            $bannerImage->addAdditionalClassToContainer(' hide_mobile');
            $bannerImage->display();  
        }
        if(count($this->images) > 0)
        {
            $appStoreImages = new GenericContent(array($this, 'outputAppStoreImages'));
            $appStoreImages->display();
        }
        
    }
}