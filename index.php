<html>
<head>
<title>Laravel Software Development Environment</title>
<link rel="stylesheet" href="https://elf.ict.griffith.edu.au/style.css" type="text/css" />
</head>
<body>
<center><h1>Laravel Software Development Environment</h1></center>

<ul>
    <li><a href="/webAppDev/week1/task1/index.html">Week 1: Task 1 & 2</a></li>
    <li><a href="/webAppDev/week1/task3/index.html">Week 1: Task 3</a></li>
</ul>
<ul>
    <li><a href="/webAppDev/week2/posts-array/index.php">Week 2: Posts Array</a></li>
    <li><a href="/webAppDev/week2/posts-class/index.php">Week 2: Posts Class</a></li>
</ul>
<ul>
    <li><a href="/webAppDev/week3/task3/index.html">Week 3: Task 3</a></li>
    <li><a href="/webAppDev/week3/task4/index.html">Week 3: Task 4</a></li>
    <li><a href="/webAppDev/week3/task5/index.php">Week 3: Task 5</a></li>
</ul>
<ul>
		<li><a href="/webAppDev/week4/task1/blank/public">Week 4: Task 1</a></li>
		<li><a href="/webAppDev/week4/task2/greetings/public/greeting">Week 4: Task 2 (Greeting)</a></li>
        <li><a href="/webAppDev/week4/task2/greetings/public/user/Ben">Week 4: Task 2 (User Greeting)</a></li>
        <li><a href="/webAppDev/week4/task3/foreach/public/?title=PHP%20and%20MySQL&author=Simon%20Stobart%20and%20David%20Parsons&year=2008&url=www.cengage.co.uk/stobart/&pages=634">Week 4: Task 3</a></li>
        
</ul>



<p>
    <strong>System notes:</strong><br>
    PHP Version: <?=phpversion()?>
</p>
<strong>Extensions:</strong>
<ul>
    <?php
        $arrExtensions = get_loaded_extensions();
        foreach ($arrExtensions as $sExtension) {
            echo '<li>'.$sExtension.'</li>';
        }        
    ?>
</ul>

<p>Welcome to Laravel Software Development Environment. This server contains
tools for developing web application with PHP 7.3, Apache 2.4, and Laravel. The
software installed in this environement include Apache, code-server, SQLite,
PHP composer, and other PHP packages required by Laravel.</p>

<ul>
<li><p>The apache web server at the this URL...</p>

    <p><center><code>
       <a href="./"
          >https://<i>{user}</i>.elf.ict.griffith.edu.au/</a>
    </code></center></p>

    <p>refers to the "<code>~/html/</code>" directory of your environment's
    working home.  Hence the html file you are reading now resides in the
    file "<code>~/html/index.html</code>". </p>

    <p>You are free to create other files and directories under
    "<code>~/html/</code>" to house your web projects and exercises
    (in HTML, PHP or Laravel). </p>&nbsp;</li>

<li>Be sure to read
    <a href="https://elf.ict.griffith.edu.au/laravel_project.html"
    >Creating a secure laravel project</a>
    for information on how to create a secure laravel project.  Do not rely on
    other simular information that can be found on the web. </p></li>

<li><p>A Web based User-interface <a
    href="https://elf.ict.griffith.edu.au/code-server.html" >code-server</a>
    has been installed, and should be running on

    <p><center><code>
       <a href="./:8443"
          >https://<i>{user}</i>.elf.ict.griffith.edu.au:8443/</a>
    </code></center></p>

    It's randomly generated password is given to you when you SSH login to
    your environment.  This password will change. </p></li>

<li><p>For more information about this server and the software development
    environments you are using, see the servers top-level pages at </p>

    <p><center><code>
       <a href="https://elf.ict.griffith.edu.au/"
          >https://elf.ict.griffith.edu.au/</a>
    </code></center></p>
    </li>
</ul>

</body></html>

