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
        
        <div class = "text_center generic_header_wrapper fade_in speed_1">
            
            <div class = "generic_header_title fade_in speed_2">
            <?php echo($this->title); ?>
            </div>
            
            <div class ="generic_header_subtitle fade_in speed_3">
                <?php echo($this->subtitle); ?>
            </div>
            
        </div>
        
        <div class = "generic_page_text fade_in speed_4">
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
        
        foreach (NAV_OPTIONS::BLOG_NAV_ITEMS as $index => $value) 
        {
            //animation speed
            $transitionIndex = intval(($index + 1) / 2);

            if($transitionIndex < 1)
            {
                $transitionIndex = 1;
            }
            else if($transitionIndex > 10)
            {
                $transitionIndex = 10;
            }
            
            ?>
            
            <a href = "<?php echo($value[0]);?>" class = "TextLink fade_in speed_<?= $transitionIndex + 1; ?>"><?php echo($value[1]); ?> </a>
                
            <?php
        }
        
        ?></div><?php
    }
}
