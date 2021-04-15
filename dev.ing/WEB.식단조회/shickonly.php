
<?php
/**
 * Template Name: shickonly
 */

get_header(); ?>

<style>

    table { position:relative; }
    .hentry { margin:0; display:none; }
    .shickdan { padding-left:30px;}
    .shickdan h1 { font-weight:normal; font-family:'210gullim'; font-size:28px; color:#333; }
    .shickp { font-weight:normal; font-family:'210gullim'; font-size:20px; color:#333; padding-left:30px; margin-bottom:10px;}
    .shick_table td { text-align:center; }
    .shick_table td { width:50%; font-size:1.1rem; font-weight:bold; vertical-align:middle; text-align:center; }
    .today_day { padding:0 30px; margin: 0 auto; text-align:center; }
    .today_day div { display:inline-block; }

    .prev_shick input[type="submit"] { background-color:#fff !important; color:#427ac7 !important; padding-left:60px;
        background-image:url(/wp-content/themes/storefront-child/image/icon/left_arrow_green.png); background-position:5% 50%; background-size:20px; background-repeat:no-repeat; border-top-left-radius:9px; border-bottom-left-radius:9px; box-shadow:0px 0px 2px #666; }

    .next_shick input[type="submit"] { background-color:#427ac7 !important; color:#fff; padding-right:60px;
        background-image:url(/wp-content/themes/storefront-child/image/icon/right_arrow_new.png); background-position:95% 50%; background-size:20px; background-repeat:no-repeat; border-top-right-radius:9px; border-bottom-right-radius:9px; box-shadow:0px 0px 2px #666; }

    .under_table { text-align:center; font-size:0.5rem; }
    .under_table td { width:16.66%; height:40px; text-align:center; vertical-align:middle; }

    @media only screen and (min-width: 1070px) {
        .pop_up { left:50%; max-width:418px; }
    }

    #auth_snack tbody { overflow:hidden; position:relative; }
    #auth_snack.authoff tbody:after { content:'간식옵션을 선택하지 않았습니다.'; border-radius:9px; position:absolute; top:0; left:0; width:100%; height:100%; display:block; background-color:#e7e7e7; overflow:hidden; line-height:8.5; text-align:center; }

    .after_snack { text-align:center; font-weight:bold; padding-bottom:30px; }

    .pop_up { box-shadow:0 -7px 10px 0 rgba(0,0,0,.18); background-color:#fff; border-top-right-radius:50px; border-top-left-radius:50px; width:100%; height:100%; margin:0; padding:0; transition:all 600ms cubic-bezier(0.86, 0, 0.07, 1); top:105%; position:fixed; z-index:300; }
    .pop_up.on { top:15%; overflow:scroll; }
    .close { background-color:#202020; z-index:999; border-radius:100%; display:none; position:fixed; right:20px; top:20%; background-image:url(/wp-content/themes/storefront-child/image/x_btn.png); width:30px; height:30px; text-align:center; background-size:cover; background-position:center; background-repeat:no-repeat; }
    .makebox .title { margin-top:30px; margin-bottom:30px; text-align:center; }
    .makebox .title h3 { margin-top:0; }
    .makebox { padding-bottom:200px; }
    .makebox .makestep { padding:8px 20px; }
    .makebox .makestep .maketext p { font-size:20px; }
    .makebox .makestep .makenumber { font-size:25px; font-weight:800; }
    .save_btn { margin-top:10px; display:none; }


     .back_header .back_head .title h2:after { content:'\25B6'; padding:0 5px; position:absolute; font-size:12px; padding-top:4px; transform:rotate(90deg); -wekkit-transform:rotate(90deg); }
    .back_header .back_head .title .ons:after { transform:rotate(270deg); -wekkit-transform:rotate(270deg); }

    #auth_snack.snack_bloom tbody { display:block; }

    .sample:after { background-image:linear-gradient(40deg,rgba(255,255,255,.15) 25%,transparent 25%,transparent 50%,rgba(255,255,255,.15) 50%,rgba(255,255,255,.15) 75%,transparent 75%,transparent); background-size:50px; content:'Sample'; background-color:#999; width:100%; height:40px; position:absolute; display:block; left:0; opacity:0.9; vertical-align:middle; color:#fff; font-weight:800; line-height:2; text-align:center; font-size:22px; top:50%; z-index:2; }

</style>
<div class="period_choice">
<div class="choice_tab flex">
    <div class="flexible choice_tabs open">
        <p><a href="/menucheck">식단 확인하기</a></p>
    </div>
    <div class="flexible choice_tabs">
        <p><a href="/dodamreport">보고서 확인하기</a></p>
    </div>
</div>
</div>

<div class="back_header">
    <div class="back_head">
        <li class="back">
            <a href="javascript:window.history.back();"></a>
        </li>
        <li class="title" id="move_paycheck_click">
            <h2 id="name_toggle">식단 확인하기</h2>
        </li>
    </div>
</div>

<div id="primary" class="content-area login-auth-on">
    <main id="main" class="site-main" role="main">

        <?php if( current_user_can( 'subscriber' ) ){
            $userid = get_user_meta( $current_user -> ID, 'username', true );
            $username = get_user_meta( $current_user -> ID, 'first_name', true );
            $user_auth = 1;
            $mysqli = new mysqli('localhost', 'olivejnainc', 'Goyo5713**', 'olivejnainc');
            if($mysqli->connect_errno) die('Connect failed: '.$mysqli->connect_error);
            if(!$mysqli->set_charset('utf8')) die('Error loading character set utf8: '.$mysqli->error);
        }
        
        else
        { 
            
            $user_auth = 2;
            
        } ?>


        <form style="margin:0;">
            <input type="hidden" name="userid" id="userid" value="<?php echo $userid ?>">
            <input type="hidden" name="user_auth" id="login_auth" value="<?php echo $user_auth ?>">
        </form>


        <script>
            var userInput = "";
            userInput = $("#userid").val();

            window.onload = function() {
                var viewsikdan = document.getElementById("<?php echo $userid ?>");
                viewsikdan.style.display="block";

            }

        </script>
        <?php
        while ( have_posts() ) :
            the_post();

            do_action( 'storefront_page_before' );

            get_template_part( 'content', 'page' );

            /**
             * Functions hooked in to storefront_page_after action
             *
             * @hooked storefront_display_comments - 10
             */
            do_action( 'storefront_page_after' );

        endwhile; // End of the loop.
        ?>

        <?php

        function onlyHanAlpha($subject) {
            $pattern = '/([\xEA-\xED][\x80-\xBF]{2}|[a-zA-Z])+/';
            preg_match_all($pattern, $subject, $match);
            return implode('', $match[0]);
        }


        //echo "$userid","-1";

        $users = "$userid"."-1"; // 유저명
        $userss = "$userid"."-2"; // 유저명
        $usersss = "$userid"."-3"; // 유저명
        $userssss = "$userid"."-4"; // 유저명
        $usersssss = "$userid"."-5"; // 유저명
        $userssssss = "$userid"."-6"; // 유저명

        $add_day = " SELECT delinum FROM shicktest WHERE userid = '$users'";
        $day_result = mysqli_query($mysqli, $add_day);
        $re_day = mysqli_fetch_array($day_result);
        $rre_day = $re_day['delinum'];

        $gap_day = date("w");
        $real_today = date("Y-m-d");
        $mon_day = date('Y-m-d',strtotime('-'.($gap_day - 1).'days'));
        $abouttime = date('Y-m-d',strtotime($mon_day.'+'.$rre_day.'days'));
        $todays = date("Y-m-d");


        if(isset($_POST['post_next']))
        {
            $abouttime = $_POST['post_next'];
            $abouttime = date('Y-m-d',strtotime($abouttime.'+7days'));
        }
        else
        {
            $abouttime = date('Y-m-d',strtotime($abouttime));
        }

        if(isset($_POST['post_prev']))
        {
            $abouttime = $_POST['post_prev'];
            $abouttime = date('Y-m-d',strtotime($abouttime.'-7days'));
        }
        else
        {
            $abouttime = date('Y-m-d',strtotime($abouttime));
        }

        $auth_query = "SELECT userid FROM userbase WHERE opt LIKE '%간식%'";
        $auth_result = mysqli_query($mysqli, $auth_query);
        $auth_row = array();
        while( $auth_row = mysqli_fetch_array($auth_result)){
            $auth_array[] = $auth_row[userid];
        }

        if ( in_array($userid, $auth_array )) {
            $auth_code = "1";
        } else {
            $auth_code = "2";
        }

        ?>

        <input type="hidden" name="auth_code" value="<?php echo $auth_code ?>">


        <div class="<?php echo $userid ?> shickdan" id="<?php echo $userid ?>">
            <h1> <?php echo $username ?>님의 식단입니다</h1>
        </div>

        <div class="today_day" style="margin-bottom:20px;">

            <div class="prev_shick">
                <form method="post" action="/menucheck">
                    <input type="hidden" value="<?php echo $abouttime ?>" name="post_prev" />
                    <input type="submit" name="prev" id="prev" value="지난주 식단" /><br />
                </form>
            </div>
            <div class="next_shick">
                <form method="post" action="/menucheck">
                    <input type="hidden" value="<?php echo $abouttime ?>" name="post_next" />
                    <input type="submit" name="next" id="prev" value="다음주 식단" /><br />
                </form>
            </div>
        </div>
        <div>
            <p class="shickp"><?php echo $abouttime ?> 배송출발 식단</p>
        </div>

        <?php
        //테이블 구문
        $today = "SELECT * FROM shicktest WHERE userid = '$users'";
        $result = mysqli_query($mysqli, $today);
        while($row = mysqli_fetch_array($result)){
            $menuname = $row[$abouttime];
            //echo "<tr><td>",$row[$abouttime],"</td></tr>" ;
        }
        $todayy = "SELECT * FROM shicktest WHERE userid = '$userss'";
        $results = mysqli_query($mysqli, $todayy);
        while($row = mysqli_fetch_array($results)){
            $menunamee = $row[$abouttime];
            //echo "<tr><td>",$row[$abouttime],"</td></tr>" ;
        }
        $todayyy = "SELECT * FROM shicktest WHERE userid = '$usersss'";
        $resultss = mysqli_query($mysqli, $todayyy);
        while($row = mysqli_fetch_array($resultss)){
            $menunameee = $row[$abouttime];
            //echo "<tr><td>",$row[$abouttime],"</td></tr>" ;
        }
        $todayyyy = "SELECT * FROM shicktest WHERE userid = '$userssss'";
        $resultsss = mysqli_query($mysqli, $todayyyy);
        while($row = mysqli_fetch_array($resultsss)){
            $menunameeee = $row[$abouttime];
            //echo "<tr><td>",$row[$abouttime],"</td></tr>" ;
        }
        $todayyyyy = "SELECT * FROM shicktest WHERE userid = '$usersssss'";
        $resultssss = mysqli_query($mysqli, $todayyyyy);
        while($row = mysqli_fetch_array($resultssss)){
            $menunameeeee = $row[$abouttime];
            //echo "<tr><td>",$row[$abouttime],"</td></tr>" ;
        }
        $todayyyyyy = "SELECT * FROM shicktest WHERE userid = '$userssssss'";
        $resultsssss = mysqli_query($mysqli, $todayyyyyy);
        while($row = mysqli_fetch_array($resultsssss)){
            $menunameeeeee = $row[$abouttime];
            //echo "<tr><td>",$row[$abouttime],"</td></tr>" ;
        }



        ?>

        <table class="shick_table" style="padding:0 30px; font-size:20px; font-weight:bold;">
            <tbody>


            <tr>
                <td style="font-size:1.1rem; border-right:2px solid #fff; background-color:#427ac7; color:#fff; border-top-left-radius:9px;">4끼 메뉴</td>
                <td style="font-size:1.1rem; background-color:#427ac7; color:#fff; border-top-right-radius:9px;">3끼 메뉴</td>
            </tr>
            <tr>
                <td id="pop_up1" style=" height:44px; border-left:1px solid #e7e7e7;"><?php echo $menuname ?></td>
                <td id="pop_up4" style=" height:44px; border-right:1px solid #e7e7e7;"><?php echo $menunameeee ?></td>
            </tr>
            <tr>
                <td id="pop_up2" style=" height:44px; border-left:1px solid #e7e7e7;"><?php echo $menunamee ?></td>
                <td id="pop_up5" style="height:44px; border-right:1px solid #e7e7e7;"><?php echo $menunameeeee ?></td>
            </tr>
            <tr>
                <td id="pop_up3" style="height:44px; border-left:1px solid #e7e7e7; border-bottom:1px solid #e7e7e7;border-bottom-left-radius:9px;"><?php echo $menunameee ?></td>
                <td id="pop_up6" style="height:44px; border-right:1px solid #e7e7e7; border-bottom:1px solid #e7e7e7; border-bottom-right-radius:9px;"><?php echo $menunameeeeee ?></td>
            </tr>


            </tbody>
        </table>

        <div>
            <p class="shickp"><?php echo $abouttime ?> 간식 식단</p>
        </div>

        <?php



        for ($sd=1; $sd<=6; $sd=$sd+1){
            $usercode = $userid;
            $usercode .= "-".$sd;
            $snack_menu_query = "SELECT * FROM snacktable WHERE userid = '$usercode'";
            $snack_menu_result = mysqli_query($mysqli,$snack_menu_query);
            while ($snack_menu_row = mysqli_fetch_array($snack_menu_result)) {
                $snack_menus[$abouttime][$sd] = $snack_menu_row[$abouttime];
            }

        }



        ?>
        <div class="">

            <table class="shick_table" id="auth_snack" style="padding:0 30px; margin-bottom:10px; font-size:20px; font-weight:bold;">

                <tbody>

                <tr>
                    <td style="font-size:1.1rem; border-right:2px solid #fff; background-color:#427ac7; color:#fff; border-top-left-radius:9px;">오전 메뉴</td>
                    <td style="font-size:1.1rem; background-color:#427ac7; color:#fff; border-top-right-radius:9px;">오후 메뉴</td>
                </tr>
                <tr>
                    <td id="pop_up8" style=" height:44px; border-left:1px solid #e7e7e7;"><?php echo $snack_menus[$abouttime][2] ?></td>
                    <td id="pop_up7" style=" height:44px; border-right:1px solid #e7e7e7;"><?php echo $snack_menus[$abouttime][1] ?></td>
                </tr>
                <tr>
                    <td id="pop_up10" style="height:44px; border-left:1px solid #e7e7e7; border-bottom:1px solid #e7e7e7;border-bottom-left-radius:9px;"><?php echo $snack_menus[$abouttime][4] ?></td>
                    <td id="pop_up9" style="height:44px; border-right:1px solid #e7e7e7; border-bottom:1px solid #e7e7e7; border-bottom-right-radius:9px;"><?php echo $snack_menus[$abouttime][3] ?></td>
                </tr>


                </tbody>
            </table>

            <div class="after_snack">
                <p>메뉴 이름을 누르면<br>만드는 방법을 알려드려요!</p>
            </div>

        </div>


        <table class="under_table" style="padding:0 30px;">
            <tbody>
            <tr><td style="font-weight:bold; border-right:2px solid #fff; font-size:13px; background-color:#427ac7; color:#fff; border-top-left-radius:9px;">메뉴명</td>
                <td colspan="5" style="font-weight:bold; font-size:13px; background-color:#427ac7; color:#fff; border-top-right-radius:9px;">재료 및 친환경인증번호</td></tr>

            <?php
            $menunames = "SELECT * FROM menutest WHERE menu = '$menuname'";

            $menuresult = mysqli_query($mysqli, $menunames);
            while($menurow = mysqli_fetch_array($menuresult)){

                $onlyhana = onlyHanAlpha($menurow[jearyo1]);
                $onlyhanb = onlyHanAlpha($menurow[jearyo2]);
                $onlyhanc = onlyHanAlpha($menurow[jearyo3]);
                $onlyhand = onlyHanAlpha($menurow[jearyo4]);
                $onlyhane = onlyHanAlpha($menurow[jearyo5]);


                if(empty($menurow[jearyo2])){
                    $menurow[jearyo2] = '-';
                    $onlyhanb = '-';
                    $accnumb = '-';
                }

                if(empty($menurow[jearyo3])){
                    $menurow[jearyo3] = '-';
                    $onlyhanc = '-';
                    $accnumc = '-';
                }

                if(empty($menurow[jearyo4])){
                    $menurow[jearyo4] = '-';
                    $onlyhand = '-';
                    $accnumd = '-';
                }

                if(empty($menurow[jearyo5])){
                    $menurow[jearyo5] = '-';
                    $onlyhane = '-';
                    $accnume = '-';
                }

                echo "<tr><td rowspan='3' style='border-left:1px solid #e7e7e7; border-bottom:1px solid #e7e7e7;'>",$menuname,"</td><td>",$menurow[jearyo1],"</td><td>",$menurow[jearyo2],"</td><td>",$menurow[jearyo3],"</td><td>",$menurow[jearyo4],"</td><td style='border-right:1px solid #e7e7e7;'>",$menurow[jearyo5],"</td></tr>" ;
            }



            $accnamea = "SELECT * FROM acctest WHERE ingredients = '$onlyhana'";
            $accresulta = mysqli_query($mysqli, $accnamea);
            while($accrow = mysqli_fetch_array($accresulta)){
                $accnuma = $accrow[accreditnum];
                echo "<tr><td>",$accrow[accreditname],"</td>" ;
            }

            $accnameb = "SELECT * FROM acctest WHERE ingredients = '$onlyhanb'";
            $accresultb = mysqli_query($mysqli, $accnameb);
            while($accrow = mysqli_fetch_array($accresultb)){
                $accnumb = $accrow[accreditnum];
                echo "<td>",$accrow[accreditname],"</td>" ;
            }

            $accnamec = "SELECT * FROM acctest WHERE ingredients = '$onlyhanc'";
            $accresultc = mysqli_query($mysqli, $accnamec);
            while($accrow = mysqli_fetch_array($accresultc)){
                $accnumc = $accrow[accreditnum];
                echo "<td>",$accrow[accreditname],"</td>" ;
            }

            $accnamed = "SELECT * FROM acctest WHERE ingredients = '$onlyhand'";
            $accresultd = mysqli_query($mysqli, $accnamed);
            while($accrow = mysqli_fetch_array($accresultd)){
                $accnumd = $accrow[accreditnum];
                echo "<td>",$accrow[accreditname],"</td>" ;
            }

            $accnamee = "SELECT * FROM acctest WHERE ingredients = '$onlyhane'";
            $accresulte = mysqli_query($mysqli, $accnamee);
            while($accrow = mysqli_fetch_array($accresulte)){
                $accnume = $accrow[accreditnum];



                echo "<td style='border-right:1px solid #e7e7e7;'>",$accrow[accreditname],"</td></tr><tr><td style='border-bottom:1px solid #e7e7e7;'>",$accnuma,"</td> <td style='border-bottom:1px solid #e7e7e7;'>",$accnumb,"</td> <td style='border-bottom:1px solid #e7e7e7;'>",$accnumc,"</td><td style='border-bottom:1px solid #e7e7e7;'>",$accnumd,"</td><td style='border-bottom:1px solid #e7e7e7; border-right:1px solid #e7e7e7;'>",$accnume,"</td></tr>" ;
            }

            //-----------------------------------------------------------

            $menunamess = "SELECT * FROM menutest WHERE menu = '$menunamee'";

            $menuresultt = mysqli_query($mysqli, $menunamess);
            while($menurow = mysqli_fetch_array($menuresultt)){

                $onlyhanaa = onlyHanAlpha($menurow[jearyo1]);
                $onlyhanbb = onlyHanAlpha($menurow[jearyo2]);
                $onlyhancc = onlyHanAlpha($menurow[jearyo3]);
                $onlyhandd = onlyHanAlpha($menurow[jearyo4]);
                $onlyhanee = onlyHanAlpha($menurow[jearyo5]);

                if(empty($menurow[jearyo2])){
                    $menurow[jearyo2] = '-';
                    $onlyhanbb = '-';
                    $accnumbb = '-';
                }

                if(empty($menurow[jearyo3])){
                    $menurow[jearyo3] = '-';
                    $onlyhancc = '-';
                    $accnumcc = '-';
                }

                if(empty($menurow[jearyo4])){
                    $menurow[jearyo4] = '-';
                    $onlyhandd = '-';
                    $accnumdd = '-';
                }

                if(empty($onlyhanee)){
                    $menurow[jearyo5] = '-';
                    $onlyhanee = '-';
                    $accnumee = '-';
                }

                echo "<tr><td rowspan='3' style='border-left:1px solid #e7e7e7; border-bottom:1px solid #e7e7e7;'>",$menunamee,"</td> <td>",$menurow[jearyo1],"</td><td>",$menurow[jearyo2],"</td><td>",$menurow[jearyo3],"</td><td>",$menurow[jearyo4],"</td><td style='border-right:1px solid #e7e7e7;'>",$menurow[jearyo5],"</td></tr>" ;
            }

            $accnameaa = "SELECT * FROM acctest WHERE ingredients = '$onlyhanaa'";
            $accresultaa = mysqli_query($mysqli, $accnameaa);
            while($accrow = mysqli_fetch_array($accresultaa)){
                $accnumaa = $accrow[accreditnum];
                echo "<tr><td>",$accrow[accreditname],"</td>" ;
            }

            $accnamebb = "SELECT * FROM acctest WHERE ingredients = '$onlyhanbb'";
            $accresultbb = mysqli_query($mysqli, $accnamebb);
            while($accrow = mysqli_fetch_array($accresultbb)){
                $accnumbb = $accrow[accreditnum];
                echo "<td>",$accrow[accreditname],"</td>" ;
            }

            $accnamecc = "SELECT * FROM acctest WHERE ingredients = '$onlyhancc'";
            $accresultcc = mysqli_query($mysqli, $accnamecc);
            while($accrow = mysqli_fetch_array($accresultcc)){
                $accnumcc = $accrow[accreditnum];
                echo "<td>",$accrow[accreditname],"</td>" ;
            }

            $accnamedd = "SELECT * FROM acctest WHERE ingredients = '$onlyhandd'";
            $accresultdd = mysqli_query($mysqli, $accnamedd);
            while($accrow = mysqli_fetch_array($accresultdd)){
                $accnumdd = $accrow[accreditnum];
                echo "<td>",$accrow[accreditname],"</td>" ;
            }

            $accnameee = "SELECT * FROM acctest WHERE ingredients = '$onlyhanee'";
            $accresultee = mysqli_query($mysqli, $accnameee);
            while($accrow = mysqli_fetch_array($accresultee)){
                $accnumee = $accrow[accreditnum];
                $reditnamee = $accrow[accreditname];


                echo "<td style='border-right:1px solid #e7e7e7;'>",$accrow[accreditname],"</td> </tr> <tr><td style='border-bottom:1px solid #e7e7e7;'>",$accnumaa,"</td> <td style='border-bottom:1px solid #e7e7e7;'>",$accnumbb,"</td><td style='border-bottom:1px solid #e7e7e7;'>",$accnumcc,"</td><td style='border-bottom:1px solid #e7e7e7;'>",$accnumdd,"</td><td style='border-bottom:1px solid #e7e7e7; border-right:1px solid #e7e7e7;'>",$accnumee,"</td></tr>";
            }

            //-----------------------------------------------------------

            $menunamesss = "SELECT * FROM menutest WHERE menu = '$menunameee'";

            $menuresulttt = mysqli_query($mysqli, $menunamesss);
            while($menurow = mysqli_fetch_array($menuresulttt)){

                $onlyhanaaa = onlyHanAlpha($menurow[jearyo1]);
                $onlyhanbbb = onlyHanAlpha($menurow[jearyo2]);
                $onlyhanccc = onlyHanAlpha($menurow[jearyo3]);
                $onlyhanddd = onlyHanAlpha($menurow[jearyo4]);
                $onlyhaneee = onlyHanAlpha($menurow[jearyo5]);

                if(empty($menurow[jearyo2])){
                    $menurow[jearyo2] = '-';
                    $onlyhanbbb = '-';
                    $accnumbbb = '-';
                }

                if(empty($menurow[jearyo3])){
                    $menurow[jearyo3] = '-';
                    $onlyhanccc = '-';
                    $accnumccc = '-';
                }

                if(empty($menurow[jearyo4])){
                    $menurow[jearyo4] = '-';
                    $onlyhanddd = '-';
                    $accnumddd = '-';
                }

                if(empty($menurow[jearyo5])){
                    $menurow[jearyo5] = '-';
                    $onlyhaneee = '-';
                    $accnumeee = '-';
                }



                echo "<tr><td rowspan='3' style='border-left:1px solid #e7e7e7; border-bottom:1px solid #e7e7e7;'>",$menunameee,"</td> <td>",$menurow[jearyo1],"</td> <td>",$menurow[jearyo2],"</td><td>",$menurow[jearyo3],"</td><td>",$menurow[jearyo4],"</td><td style='border-right:1px solid #e7e7e7;'>",$menurow[jearyo5],"</td></tr>" ;
            }

            $accnameaaa = "SELECT * FROM acctest WHERE ingredients = '$onlyhanaaa'";
            $accresultaaa = mysqli_query($mysqli, $accnameaaa);
            while($accrow = mysqli_fetch_array($accresultaaa)){
                $accnumaaa = $accrow[accreditnum];
                echo "<tr><td>",$accrow[accreditname],"</td>" ;
            }

            $accnamebbb = "SELECT * FROM acctest WHERE ingredients = '$onlyhanbbb'";
            $accresultbbb = mysqli_query($mysqli, $accnamebbb);
            while($accrow = mysqli_fetch_array($accresultbbb)){
                $accnumbbb = $accrow[accreditnum];
                echo "<td>",$accrow[accreditname],"</td>" ;
            }

            $accnameccc = "SELECT * FROM acctest WHERE ingredients = '$onlyhanccc'";
            $accresultccc = mysqli_query($mysqli, $accnameccc);
            while($accrow = mysqli_fetch_array($accresultccc)){
                $accnumccc = $accrow[accreditnum];
                echo "<td>",$accrow[accreditname],"</td>" ;
            }

            $accnameddd = "SELECT * FROM acctest WHERE ingredients = '$onlyhanddd'";
            $accresultddd = mysqli_query($mysqli, $accnameddd);
            while($accrow = mysqli_fetch_array($accresultddd)){
                $accnumddd = $accrow[accreditnum];
                echo "<td>",$accrow[accreditname],"</td>" ;
            }

            $accnameeee = "SELECT * FROM acctest WHERE ingredients = '$onlyhaneee'";
            $accresulteee = mysqli_query($mysqli, $accnameeee);
            while($accrow = mysqli_fetch_array($accresulteee)){
                $accnumeee = $accrow[accreditnum];


                echo "<td style='border-right:1px solid #e7e7e7;'>",$accrow[accreditname],"</td></tr><tr><td style='border-bottom:1px solid #e7e7e7;'>",$accnumaaa,"</td><td style='border-bottom:1px solid #e7e7e7;'>",$accnumbbb,"</td><td style='border-bottom:1px solid #e7e7e7;'>",$accnumccc,"</td><td style='border-bottom:1px solid #e7e7e7;'>",$accnumddd,"</td><td style='border-bottom:1px solid #e7e7e7; border-right:1px solid #e7e7e7;'>",$accnumeee,"</td></tr>" ;
            }

            //-----------------------------------------------------------

            $menunamessss = "SELECT * FROM menutest WHERE menu = '$menunameeee'";

            $menuresultttt = mysqli_query($mysqli, $menunamessss);
            while($menurow = mysqli_fetch_array($menuresultttt)){

                $onlyhanaaaa = onlyHanAlpha($menurow[jearyo1]);
                $onlyhanbbbb = onlyHanAlpha($menurow[jearyo2]);
                $onlyhancccc = onlyHanAlpha($menurow[jearyo3]);
                $onlyhandddd = onlyHanAlpha($menurow[jearyo4]);
                $onlyhaneeee = onlyHanAlpha($menurow[jearyo5]);

                if(empty($menurow[jearyo2])){
                    $menurow[jearyo2] = '-';
                    $onlyhanbbbb = '-';
                    $accnumbbbb = '-';
                }

                if(empty($menurow[jearyo3])){
                    $menurow[jearyo3] = '-';
                    $onlyhancccc = '-';
                    $accnumcccc = '-';
                }

                if(empty($menurow[jearyo4])){
                    $menurow[jearyo4] = '-';
                    $onlyhandddd = '-';
                    $accnumdddd = '-';
                }

                if(empty($menurow[jearyo5])){
                    $menurow[jearyo5] = '-';
                    $onlyhaneeee = '-';
                    $accnumeeee = '-';
                }

                echo "<tr><td rowspan='3' style='border-left:1px solid #e7e7e7; border-bottom:1px solid #e7e7e7;'>",$menunameeee,"</td> <td>",$menurow[jearyo1],"</td><td>",$menurow[jearyo2],"</td><td>",$menurow[jearyo3],"</td><td>",$menurow[jearyo4],"</td><td style='border-right:1px solid #e7e7e7;'>",$menurow[jearyo5],"</td></tr>" ;

            }

            $accnameaaaa = "SELECT * FROM acctest WHERE ingredients = '$onlyhanaaaa'";
            $accresultaaaa = mysqli_query($mysqli, $accnameaaaa);
            while($accrow = mysqli_fetch_array($accresultaaaa)){
                $accnumaaaa = $accrow[accreditnum];
                echo "<tr><td>",$accrow[accreditname],"</td>" ;
            }

            $accnamebbbb = "SELECT * FROM acctest WHERE ingredients = '$onlyhanbbbb'";
            $accresultbbbb = mysqli_query($mysqli, $accnamebbbb);
            while($accrow = mysqli_fetch_array($accresultbbbb)){
                $accnumbbbb = $accrow[accreditnum];
                echo "<td>",$accrow[accreditname],"</td>" ;
            }

            $accnamecccc = "SELECT * FROM acctest WHERE ingredients = '$onlyhancccc'";
            $accresultcccc = mysqli_query($mysqli, $accnamecccc);
            while($accrow = mysqli_fetch_array($accresultcccc)){
                $accnumcccc = $accrow[accreditnum];
                echo "<td>",$accrow[accreditname],"</td>" ;
            }

            $accnamedddd = "SELECT * FROM acctest WHERE ingredients = '$onlyhandddd'";
            $accresultdddd = mysqli_query($mysqli, $accnamedddd);
            while($accrow = mysqli_fetch_array($accresultdddd)){
                $accnumdddd = $accrow[accreditnum];
                echo "<td>",$accrow[accreditname],"</td>" ;
            }

            $accnameeeee = "SELECT * FROM acctest WHERE ingredients = '$onlyhaneeee'";
            $accresulteeee = mysqli_query($mysqli, $accnameeeee);
            while($accrow = mysqli_fetch_array($accresulteeee)){
                $accnumeeee = $accrow[accreditnum];

                echo "<td style='border-right:1px solid #e7e7e7;'>",$accrow[accreditname],"</td></tr><tr><td style='border-bottom:1px solid #e7e7e7;'>",$accnumaaaa,"</td><td style='border-bottom:1px solid #e7e7e7;'>",$accnumbbbb,"</td><td style='border-bottom:1px solid #e7e7e7;'>",$accnumcccc,"</td><td style='border-bottom:1px solid #e7e7e7;'>",$accnumdddd,"</td><td style='border-bottom:1px solid #e7e7e7; border-right:1px solid #e7e7e7;'>",$accnumeeee,"</td></tr>";
            }

            //-----------------------------------------------------------

            $menunamesssss = "SELECT * FROM menutest WHERE menu = '$menunameeeee'";

            $menuresulttttt = mysqli_query($mysqli, $menunamesssss);
            while($menurow = mysqli_fetch_array($menuresulttttt)){

                $onlyhanaaaaa = onlyHanAlpha($menurow[jearyo1]);
                $onlyhanbbbbb = onlyHanAlpha($menurow[jearyo2]);
                $onlyhanccccc = onlyHanAlpha($menurow[jearyo3]);
                $onlyhanddddd = onlyHanAlpha($menurow[jearyo4]);
                $onlyhaneeeee = onlyHanAlpha($menurow[jearyo5]);

                if(empty($menurow[jearyo2])){
                    $menurow[jearyo2] = '-';
                    $onlyhanbbbbb = '-';
                    $accnumbbbbb = '-';
                }

                if(empty($menurow[jearyo3])){
                    $menurow[jearyo3] = '-';
                    $onlyhanccccc = '-';
                    $accnumccccc = '-';
                }

                if(empty($menurow[jearyo4])){
                    $menurow[jearyo4] = '-';
                    $onlyhanddddd = '-';
                    $accnumddddd = '-';
                }

                if(empty($menurow[jearyo5])){
                    $menurow[jearyo5] = '-';
                    $onlyhaneeeee = '-';
                    $accnumeeeee = '-';
                }

                echo "<tr><td rowspan='3' style='border-left:1px solid #e7e7e7; border-bottom:1px solid #e7e7e7;'>",$menunameeeee,"</td> <td>",$menurow[jearyo1],"</td><td>",$menurow[jearyo2],"</td><td>",$menurow[jearyo3],"</td><td>",$menurow[jearyo4],"</td><td style='border-right:1px solid #e7e7e7;'>",$menurow[jearyo5],"</td></tr>" ;

            }

            $accnameaaaaa = "SELECT * FROM acctest WHERE ingredients = '$onlyhanaaaaa'";
            $accresultaaaaa = mysqli_query($mysqli, $accnameaaaaa);
            while($accrow = mysqli_fetch_array($accresultaaaaa)){
                $accnumaaaaa = $accrow[accreditnum];
                echo "<tr><td>",$accrow[accreditname],"</td>" ;
            }

            $accnamebbbbb = "SELECT * FROM acctest WHERE ingredients = '$onlyhanbbbbb'";
            $accresultbbbbb = mysqli_query($mysqli, $accnamebbbbb);
            while($accrow = mysqli_fetch_array($accresultbbbbb)){
                $accnumbbbbb = $accrow[accreditnum];
                echo "<td>",$accrow[accreditname],"</td>" ;
            }

            $accnameccccc = "SELECT * FROM acctest WHERE ingredients = '$onlyhanccccc'";
            $accresultccccc = mysqli_query($mysqli, $accnameccccc);
            while($accrow = mysqli_fetch_array($accresultccccc)){
                $accnumccccc = $accrow[accreditnum];
                echo "<td>",$accrow[accreditname],"</td>" ;
            }

            $accnameddddd = "SELECT * FROM acctest WHERE ingredients = '$onlyhanddddd'";
            $accresultddddd = mysqli_query($mysqli, $accnameddddd);
            while($accrow = mysqli_fetch_array($accresultddddd)){
                $accnumddddd = $accrow[accreditnum];
                echo "<td>",$accrow[accreditname],"</td>" ;
            }

            $accnameeeeee = "SELECT * FROM acctest WHERE ingredients = '$onlyhaneeeee'";
            $accresulteeeee = mysqli_query($mysqli, $accnameeeeee);
            while($accrow = mysqli_fetch_array($accresulteeeee)){
                $accnumeeeee = $accrow[accreditnum];

                echo "<td style='border-right:1px solid #e7e7e7;'>",$accrow[accreditname],"</td></tr><tr><td style='border-bottom:1px solid #e7e7e7;'>",$accnumaaaaa,"</td><td style='border-bottom:1px solid #e7e7e7;'>",$accnumbbbbb,"</td><td style='border-bottom:1px solid #e7e7e7;'>",$accnumccccc,"</td><td style='border-bottom:1px solid #e7e7e7;'>",$accnumddddd,"</td><td style='border-bottom:1px solid #e7e7e7; border-right:1px solid #e7e7e7;'>",$accnumeeeee,"</td></tr>" ;
            }

            //-----------------------------------------------------------

            $menunamessssss = "SELECT * FROM menutest WHERE menu = '$menunameeeeee'";

            $menuresultttttt = mysqli_query($mysqli, $menunamessssss);
            while($menurow = mysqli_fetch_array($menuresultttttt)){

                $onlyhanaaaaaa = onlyHanAlpha($menurow[jearyo1]);
                $onlyhanbbbbbb = onlyHanAlpha($menurow[jearyo2]);
                $onlyhancccccc = onlyHanAlpha($menurow[jearyo3]);
                $onlyhandddddd = onlyHanAlpha($menurow[jearyo4]);
                $onlyhaneeeeee = onlyHanAlpha($menurow[jearyo5]);

                if(empty($menurow[jearyo2])){
                    $menurow[jearyo2] = '-';
                    $onlyhanbbbbbb = '-';
                    $accnumbbbbbb = '-';
                }

                if(empty($menurow[jearyo3])){
                    $menurow[jearyo3] = '-';
                    $onlyhancccccc = '-';
                    $accnumcccccc = '-';
                }

                if(empty($menurow[jearyo4])){
                    $menurow[jearyo4] = '-';
                    $onlyhandddddd = '-';
                    $accnumdddddd = '-';
                }

                if(empty($menurow[jearyo5])){
                    $menurow[jearyo5] = '-';
                    $onlyhaneeeeee = '-';
                    $accnumeeeeee = '-';
                }

                echo "<tr><td rowspan='3' style='border-left:1px solid #e7e7e7; border-bottom:1px solid #e7e7e7;'>",$menunameeeeee,"</td><td>",$menurow[jearyo1],"</td><td>",$menurow[jearyo2],"</td><td>",$menurow[jearyo3],"</td><td>",$menurow[jearyo4],"</td><td style='border-right:1px solid #e7e7e7;'>",$menurow[jearyo5],"</td></tr>" ;

            }

            $accnameaaaaaa = "SELECT * FROM acctest WHERE ingredients = '$onlyhanaaaaaa'";
            $accresultaaaaaa = mysqli_query($mysqli, $accnameaaaaaa);
            while($accrow = mysqli_fetch_array($accresultaaaaaa)){
                $accnumaaaaaa = $accrow[accreditnum];
                echo "<tr><td>",$accrow[accreditname],"</td>" ;
            }

            $accnamebbbbbb = "SELECT * FROM acctest WHERE ingredients = '$onlyhanbbbbbb'";
            $accresultbbbbbb = mysqli_query($mysqli, $accnamebbbbbb);
            while($accrow = mysqli_fetch_array($accresultbbbbbb)){
                $accnumbbbbbb = $accrow[accreditnum];
                echo "<td>",$accrow[accreditname],"</td>" ;
            }

            $accnamecccccc = "SELECT * FROM acctest WHERE ingredients = '$onlyhancccccc'";
            $accresultcccccc = mysqli_query($mysqli, $accnamecccccc);
            while($accrow = mysqli_fetch_array($accresultcccccc)){
                $accnumcccccc = $accrow[accreditnum];
                echo "<td>",$accrow[accreditname],"</td>" ;
            }

            $accnamedddddd = "SELECT * FROM acctest WHERE ingredients = '$onlyhandddddd'";
            $accresultdddddd = mysqli_query($mysqli, $accnamedddddd);
            while($accrow = mysqli_fetch_array($accresultdddddd)){
                $accnumddddd = $accrow[accreditnum];
                echo "<td>",$accrow[accreditname],"</td>" ;
            }

            $accnameeeeeee = "SELECT * FROM acctest WHERE ingredients = '$onlyhaneeeeee'";
            $accresulteeeeee = mysqli_query($mysqli, $accnameeeeeee);
            while($accrow = mysqli_fetch_array($accresulteeeeee)){
                $accnumeeeeee = $accrow[accreditnum];


                echo "<td style='border-right:1px solid #e7e7e7;'>",$accrow[accreditname],"</td></tr><tr><td style='border-bottom:1px solid #e7e7e7;'>",$accnumaaaaaa,"</td><td style='border-bottom:1px solid #e7e7e7;'>",$accnumbbbbbb,"</td><td style='border-bottom:1px solid #e7e7e7;'>",$accnumcccccc,"</td><td style='border-bottom:1px solid #e7e7e7;'>",$accnumdddddd,"</td><td style='border-bottom:1px solid #e7e7e7; border-right:1px solid #e7e7e7;'>",$accnumeeeeee,"</td></tr>" ;
            }


            ?>

            </tbody>
        </table>


        <div class="shickdan_p">
            <p style="font-size:12px; text-align:left; text-indent:0.5em; letter-spacing:-0.5px; padding-top:10px; margin:0 15px;">※ 식단에 포함된 재료중 알러지가 있다면 미리 알려주세요!</p>
            <p style="font-size:12px; text-align:left; text-indent:0.5em; letter-spacing:-0.5px; padding-top:10px; margin:0 15px;">※ 코로나19로 인해 친환경 재료 수급이 원활하지 않아 <b>재료 변경 및 배송 지연</b>이 발생하고있습니다. 빠른 정상화를 위해 최선을 다하겠습니다.</p>
            <p style="font-size:12px; text-align:left; text-indent:0.5em; letter-spacing:-0.5px; padding-top:10px; margin:0 15px;">※ 현재 방사능 문제로 인해 <b>흰살생선, 어패류</b>의 사용을 하지 않고있습니다. 빠르게 제공할 수 있도록 최선을 다하겠습니다.</p>
            <p style="font-size:12px; text-align:left; text-indent:0.5em; letter-spacing:-0.5px; padding-top:10px; margin:0 15px;">※ 현재 시스템 기능 변경작업으로 인해 식재료정보가 정상적으로 노출되지 않을 수 있습니다. 최대한 빠른 시일내에 정상화 하도록 하겠습니다.</p>
        </div>
        <div style="margin:40px auto; display:block; text-align:center;">
        <span class="moving atagsub" data-href="https://dodammeal.channel.io">
식단 문의하기
</span>
</div>
</div>


</main><!-- #main -->
</div><!-- #primary -->

<div id="primary" class="content-area login-auth-off">
    <main id="main" class="site-main" role="main">
    <div class="shickdan" id="">
            <h1>김도담님의 샘플 식단입니다</h1>
        </div>

        <div class="today_day" style="margin-bottom:20px;">

            <div class="prev_shick">
                <form>
                    <input type="submit" name="prev" value="지난주 식단" /><br />
                </form>
            </div>
            <div class="next_shick">
                <form>
                    <input type="submit" name="next" value="다음주 식단" /><br />
                </form>
            </div>
        </div>
        <div>
            <p class="shickp">2021-03-02 배송출발 샘플 식단</p>
        </div>

        <table class="shick_table" style="padding:0 30px; font-size:20px; font-weight:bold;">
            <tbody>
            <tr>
                <td style="font-size:1.1rem; border-right:2px solid #fff; background-color:#427ac7; color:#fff; border-top-left-radius:9px;">4끼 메뉴</td>
                <td style="font-size:1.1rem; background-color:#427ac7; color:#fff; border-top-right-radius:9px;">3끼 메뉴</td>
            </tr>
            <tr>
                <td style=" height:44px; border-left:1px solid #e7e7e7;">닭고기애호박배추블루베리죽(4)</td>
                <td style=" height:44px; border-right:1px solid #e7e7e7;">한우무양파렌틸콩죽</td>
            </tr>
            <tr>
                <td style=" height:44px; border-left:1px solid #e7e7e7;">한우수수비트양배추죽</td>
                <td style="height:44px; border-right:1px solid #e7e7e7;">한우김표고감자죽</td>
            </tr>
            <tr>
                <td style="height:44px; border-left:1px solid #e7e7e7; border-bottom:1px solid #e7e7e7;border-bottom-left-radius:9px;"></td>
                <td style="height:44px; border-right:1px solid #e7e7e7; border-bottom:1px solid #e7e7e7; border-bottom-right-radius:9px;"></td>
            </tr>
            </tbody>
        </table>

        <div>
            <p class="shickp">2021-03-02 간식 샘플 식단</p>
        </div>    

        <div class="">

<table class="shick_table" id="auth_snack" style="padding:0 30px; margin-bottom:10px; font-size:20px; font-weight:bold;">

    <tbody>

    <tr>
        <td style="font-size:1.1rem; border-right:2px solid #fff; background-color:#427ac7; color:#fff; border-top-left-radius:9px;">오전 메뉴</td>
        <td style="font-size:1.1rem; background-color:#427ac7; color:#fff; border-top-right-radius:9px;">오후 메뉴</td>
    </tr>
    <tr>
        <td style=" height:44px; border-left:1px solid #e7e7e7;">현미과일퓨레</td>
        <td style=" height:44px; border-right:1px solid #e7e7e7;"></td>
    </tr>
    <tr>
        <td style="height:44px; border-left:1px solid #e7e7e7; border-bottom:1px solid #e7e7e7;border-bottom-left-radius:9px;">브로콜리고구마메시</td>
        <td style="height:44px; border-right:1px solid #e7e7e7; border-bottom:1px solid #e7e7e7; border-bottom-right-radius:9px;"></td>
    </tr>


    </tbody>
</table>

<div class="after_snack">
    <p>해당 식단은 샘플 입니다. 참고용으로 확인해주세요.</p>
</div>

</div>


<table class="under_table" style="padding:0 30px;">
            <tbody>
            <tr><td style="font-weight:bold; border-right:2px solid #fff; font-size:13px; background-color:#427ac7; color:#fff; border-top-left-radius:9px;">메뉴명</td>
                <td colspan="5" style="font-weight:bold; font-size:13px; background-color:#427ac7; color:#fff; border-top-right-radius:9px;">재료 및 친환경인증번호</td></tr>

            <tr><td rowspan='3' style='border-left:1px solid #e7e7e7; border-bottom:1px solid #e7e7e7;'>닭고기애호박배추블루베리죽(4)</td><td>닭고기60</td><td>애호박40</td><td>배추20</td><td>블루베리10</td><td style='border-right:1px solid #e7e7e7;'>쌀60</td></tr><tr><td>무항생제</td><td>유기농</td><td>유기농</td><td>무농약</td><td style='border-right:1px solid #e7e7e7;'>유기농</td></tr><tr><td style='border-bottom:1px solid #e7e7e7;'>47-5-417</td> <td style='border-bottom:1px solid #e7e7e7;'>11100677</td> <td style='border-bottom:1px solid #e7e7e7;'>16100437</td><td style='border-bottom:1px solid #e7e7e7;'>18301324</td><td style='border-bottom:1px solid #e7e7e7; border-right:1px solid #e7e7e7;'>15100999</td></tr><tr><td rowspan='3' style='border-left:1px solid #e7e7e7; border-bottom:1px solid #e7e7e7;'>한우수수비트양배추죽(4)</td> <td>한우60</td><td>수수12</td><td>비트40</td><td>양배추30</td><td style='border-right:1px solid #e7e7e7;'>쌀60</td></tr><tr><td>무항생제</td><td>무농약</td><td>무농약</td><td>무농약</td><td style='border-right:1px solid #e7e7e7;'>유기농</td> </tr> <tr><td style='border-bottom:1px solid #e7e7e7;'>13502150</td> <td style='border-bottom:1px solid #e7e7e7;'>11303036</td><td style='border-bottom:1px solid #e7e7e7;'>17600402</td><td style='border-bottom:1px solid #e7e7e7;'>13600348</td><td style='border-bottom:1px solid #e7e7e7; border-right:1px solid #e7e7e7;'>15100999</td></tr><tr><td rowspan='3' style='border-left:1px solid #e7e7e7; border-bottom:1px solid #e7e7e7;'>한우무양파렌틸콩죽</td> <td>한우45</td><td>무30</td><td>양파20</td><td>렌틸콩20</td><td style='border-right:1px solid #e7e7e7;'>쌀45</td></tr><tr><td>무항생제</td><td>무농약</td><td>무농약</td><td>국내산</td><td style='border-right:1px solid #e7e7e7;'>유기농</td></tr><tr><td style='border-bottom:1px solid #e7e7e7;'>13502150</td><td style='border-bottom:1px solid #e7e7e7;'>17600402</td><td style='border-bottom:1px solid #e7e7e7;'>10600660</td><td style='border-bottom:1px solid #e7e7e7;'>-</td><td style='border-bottom:1px solid #e7e7e7; border-right:1px solid #e7e7e7;'>15100999</td></tr><tr><td rowspan='3' style='border-left:1px solid #e7e7e7; border-bottom:1px solid #e7e7e7;'>한우김표고감자죽</td> <td>한우45</td><td>김1</td><td>감자30</td><td>표고20</td><td style='border-right:1px solid #e7e7e7;'>쌀45</td></tr><tr><td>무항생제</td><td>국내산</td><td>무농약</td><td>무농약</td><td style='border-right:1px solid #e7e7e7;'>유기농</td></tr><tr><td style='border-bottom:1px solid #e7e7e7;'>13502150</td><td style='border-bottom:1px solid #e7e7e7;'>-</td><td style='border-bottom:1px solid #e7e7e7;'>10304794</td><td style='border-bottom:1px solid #e7e7e7;'>13303196</td><td style='border-bottom:1px solid #e7e7e7; border-right:1px solid #e7e7e7;'>15100999</td></tr>
            </tbody>
        </table>


        <div class="shickdan_p">
            <p style="font-size:12px; text-align:left; text-indent:0.5em; letter-spacing:-0.5px; padding-top:10px; margin:0 15px;">※ 식단에 포함된 재료중 알러지가 있다면 미리 알려주세요!</p>
            <p style="font-size:12px; text-align:left; text-indent:0.5em; letter-spacing:-0.5px; padding-top:10px; margin:0 15px;">※ 코로나19로 인해 친환경 재료 수급이 원활하지 않아 <b>재료 변경 및 배송 지연</b>이 발생하고있습니다. 빠른 정상화를 위해 최선을 다하겠습니다.</p>
            <p style="font-size:12px; text-align:left; text-indent:0.5em; letter-spacing:-0.5px; padding-top:10px; margin:0 15px;">※ 현재 방사능 문제로 인해 <b>흰살생선, 어패류</b>의 사용을 하지 않고있습니다. 빠르게 제공할 수 있도록 최선을 다하겠습니다.</p>
            <p style="font-size:12px; text-align:left; text-indent:0.5em; letter-spacing:-0.5px; padding-top:10px; margin:0 15px;">※ 현재 시스템 기능 변경작업으로 인해 식재료정보가 정상적으로 노출되지 않을 수 있습니다. 최대한 빠른 시일내에 정상화 하도록 하겠습니다.</p>
        </div>
        <div style="margin:40px auto; display:block; text-align:center;">
        <span class="moving atagsub" data-href="/con2period">
멤버십 가입하기
</span>
</div>
</div>

    </main>
</div>

<?php
// 레시피 DB 불러오기


for ($sz=1; $sz<=6; $sz=$sz+1){
    $usercode = $userid;
    $usercode .= "-".$sz;
    $meal_menu_query = "SELECT * FROM shicktest WHERE userid = '$usercode'";
    $meal_menu_result = mysqli_query($mysqli,$meal_menu_query);
    while ($meal_menu_row = mysqli_fetch_array($meal_menu_result)) {
        $meal_menus[$abouttime][$sz] = $meal_menu_row[$abouttime];
    }

}

$meal_start = 1;

for($az=1; $az<=6; $az=$az+1){

    $meal_make = $meal_menus[$abouttime][$az];

    $meal_make_query = "(SELECT * FROM menurecipe WHERE menu = '$meal_make') UNION (SELECT * FROM shickrecipe WHERE menu = '$meal_make')";
    $meal_make_result = mysqli_query($mysqli, $meal_make_query);
    $meal_make_row = mysqli_fetch_array($meal_make_result);

    $meal_step_name[$az] = $meal_make_row[menu];
    $meal_step_period[$az] = $meal_make_row[period];
    $plus_mates[$az] = $meal_make_row[plusmate];
    $meal_step_1[$az] = $meal_make_row[recipe1];
    $meal_step_2[$az] = $meal_make_row[recipe2];
    $meal_step_3[$az] = $meal_make_row[recipe3];
    $meal_step_4[$az] = $meal_make_row[recipe4];
    $meal_step_5[$az] = $meal_make_row[recipe5];
    $meal_step_6[$az] = $meal_make_row[recipe6];
    $meal_step_7[$az] = $meal_make_row[recipe7];
    $meal_step_8[$az] = $meal_make_row[recipe8];
    $meal_step_tips[$az] = $meal_make_row[tips];

    echo '
    <div class="pop_up ready" id="pop_content'.$meal_start.'" style="width:100%; height:100%;">
    <div id="download'.$snack_start.'" class="makebox snackmake">
        <div class="title">
            <p style="font-weight:bold; font-size:20px; color:#f8b62d;">'.$meal_step_period[$az].' 이유식</p>
            <h3>'.$meal_step_name[$az].'</h3>
        </div>';
        if(empty($plus_mates[$az])){
    }else{
        echo'
        <div class="plusmate">
        <p style="text-align:center; color:#666; font-size:20px;">추가 준비물</p>
        <p style="text-align:center; color:#999; font-size:18px;">'.$plus_mates[$az].'</p>
        </div>';
    }


        echo '
        <div>
            <div class="makestep">
                <div class="makenumber">
                    <span style="color:#427ac7;">0</span><span style="color:#f8b62d;">1</span>
                </div>
                <div class="maketext">
                    <p>'.$meal_step_1[$az].'</p>
                </div>
            </div>
            <div class="makestep">
                <div class="makenumber">
                    <span style="color:#427ac7">0</span><span style="color:#f8b62d;">2</span>
                </div>
                <div class="maketext">
                    <p>'.$meal_step_2[$az].'</p>
                </div>
            </div>
    ';

    if(empty($meal_step_3[$az])){

    } else {
        echo '
        <div class="makestep">
        <div class="makenumber">
            <span style="color:#427ac7">0</span><span style="color:#f8b62d;">3</span>
        </div>
        <div class="maketext">
            <p>'.$meal_step_3[$az].'</p>
        </div>
    </div>
        ';
    }

    if(empty($meal_step_4[$az])){

    } else {
        echo '
        <div class="makestep">
        <div class="makenumber">
            <span style="color:#427ac7">0</span><span style="color:#f8b62d;">4</span>
        </div>
        <div class="maketext">
            <p>'.$meal_step_4[$az].'</p>
        </div>
    </div>
        ';
    }

    if(empty($meal_step_5[$az])){

    } else {
        echo '
        <div class="makestep">
        <div class="makenumber">
            <span style="color:#427ac7">0</span><span style="color:#f8b62d;">5</span>
        </div>
        <div class="maketext">
            <p>'.$meal_step_5[$az].'</p>
        </div>
    </div>
        ';
    }

    if(empty($meal_step_6[$az])){

    } else {
        echo '
        <div class="makestep">
        <div class="makenumber">
            <span style="color:#427ac7">0</span><span style="color:#f8b62d;">6</span>
        </div>
        <div class="maketext">
            <p>'.$meal_step_6[$az].'</p>
        </div>
    </div>
        ';
    }

    if(empty($meal_step_7[$az])){

    } else {
        echo '
        <div class="makestep">
        <div class="makenumber">
            <span style="color:#427ac7">0</span><span style="color:#f8b62d;">7</span>
        </div>
        <div class="maketext">
            <p>'.$meal_step_7[$az].'</p>
        </div>
    </div>
        ';
    }

    if(empty($meal_step_8[$az])){

    } else {
        echo '
        <div class="makestep">
        <div class="makenumber">
            <span style="color:#427ac7">0</span><span style="color:#f8b62d;">8</span>
        </div>
        <div class="maketext">
            <p>'.$meal_step_8[$az].'</p>
        </div>
    </div>
        ';
    }

    if(empty($meal_step_tips[$az])){

    } else {
        echo '
        <div class="makestep">
        <div class="makenumber">
            <span style="color:#427ac7">T</span><span style="color:#f8b62d;">IP!</span>
        </div>
        <div class="maketext">
            <p>'.$meal_step_tips[$az].'</p>
        </div>
    </div>
        ';
    }

    echo '
        <div class="pt20 ps20">
            <p class="h5 pb20">* 유의사항</p>
            <p class="em pb10" style="color:#666; font-weight:normal;">- 준비기, 초기 미음은 완성 후 입자가 있으면 블렌더로 곱게 간 후에 체에 걸러주세요.</p>
            <p class="em pb10" style="color:#666; font-weight:normal;">- 제공되는 물 양은 냄비로 조리할 때의 기준량입니다. </p>
            <p class="em pb10" style="color:#666; font-weight:normal;">- 밥솥이나 이유식 메이커를 이용할 경우 물 양을 10% 정도 적게 잡아주세요.</p>
            <p class="em pb10" style="color:#666; font-weight:normal;">- 고기를 삶은 물은 거품을 걷어내고 체에 걸러 육수로 사용해도 좋아요.</p>
            <p class="em" style="color:#666; font-weight:normal;">- 계량컵에 재료를 모두 넣은 후, 재료 라벨에 적혀있는 양만큼 물을 부어서 계량해주세요.</p>
        </div>
    ';

$meal_start = $meal_start + 1;

}


?>

<?php
//간식 레시피 DB 불러오기

$snack_start = 7;

for($as=1; $as<=4; $as=$as+1) {


    $snack_make = $snack_menus[$abouttime][$as];

    $snack_make_query = "SELECT * FROM snackrecipe WHERE menu = '$snack_make'";
    $snack_make_result = mysqli_query($mysqli, $snack_make_query);
    $snack_make_row = mysqli_fetch_array($snack_make_result);

    $menu_step_name[$as] = $snack_make_row[menu];
    $menu_step_period[$as] = $snack_make_row[period];
    $menu_step_category[$as] = $snack_make_row[category];
    $plus_mate[$as] = $snack_make_row[plusobject];
    $menu_step_1[$as] = $snack_make_row[recipe1];
    $menu_step_2[$as] = $snack_make_row[recipe2];
    $menu_step_3[$as] = $snack_make_row[recipe3];
    $menu_step_4[$as] = $snack_make_row[recipe4];
    $menu_step_5[$as] = $snack_make_row[recipe5];
    $menu_step_6[$as] = $snack_make_row[recipe6];
    $menu_step_tips[$as] = $snack_make_row[tips];
    $menu_step_storage[$as] = $snack_make_row[storage];
    $menu_easy_1[$as] = $snack_make_row[easyrecipe1];
    $menu_easy_2[$as] = $snack_make_row[easyrecipe2];
    $menu_easy_3[$as] = $snack_make_row[easyrecipe3];
    $menu_easy_4[$as] = $snack_make_row[easyrecipe4];
    $menu_easy_5[$as] = $snack_make_row[easyrecipe5];
    $menu_notice[$as] = $snack_make_row[notice];

    echo '
    
    <div class="pop_up ready" id="pop_content'.$snack_start.'" style="width:100%; height:100%;">
    <div id="download'.$snack_start.'" class="makebox snackmake">
        <div class="title">
            <p style="font-weight:bold; font-size:20px; color:#f8b62d;">'.$menu_step_period[$as].' '.$menu_step_category[$as].'</p>
            <h3>'.$menu_step_name[$as].'</h3>
        </div>';

    if(empty($plus_mate[$as])){

    }else{
        echo'
        <div class="plusmate">
        <p style="text-align:center; color:#666; font-size:20px;">추가 준비물</p>
        <p style="text-align:center; color:#999; font-size:18px;">'.$plus_mate[$as].'</p>
        </div>';
    }

    echo'
        <div>
            <div class="makestep">
                <div class="makenumber">
                    <span style="color:#427ac7;">0</span><span style="color:#f8b62d;">1</span>
                </div>
                <div class="maketext">
                    <p>'.$menu_step_1[$as].'</p>
                </div>
            </div>
            <div class="makestep">
                <div class="makenumber">
                    <span style="color:#427ac7">0</span><span style="color:#f8b62d;">2</span>
                </div>
                <div class="maketext">
                    <p>'.$menu_step_2[$as].'</p>
                </div>
            </div>';

    if (empty($menu_step_3[$as])){

    } else {
        echo '<div class="makestep">
                <div class="makenumber">
                    <span style="color:#427ac7">0</span><span style="color:#f8b62d;">3</span>
                </div>
                <div class="maketext">
                    <p>' . $menu_step_3[$as] . '</p>
                </div>
            </div>';
    }

    if (empty($menu_step_4[$as])){

    } else {
        echo '<div class="makestep">
                <div class="makenumber">
                    <span style="color:#427ac7">0</span><span style="color:#f8b62d;">4</span>
                </div>
                <div class="maketext">
                    <p>' . $menu_step_4[$as] . '</p>
                </div>
            </div>';
    }

    if (empty($menu_step_5[$as])){

    } else {
        echo '<div class="makestep">
                <div class="makenumber">
                    <span style="color:#427ac7">0</span><span style="color:#f8b62d;">5</span>
                </div>
                <div class="maketext">
                    <p>' . $menu_step_5[$as] . '</p>
                </div>
            </div>';
    }

    if (empty($menu_step_6[$as])){

    } else {
        echo '<div class="makestep">
                <div class="makenumber">
                    <span style="color:#427ac7;">0</span><span style="color:#f8b62d;">6</span>
                </div>
                <div class="maketext">
                    <p>' . $menu_step_6[$as] . '</p>
                </div>
            </div>';
    }

    if (empty($menu_step_tips[$as])){

    }else {

        echo '<div class="makestep">
                <div class="makenumber">
                    <span style="color:#427ac7;">T</span><span style="color:#f8b62d;">IPS!</span>
                </div>
                <div class="maketext">
                    <p>'.$menu_step_tips[$as].'</p>
                </div>
            </div>';

    echo '<div class="makestep">
                <div class="makenumber">
                    <span style="color:#427ac7;">보</span><span style="color:#f8b62d;">관방법</span>
                </div>
                <div class="maketext">
                    <p>'.$menu_step_storage[$as].'</p>
                </div>
            </div>
        </div>
    

    ';
}

if (empty($menu_easy_1[$as])){
}else{
echo '
<div class="easy_make" style="text-align:center;">
<p class="h5 bold center" style="font-size:26px; padding:40px 10px 10px 10px;">더 쉽게 만드는 방법</p>
</div>
';

echo '
<div class="makestep">
<div class="makenumber">
<span style="color:#427ac7;">0</span><span style="color:#f8b62d;">1</span>
</div>
<div class="maketext">
<p>'.$menu_easy_1[$as].'</p>
</div>
</div>
';
}

if (empty($menu_easy_2[$as])){
}else{
echo '
<div class="makestep">
<div class="makenumber">
<span style="color:#427ac7;">0</span><span style="color:#f8b62d;">2</span>
</div>
<div class="maketext">
<p>'.$menu_easy_2[$as].'</p>
</div>
</div>
';
}
if (empty($menu_easy_3[$as])){
}else{
echo '
<div class="makestep">
<div class="makenumber">
<span style="color:#427ac7;">0</span><span style="color:#f8b62d;">3</span>
</div>
<div class="maketext">
<p>'.$menu_easy_3[$as].'</p>
</div>
</div>
';
}
if (empty($menu_easy_4[$as])){
}else{
echo '
<div class="makestep">
<div class="makenumber">
<span style="color:#427ac7;">0</span><span style="color:#f8b62d;">4</span>
</div>
<div class="maketext">
<p>'.$menu_easy_4[$as].'</p>
</div>
</div>
';
}
if (empty($menu_easy_5[$as])){
}else{
echo '
<div class="makestep">
<div class="makenumber">
<span style="color:#427ac7;">0</span><span style="color:#f8b62d;">5</span>
</div>
<div class="maketext">
<p>'.$menu_easy_5[$as].'</p>
</div>
</div>
';
}

if (empty($menu_easy_1[$as])){
}else{
echo '
<div class="makestep">
<div class="makenumber">
<span style="color:#427ac7;">꼭</span><span style="color:#f8b62d;">확인하세요</span>
</div>
<div class="maketext">
<p>'.$menu_notice[$as].'</p>
</div>
</div>
</div>
';


}

$snack_start = $snack_start+1;
}


?>



<div class="close" id="pop_top_close"></div>

<script>
    $("#pop_up1").click(function(){
      $("#pop_content1").removeClass("ready");
    $("#pop_content1").addClass("on");
    $("#pop_top_close").fadeIn();
    });

    $("#pop_up2").click(function(){
            $("#pop_content2").removeClass("ready");
            $("#pop_content2").addClass("on");
            $("#pop_top_close").fadeIn();
        });

        $("#pop_up3").click(function(){
            $("#pop_content3").removeClass("ready");
            $("#pop_content3").addClass("on");
            $("#pop_top_close").fadeIn();
        });

        $("#pop_up4").click(function(){
            $("#pop_content4").removeClass("ready");
            $("#pop_content4").addClass("on");
            $("#pop_top_close").fadeIn();
        });
        $("#pop_up5").click(function(){
            $("#pop_content5").removeClass("ready");
            $("#pop_content5").addClass("on");
            $("#pop_top_close").fadeIn();
        });

        $("#pop_up6").click(function(){
            $("#pop_content6").removeClass("ready");
            $("#pop_content6").addClass("on");
            $("#pop_top_close").fadeIn();
        });

    $("#pop_up7").click(function(){
        $("#pop_content7").removeClass("ready");
        $("#pop_content7").addClass("on");
        $("#pop_top_close").fadeIn();
    });

    $("#pop_up8").click(function(){
        $("#pop_content8").removeClass("ready");
        $("#pop_content8").addClass("on");
        $("#pop_top_close").fadeIn();
    });

    $("#pop_up9").click(function(){
        $("#pop_content9").removeClass("ready");
        $("#pop_content9").addClass("on");
        $("#pop_top_close").fadeIn();
    });

    $("#pop_up10").click(function(){
        $("#pop_content10").removeClass("ready");
        $("#pop_content10").addClass("on");
        $("#pop_top_close").fadeIn();
    });



</script>

<input type="hidden" id="auth_code" value="<?php echo $auth_code ?>">

<script>

    var snackauth = $("#auth_code").val();
    if ( snackauth == 1 ){
        $("#auth_snack").removeClass("authoff");
        $("#auth_snack").removeClass("snack_bloom");
    } else {
        $("#auth_snack").addClass("authoff");
        $("#auth_snack").addClass("snack_bloom");
    }

</script>

<script>

    $("#save").click(function(){
        html2canvas(e.target.parentElement).then(function(canvas) {
            if (navigator.msSaveBlob) {
                var blob = canvas.msToBlob();
                return navigator.msSaveBlob(blob, 'aaaa.jpg');
            } else {
                var el = document.getElementById("download7");
                el.href = canvas.toDataURL("image/jpeg");
                el.download = 'aaaa.jpg';
                el.click();
            }
        });
    });

</script>

<script>
    var login_auth = $("#login_auth").val();
    if (login_auth == 1) {
        $(".login-auth-on").show();
        $(".login-auth-off").hide();
    } else {
        $(".login-auth-off").show();
        $(".login-auth-on").hide();
    }
</script>

<script>
    $("#pop_top_close").click(function(){
        $(".pop_up").removeClass("on");
        $(".pop_up").addClass("ready");
        $("#pop_top_close").fadeOut();
    });

</script>

<script>

    $(".header").hide();

    var last_top = 20;
    $(window).scroll(function() {
        var this_top = $(this).scrollTop();
        if( this_top > last_top ) {
            $(".back_header").addClass("hide");
        }
        else {
            $(".back_header").removeClass("hide");
        }
        last_top = this_top;
    });

</script>

<?php
do_action( 'storefront_sidebar' );
get_footer();
