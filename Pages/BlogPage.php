<?php
include ('GenericPage.php');

class BlogContent   extends Content
{
    private $title      = "Blog Title";
    private $subtitle   = "Blog Subtitle";
    
    function giveBlogInformation($title, $subtitle)
    {
        $this->setTitle($title);
        $this->setSubtitle($subtitle);
    }
    
    function setTitle($title)
    {
        $this->title = $title;
    }
    
    function setSubtitle($subtitle)
    {
        $this->subtitle = $subtitle;
    }
    
    function startContentContainer()
    {
    ?>
    <div class = "generic_content_wrapper">
        
        <div class = "text_center generic_header_wrapper">
            
            <div class = "generic_header_title">
            <?php echo($this->title); ?>
            </div>
            
            <div class ="generic_header_subtitle">
                <?php echo($this->subtitle); ?>
            </div>
            
        </div>
        
        <div class = "generic_page_text">
    <?php
    }
    
    function endContentContainer()
    {
    ?>
        </div>
        </div>
    <?php
    }
}

class BlogPage      extends GenericPage
{
    function startContent()
    {
        //call GenericPage startContent function
        parent::startContent();
        
        $blogNavbar = new GenericContent(array($this, 'outputBlogNavbar'));
        
        $blogNavbar->display();
        
    }
    
    function outputBlogNavbar()
    {
        
        ?><div class="text_center" id="BlogNavbar"><?php
        
        foreach (NAV_OPTIONS::BLOG_NAV_ITEMS as $value) 
        {
            ?>
            
            <a href = "<?php echo($value[0]);?>" class = "TextLink"><?php echo($value[1]); ?> </a>
                
            <?php
        }
        
        ?></div><?php
    }
}
