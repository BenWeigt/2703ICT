<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
    <link rel="stylesheet" href="index.css">

    <title>Post Array</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-sm navbar-light bg-light">
        <a class="navbar-brand" href="#">Social Network</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
           <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse nav navbar-nav" style="justify-content: flex-end;" id="navbarSupportedContent">
            <a class="nav-item nav-link" href="#">Photos</a>
            <a class="nav-item nav-link" href="#">Friends</a>
            <a class="nav-item nav-link" href="#">Login</a>
        </div>
    </nav>
    <section class="container-fluid">
        <div class="row">

            <?php
                  $file = $_GET['file'];
                  // echo "<b>$file:</b><br>\n";
                
                  // Check a file name was given
                  if ( empty($file) || $file == "" ) {
                      echo "Missing filename.<br>\n";
                      exit;
                  }
                
                    // Check file path is allowed
                    /**
                     * Concerns:
                     * - Overlong encoding
                     * - Nul byte
                     * - '/' checks fail if server is Win
                     * - Escaping/mutating after checks is dangerous
                     * - Should probably be using multibyte string extension
                     */
                  if ( strncmp($file, "/", 1) == 0 || strstr($file, "../") ) {
                      echo "File name is not allowed: $file.<br>\n";
                      exit;
                  }
                
                  // Sanitise file name (unnecessary here?)
                  $file = EscapeShellCmd(substr($file, 0, 40));
                
                  // Check file exists
                  if ( !file_exists($file) || !is_file($file) ) {
                      echo "File not found or not printable: $file.<br>\n";
                      exit;
                  }
                
                  // Attempt to open file
                  echo "allowed: ". $file;
            ?>


            <div class="col-sm-4 new-post">
                <form method="GET" action="">
                    <div class="form-group">
                        <label for="new-post-name">Name</label>
                        <input type="text" name="name" class="form-control" id="new-post-name" placeholder="Name" required>
                    </div>
                    <div class="form-group">
                        <label for="new-post-msg">Message</label>
                        <textarea name="msg" class="form-control" id="new-post-msg" placeholder="Message" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary" style="display: block; margin: auto;">Send Post</button>
                </form>
            </div>
            <div id="posts" class="col-sm-8 posts">
                <?php
                    // Static post data          
                    $arrPosts = [
                        ['name'=>'Helen Trump', 'ts' => 1563423405, 'img' => 'https://source.unsplash.com/random/500x300?a=1', 'msg' => 'The concept of Lorem Ipsum was created by and for the Chinese in order to make U.S. design jobs non-competitive. Some people have an ability to write placeholder text... It\'s an art you\'re basically born with. You either have it or you don\'t.'],
                        ['name'=>'Chad Trump', 'ts' => 1563423505, 'img' => 'https://source.unsplash.com/random/500x300?b=2', 'msg' => 'My text is long and beautiful, as, it has been well documented, are various other parts of my website. This placeholder text is gonna be HUGE. Be careful, or I will spill the beans on your placeholder text.'],
                        ['name'=>'Toby Trump', 'ts' => 1563423605, 'img' => 'https://source.unsplash.com/random/500x300?c=3', 'msg' => 'It’s about making placeholder text great again. That’s what people want, they want placeholder text to be great again. '],
                        ['name'=>'Boris Trump', 'ts' => 1563423705, 'img' => 'https://source.unsplash.com/random/500x300?d=4', 'msg' => 'I have a 10 year old son. He has words. He is so good with these words it\'s unbelievable. He’s not a word hero. He’s a word hero because he was captured. I like text that wasn’t captured.']
                    ];
                    // If post via GET, construct
                    if (isset($_GET['name']) && isset($_GET['msg']))
                    {
                        $arrPosts[] = ['name'=> $_GET['name'], 'ts' => time(), 'img' => 'https://source.unsplash.com/random/500x300?e=5', 'msg' => $_GET['msg']];
                    }
                    // Render 
                    foreach ($arrPosts as $arrPost)
                    {
                        echo
                        '<div class="row post">'.
                        '   <div class="col-sm-4">'.
                        '       <img class="post-img" src="'.$arrPost['img'].'">'.
                        '   </div>'.
                        '   <div class="col-sm-8 post-info">'.
                        '           <div class="post-info-date">'.date('F j, Y, g:i a', $arrPost['ts']).'</div><br>'.
                        '           <span class="post-info-name">'.$arrPost['name'].': </span><span class="post-info-msg">'.$arrPost['msg'].'</span>'.
                        '    </div>'.
                        '</div>';
                    }
                ?>
            </div>
        </div>
    </section>
</body>
</html>