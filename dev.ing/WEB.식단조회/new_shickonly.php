<?php

/**
 * Template Name: shickonly
 */

/*
* 식단확인 페이지입니다
* shickonly.php에 덮어쓰면 될거같습니다
* 일시정지 버튼은 a태그로 만들어서 일시정지 페이지로 넘겨야합니다
* 어려우면 물어보세용
* html 부분만 수정해서 사용하면 될듯
*
*/

get_header(); ?>


<?php if (current_user_can('subscriber')) {
    $userid = get_user_meta($current_user->ID, 'username', true);
    $username = get_user_meta($current_user->ID, 'first_name', true);
    $user_auth = 1;
} else {
    $userid = get_user_meta($current_user->ID, 'username', true);
    $username = get_user_meta($current_user->ID, 'first_name', true);
    $user_auth = 2;
} ?>

<?php
$mysqli = new mysqli('localhost', 'olivejnainc', 'Goyo5713**', 'olivejnainc');

$table_query = "SELECT * FROM userbase where userid = '$userid'";
$table_result = mysqli_query($mysqli, $table_query);

$table_row = mysqli_fetch_array($table_result);

$nextdeliday = $table_row[nextdeliday];
$nowperiod = $table_row[nowperiod];
$membership = $table_row[membership];
$username = $table_row[username];

$opt_array = [];

array_push($opt_array, $table_row[super]);
array_push($opt_array, $table_row[mate]);
array_push($opt_array, $table_row[beef]);
array_push($opt_array, $table_row[tenloin]);
array_push($opt_array, $table_row[water]);
array_push($opt_array, $table_row[snack]);
array_push($opt_array, $table_row[snacke]);
array_push($opt_array, $table_row[weekend]);
array_push($opt_array, $table_row[care]);
array_push($opt_array, $table_row[safe]);

$baseday[0] = date("Y-m-d", strtotime("-28 days", strtotime($nextdeliday)));
$baseday[1] = date("Y-m-d", strtotime("-21 days", strtotime($nextdeliday)));
$baseday[2] = date("Y-m-d", strtotime("-14 days", strtotime($nextdeliday)));
$baseday[3] = date("Y-m-d", strtotime("-7 days", strtotime($nextdeliday)));

$i = 0;

while ($i < 4) {

    for ($j = 1; $j <= 6; $j = $j + 1) {
        $checkid = $userid . "-" . $j;

        $shick_query = "SELECT * FROM shicktest WHERE userid = '$checkid'";
        $shick_result = mysqli_query($mysqli, $shick_query);
        $shick_row = mysqli_fetch_array($shick_result);

        $row_menu[$i][$j] = $shick_row[$baseday[$i]];
    }

    $i++;
}

$baby_query = "SELECT * FROM newresearch WHERE userid = '$userid'";
$baby_result = mysqli_query($mysqli, $baby_query);
$baby_row = mysqli_fetch_array($baby_result);

$baby_name = $baby_row[babyname];

?>

<div>

    <div>식단확인하기</div>
    <div class="">
        <div>
            <!--애기이름 나오게할까 싶기도하고 일단 그냥 고객명 -->
            <p><?php echo $username ?> 님의<br>도담밀 <?php echo $nowperiod ?> <?php echo $membership ?> 진행 중</p>
        </div>
        <div class="">
            <?php
            if (in_array("A", $opt_array)) {
                echo "<p>+ 한우 추가</p>";
            }
            if (in_array("B", $opt_array)) {
                echo "<p>+ 안심 한우 변경</p>";
            }
            if (in_array("R", $opt_array)) {
                echo "<p>+ 육수 추가</p>";
            }
            if (in_array("D", $opt_array)) {
                echo "<p>+ 주말팩 추가</p>";
            }
            if (in_array("C", $opt_array)) {
                echo "<p>+ 케어프로그램 추가</p>";
            }
            if (in_array("K", $opt_array)) {
                echo "<p>+ 간식 키트</p>";
            }
            if (in_array("V", $opt_array)) {
                echo "<p>+ 이지 간식 키트</p>";
            }
            if (in_array("S", $opt_array)) {
                echo "<p>+ 슈퍼푸드 1 추가</p>";
            }
            if (in_array("L", $opt_array)) {
                echo "<p>+ 슈퍼푸드 2 추가</p>";
            }
            ?>
        </div>
    </div>
    <div class="">
        <div>
            <p></p>
            <p>1일</p>
            <p>2일</p>
            <p>3일</p>
            <p>4일</p>
            <p>5일</p>
            <p>6일</p>
        </div>
        <div>
            <p>1주차</p>
            <!--각주차 메뉴 최대 6개 -->
            <p><?php echo $row_menu[0][1] ?></p>
            <?php
            if (empty($row_menu[0][2]) || $row_menu[0][2] == "null") {
            } else {
                echo '<p>' . $row_menu[0][2] . '</p>';
            }
            ?>
            <?php
            if (empty($row_menu[0][3]) || $row_menu[0][3] == "null") {
            } else {
                echo '<p>' . $row_menu[0][3] . '</p>';
            }
            ?>
            <p><?php echo $row_menu[0][4] ?></p>
            <?php
            if (empty($row_menu[0][5]) || $row_menu[0][5] == "null") {
            } else {
                echo '<p>' . $row_menu[0][5] . '</p>';
            }
            ?>
            <?php
            if (empty($row_menu[0][6]) || $row_menu[0][6] == "null") {
            } else {
                echo '<p>' . $row_menu[0][6] . '</p>';
            }
            ?>
        </div>
        <div>
            <p>2주차</p>
            <p><?php echo $row_menu[1][1] ?></p>
            <?php
            if (empty($row_menu[1][2]) || $row_menu[1][2] == "null") {
            } else {
                echo '<p>' . $row_menu[1][2] . '</p>';
            }
            ?>
            <?php
            if (empty($row_menu[1][3]) || $row_menu[1][3] == "null") {
            } else {
                echo '<p>' . $row_menu[1][3] . '</p>';
            }
            ?>
            <p><?php echo $row_menu[1][4] ?></p>
            <?php
            if (empty($row_menu[1][5]) || $row_menu[1][5] == "null") {
            } else {
                echo '<p>' . $row_menu[1][5] . '</p>';
            }
            ?>
            <?php
            if (empty($row_menu[1][6]) || $row_menu[1][6] == "null") {
            } else {
                echo '<p>' . $row_menu[1][6] . '</p>';
            }
            ?>
        </div>
        <div>
            <p>3주차</p>
            <p><?php echo $row_menu[2][1] ?></p>
            <?php
            if (empty($row_menu[2][2]) || $row_menu[2][2] == "null") {
            } else {
                echo '<p>' . $row_menu[2][2] . '</p>';
            }
            ?>
            <?php
            if (empty($row_menu[2][3]) || $row_menu[2][3] == "null") {
            } else {
                echo '<p>' . $row_menu[2][3] . '</p>';
            }
            ?>
            <p><?php echo $row_menu[2][4] ?></p>
            <?php
            if (empty($row_menu[2][5]) || $row_menu[2][5] == "null") {
            } else {
                echo '<p>' . $row_menu[2][5] . '</p>';
            }
            ?>
            <?php
            if (empty($row_menu[2][6]) || $row_menu[2][6] == "null") {
            } else {
                echo '<p>' . $row_menu[2][6] . '</p>';
            }
            ?>
        </div>
        <div>
            <p>4주차</p>
            <p><?php echo $row_menu[3][1] ?></p>
            <?php
            if (empty($row_menu[3][2]) || $row_menu[3][2] == "null") {
            } else {
                echo '<p>' . $row_menu[3][2] . '</p>';
            }
            ?>
            <?php
            if (empty($row_menu[3][3]) || $row_menu[3][3] == "null") {
            } else {
                echo '<p>' . $row_menu[3][3] . '</p>';
            }
            ?>
            <p><?php echo $row_menu[3][4] ?></p>
            <?php
            if (empty($row_menu[3][5]) || $row_menu[3][5] == "null") {
            } else {
                echo '<p>' . $row_menu[3][5] . '</p>';
            }
            ?>
            <?php
            if (empty($row_menu[3][6]) || $row_menu[3][6] == "null") {
            } else {
                echo '<p>' . $row_menu[3][6] . '</p>';
            }
            ?>
        </div>
    </div>

    <?php


    $today = date("Y-m-d");

    function find_closest($baseday, $date)
    {
        foreach ($baseday as $day) {
            $interval[] = abs(strtotime($date) - strtotime($day));
        }
        asort($interval);
        $closest = key($interval);
        global $date_next;
        $date_next = $baseday[$closest];
    }

    find_closest($baseday, $today);

    $position = array_search($date_next, $baseday);

    ?>

    <div>
        <div>
            <p><?php echo $date_next ?> 발송</p>
        </div>
        <div>
            <div>
                <p>이유식 메뉴</p>
            </div>
            <div>
                <!--누르면 팝업으로 실행되는 부분 제이쿼리는 만들어야해요-->
                <div id="" class="pop-btn js-menu-pop js-menu-pop-1">
                    <img src="">
                    <p><?php echo $row_menu[$position][1] ?></p>
                </div>
                <div id="" class="pop-btn js-menu-pop js-menu-pop-2">
                    <img src="">
                    <p><?php echo $row_menu[$position][2] ?></p>
                </div>
                <div id="" class="pop-btn js-menu-pop js-menu-pop-3">
                    <img src="">
                    <p><?php echo $row_menu[$position][3] ?></p>
                </div>
                <div id="" class="pop-btn js-menu-pop js-menu-pop-4">
                    <img src="">
                    <p><?php echo $row_menu[$position][4] ?></p>
                </div>
                <div id="" class="pop-btn js-menu-pop js-menu-pop-5">
                    <img src="">
                    <p><?php echo $row_menu[$position][5] ?></p>
                </div>
                <div id="" class="pop-btn js-menu-pop js-menu-pop-6">
                    <img src="">
                    <p><?php echo $row_menu[$position][6] ?></p>
                </div>
            </div>
        </div>

        <?php

        if (in_array("K", $opt_array) || in_array("V", $opt_array)) {

            $i = 0;
            while ($i <= 3) {

                for ($j = 1; $j <= 2; $j = $j + 1) {
                    $checkid = $userid . "-" . $j;

                    $snack_query = "SELECT * FROM snack WHERE userid = '$checkid'";
                    $snack_result = mysqli_query($mysqli, $snack_query);
                    $snack_row = mysqli_fetch_array($snack_result);

                    $row_snack[$i][$j] = $snack_row[$baseday[$i]];
                }
                $i++;
            }

            echo '
                <div>
                <div>
                <p>간식 메뉴</p>
            </div>
            <div>
                <div id="" class="js-snack-pop1">
                    <img src="">
                    <p>' . $row_snack[$position][1] . '</p>
                </div>
                <div id="" class="js-snack-pop2">
                    <img src="">
                    <p>' . $row_snack[$position][2] . '</p>
                </div>
            </div>
        </div>
                ';
        }

        ?>


    </div>

</div>

<?php
$p = 1;
while ($p <= 6) {

    $menu = $row_menu[$position][$p];

    $recipe_query = "(SELECT * FROM menurecipe WHERE menu = '$menu') UNION (SELECT * FROM shickrecipe WHERE menu = '$menu')";
    $recipe_result = mysqli_query($mysqli, $recipe_query);
    $recipe_row = mysqli_fetch_array($recipe_result);

    $recipe_name[$p] = $recipe_row[menu];
    $recipe_period[$p] = $recipe_row[period];
    $recipe_mate[$p] = $recipe_row[plusmate];
    $recipe_step1[$p] = $recipe_row[recipe1];
    $recipe_step2[$p] = $recipe_row[recipe2];
    $recipe_step3[$p] = $recipe_row[recipe3];
    $recipe_step4[$p] = $recipe_row[recipe4];
    $recipe_step5[$p] = $recipe_row[recipe5];
    $recipe_step6[$p] = $recipe_row[recipe6];
    $recipe_step7[$p] = $recipe_row[recipe7];
    $recipe_step8[$p] = $recipe_row[recipe8];
    $recipe_tips[$p] = $recipe_row[tips];
    //레시피 출력 메뉴 순서대로 1-6까지 recipe-pop1 이런식으로 div 생성
    echo '
        
            <div class="recipe-pop recipe-pop' . $p . '">
                <div class="">
                    <p>' . $recipe_name[$p] . '</p>
                </div>
                <div class="">
                    <div>
                        <p>추가준비물</p>
                    </div>
                    <div>
                        <p>' . $recipe_mate[$p] . '</p>
                    </div>
                </div>
                <div class="">
                    <div>
                        <p>만드는 방법</p>
                    </div>
                    <div>
                    <p>1. ' . $recipe_step1[$p] . '</p>';

    if (empty($recipe_step2[$p])) {
    } else {
        echo '<p>2. ' . $recipe_step2[$p] . '</p>';
    }

    if (empty($recipe_step3[$p])) {
    } else {
        echo '<p>3. ' . $recipe_step3[$p] . '</p>';
    }

    if (empty($recipe_step4[$p])) {
    } else {
        echo '<p>4. ' . $recipe_step4[$p] . '</p>';
    }

    if (empty($recipe_step5[$p])) {
    } else {
        echo '<p>5. ' . $recipe_step5[$p] . '</p>';
    }

    if (empty($recipe_step6[$p])) {
    } else {
        echo '<p>6. ' . $recipe_step6[$p] . '</p>';
    }

    if (empty($recipe_step7[$p])) {
    } else {
        echo '<p>7. ' . $recipe_step7[$p] . '</p>';
    }

    if (empty($recipe_step8[$p])) {
    } else {
        echo '<p>8. ' . $recipe_step8[$p] . '</p>';
    }

    if (empty($recipe_tips[$p])) {
    } else {
        echo '<div><p>' . $recipe_tips[$p] . '</p></div>';
    }

    echo '

                    </div>
                </div>        
        ';
    //클래스명 같은거 추가하시면댐
    echo '
        <div>
            <div>
                <p>재료 및 친환경 인증번호</p>
            </div>';

    $menu_query = "SELECT * FROM menutest WHERE menu = '$menu'";
    $menu_result = mysqli_query($mysqli, $menu_query);
    $menu_row = mysqli_fetch_array($menu_result);

    $menu_obj[$p] = $menu_row;

    $mate_query = "SELECT * FROM buying";
    $mate_result = mysqli_query($mysqli, $mate_query);
    while ($mate_row = mysqli_fetch_array($mate_result)) {
        $array[] = $mate_row[matename];
    }

    $x = 0;
    $count = count($array);

    while ($x <= $count) {
        $mate[$x] = $array[$x];

        if (in_array($mate[$x], preg_replace("/[0-9]/", "", $menu_obj[$p]))) {

            $checkout[$p] = preg_replace("/[0-9]/", "", $menu_obj[$p]);
            $key[$p] = array_search($mate[$x], $checkout[$p]);
            $showout[$p] = preg_replace("/[^0-9]/", "", $menu_obj[$p]);

            $acc = $checkout[$p][$key[$p]];

            $acc_query = "SELECT * FROM acctest WHERE ingredients = '$acc'";
            $acc_result = mysqli_query($mysqli, $acc_query);
            $acc_row = mysqli_fetch_array($acc_result);
            // 재료 및 인증번호가 나와요 클래스명 같은거 추가하시면 됩니다
            echo '
                <div>
                <p>' . $checkout[$p][$key[$p]] . '</p>
                <p>' . $showout[$p][$key[$p]] . 'g</p>
                <p>' . $acc_row[accreditname] . '</p>
                <p>' . $acc_row[accreditnum] . '</p>
                </div>
            ';
        }
        $x++;
    }

    echo '</div></div>';

    $p++;
}
if (in_array("K", $opt_array) || in_array("V", $opt_array)) {
    $q = 1;
    while ($q <= 2) {
        $menu = $row_menu[$position][$p];

        $recipe_query = "SELECT * FROM snackrecipe WHERE menu = $menu";
        $recipe_result = mysqli_query($mysqli, $recipe_query);
        $recipe_row = mysqli_fetch_array($recipe_result);

        $recipe_name[$q] = $recipe_row[menu];
        $recipe_period[$q] = $recipe_row[period];
        $recipe_mate[$q] = $recipe_row[plusobject];
        $recipe_step1[$q] = $recipe_row[recipe1];
        $recipe_step2[$q] = $recipe_row[recipe2];
        $recipe_step3[$q] = $recipe_row[recipe3];
        $recipe_step4[$q] = $recipe_row[recipe4];
        $recipe_step5[$q] = $recipe_row[recipe5];
        $recipe_step6[$q] = $recipe_row[recipe6];
        $recipe_tips[$q] = $recipe_row[tips];
        $recipe_storage[$q] = $recipe_row[storage];
        $recipe_estep1[$q] = $recipe_row[easyrecipe1];
        $recipe_estep2[$q] = $recipe_row[easyrecipe2];
        $recipe_estep3[$q] = $recipe_row[easyrecipe3];
        $recipe_estep4[$q] = $recipe_row[easyrecipe4];
        $recipe_estep5[$q] = $recipe_row[easyrecipe5];

        $recipe_notice[$q] = $recipe_row[notice];

        // snack-pop1 이런식으로 나옴
        echo '
        
            <div class="recipe-pop snack-pop' . $q . '">
                <div class="">
                    <p>' . $recipe_name[$q] . '</p>
                </div>
                <div class="">
                    <div>
                        <p>추가준비물</p>
                    </div>
                    <div>
                        <p>' . $recipe_mate[$q] . '</p>
                    </div>
                </div>
                <div class="">
                    <div>
                        <p>만드는 방법</p>
                    </div>
                    <div>
                    <p>1. ' . $recipe_step1[$q] . '</p>';

        if (empty($recipe_step2[$q])) {
        } else {
            echo '<p>2. ' . $recipe_step2[$q] . '</p>';
        }

        if (empty($recipe_step3[$q])) {
        } else {
            echo '<p>3. ' . $recipe_step3[$q] . '</p>';
        }

        if (empty($recipe_step4[$q])) {
        } else {
            echo '<p>4. ' . $recipe_step4[$q] . '</p>';
        }

        if (empty($recipe_step5[$q])) {
        } else {
            echo '<p>5. ' . $recipe_step5[$q] . '</p>';
        }

        if (empty($recipe_step6[$q])) {
        } else {
            echo '<p>6. ' . $recipe_step6[$q] . '</p>';
        }

        if (empty($recipe_tips[$q])) {
        } else {
            echo '<div><p>' . $recipe_tips[$q] . '</p></div>';
        }

        echo '</div></div>';

        echo '
        <div>
            <div>
                <p>재료 및 친환경 인증번호</p>
            </div>';

        $menu_query = "SELECT * FROM menutest WHERE menu = '$menu'";
        $menu_result = mysqli_query($mysqli, $menu_query);
        $menu_row = mysqli_fetch_array($menu_result);

        $menu_obj[$q] = $menu_row;

        $mate_query = "SELECT * FROM buying";
        $mate_result = mysqli_query($mysqli, $mate_query);
        while ($mate_row = mysqli_fetch_array($mate_result)) {
            $array[] = $mate_row[matename];
        }

        $x = 0;
        $count = count($array);

        while ($x <= $count) {
            $mate[$x] = $array[$x];

            if (in_array($mate[$x], preg_replace("/[0-9]/", "", $menu_obj[$q]))) {

                $checkout[$q] = preg_replace("/[0-9]/", "", $menu_obj[$q]);
                $key[$q] = array_search($mate[$x], $checkout[$q]);
                $showout[$q] = preg_replace("/[^0-9]/", "", $menu_obj[$q]);

                $acc = $checkout[$q][$key[$q]];

                $acc_query = "SELECT * FROM acctest WHERE ingredients = '$acc'";
                $acc_result = mysqli_query($mysqli, $acc_query);
                $acc_row = mysqli_fetch_array($acc_result);
                // 재료 및 인증번호가 나와요 클래스명 같은거 추가하시면 됩니다
                echo '
                <div>
                <p>' . $checkout[$q][$key[$q]] . '</p>
                <p>' . $showout[$q][$key[$q]] . 'g</p>
                <p>' . $acc_row[accreditname] . '</p>
                <p>' . $acc_row[accreditnum] . '</p>
                </div>
            ';
            }
            $x++;
        }

        echo '</div></div>';

        $q++;
    }
}
?>

<script>
</script>


<?php
do_action('storefront_sidebar');
get_footer();
