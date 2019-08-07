<?php
namespace wad\Comments;

/**
 * Comment
 */
Class Comment 
{
    /**
     * Last Name
     * @var string
     */
    private $sName = '';

    /**
     * Message
     * @var string
     */
    private $sMsg = '';

    /**
     * Timestamp
     * @var integer
     */
    private $iTs = null;

    public function __construct($sName, $sMsg, $iTs = null)
    {
        $this->sName = $sName;
        $this->sMsg = $sMsg;
        $this->iTs = $iTs ? $iTs : time();
    }

    public function toHTML()
    {
        return
        '<div class="comment">'.
        '   <span class="comment-name">'.$this->sName.'</span>'.
        '   <span class="comment-date">'.date('F j, Y, g:i a', $this->iTs).'</span>'.
        '   <div class="comment-msg">'.
                $this->sMsg.
        '   </div>'.
        '</div>';
    }
}
?>