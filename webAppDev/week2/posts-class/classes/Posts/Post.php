<?php
namespace wad\Posts;
include_once 'classes/Comments/Comment.php';

/**
 * Post
 */
Class Post 
{
    /**
     * Name
     * @var string
     */
    private $sName = '';

    /**
     * Image URI
     * @var string
     */
    private $sImg = '';

    /**
     * Message
     * @var string
     */
    private $sMsg = '';

    /**
     * Comments
     * @var string
     */
    private $arrComments = [];

    /**
     * Timestamp
     * @var integer
     */
    private $iTs = null;

    public function __construct($sName, $sImg, $sMsg, $iTs = null)
    {
        $this->sName = $sName;
        $this->sImg = $sImg;
        $this->sMsg = $sMsg;
        $this->iTs = $iTs ? $iTs : time();
    }

    /**
     * Add a comment to this post.
     * 
     * @param \wad\Comments\Comment The comment instance to add
     * @return void
     */
    public function addComment($comment)
    {
        $this->arrComments[] = $comment;
    }

    /**
     * ToString this post to HTML
     * 
     * @return string
     */
    public function toHTML()
    {
        $sComments = '';
        if (count($this->arrComments))
        {
            $sComments .= '<div class="comments">';
            for ($i=0; $i < count($this->arrComments); $i++)
            { 
                $sComments .= $this->arrComments[$i]->toHTML();
            }
            $sComments .= '</div>';
        }
        return 
        '<div class="row post">'.
        '   <div class="col-sm-4">'.
        '       <img class="post-img" src="'.$this->sImg.'">'.
        '   </div>'.
        '   <div class="col-sm-8 post-info">'.
        '           <div class="post-info-date">'.date('F j, Y, g:i a', $this->iTs).'</div>'.
        '           <span class="post-info-name">'.$this->sName.'</span><br><span class="post-info-msg">'.$this->sMsg.'</span>'.
        '    </div>'.
            $sComments.
        '</div>';
    }
}
?>