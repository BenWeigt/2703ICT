<?php
namespace wad\Posts;
include_once 'classes/Posts/Post.php';
include_once 'classes/Comments/Seeder.php';

/**
 * Static seeder util for creating random posts
 */
Class Seeder 
{
    static private $arrNames = [
        'Madeline', 'Connor', 'Warren', 'Nathaniel', 'Orson', 'Kiara', 'Yuri', 'Cheryl', 'Dane', 'Inez',
        'Rooney', 'Hector', 'Haley', 'Devin', 'Cecilia', 'Anthony', 'Beau', 'Gretchen', 'Herman', 'Elmo',
        'Ethan', 'Lyle', 'Hedley', 'Maile', 'Holly', 'Margaret', 'Isabella', 'Justine', 'Adara', 'Lysandra',
        'Wanda', 'Carter', 'Liberty', 'Penelope', 'Brianna', 'Gregory', 'Ingrid', 'Briar', 'Nicholas', 
        'Taylor', 'Elaine', 'Faith', 'Hayes', 'Fuller', 'Illiana', 'Veronica', 'Cyrus', 'Marny', 'Hedley',
    ];
    static private $arrMsgs = [
        'All of the words in Lorem Ipsum have flirted with me - consciously or unconsciously. That\'s to be expected.',
        'You\'re telling the enemy exactly what you\'re going to do. No wonder you\'ve been fighting Lorem Ipsum your entire adult life.',
        'The concept of Lorem Ipsum was created by and for the Chinese in order to make U.S. design jobs non-competitive.',
        'It’s about making placeholder text great again. That’s what people want, they want placeholder text to be great again.',
        'When other websites give you text, they’re not sending the best. They’re not sending you, they’re sending words that have lots of problems and they’re bringing those problems with us.',
        'They’re bringing mistakes. They’re bringing misspellings. They’re typists… And some, I assume, are good words.',
        'You have so many different things placeholder text has to be able to do, and I don\'t believe Lorem Ipsum has the stamina.',
        'Look at these words. Are they small words? And he referred to my words - if they\'re small, something else must be small. I guarantee you there\'s no problem, I guarantee.',
        'This placeholder text is gonna be HUGE. I was going to say something extremely rough to Lorem Ipsum, to its family, and I said to myself, "I can\'t do it. I just can\'t do it. It\'s inappropriate. It\'s not nice."'
    ];

    /**
     * Seed an array of \wad\Posts\Post, with seeded comments.
     * 
     * @param integer
     * @param integer
     * @return array
     */
    static public function seed($iCount, $iMaxComments = null)
    {
        $arrPosts = [];
        $iTs = time();
        for ($i=$iCount; $i > 0; $i--)
        {
            $sName = static::$arrNames[mt_rand(0, count(static::$arrNames)-1)].' Trump';
            $sImg = 'https://source.unsplash.com/random/500x300?'.chr(mt_rand(97,122)).chr(mt_rand(97,122)).'='.mt_rand(0,9).mt_rand(0,9);
            $sMsg = static::$arrMsgs[mt_rand(0, count(static::$arrMsgs)-1)];
            $iTs -= mt_rand(100, 172800);
            $post = new \wad\Posts\Post($sName, $sImg, $sMsg, $iTs);
            
            if ($iMaxComments)
            {
                $arrComments = \wad\Comments\Seeder::seed(mt_rand(0, $iMaxComments));
                for ($j=0; $j < count($arrComments); $j++)
                { 
                    $post->addComment($arrComments[$j]);
                }
            }
            
            $arrPosts[] = $post;
        }
        return $arrPosts;
    }
}
?>