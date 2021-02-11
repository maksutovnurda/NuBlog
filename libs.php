<?php 
include "connection.php";
$main_url = "http://localhost/nublog";
function realtive_date($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);
    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;
    $string = array(
                    'y' => 'жыл',
                    'm' => 'ай',
                    'w' => 'апта',
                    'd' => 'күн',
                    'h' => 'сағат',
                    'i' => 'мин.',
                    's' => 'сек.');
    foreach ($string as $k => &$v) {
        if ($diff->$k) 
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? '' : '');
        else
            unset($string[$k]);
    }
    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' бұрын' : 'жаңа ғана';
}
function register() {
    if (isset($_POST['register'])) {
        global $conn;
        $username = htmlspecialchars($_POST['username']);
        $email = htmlspecialchars($_POST['email']);
        $pass = md5(htmlspecialchars($_POST['pass']) );
        $pass2 = md5(htmlspecialchars($_POST['pass2']) );
        $errors = array();
        if( empty($username)){
          $errors[] = 'Аты-жөніңізді жазыңыз';
        }
        if( empty($email)){
          $errors[] = 'Email-ді жазыңыз';
        }
        if($pass != $pass2){
          $errors[] = 'Пароль сәйкес емес!';
        }
        if( empty($_POST['pass2'])){
          $errors[] = 'Пароль сәйкес емес!';
        }
        if( empty($_POST['pass'])){
          $errors[] = 'Пароль жазылмаған';
        }
        if (empty($errors)) {
            $query = mysqli_query($conn, "SELECT * FROM `users` WHERE `email` = '$email' LIMIT 1");
            $profile=mysqli_fetch_array($query);
            if (!empty($profile)) {
                echo "<div class='error'>
                <i class='fa fa-times'>&nbsp;</i><span>Email бос емес!</span>
                </div>";
            } else {
                $email2 = md5($email);

                $ip = $_SERVER['REMOTE_ADDR'];
                $token = md5($email2.$pass);
                $token2 = md5(time());
                $registration = mysqli_query($conn, "INSERT INTO `users` (`id`, `username`, `email`, `token`, `date`, `token2`, `last_date`, `token3`, `ip`) VALUES (NULL, '$username', '$email', '$token', NOW(), '$token2', NOW() , md5(NOW()), '$ip')");
                setcookie("token", "$token2");
                echo "1";
            }
            
        } else {
            echo "<div class='error'>
                    <i class='fa fa-times'></i>&nbsp;<span>";
            echo array_shift($errors);
            echo "</span>
                    </div>";
        }
    }
} 
function signin() {
    global $conn;
    if (isset($_POST['signin'])) {
        $email = htmlspecialchars($_POST['email']);
        $pass = md5(htmlspecialchars($_POST['pass']) );
        if( empty($email)){
          $errors[] = 'Email жазылмаған';
        }
        if( empty($_POST['pass'])){
          $errors[] = 'Пароль жазылмаған';
        }
        if (empty($errors)) {
            $email2 = md5($email);
            $token = md5($email2.$pass);
            $query3 = mysqli_query($conn, "SELECT * FROM users WHERE email='".$email."' AND token='".$token."'");
            $check_email=mysqli_fetch_array($query3);
            if (empty($check_email)) {
                echo "<div class='error'>
                <i class='fa fa-times'>&nbsp;</i><span>Пароль немесе email қате жазылған!</span>
            </div>";
            } else {
                $query3 = mysqli_query($conn, "SELECT * FROM users WHERE email='".$email."' AND token='".$token."'");
                $profile=mysqli_fetch_array($query3);
                $token2 = $profile['token2'];
                setcookie("token", "$token2");
                echo "1";
            }
        } else {
            echo "<div class='error'>
                    <i class='fa fa-times'></i>&nbsp;<span>";
            echo array_shift($errors);
            echo "</span>
                    </div>";
        }
        
    }
}
function resetPass() {
    global $conn;
    global $main_url;
    if (isset($_POST['resetemail'])) {
        $email = htmlspecialchars($_POST['resetemail']);
        if( empty($email)){
          $errors[] = 'Email жазылмаған';
        }
        if (empty($errors)) {
            $query5 = mysqli_query($conn, "SELECT * FROM users WHERE email='".$email."'");
            $check_email=mysqli_fetch_array($query5);
            if (empty($check_email)) {
                echo "<div class='error'>
                    <i class='fa fa-times'>&nbsp;</i><span>Бұл email сайтқа тіркелмеген!</span>
                    </div>";
            } else {
                $token3 = md5(time());
                $sent = mysqli_query($conn, "UPDATE `users` SET `token3` = '$token3' WHERE  email='".$email."'");
                if ($sent === TRUE) {
                    $link = "{$main_url}/resetpass.php?id={$check_email['token']}&token=$token3";
                    echo "<div class='succ'>
                    <i class='fa fa-check'></i><span>&nbsp;Почтаңызды тексеріңіз ".$link."</span>
                    </div>";
                    

                    $to  = $_POST['resetemail'];
                    $subject = "NuBlog - Парольды қайтару"; 
                    $message = '<p>'.$check_email["username"].', Қайырлы күн!</p> </br> <p>Құпия сөді қайтару үшін <a href="{$link}" style="display: inline !important;"><u>сілтмеге</u></a> өтіңіз!</p> </br><i>Өту мүмкін емес болған жағайда келесі сілтемені мекенжай жолына(URL) көшіріп, әрекетті қайталаңыз:</i> '.$link.'</br> <p>Бізбен байланысу үшін: <a href="https://vk.com/kz.wikipedia">vk.com/kz.wikipedia</a><br>+7 702 547 54 95</p>';
                    $headers  = "Content-type: text/html; charset=UTF-8 \r\n"; 
                    $headers .= "From: NuBlog\r\n"; 
                    $headers .= "Reply-To: support@nurdaulet.tk\r\n"; 
                    mail($to, $subject, $message, $headers); 
                } else {
                    echo "<div class='error'>
                    <i class='fa fa-times'>&nbsp;</i><span>Қателік!</span>
                    </div>";
                }
            }
        } else {
            echo "<div class='error'>
                    <i class='fa fa-times'></i>&nbsp;<span>";
            echo array_shift($errors);
            echo "</span>
                    </div>";
        }
    }
}
function changePass() {
    global $conn;
    if (isset($_POST['changepass'])) {
        $token3 = $_POST['token3'];
        $pass = md5(htmlspecialchars($_POST['pass']) );
        $pass2 = md5(htmlspecialchars($_POST['pass2']) );

        if( empty($_POST['pass'])){
          $errors[] = 'Пароль жазылмаған!';
        }
        if($pass != $pass2){
          $errors[] = 'Пароль сәйкес емес!';
        }
        $query6 = mysqli_query($conn, "SELECT * FROM users WHERE token3='".$token3."'");
        $change_pass=mysqli_fetch_array($query6);
        if (empty($change_pass)) {
            $errors[] = 'Біраз уақыттат соң көріңіз!';
        }
        if (empty($errors)) {
            $email2 = md5($change_pass['email']);
            $newtoken3 = md5(time());
            $token = md5($email2.$pass);
            $userid = $change_pass['id'];
            $query7 = mysqli_query($conn, "UPDATE `users` SET `token` = '$token', `token3` = '$newtoken3' WHERE `users`.`id` = $userid");
            echo "<div class='succ'>
                    <i class='fa fa-check'></i><span>&nbsp;Пароль сәтті ауысты!</span>
                    </div>";
        } else {
            echo "<div class='error'>
                    <i class='fa fa-times'></i>&nbsp;<span>";
            echo array_shift($errors);
            echo "</span>
                    </div>";
        }
    }
}
function changeProfile () {
    global $conn;
    if (isset($_POST['changeprofile'])) {
        $name = htmlspecialchars($_POST['name']);
        $ava = htmlspecialchars($_POST['ava']);
        $token3 = htmlspecialchars($_POST['token3']);
        if( empty($name)){
          $errors[] = 'Аты-жөніңізді жазыңыз!';
        }
        if( empty($ava)){
          $errors[] = 'Аватаркаға сілтеме берілмеген!';
        }
        $query6 = mysqli_query($conn, "SELECT * FROM users WHERE token3='".$token3."'");
        $change_pass=mysqli_fetch_array($query6);
        if (empty($change_pass)) {
            $errors[] = 'Профилге өзгеріс жасау мүмкін емес';
        } 
        if (empty($errors)) {
            $last_name = $change_pass['username'];
            $last_ava = $change_pass['ava'];
            $userid = $change_pass['id'];

            $query8 = mysqli_query($conn, "UPDATE `users` SET `username` = '$name', `ava` = '$ava' WHERE `users`.`id` = $userid");
            $query9 = mysqli_query($conn, "INSERT INTO `changes` (`id`, `last_name`, `last_ava`, `name`, `ava`, `date`) VALUES (NULL, '$last_name', '$last_ava', '$name', '$ava', NOW())");
            if ($query8 == false) {
                echo "<div class='error'>
                    <i class='fa fa-times'>&nbsp;</i><span>Өзгеріс жасау мүмкін емес!</span>
                    </div>";
            } else { echo "<div class='succ'>
                    <i class='fa fa-check'></i><span>&nbsp;Өзгеріс сәтті аяқталды!</span>
                    </div>"; }
        } else {
            echo "<div class='error'>
                    <i class='fa fa-times'></i>&nbsp;<span>";
            echo array_shift($errors);
            echo "</span>
                    </div>";
        }
        
    }
}
function check () {
    if (isset($_COOKIE["token"])) {
        global $conn;
        $token_check = $_COOKIE["token"];
        $query2 = mysqli_query($conn, "SELECT * FROM `users` WHERE `token2` = '$token_check' LIMIT 1");
        $profile_check=mysqli_fetch_array($query2);
        if (empty($profile_check)) {
            return false;
        } else {
            return true;
        }
    } else {
        return false;
    }
}
function logout() {
    if (isset($_POST['logout'])) {
        setcookie("token", "");
        $url = $_SERVER['HTTP_REFERER'];
        header("Location: {$url}");
    }
}
function getProfile() {
    global $conn;
    $token2 = $_COOKIE['token'];
    $query4 = mysqli_query($conn, "SELECT * FROM `users` WHERE `token2` = '$token2' LIMIT 1");
    $getProfile = mysqli_fetch_array($query4);
    $GLOBALS['userid'] = $getProfile['id'];
    $GLOBALS['username'] = $getProfile['username'];
    $GLOBALS['useremail'] = $getProfile['email'];
    $GLOBALS['userava'] = $getProfile['ava'];
    $GLOBALS['userip'] = $getProfile['ip'];
    $GLOBALS['token3'] = $getProfile['token3'];
    $GLOBALS['userblock'] = $getProfile['block'];
    if ($getProfile['block'] == '0') {
        $GLOBALS['userperk'] = "<span style='font-weight: 600; color: var(--text-color); '>Қолданушы</span>";
    }
    if ($getProfile['block'] == '2') {
        $GLOBALS['userperk'] = "<span style='font-weight: 600; color: green'>Админ</span>";
    }
    if ($getProfile['block'] == '3') {
        $GLOBALS['userperk'] = "<span style='color: green'>Редактор</span>";
    }
    if ($getProfile['block'] == '1') {
        $GLOBALS['userperk'] = "<span style='color: red; font-weight: 600;'>Бұғатталған</span>";
    }
}
function getPosts() {
    global $conn;
    $num = 1; 
    //Url-дан қай бетте тұрғанымызда анықтаймыз
    $page = isset($_GET['page']) ? $_GET['page']: 1; 

    //Базадағы барлық жазбалар саны
    $result = mysqli_query($conn, "SELECT COUNT(*) FROM posts WHERE `block` = 0");
    $temp = mysqli_fetch_array($result);
    $posts = $temp[0];

    // Қанша бет керек екенін анықтаймыз 
    $total = intval(($posts - 1) / $num) + 1; 


    $page = intval($page); 

    // Егер page жоқ болса немесе 0-ден төмен болса немесе соңғы беттен көп болса page=1-ке редирект
    if(empty($page) or $page < 0) { header("Location: ?page=1"); }
      if($page > $total) { header("Location: ?page=1"); }

    // Қай жазбадан басатаймыз
    $start = $page * $num - $num;



    
    $sql = mysqli_query($conn, "SELECT * FROM `posts` WHERE `block` = 0 ORDER BY date DESC LIMIT $start, $num");
    while ($result =mysqli_fetch_array($sql)) {
        $regular_date = realtive_date($result['date']);
        if (empty($result['image'])) {
            $last_img= "&nbsp;&nbsp;&nbsp;&nbsp;";
        } else {
            if (empty($result['alt'])) {
                $last_img = "<img class='lazy' data-src='".$result['image']."' >";
            } else {
                $last_img = "<img class='lazy' data-src='".$result['image']."' alt='".$result['alt']."' >";
            }
            
        }
        $puri1 = $result['uri'];
        $commentcount = mysqli_query($conn, "SELECT COUNT(*) FROM comments WHERE `block` = 0 AND `puri` = '$puri1'");
        $temp = mysqli_fetch_array($commentcount);
        $allcomment = $temp[0];
        global $userblock;
        echo "
                <div class='article'>
                            {$last_img}
                            <div class='article-content'>
                                <div class='top-info'>
                                    <div class='date'>
                                    <p>
                                        <i class='fa fa-calendar-o'></i>&nbsp;{$regular_date}<br>
                                    </p>
                                    </div>
                                </div>

                                <div class='title'><a href='post/{$result['uri']}'><p>{$result['title']}</p></a></div>
                                <div class='short-text'>{$result['stxt']}</div>
                                <div class='read'>
                                    <a href='post/{$result['uri']}' class='readb' title='{$result['title']}'>Оқу&nbsp;<i class='fa fa-angle-right'></i></a>

                                    <span class='fa fa-eye' aria-hidden='true' id='icon1'></span><span class='count'>{$result['views']}</span>
                                    <span class='fa fa-comments' aria-hidden='true' id='icon2'></span><span class='count'>{$allcomment}</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                                    if (check()) {
                                        if ($userblock==2) {
                                            echo "<a href='editpost.php?id={$result['id']}'><span class='fa fa-pencil' aria-hidden='true' id='icon1'></span></a>";
                                            echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class='fa fa-lock' aria-hidden='true' id='icon1' onclick='deletePost1(".$result['id'].")' style='cursor: pointer;'></span><span class='count'></span>";
                                        } 
                                    }
                                    echo "
                                </div>
                            </div>
                        </div>
                     
            "; 
        }
        // Навигация

    // Стрелка "<"
    if ($page > 3) { $pervpage = '<a href= .?page=1><</a> '; } else { $pervpage = ""; }

    // Стрелка ">" 
    if ($page < ($total-2)) { $nextpage = ' <a href= .?page=' .$total. '>></a>'; } else { $nextpage = ""; }


    // 1 2 ...
    if($page < ($total - 5)) { $end3page = ' <a class="threepoint">...</a> <a href= .?page=' .($total - 1). '>'. ($total - 1) .'</a> <a href= .?page=' .$total. '>'. $total .'</a>'; } else { $end3page = ""; }
    // ... 10 11
    if($page > 5) { $start3page = '<a href= .?page=1>1</a> <a href= .?page=2>2</a> <a class="threepoint">...</a> '; } else { $start3page = ""; }



    //Солжақтағы екеуі
    if($page - 2 > 0) { $page2left = '<a href= .?page='. ($page - 2) .'>'. ($page - 2) .'</a> '; } else { $page2left = ""; }
    if($page - 1 > 0) { $page1left = '<a href= .?page='. ($page - 1) .'>'. ($page - 1) .'</a> '; } else { $page1left = ""; }

    //Оңжақтағы екеуі
    if($page + 1 <= $total) { $page2right = ' <a href= .?page='. ($page + 1) .'>'. ($page + 1) .'</a>'; } else { $page2right = ""; }
    if($page + 2 <= $total) { $page1right = ' <a href= .?page='. ($page + 2) .'>'. ($page + 2) .'</a>'; } else { $page1right = ""; }
    if ($posts > 5) {
    echo "<div class='navi' id='navi'>";
    echo $pervpage.$start3page.$page2left.$page1left.'<a class="active">'.$page.'</a>'.$page2right.$page1right.$end3page.$nextpage; 
    echo "</div>";
    } else {
        echo "";
    }
}
function ValUri() {
    if (isset($_POST['valuri'])) {
        global $conn;
        $uri = $_POST['uri'];
        if (empty($uri)) {
            echo "<span style='color: red;'>Сілтемені жазыңыз!</span><br>";
        } else {
            $query10 = mysqli_query($conn, "SELECT * FROM `posts` WHERE `uri` = '$uri' LIMIT 1");
        $uri_check=mysqli_fetch_array($query10);
        if (empty($uri_check)) {
            $count_uri = str_word_count($uri);
            if ($count_uri>1) {
                echo "<span style='color: red;'>Тек 1 сілтеме көрсете аласыз!</span><br>";
            } else {
                echo "<span style='color: green;'>Бұл сілтеме бос!</span><br>";
            }
        } else {
            echo "<span style='color: red;'>Сілтеме бос емес!</span><br>";
        }
        }    
    }
}
function addPost() {
    global $conn;
    global $main_url;
    if (isset($_POST['addpost'])) {
        $title = $_POST['title'];
        $stxt = $_POST['stxt'];
        $ftxt = $_POST['ftxt'];
        $uri = $_POST['uri'];
        $img = $_POST['img'];
        $alt = $_POST['alt'];
        $autor = $_POST['autor'];
        $uid = $_POST['uid'];
        $desc = $_POST['desc'];
        $keys = $_POST['keys'];
        $block = $_POST['block'];

        $errors = array();
        if( empty($_POST['title'])){
          $errors[] = 'Тақырып жазылмаған';
        } elseif(str_word_count($title)>255){
          $errors[] = 'Тақырып 255 сөзден асапауы қажет!';
        }
        if( empty($_POST['stxt'])){
          $errors[] = 'Қысқа текст жазылмаған!';
        }
        if( empty($_POST['ftxt'])){
          $errors[] = 'Текст жазылмаған!';
        }
        if( empty($_POST['uri'])){
          $errors[] = 'Uri жазылмаған!';
        } else {
            $query10 = mysqli_query($conn, "SELECT * FROM `posts` WHERE `uri` = '$uri' LIMIT 1");
            $uri_check=mysqli_fetch_array($query10);
        if (empty($uri_check)) {
            $count_uri = str_word_count($uri);
            if ($count_uri>1) {
                $errors[] = 'Тек 1 сілтеме көрсете аласыз!';
            } 
        } else {
            $errors[] = 'Сілтеме бос емес!';
        }
        } 
        if( empty($_POST['img'])){
            $alt = "";
        } else {
            if (empty($alt)) {
                $errors[] = 'Alt жазылмаған!';
            } 
        }
        if( empty($_POST['autor'])){
          $errors[] = 'Автор белгісіз!';
        }
        if( empty($_POST['uid'])){
          $errors[] = 'Автор белгісіз!';
        }
        if( empty($_POST['desc'])){
          $errors[] = 'Сипаттама жазылмаған!';
        }
        if(str_word_count($desc)>150){
          $errors[] = 'Сипаттама 150 сөзден асапауы қажет!';
        }
        if( empty($_POST['keys'])){
          $errors[] = 'Ең кем дегенде 5 кілтсқз жазылуы керек!';
        }
        
        if (empty($errors)) {
            $add = mysqli_query($conn, "INSERT INTO `posts` (`id`, `uri`, `title`, `stxt`, `ftxt`, `image`, `alt`, `date`, `autor`, `desc`, `keys`, `block`, `last_date`, `uid`) VALUES (NULL, '$uri', '$title', '$stxt', '$ftxt', '$img', '$alt', NOW(), '$autor', '$desc', '$keys', '$block',NOW(), '$uid')");
            echo "<div class='succ'>
                    <i class='fa fa-check'></i><span>&nbsp;Жазбаны көру үшін cілтемеге өтіңіз: <a href='{$main_url}/post/{$uri}' style='display: inline !important;'>{$main_url}/post/{$uri}</a></span>
                    </div><br>";
        } else {
            echo "<div class='error'>
                    <i class='fa fa-times'></i>&nbsp;<span>";
            echo array_shift($errors);
            echo "</span>
                    </div><br>";
        }
    }
}
function sentComment () {
    global $conn;
    if (isset($_POST['sentcom'])) {
        $content = htmlspecialchars($_POST['content']);
        $puri = $_POST['puri'];
        $name = htmlspecialchars($_POST['username']);
        $errors = array();
        if (check()) {
            getProfile();
            global $username;
            global $userid;
            $name1 = $username;
            $uid1 = $userid;
        } else {
            $uid1 = '0';
            if( empty($name)){
              $errors[] = 'Аты-жөніңіз жазылмаған';
            } else {
                $name1 = $name;
                setcookie("name", "$name");
            }
        }
        if( empty($_POST['content'])){
          $errors[] = 'Текст жазылмаған';
        }
        if (empty($errors)) {
            $comment = mysqli_query($conn, "INSERT INTO `comments` (`id`, `puri`, `name`, `content`, `date`, `block`, `uid`) VALUES (NULL, '$puri', '$name1', '$content', NOW(), '0', '$uid1')");
            if ($comment) {
                return false;
            } else {
                echo "<div class='error'>
                    <i class='fa fa-times'>&nbsp;</i><span>Қателік! қайтадан көріңіз</span>
                    </div>";
            }
        } else {
            echo "<div class='error'>
                    <i class='fa fa-times'></i>&nbsp;<span>";
            echo array_shift($errors);
            echo "</span>
                    </div><br>";
        }
    }
}
function getComment() {
    if (isset($_POST['comment'])) {
        global $conn;
        $puri = $_POST['puri'];

        $result = mysqli_query($conn, "SELECT COUNT(*) FROM comments WHERE `block` = 0 AND `puri` = '$puri'");
        $temp = mysqli_fetch_array($result);
        $allcomment = $temp[0];
        echo "<div class='allcomment'><p>Комметарийлер-{$allcomment}</p></div>";

        $query11 = mysqli_query($conn, "SELECT * FROM `comments` WHERE `block` = 0 AND `puri` = '$puri' ORDER BY date DESC");
        if (empty($allcomment)) {
            echo "<div class='writedcomment'><p class='contentofcomment'>Ең бірінші болып комментарий жаз!</p></div>";
        }
        while ($comment =mysqli_fetch_array($query11)) {
            $comment_date = realtive_date($comment['date']);
            echo "
                        <div class='writedcomment'>
                        <div class='ononeline'>
                            <div class='nameofcomment' title='Жауап беру' onclick='answer(this)'>{$comment['name']}&nbsp;<i class='fa fa-caret-right answer'></i></div>
                            <div class='dateofcomment'><p>{$comment_date}</p></div>
                        </div>
                            <p class='contentofcomment'>{$comment['content']}</p>
                        </div>";
        } 
    }
}
function lastWeek () {
    global $conn;
    $lastweek = mysqli_query($conn, "SELECT * FROM `posts` WHERE date >= DATE(NOW()) - INTERVAL 10 DAY AND `block` = '0' ORDER BY views DESC LIMIT 5");
    while ($lastest =mysqli_fetch_array($lastweek)) {
        $puri1 = $lastest['uri'];
        $commentcount = mysqli_query($conn, "SELECT COUNT(*) FROM comments WHERE `block` = 0 AND `puri` = '$puri1'");
        $temp = mysqli_fetch_array($commentcount);
        $allcomment = $temp[0];
            echo "
             <div class='last-title'>
             {$week_starts}
                <a href='post/{$lastest['uri']}'>{$lastest['title']}</a>
            </div>
            <div class='read'>
                    <span class='fa fa-eye' aria-hidden='true' id='icon1'></span><span class='count'>{$lastest['views']}</span>
                    <span class='fa fa-comments' aria-hidden='true' id='icon2'></span><span class='count'>{$allcomment}</span>
            </div>
            <hr class='tophr'>";
    } 
} // Топ 5 запис по просмотру в последном 10 дне
function lastPosts () {
    global $conn;
    $lastweek = mysqli_query($conn, "SELECT * FROM `posts` WHERE `block` = '0' ORDER BY `date` DESC LIMIT 15");
    while ($lastest =mysqli_fetch_array($lastweek)) {
        $puri1 = $lastest['uri'];
        $commentcount = mysqli_query($conn, "SELECT COUNT(*) FROM comments WHERE `block` = 0 AND `puri` = '$puri1'");
        $temp = mysqli_fetch_array($commentcount);
        $allcomment = $temp[0];
            echo "
             <div class='last-title'>
             {$week_starts}
                <a href='post/{$lastest['uri']}'>{$lastest['title']}</a>
            </div>
            <div class='read'>
                    <span class='fa fa-eye' aria-hidden='true' id='icon1'></span><span class='count'>{$lastest['views']}</span>
                    <span class='fa fa-comments' aria-hidden='true' id='icon2'></span><span class='count'>{$allcomment}</span>
            </div>
            <hr class='tophr'>";
    } 
} //Последный 15 запис
function editPost() {
    global $conn;
    global $main_url;
    if (isset($_POST['editpost'])) {
        $title = $_POST['title'];
        $stxt = $_POST['stxt'];
        $ftxt = $_POST['ftxt'];
        $uri = $_POST['uri'];
        $img = $_POST['img'];
        $alt = $_POST['alt'];
        $block = $_POST['block'];
        $autor = $_POST['autor'];
        $uid = $_POST['uid'];
        $desc = $_POST['desc'];
        $keys = $_POST['keys'];
        $date = $_POST['date'];
        $views = $_POST['views'];
        $pid = $_POST['pid'];
        $errors = array();
        if( empty($_POST['title'])){
          $errors[] = 'Тақырып жазылмаған';
        } elseif(str_word_count($title)>255){
          $errors[] = 'Тақырып 255 сөзден асапауы қажет!';
        }
        if( empty($_POST['stxt'])){
          $errors[] = 'Қысқа текст жазылмаған!';
        }
        if( empty($_POST['ftxt'])){
          $errors[] = 'Текст жазылмаған!';
        }
        if( empty($_POST['uri'])){
          $errors[] = 'Uri жазылмаған!';
        } else {
            $query10 = mysqli_query($conn, "SELECT * FROM `posts` WHERE `uri` = '$uri' LIMIT 1");
            $uri_check=mysqli_fetch_array($query10);
        if (empty($uri_check)) {
            $count_uri = str_word_count($uri);
            if ($count_uri>1) {
                $errors[] = 'Тек 1 сілтеме көрсете аласыз!';
            } 
        } else {
            
        }
        } 
        if( empty($_POST['img'])){
            $alt = "";
        } else {
            if (empty($alt)) {
                $errors[] = 'Alt жазылмаған!';
            } 
        }
        if( empty($_POST['autor'])){
          $errors[] = 'Автор белгісіз!';
        }
        if( empty($_POST['uid'])){
          $errors[] = 'Автор белгісіз!';
        }
        if( empty($_POST['desc'])){
          $errors[] = 'Сипаттама жазылмаған!';
        }
        if(str_word_count($desc)>150){
          $errors[] = 'Сипаттама 150 сөзден асапауы қажет!';
        }
        if( empty($_POST['keys'])){
          $errors[] = 'Ең кем дегенде 5 кілтсқз жазылуы керек!';
        }
        if( empty($_POST['date'])){
          $errors[] = 'Дата жазылмаған!';
        }
        if( empty($_POST['views'])){
          $errors[] = 'Көрілім саны жазылмаған!';
        }
        if( empty($_POST['pid'])){
          $errors[] = 'Бұндай жазба жоқ!';
        }
        if (empty($errors)) {
            $add = mysqli_query($conn, "UPDATE `posts` SET `uri` = '$uri', `title` = '$title',`stxt` = '$stxt', `ftxt` = '$ftxt', `image` = '$img', `alt` = '$alt', `date` = '$date', `desc` = '$desc',`keys` = '$keys', `block` = '$block', `last_date` = NOW(), `views` = '$views' WHERE `posts`.`id` = '$pid'");
            echo "<div class='succ'>
                    <i class='fa fa-check'></i><span>&nbsp;Жазба өзгертілід!<br>Жазбаны көру үшін cілтемеге өтіңіз: <a href='{$main_url}/post/{$uri}' style='display: inline !important;'>{$main_url}/post/{$uri}</a></span>
                    </div><br>";
        } else {
            echo "<div class='error'>
                    <i class='fa fa-times'></i>&nbsp;<span>";
            echo array_shift($errors);
            echo "</span>
                    </div><br>";
        }
    }
}
function deletePost() {
    global $conn;
    if (isset($_POST['deletepost'])) {
        $errors = array();
        if (empty($_POST['id'])) {
            $errors[] = 'Бұндай жазба жоқ!';
        } else {
            $pid = $_POST['id'];
        }
        if (empty($errors)) {
            $delete =  mysqli_query($conn, "UPDATE `posts` SET `block` = '1' WHERE `id` = '$pid'");
            if ($delete) {
                echo "<div class='succ'>
                    <i class='fa fa-check'></i><span>&nbsp;Жазба сәтті өшірілді</span>
                    </div><br>";
            } else {
                 echo "<div class='error'>
                    <i class='fa fa-times'>&nbsp;</i><span>Қателік! қайтадан көріңіз</span>
                    </div>";
                    echo mysqli_error($conn);
            }
        } else {
            echo "<div class='error'>
                    <i class='fa fa-times'></i>&nbsp;<span>";
            echo array_shift($errors);
            echo "</span>
                    </div><br>";
        }
    }
}
function unDeletePost() {
    global $conn;
    if (isset($_POST['undeletepost'])) {
        $errors = array();
        if (empty($_POST['id'])) {
            $errors[] = 'Бұндай жазба жоқ!';
        } else {
            $pid = $_POST['id'];
        }
        if (empty($errors)) {
            $delete =  mysqli_query($conn, "UPDATE `posts` SET `block` = '0' WHERE `id` = '$pid'");
            if ($delete) {
                echo "<div class='succ'>
                    <i class='fa fa-check'></i><span>&nbsp;Жазба сәтті қалпына келтірілді!</span>
                    </div><br>";
            } else {
                 echo "<div class='error'>
                    <i class='fa fa-times'>&nbsp;</i><span>Қателік! қайтадан көріңіз</span>
                    </div>";
                    echo mysqli_error($conn);
            }
        } else {
            echo "<div class='error'>
                    <i class='fa fa-times'></i>&nbsp;<span>";
            echo array_shift($errors);
            echo "</span>
                    </div><br>";
        }
    }
}