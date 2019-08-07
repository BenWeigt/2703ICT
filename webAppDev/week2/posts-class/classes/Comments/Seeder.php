<?php
namespace wad\Comments;
include_once 'classes/Comments/Comment.php';

/**
 * Static seeder util for creating random posts
 */
Class Seeder 
{
    static private $arrNames = [
        'Juliet', 'Hillary', 'Velma', 'Eve', 'Bruno', 'Mia', 'Hanae', 'Scarlett', 'Dakota', 'Allen', 'Georgia', 'Cain',
        'Hollee', 'Regan', 'Vielka', 'Jaime', 'Shelby', 'Kellie', 'Doris', 'Natalie', 'Slade', 'Eve', 'Pascale', 
        'Perry', 'Damian', 'Colin', 'Lucius', 'Craig', 'Herman', 'Shelley', 'Vernon', 'Benjamin', 'Alfonso', 'Ferris',
        'Mechelle', 'Dexter', 'Ronan', 'Bruce', 'Florence', 'Logan', 'Sage', 'Amal', 'Gannon', 'Maris', 'Claudia',
        'Renee', 'Candace', 'Graiden' 
    ];
    static private $arrMsgs = [
        'I know words. I have the best words.',
        'That other text? Sadly, it’s no longer a 10.',
        'We are going to make placeholder text great again. Greater than ever before.',
        'I think the only card she has is the Lorem card.',
        'The best taco bowls are made in Trump Tower Grill. I love Hispanics!',
        'Lorem Ispum is a choke artist. It chokes!',
        'If Trump Ipsum weren’t my own words, perhaps I’d be dating it.',
        'Trump Ipsum is calling for a total and complete shutdown of Muslim text entering your website.',
        'Look at that text! Would anyone use that? Can you imagine that, the text of your next webpage?!',
        'I think my strongest asset maybe by far is my temperament. I have a placeholding temperament.',
        'We have so many things that we have to do better... and certainly ipsum is one of them.'
    ];

    static public function seed($iCount, $iAfterTs = null)
    {
        $arrComments = [];
        $iTs = $iAfterTs ? $iAfterTs : time() - ($iCount*86400);
        $iTime = time();
        for ($i=$iCount; $i > 0; $i--)
        {
            $sName = static::$arrNames[mt_rand(0, count(static::$arrNames)-1)] . ' Trump';
            $sMsg = static::$arrMsgs[mt_rand(0, count(static::$arrMsgs)-1)];
            $iTs += mt_rand($iTs, $iTime)-$iTs;
            $arrComments[] = new \wad\Comments\Comment($sName, $sMsg, $iTs);
        }

        return $arrComments;
    }
}
?>