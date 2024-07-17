<div id="village_map">
    <?php
    if ($building->walling()) {
        $wtitle = $building->procResType($building->walling()) . " Level " . $village->resarray['f40'];
    } else {
        $wtitle = ($village->resarray['f40'] == 0) ? "Outer building site" : $building->procResType($village->resarray['f40t'], 0) . " Level " . $village->resarray['f40'];
    }
    ?>
    <map name="clickareas" id="clickareas">
        <?php
        $coords = array(
            19 => "110,135,132,120,132,121,160,122,179,136,179,151,158,163,128,163,109,149",
            "202,93,223,79,223,79,251,80,271,95,271,109,249,121,220,121,200,108",
            "290,76,311,61,311,62,339,63,359,77,359,92,337,104,308,104,289,90",
            "384,105,406,91,406,91,434,92,453,106,453,121,432,133,402,133,383,120",
            "458,147,479,133,479,133,507,134,527,149,527,164,505,175,476,175,457,162",
            "71,184,92,170,92,171,120,172,140,186,139,201,118,213,88,213,69,199",
            "516,196,538,182,538,182,566,183,585,198,585,212,564,224,534,224,515,211",
            "280,113,301,98,301,99,329,100,349,114,348,169,327,181,298,181,278,168",
            "97,320,118,306,118,307,146,308,166,322,165,337,144,349,114,349,95,335",
            "59,244,80,230,80,230,108,231,128,246,128,260,106,272,77,272,57,259",
            "477,249,498,235,498,235,526,236,546,251,545,265,524,277,494,277,475,264",
            "181,259,202,245,202,245,230,246,250,261,250,275,228,287,199,287,180,274",
            "182,189,203,175,203,175,231,176,251,190,251,205,229,217,200,217,181,204",
            "254,308,276,294,276,294,304,295,324,309,323,324,302,336,272,336,253,323",
            "505,317,526,303,526,303,554,304,574,319,573,333,552,345,522,345,503,332",
            "182,379,204,365,204,365,232,366,251,380,251,395,230,407,200,407,181,394",
            "324,370,345,356,345,357,373,358,393,372,392,387,371,398,341,398,322,385",
            "433,334,454,320,454,321,482,322,502,336,502,351,480,362,451,362,432,349",
            "271,412,292,398,292,399,320,400,340,414,339,429,318,440,289,440,269,427",
            "396,396,417,381,417,382,445,383,465,397,464,412,443,424,413,424,394,410",
            "398,212,412,250,369,301,394,323,445,286,453,233,427,183",
            "71,450,2,374,3,374,-10,243,13,142,120,81,214,34,340,18,500,43,615,130,641,239,643,350,601,425,534,494,358,534,282,532,180,526,77,456,117,378,163,413,242,442,331,454,425,443,499,417,576,344,596,304,598,221,571,157,481,90,385,61,313,56,217,72,135,113,77,165,46,217,44,269,65,326,119,379"
        );
        $iso_cor = array(
            1 => 'style="left:81px; top:57px; z-index:19"', 'style="left:174px; top:15px; z-index:17"', 'style="left:261px; top:-3px; z-index:15"',
            'style="left:354px; top:26px; z-index:17"', 'style="left:428px; top:69px; z-index:20"', 'style="left:42px; top:107px; z-index:23"',
            'style="left:485px; top:119px; z-index:24"', 'style="left:249px; top:71px; z-index:20"', 'style="left:68px; top:241px; z-index:32"',
            'style="left:31px; top:167px; z-index:27"', 'style="left:448px; top:170px; z-index:27"', 'style="left:153px; top:183px; z-index:28"',
            'style="left:155px; top:110px; z-index:23"', 'style="left:227px; top:230px; z-index:32"', 'style="left:476px; top:238px; z-index:32"',
            'style="left:153px; top:300px; z-index:36"', 'style="left:295px; top:291px; z-index:36"',
            'style="left:404px; top:254px; z-index:33"', 'style="left:241px; top:333px; z-index:39"', 'style="left:365px; top:318px; z-index:38"', 'style="z-index:28"'
        );
        $levels = array(
            1 => 'left:132px; top:108px', 'left:225px; top:66px', 'left:312px; top:48px', 'left:405px; top:77px',
            'left:479px; top:120px', 'left:93px; top:158px', 'left:536px; top:170px', 'left:300px; top:122px', 'left:119px; top:292px',
            'left:82px; top:218px', 'left:499px; top:221px', 'left:204px; top:234px', 'left:206px; top:161px', 'left:278px; top:281px', 'left:527px; top:289px', 'left:204px; top:351px',
            'left:346px; top:342px', 'left:455px; top:305px', 'left:292px; top:384px', 'left:416px; top:369px', 'left:406px; top:225px'
        );
        //print_r($levels);
        $canornot = array();
        $ll = 0;
        $demolition = $database->getDemolition($village->wid);
        for ($t = 19; $t <= 40; $t++) {
            $ll++;

            if (($village->resarray['f99t'] == 40 and ($t) == '26') or ($village->resarray['f99t'] == 40 and ($t) == '30') or ($village->resarray['f99t'] == 40 and ($t) == '31') or ($village->resarray['f99t'] == 40 and ($t) == '32')) {
                echo "<area href=\"build.php?id=99\" title=\"<div style=color:#FFF><b>" . $building->procResType(40) . "</b></div> " . LVL . " " . $village->resarray['f99'] . "\" coords=\"$coords[$t]\" shape=\"poly\"/>";
            } else {
                $bindicate = $canornot[$ll] = $building->canBuild($t, $village->resarray['f' . $t . 't'], $demolition);
                if ($village->resarray['f' . $t . 't'] != 0 && !$building->isMax($village->resarray['f' . $t . 't'], $t)) {
                    $loopsame = $building->isCurrent($t) ? 1 : 0;
                    $doublebuild = 0;
                    if ($loopsame > 0 && $building->isLoop($t)) {
                        $doublebuild = 1;
                    }
                    $uprequire = $building->resourceRequired($t, $village->resarray['f' . $t . 't'], ($loopsame > 0 ? 2 : 1) + $doublebuild);


                    $title = '<div style=\'color:#FFF\'><b>' . $building->procResType($village->resarray['f' . $t . 't']) . ' ' . LVL . ' ' . $village->resarray['f' . $t] . '</b></div>';
                    if ($bindicate != 10 && $bindicate != 1)
                        $title .= sprintf(UPGRADECOST, ($village->resarray['f' . $t] + ($loopsame > 0 ? 2 : 1) + $doublebuild)) . ':<br/>
 <span class=\'resources r1\' style=\'margin-right: 20px;\'> <img src=\'../gpack/delusion_4.5/img/g/lumber_small.png\' > ' . $uprequire['wood'] . ' </span>
<span class=\'resources r2\' style=\'margin-right: 20px;\'> <img src=\'../gpack/delusion_4.5/img/g/clay_small.png\' > ' . $uprequire['clay'] . ' </span>
<span class=\'resources r3\' style=\'margin-right: 20px;\'> <img src=\'../gpack/delusion_4.5/img/g/iron_small.png\' > ' . $uprequire['iron'] . ' </span>
<span class=\'resources r4\' style=\'margin-right: 20px;\'> <img src=\'../gpack/delusion_4.5/img/g/crop_small.png\' > ' . $uprequire['crop'] . ' </span><br>
<span class=\'clocks\'> <img  src=\'../gpack/delusion_4.5/img/g/clock_medium.png\' > ' . gmdate("H:i:s", $uprequire['time']) . ' </span>';
                } else {
                    $title = CS;
                    if (($t == 39) && ($village->resarray['f' . $t] == 0)) {
                        $title = CS;
                    }
                }
                if ($_COOKIE['builder'] == "Off" || !$village->resarray['f' . $t . 't'] || $bindicate == 1 || $bindicate == 10) {
                    echo '<area coords="' . $coords[$t] . '" href="build.php?id=' . $t . '" alt="" title="' . $title . '" shape="poly"/>';
                } else {
                    echo '<area coords="' . $coords[$t] . '" href="dorf2.php?а=' . $t . '&c=' . $session->checker . '" alt= "" title="' . $title . '" shape="poly"/>';
                }
            }
        }
        ?>
        <?php

        if ($village->resarray['f40'] != 0  || $building->walling()) {

            echo "<img src=\"img/x.gif\" class=\"wall g" . $building->getWallID() . "Top \" alt=\"$wtitle level " . $village->resarray['f40'] . "\">";
            echo "<img src=\"img/x.gif\" class=\"wall g" . $building->getWallID() . "Bottom \" alt=\"$wtitle level " . $village->resarray['f40'] . "\">";
        }
        ?>
    </map>

    <?php

    for ($i = 1; $i <= 20; $i++) {
        $onconstr[$i] = 0;
        if (($village->resarray['f99t'] == 40 and ($i + 18) == '26') or ($village->resarray['f99t'] == 40 and ($i + 18) == '30') or ($village->resarray['f99t'] == 40 and ($i + 18) == '31') or ($village->resarray['f99t'] == 40 and ($i + 18) == '32')) {
        } else {
            $text = "Construction Site";
            $img = "iso";
            if ($village->resarray['f' . ($i + 18) . 't'] != 0) {
                $text = $building->procResType($village->resarray['f' . ($i + 18) . 't']) . " Level " . $village->resarray['f' . ($i + 18)];
                $img = "g" . $village->resarray['f' . ($i + 18) . 't'];
            }
            foreach ($building->buildArray as $job) {
                if ($job['field'] == ($i + 18)) {
                    $onconstr[$i] = 1;
                    $img = 'g' . $job['type'] . 'b';
                    $text = $building->procResType($job['type']) . " Level " . $village->resarray['f' . $job['field']];
                }
            }
            echo "<img " . $iso_cor[$i] . " src=\"img/x.gif\" class=\"building  $img\" alt=\"$text\" />";
        }
    }
    if ($village->natar) {
        foreach ($building->buildArray as $job) {
            if ($job['field'] == 99) {
                $onconstr[99] = 1;
            }
        }
        $canornot[99] = $building->canBuild(99, $village->resarray['f99t'], $demolition);
    }
    if ($village->resarray['f39'] == 0) {
        if ($building->rallying()) {
            echo "<img src=\"img/x.gif\" style=\"z-index:31\" class=\"dx1 g16b" . (($village->natar) ? '_ww' : '') . "\" alt=\"Rally Point " . $village->resarray['f39'] . "\" />";
        } else {
            echo "<img src=\"img/x.gif\" style=\"z-index:31\" class=\"dx1 g16e" . (($village->natar) ? '_ww' : '') . "\" alt=\"Rally Point \" />";
        }
    } else {
        echo "<img src=\"img/x.gif\" style=\"z-index:31\" class=\"dx1 g16" . (($village->natar) ? '_ww' : '') . "\" alt=\"Rally Point " . $village->resarray['f39'] . "\" />";
    }
    ?>
    <?php
    if ($village->resarray['f99t'] == 40) {
        if ($village->resarray['f99'] >= 0 && $village->resarray['f99'] <= 9) {
            echo '<img class="ww g40 g40_0" src="img/x.gif" style="z-index:30" alt="Wonder of the World">';
        }
        if ($village->resarray['f99'] >= 10 && $village->resarray['f99'] <= 19) {
            echo '<img class="ww g40 g40_1" src="img/x.gif" style="z-index:30" alt="Wonder of the World">';
        }
        if ($village->resarray['f99'] >= 20 && $village->resarray['f99'] <= 29) {
            echo '<img class="ww g40 g40_2" src="img/x.gif" style="z-index:30" alt="Wonder of the World">';
        }
        if ($village->resarray['f99'] >= 30 && $village->resarray['f99'] <= 39) {
            echo '<img class="ww g40 g40_3" src="img/x.gif" style="z-index:30" alt="Wonder of the World">';
        }
        if ($village->resarray['f99'] >= 40 && $village->resarray['f99'] <= 49) {
            echo '<img class="ww g40 g40_4" src="img/x.gif" style="z-index:30" alt="Wonder of the World">';
        }
        if ($village->resarray['f99'] >= 50 && $village->resarray['f99'] <= 59) {
            echo '<img class="ww g40 g40_5" src="img/x.gif" style="z-index:30" alt="Wonder of the World">';
        }
        if ($village->resarray['f99'] >= 60 && $village->resarray['f99'] <= 69) {
            echo '<img class="ww g40 g40_6" src="img/x.gif" style="z-index:30" alt="Wonder of the World">';
        }
        if ($village->resarray['f99'] >= 70 && $village->resarray['f99'] <= 79) {
            echo '<img class="ww g40 g40_7" src="img/x.gif" style="z-index:30" alt="Wonder of the World">';
        }
        if ($village->resarray['f99'] >= 80 && $village->resarray['f99'] <= 89) {
            echo '<img class="ww g40 g40_8" src="img/x.gif" style="z-index:30" alt="Wonder of the World">';
        }
        if ($village->resarray['f99'] >= 90 && $village->resarray['f99'] <= 94) {
            echo '<img class="ww g40 g40_9" src="img/x.gif" style="z-index:30" alt="Wonder of the World">';
        }
        if ($village->resarray['f99'] >= 95 && $village->resarray['f99'] <= 99) {
            echo '<img class="ww g40 g40_10" src="img/x.gif" style="z-index:30" alt="Wonder of the World">';
        }
        if ($village->resarray['f99'] == 100) {
            echo '<img class="ww g40 g40_11" src="img/x.gif" style="z-index:30" alt="Wonder of the World">';
        }
    }

    ?>

    <div id="levels" <?php if (isset($_COOKIE['t4level'])) {
                            echo "class=\"on\"";
                        } ?>>
        <?php
        for ($i = 1; $i <= 20; $i++) {
            if ($village->resarray['f' . ($i + 18)] != 0) {
                echo "<div style=\"" . $levels[$i] . "\" class=\"colorLayer " . (($onconstr[$i] != 0) ? 'underConstruction' : '') . " " . (($canornot[$i] == 8 || $canornot[$i] == 9) ? 'good' : (($canornot[$i] == 10 || $canornot[$i] == 1) ? 'maxLevel' : 'notNow')) . " aid$i\"><div class=\"labelLayer\">" . $village->resarray['f' . ($i + 18)] . "</div></div>";
            }
        }
        if ($village->resarray['f39'] != 0) {
            echo "<div style=\"" . $levels[21] . "\" class=\"aid39 " . ($building->rallying() > 0 ? 'underConstruction' : '') . " colorLayer " . (($canornot[21] == 8 || $canornot[21] == 9) ? 'good' : (($canornot[21] == 10 || $canornot[21] == 1) ? 'maxLevel' : 'notNow')) . "\"><div class=\"labelLayer\">" . $village->resarray['f39'] . "</div></div>";
        }
        if ($village->resarray['f40'] != 0) {
            echo "<div style=\"" . $levels[22] . "\" class=\"" . ($building->walling() > 0 ? 'underConstruction' : '') . " colorLayer " . (($canornot[22] == 8 || $canornot[22] == 9) ? 'good' : (($canornot[22] == 10 || $canornot[22] == 1) ? 'maxLevel' : 'notNow')) . " aid40\"><div class=\"labelLayer\">" . $village->resarray['f40'] . "</div></div>";
        }
        if ($village->resarray['f99'] != 0) {
            echo "<div style=\"" . $levels[23] . "\" class=\"" . (($onconstr[99] != 0) ? 'underConstruction' : '') . " colorLayer " . (($canornot[99] == 8 || $canornot[99] == 9) ? 'good' : (($canornot[99] == 10 || $canornot[99] == 1) ? 'maxLevel' : 'notNow')) . " aid99\"><div class=\"labelLayer\">" . $village->resarray['f99'] . "</div></div>";
        }
        ?>

    </div>

    <img src="img/x.gif" id="lswitch" class="lswitchMinus" onclick="
    $('lswitch').toggleClass('lswitchMinus');
    $('lswitch').toggleClass('lswitchPlus');
    if ($('levels').toggleClass('on').hasClass('on')) {
        document.cookie = 't4level=1; expires=Wed, 1 Jan 2030 00:00:00 GMT'; // Extend the expiration date
    } else {
        document.cookie = 't4level=1; expires=Thu, 01-Jan-1970 00:00:01 GMT';
    }
" />
    <img class="clickareas" usemap="#clickareas" src="img/x.gif" alt="" />



</div>

<!-- <div id="villageContent" class=""> -->
<div class="buildingSlot a19 g8 aid19 spartan" data-aid="19" data-gid="8" data-building-id="130923" data-name="Grain Mill"><a href="/build.php?id=19&amp;gid=8" class="level colorLayer maxLevel aid19 spartan" data-level="5" previewlistener="true">
        <div class="labelLayer">5</div>
    </a><img src="/img/x.gif" class="building g8 spartan" alt=""><svg width="120" height="120" viewBox="0 0 120 120" class="buildingShape g8">
        <g class="hoverShape">
            <path d="M97.8 47.7c-.41-1.65.18-2.74 0-3.55v-.55c.1-2.3-.3-4.8-.8-5.6-.28-.45-.66-.67-1.37-.6L72.19 27.09a.315.315 0 0 0-.19-.08L58.09 25.2c-.41-.12-.93-.19-1.49-.19-1.3 0-2.6.4-2.8.9-.1.5-3.6 2.8-7.7 5.2-4.1 2.4-8.3 5.7-9.5 7.2-.65.88-1.05 1.59-1.24 2.14l-.29.21-6.17 46.55c-.3.4.06 3.39-.04 6.39-.1 3-.14 3.24.14 5.91.6.3 1 1.5 1 2.5 0 1.3 1.2 2.5 3.7 3.5 2.1.9 4.4 2.2 5.3 2.9 1 .8 5.3 1.3 12.5 1.5 3.55.06 9.64 1.6 34.4-9.4 6.11-28.12 7.94-33 11.9-52.8Z" onclick="window.location.href='/build.php?id=19&amp;gid=8'"></path>
        </g>
        <g class="highlightShape">
            <path d="M97 38c-.8-1.3-2.4-.7-10.5 3.2-5.2 2.7-9.5 5.4-9.6 6-.1.7 0 2.8.1 4.5.1 2-.3 3.3-1.1 3.3s-1-1.5-.6-5.6c.3-3 1.1-6.2 1.7-6.9.8-1 .8-1.9.1-3.3-.5-1-1.7-2.4-2.5-3.2-1-.7-1.6-2.8-1.6-5.1s-.5-3.9-1-3.9c-.6 0-2.2.8-3.6 1.7-2.4 1.6-2.8 1.5-6-.2-1.9-1-3.4-2.2-3.4-2.7 0-.4-1.1-.8-2.4-.8s-2.6.4-2.8.9c-.1.5-3.6 2.8-7.7 5.2-4.1 2.4-8.3 5.7-9.5 7.2-1.4 1.9-1.7 3-1 3.5.7.4 1.3 8.1 1.7 20.4L38 82l-4.3 2.1c-2.3 1.2-3.34 2.44-3.64 2.94 0 2.28-.11 3.08-.11 4.16 1.03 1.77.34.6 1.03 1.77 0 2.05.13 10.05.13 11.05 0 1.3.11.48 2.61 1.48 2.1.9 4.4 2.2 5.3 2.9 1 .8 5.6 1.3 14 1.5l12.5.2 10.2-4.8 10.2-4.8v-7c.1-6.8 0-7.1-3-8.7l-3-1.8.3-10.5q.3-10.6-1.9-10c-1.9.4-2.3.1-2.3-1.8s1.7-3.1 10.9-7.6l10.9-5.4v-4.1c.1-2.3-.3-4.8-.8-5.6Z" onclick="window.location.href='/build.php?id=19&amp;gid=8'"></path>
        </g>
    </svg>
</div>
<div class="buildingSlot a20 g10 aid20 spartan" data-aid="20" data-gid="10" data-building-id="130924" data-name="Warehouse"><a href="/build.php?id=20&amp;gid=10" class="level colorLayer good aid20 spartan" data-level="15" previewlistener="true">
        <div class="labelLayer">15</div>
    </a><img src="/img/x.gif" class="building g10 spartan" alt=""><svg width="120" height="120" viewBox="0 0 120 120" class="buildingShape g10">
        <g class="hoverShape">
            <path d="M90 79.42 81.9 56l-18.2-9.2-21.8-2.7c-.2.1-5.2 2.6-11.1 5.6L20 55.2v38.6l4.8 2.2c2.6 1.2 6.7 3.2 9.1 4.4 1.78.97 3.07 1.49 4.35 1.69v.11L52.2 108c.2 1 1.7 1.6 4.6 1.8 1.37.09 2.37.07 3.11-.07l.56.13 24.67-8.2c.31-.04.6-.09.86-.16.34-.11.62-.24.86-.41l.74-.24 1.4-9.84c.6 0 1-2.8 1-6.3 0-1.86 0-3.17-.1-4.15l.1-1.13Z" onclick="window.location.href='/build.php?id=20&amp;gid=10'"></path>
        </g>
        <g class="highlightShape">
            <path d="M90 84.7c0 3.5-.4 6.3-1 6.3-.5 0-1 2.2-1 4.9 0 4.1-.4 5.1-2 5.6-1.1.3-2.9.3-4 0s-2.3-1.7-2.6-3c-.4-1.7-2.3-3.2-6.5-5.1-3.2-1.5-5.9-3.1-5.9-3.6 0-.4-.4-.8-1-.8-.5 0-1 .3-1 .7 0 .5 1.4 1.6 3 2.5 1.7.9 3 2.1 3 2.6s-1 1.4-2.3 2.1c-1.9 1-3.1.9-6.8-.5-2.4-1-4.6-2.1-4.9-2.4-.3-.4-2-1.5-3.7-2.4-2.9-1.4-3.3-1.4-3.3-.2 0 .9.9 2 2 2.6 1.2.6 2 2.1 2 3.5 0 2-.6 2.5-3.7 3-2.1.3-5.7.9-7.9 1.4-3.4.6-5 .4-8.5-1.5-2.4-1.2-6.5-3.2-9.1-4.4L20 93.8V55.2l10.8-5.5c5.9-3 10.9-5.5 11.1-5.6.3 0 3.5 1.5 7.2 3.4l6.8 3.5 3.9-2.1 3.9-2.1 9.1 4.6 9.1 4.6.3 9.2.3 9.2 3.8 2c3.7 1.9 3.7 2 3.7 8.3ZM56.9 102c-.5 0-1.8 1-2.9 2.2s-1.9 2.9-1.8 3.8c.2 1 1.7 1.6 4.6 1.8 3.1.2 4.4-.1 4.8-1.3.4-1-.3-2.6-1.6-4.1-1.3-1.3-2.7-2.4-3.1-2.4Z" onclick="window.location.href='/build.php?id=20&amp;gid=10'"></path>
        </g>
    </svg>
</div>
<div class="buildingSlot a21 g11 aid21 spartan" data-aid="21" data-gid="11" data-building-id="130925" data-name="Granary"><a href="/build.php?id=21&amp;gid=11" class="level colorLayer good aid21 spartan" data-level="12" previewlistener="true">
        <div class="labelLayer">12</div>
    </a><img src="/img/x.gif" class="building g11 spartan" alt=""><svg width="120" height="120" viewBox="0 0 120 120" class="buildingShape g11">
        <g class="hoverShape">
            <path d="M90.1 90.4c-.2-5.1-.8-8.2-1.8-9.2-.11-.11-.24-.21-.4-.32C77.86 73.09 70.36 63.1 66.4 50c.4-1-.6-2.7-2.6-4.7-1.8-1.7-5.9-4-9.1-5.2-3.2-1.1-6.8-2.1-8-2-1.2 0-4.8 1-7.9 2.1-3.3 1.1-7.2 3.4-9.2 5.4-2.52 2.52-3.22 3.28-3.08 5.37l-.35 36.67c-.11 1.81-.16 3.99-.16 6.35 0 2 .02 3.64.05 5.01l-.05 5.7c8.06 5.83 18.09 9.24 29.89 10.44.43.09.79.13 1.11.11.06 0 .12.01.18.02l.13-.05c.19-.04.36-.11.52-.21 17.09-6.97 26.88-11.83 30.13-14.81.04-.03.09-.06.14-.1 2.2-1.7 2.3-2.5 2-9.7Z" onclick="window.location.href='/build.php?id=21&amp;gid=11'"></path>
        </g>
        <g class="highlightShape">
            <path d="M90.1 90.4c-.2-5.1-.8-8.2-1.8-9.2-.8-.8-3.3-1.7-5.6-1.9-2.7-.2-5.4.3-7.4 1.4-2.3 1.2-3.3 2.5-3.3 4 0 1.3-.3 2.3-.7 2.3-.5 0-1.7-.7-2.7-1.5s-2.2-1.2-2.7-1c-.4.3-1-4.2-1.4-10-.4-5.9-.4-12.3 0-14.3s.8-4.8 1-6.2.6-3.2.9-4c.4-1-.6-2.7-2.6-4.7-1.8-1.7-5.9-4-9.1-5.2-3.2-1.1-6.8-2.1-8-2-1.2 0-4.8 1-7.9 2.1-3.3 1.1-7.2 3.4-9.2 5.4-3.5 3.5-3.5 3.6-2.6 8.6.6 2.8 1 10.2 1 16.4s-.4 11.5-1 11.9-1 5.3-1 11.5c0 8.9.3 10.9 1.6 11.4.9.3 2.9.6 4.6.6 2.1 0 3.1.6 3.5 1.9.3 1.1 1.2 2.3 2.1 2.6 1 .4 3.5.8 5.7 1.1 2.2.2 4.9.8 6 1.3s3.4 1.4 5.1 1.9c2.6.8 3.3.7 4.4-1.2.8-1.1 1.5-2.6 1.5-3.1 0-.6-.6-1.5-1.5-2.2-.8-.7-1-1.3-.4-1.3s2.2-1.1 3.6-2.5l2.5-2.4 5.2 2c4.4 1.6 5.9 1.8 8.7.9 1.9-.7 3.4-1.6 3.4-2.1s.9-.9 1.9-.9 2.9-.9 4.2-1.9c2.2-1.7 2.3-2.5 2-9.7Z" onclick="window.location.href='/build.php?id=21&amp;gid=11'"></path>
        </g>
    </svg>
</div>
<div class="buildingSlot a22 g23 aid22 spartan" data-aid="22" data-gid="23" data-building-id="130926" data-name="Cranny"><a href="/build.php?id=22&amp;gid=23" class="level colorLayer maxLevel aid22 spartan" data-level="10" previewlistener="true">
        <div class="labelLayer">10</div>
    </a><img src="/img/x.gif" class="building g23 spartan" alt=""><svg width="120" height="120" viewBox="0 0 120 120" class="buildingShape g23">
        <g class="hoverShape">
            <path d="m100 62.39-1.47-1.41c-.44-.74-.98-1.5-1.63-2.28-1.83-2.2-2.92-3.16-4.23-3.35l-.04-.04-7.76-1.34c-.26-.16-.69-.23-1.35-.23h-.02c-.41 0-.9.02-1.5.06-.48.05-1.01.14-1.55.26-7.69.63-15.1-.22-22.15-2.96l-.24.06c-.12-.03-.25-.06-.37-.06-.51.07-1.97.52-3.69 1.06L34.39 57c-.8 0-1.4.9-1.4 2 0 .25-.06.63-.15 1.1-4.56 8.83-10.6 18.05-19.39 27.97-.89.66-1.46 1.27-1.46 1.63 0 .26.14.52.38.74 2.85 5.73 2.79 12.53 1.17 19.9-.25.16-.31.41-.17.75-.03.11-.05.23-.08.34l.74.55c.14.14.29.27.46.42.17.12.38.25.6.37l1.66 1.23 1.89-.09c.36.05.71.09 1.05.09 1.07 0 2.3-.12 3.29-.28l26.18-1.19c1.61.12 4.37-.1 8.54-.63 4.8-.6 9.8-1.5 11.1-2s4.1-.9 6.3-.9 6.1-.5 8.7-1.2c2.6-.6 5.3-1.7 6-2.5.7-.7 2.1-1.7 3-2.3.6-.36.93-.63.97-.95l.08-.02c2.09-7.29 3.75-13.7 4.99-18.97.09-.1.15-.19.15-.26.19-4.3.26-8.99-.07-13.93.92-.33 1.07-1.14 1.07-3.17 0-.63-.09-1.28-.26-1.93.09-.46.17-.92.26-1.38Z" onclick="window.location.href='/build.php?id=22&amp;gid=23'"></path>
        </g>
        <g class="highlightShape">
            <path d="M96.9 58.7c-2.5-3-3.6-3.7-5.8-3.3-1.4.2-3.4.7-4.4 1.1-1.4.6-1.8.4-1.5-1.1.2-1.6-.2-1.8-3.2-1.6-1.9.2-4.5 1-5.7 1.7-1.5 1.1-2.1 2.3-2 4.7.2 2.3.9 3.6 2.5 4.4 1.5.7 2 1.4 1.3 1.9-.6.3-.9 1-.6 1.5s.1 1.1-.5 1.5-1.6-.6-2.3-2.2c-.6-1.5-2-2.9-2.9-3.1-1.1-.2-1.8.3-1.8 1.3 0 .8-.5 1.5-1.1 1.5s-.8-.7-.5-1.6c.3-.9.3-2.1-.1-2.7-.4-.7-.9-1.8-1-2.5-.2-.6-.5-2-.6-2.9-.2-.9-1.9-2.2-3.7-2.8-1.9-.6-3.6-1.7-3.8-2.3-.2-.7-.9-1.1-1.5-1.1-.7.1-3.2.9-5.7 1.7-2.5.9-4.6 1.7-4.8 1.8-.1 0 .3 1.5.9 3.2.6 1.7 2 3.4 3.1 3.7q1.9.7.1 2.7c-1.3 1.5-1.5 2.2-.5 2.5.6.3 1 .9.7 1.3-.3.5 0 1.8.6 2.8.7 1.2 2 1.8 3.3 1.6 1.2-.3.3.5-1.9 1.6s-5 2-6.2 2c-2.1 0-2.3-.4-2.3-6.3 0-3.4-.4-6.7-.8-7.2-.4-.6-2.4-2.1-4.5-3.3-2.1-1.2-4.5-2.2-5.3-2.2s-1.4.9-1.4 2c0 1-.9 4.2-2 7.1-1.1 2.8-2.2 7-2.5 9.2-.2 2.3-1 6-1.9 8.2-.8 2.2-1.5 3.5-1.5 2.8-.1-.6-1-1.4-2-1.8-1.1-.3-3.9.4-6.5 1.7-2.5 1.2-4.6 2.8-4.6 3.5s1 1.4 2.3 1.4c1.2.1 3.1.2 4.2.2s3.1-.2 4.5-.6c1.4-.4 1.9-.4 1.3-.1-.7.3-1.3 1.2-1.3 2 0 .9-1.3 2.7-3 4-2.9 2.5-2.9 2.6-1.2 4.9.9 1.3 3.1 2.5 4.9 2.8 1.7.3 4.4 1.5 6 2.6 1.5 1.1 5.6 2.7 9.1 3.6 3.4.9 6.7 1.3 7.2 1s1.1-.1 1.5.5c.3.5 1.5 1 2.5 1 1.1 0 6.8-2.3 12.7-5.2l10.7-5.1 6 2.1c3.4 1.2 6.7 2.2 7.4 2.2s2-.7 2.8-1.5c.8-.8 2.3-1.9 3.2-2.5 1.5-1 1.4-1.3-1-3.2l-2.7-2.1 2.6-2.2c2.3-2.1 2.4-2.5 1.4-5.8-.7-1.9-2.3-4.3-3.6-5.1-1.6-1.1-3.4-1.4-5.1-1-1.8.5-3.2 0-4.9-1.6-1.9-1.8-2.3-2.9-1.8-4.9.3-1.4 1-3.2 1.6-3.9.5-.7 1.8-1 2.7-.7 1 .3 2.6-.2 3.6-1.2 1.3-1.3 1.8-1.5 2.2-.5.3 1 .7 1 2 0 .8-.7 2.2-1.3 3.1-1.4.9-.1 2.8-.2 4.4-.3 2.4-.1 2.7-.5 2.7-3.4 0-2.2-1-4.5-3.1-7ZM68 72.3c-1.1-.3-2-.9-2-1.3 0-.5.9-.6 2-.3s2 .9 2 1.3c0 .5-.9.6-2 .3Zm15.2-3.9c-.6.3-1.2-.3-1.5-1.4s-.4-2-.2-2c.1 0 .8.6 1.4 1.4.7.8.8 1.7.3 2ZM26 111.5c0 .7-.7 1.6-1.6 1.9-.9.3-3 .6-4.7.6-1.8 0-4.1-.8-5.2-1.6-1.2-1-1.5-1.8-.9-2.1.6-.2 2-1 3-1.8s2.2-1.5 2.5-1.5 2 .7 3.7 1.6c1.8.8 3.2 2.1 3.2 2.9Z" onclick="window.location.href='/build.php?id=22&amp;gid=23'"></path>
        </g>
    </svg>
</div>
<div class="buildingSlot a23 g23 aid23 spartan" data-aid="23" data-gid="23" data-building-id="130927" data-name="Cranny"><a href="/build.php?id=23&amp;gid=23" class="level colorLayer maxLevel aid23 spartan" data-level="10" previewlistener="true">
        <div class="labelLayer">10</div>
    </a><img src="/img/x.gif" class="building g23 spartan" alt=""><svg width="120" height="120" viewBox="0 0 120 120" class="buildingShape g23">
        <g class="hoverShape">
            <path d="m100 62.39-1.47-1.41c-.44-.74-.98-1.5-1.63-2.28-1.83-2.2-2.92-3.16-4.23-3.35l-.04-.04-7.76-1.34c-.26-.16-.69-.23-1.35-.23h-.02c-.41 0-.9.02-1.5.06-.48.05-1.01.14-1.55.26-7.69.63-15.1-.22-22.15-2.96l-.24.06c-.12-.03-.25-.06-.37-.06-.51.07-1.97.52-3.69 1.06L34.39 57c-.8 0-1.4.9-1.4 2 0 .25-.06.63-.15 1.1-4.56 8.83-10.6 18.05-19.39 27.97-.89.66-1.46 1.27-1.46 1.63 0 .26.14.52.38.74 2.85 5.73 2.79 12.53 1.17 19.9-.25.16-.31.41-.17.75-.03.11-.05.23-.08.34l.74.55c.14.14.29.27.46.42.17.12.38.25.6.37l1.66 1.23 1.89-.09c.36.05.71.09 1.05.09 1.07 0 2.3-.12 3.29-.28l26.18-1.19c1.61.12 4.37-.1 8.54-.63 4.8-.6 9.8-1.5 11.1-2s4.1-.9 6.3-.9 6.1-.5 8.7-1.2c2.6-.6 5.3-1.7 6-2.5.7-.7 2.1-1.7 3-2.3.6-.36.93-.63.97-.95l.08-.02c2.09-7.29 3.75-13.7 4.99-18.97.09-.1.15-.19.15-.26.19-4.3.26-8.99-.07-13.93.92-.33 1.07-1.14 1.07-3.17 0-.63-.09-1.28-.26-1.93.09-.46.17-.92.26-1.38Z" onclick="window.location.href='/build.php?id=23&amp;gid=23'"></path>
        </g>
        <g class="highlightShape">
            <path d="M96.9 58.7c-2.5-3-3.6-3.7-5.8-3.3-1.4.2-3.4.7-4.4 1.1-1.4.6-1.8.4-1.5-1.1.2-1.6-.2-1.8-3.2-1.6-1.9.2-4.5 1-5.7 1.7-1.5 1.1-2.1 2.3-2 4.7.2 2.3.9 3.6 2.5 4.4 1.5.7 2 1.4 1.3 1.9-.6.3-.9 1-.6 1.5s.1 1.1-.5 1.5-1.6-.6-2.3-2.2c-.6-1.5-2-2.9-2.9-3.1-1.1-.2-1.8.3-1.8 1.3 0 .8-.5 1.5-1.1 1.5s-.8-.7-.5-1.6c.3-.9.3-2.1-.1-2.7-.4-.7-.9-1.8-1-2.5-.2-.6-.5-2-.6-2.9-.2-.9-1.9-2.2-3.7-2.8-1.9-.6-3.6-1.7-3.8-2.3-.2-.7-.9-1.1-1.5-1.1-.7.1-3.2.9-5.7 1.7-2.5.9-4.6 1.7-4.8 1.8-.1 0 .3 1.5.9 3.2.6 1.7 2 3.4 3.1 3.7q1.9.7.1 2.7c-1.3 1.5-1.5 2.2-.5 2.5.6.3 1 .9.7 1.3-.3.5 0 1.8.6 2.8.7 1.2 2 1.8 3.3 1.6 1.2-.3.3.5-1.9 1.6s-5 2-6.2 2c-2.1 0-2.3-.4-2.3-6.3 0-3.4-.4-6.7-.8-7.2-.4-.6-2.4-2.1-4.5-3.3-2.1-1.2-4.5-2.2-5.3-2.2s-1.4.9-1.4 2c0 1-.9 4.2-2 7.1-1.1 2.8-2.2 7-2.5 9.2-.2 2.3-1 6-1.9 8.2-.8 2.2-1.5 3.5-1.5 2.8-.1-.6-1-1.4-2-1.8-1.1-.3-3.9.4-6.5 1.7-2.5 1.2-4.6 2.8-4.6 3.5s1 1.4 2.3 1.4c1.2.1 3.1.2 4.2.2s3.1-.2 4.5-.6c1.4-.4 1.9-.4 1.3-.1-.7.3-1.3 1.2-1.3 2 0 .9-1.3 2.7-3 4-2.9 2.5-2.9 2.6-1.2 4.9.9 1.3 3.1 2.5 4.9 2.8 1.7.3 4.4 1.5 6 2.6 1.5 1.1 5.6 2.7 9.1 3.6 3.4.9 6.7 1.3 7.2 1s1.1-.1 1.5.5c.3.5 1.5 1 2.5 1 1.1 0 6.8-2.3 12.7-5.2l10.7-5.1 6 2.1c3.4 1.2 6.7 2.2 7.4 2.2s2-.7 2.8-1.5c.8-.8 2.3-1.9 3.2-2.5 1.5-1 1.4-1.3-1-3.2l-2.7-2.1 2.6-2.2c2.3-2.1 2.4-2.5 1.4-5.8-.7-1.9-2.3-4.3-3.6-5.1-1.6-1.1-3.4-1.4-5.1-1-1.8.5-3.2 0-4.9-1.6-1.9-1.8-2.3-2.9-1.8-4.9.3-1.4 1-3.2 1.6-3.9.5-.7 1.8-1 2.7-.7 1 .3 2.6-.2 3.6-1.2 1.3-1.3 1.8-1.5 2.2-.5.3 1 .7 1 2 0 .8-.7 2.2-1.3 3.1-1.4.9-.1 2.8-.2 4.4-.3 2.4-.1 2.7-.5 2.7-3.4 0-2.2-1-4.5-3.1-7ZM68 72.3c-1.1-.3-2-.9-2-1.3 0-.5.9-.6 2-.3s2 .9 2 1.3c0 .5-.9.6-2 .3Zm15.2-3.9c-.6.3-1.2-.3-1.5-1.4s-.4-2-.2-2c.1 0 .8.6 1.4 1.4.7.8.8 1.7.3 2ZM26 111.5c0 .7-.7 1.6-1.6 1.9-.9.3-3 .6-4.7.6-1.8 0-4.1-.8-5.2-1.6-1.2-1-1.5-1.8-.9-2.1.6-.2 2-1 3-1.8s2.2-1.5 2.5-1.5 2 .7 3.7 1.6c1.8.8 3.2 2.1 3.2 2.9Z" onclick="window.location.href='/build.php?id=23&amp;gid=23'"></path>
        </g>
    </svg>
</div>
<div class="buildingSlot a24 g0 aid24 spartan" data-aid="24" data-gid="0" data-building-id="130928" data-name=""><a href="/build.php?id=24" class="emptyBuildingSlot" previewlistener="true"></a><img src="/img/x.gif" class="building iso spartan" alt=""><svg width="120" height="120" viewBox="0 0 120 120" class="buildingShape iso">
        <path d="M49.4 70.4c-7.8 1.8-13.5 4.7-16.8 8.6-3.5 4.3-4.1 7.2-2.1 11.3 3.3 7.1 13.9 11.7 28.5 12.4 19.8 1.1 35-6.5 35-17.5 0-4.9-5.8-10.2-14.2-13.1-8.1-2.8-22-3.6-30.4-1.7z" onclick="window.location.href='/build.php?id=24'"></path>
    </svg>
</div>
<div class="buildingSlot a25 g23 aid25 spartan" data-aid="25" data-gid="23" data-building-id="130929" data-name="Cranny"><a href="/build.php?id=25&amp;gid=23" class="level colorLayer maxLevel aid25 spartan" data-level="10" previewlistener="true">
        <div class="labelLayer">10</div>
    </a><img src="/img/x.gif" class="building g23 spartan" alt=""><svg width="120" height="120" viewBox="0 0 120 120" class="buildingShape g23">
        <g class="hoverShape">
            <path d="m100 62.39-1.47-1.41c-.44-.74-.98-1.5-1.63-2.28-1.83-2.2-2.92-3.16-4.23-3.35l-.04-.04-7.76-1.34c-.26-.16-.69-.23-1.35-.23h-.02c-.41 0-.9.02-1.5.06-.48.05-1.01.14-1.55.26-7.69.63-15.1-.22-22.15-2.96l-.24.06c-.12-.03-.25-.06-.37-.06-.51.07-1.97.52-3.69 1.06L34.39 57c-.8 0-1.4.9-1.4 2 0 .25-.06.63-.15 1.1-4.56 8.83-10.6 18.05-19.39 27.97-.89.66-1.46 1.27-1.46 1.63 0 .26.14.52.38.74 2.85 5.73 2.79 12.53 1.17 19.9-.25.16-.31.41-.17.75-.03.11-.05.23-.08.34l.74.55c.14.14.29.27.46.42.17.12.38.25.6.37l1.66 1.23 1.89-.09c.36.05.71.09 1.05.09 1.07 0 2.3-.12 3.29-.28l26.18-1.19c1.61.12 4.37-.1 8.54-.63 4.8-.6 9.8-1.5 11.1-2s4.1-.9 6.3-.9 6.1-.5 8.7-1.2c2.6-.6 5.3-1.7 6-2.5.7-.7 2.1-1.7 3-2.3.6-.36.93-.63.97-.95l.08-.02c2.09-7.29 3.75-13.7 4.99-18.97.09-.1.15-.19.15-.26.19-4.3.26-8.99-.07-13.93.92-.33 1.07-1.14 1.07-3.17 0-.63-.09-1.28-.26-1.93.09-.46.17-.92.26-1.38Z" onclick="window.location.href='/build.php?id=25&amp;gid=23'"></path>
        </g>
        <g class="highlightShape">
            <path d="M96.9 58.7c-2.5-3-3.6-3.7-5.8-3.3-1.4.2-3.4.7-4.4 1.1-1.4.6-1.8.4-1.5-1.1.2-1.6-.2-1.8-3.2-1.6-1.9.2-4.5 1-5.7 1.7-1.5 1.1-2.1 2.3-2 4.7.2 2.3.9 3.6 2.5 4.4 1.5.7 2 1.4 1.3 1.9-.6.3-.9 1-.6 1.5s.1 1.1-.5 1.5-1.6-.6-2.3-2.2c-.6-1.5-2-2.9-2.9-3.1-1.1-.2-1.8.3-1.8 1.3 0 .8-.5 1.5-1.1 1.5s-.8-.7-.5-1.6c.3-.9.3-2.1-.1-2.7-.4-.7-.9-1.8-1-2.5-.2-.6-.5-2-.6-2.9-.2-.9-1.9-2.2-3.7-2.8-1.9-.6-3.6-1.7-3.8-2.3-.2-.7-.9-1.1-1.5-1.1-.7.1-3.2.9-5.7 1.7-2.5.9-4.6 1.7-4.8 1.8-.1 0 .3 1.5.9 3.2.6 1.7 2 3.4 3.1 3.7q1.9.7.1 2.7c-1.3 1.5-1.5 2.2-.5 2.5.6.3 1 .9.7 1.3-.3.5 0 1.8.6 2.8.7 1.2 2 1.8 3.3 1.6 1.2-.3.3.5-1.9 1.6s-5 2-6.2 2c-2.1 0-2.3-.4-2.3-6.3 0-3.4-.4-6.7-.8-7.2-.4-.6-2.4-2.1-4.5-3.3-2.1-1.2-4.5-2.2-5.3-2.2s-1.4.9-1.4 2c0 1-.9 4.2-2 7.1-1.1 2.8-2.2 7-2.5 9.2-.2 2.3-1 6-1.9 8.2-.8 2.2-1.5 3.5-1.5 2.8-.1-.6-1-1.4-2-1.8-1.1-.3-3.9.4-6.5 1.7-2.5 1.2-4.6 2.8-4.6 3.5s1 1.4 2.3 1.4c1.2.1 3.1.2 4.2.2s3.1-.2 4.5-.6c1.4-.4 1.9-.4 1.3-.1-.7.3-1.3 1.2-1.3 2 0 .9-1.3 2.7-3 4-2.9 2.5-2.9 2.6-1.2 4.9.9 1.3 3.1 2.5 4.9 2.8 1.7.3 4.4 1.5 6 2.6 1.5 1.1 5.6 2.7 9.1 3.6 3.4.9 6.7 1.3 7.2 1s1.1-.1 1.5.5c.3.5 1.5 1 2.5 1 1.1 0 6.8-2.3 12.7-5.2l10.7-5.1 6 2.1c3.4 1.2 6.7 2.2 7.4 2.2s2-.7 2.8-1.5c.8-.8 2.3-1.9 3.2-2.5 1.5-1 1.4-1.3-1-3.2l-2.7-2.1 2.6-2.2c2.3-2.1 2.4-2.5 1.4-5.8-.7-1.9-2.3-4.3-3.6-5.1-1.6-1.1-3.4-1.4-5.1-1-1.8.5-3.2 0-4.9-1.6-1.9-1.8-2.3-2.9-1.8-4.9.3-1.4 1-3.2 1.6-3.9.5-.7 1.8-1 2.7-.7 1 .3 2.6-.2 3.6-1.2 1.3-1.3 1.8-1.5 2.2-.5.3 1 .7 1 2 0 .8-.7 2.2-1.3 3.1-1.4.9-.1 2.8-.2 4.4-.3 2.4-.1 2.7-.5 2.7-3.4 0-2.2-1-4.5-3.1-7ZM68 72.3c-1.1-.3-2-.9-2-1.3 0-.5.9-.6 2-.3s2 .9 2 1.3c0 .5-.9.6-2 .3Zm15.2-3.9c-.6.3-1.2-.3-1.5-1.4s-.4-2-.2-2c.1 0 .8.6 1.4 1.4.7.8.8 1.7.3 2ZM26 111.5c0 .7-.7 1.6-1.6 1.9-.9.3-3 .6-4.7.6-1.8 0-4.1-.8-5.2-1.6-1.2-1-1.5-1.8-.9-2.1.6-.2 2-1 3-1.8s2.2-1.5 2.5-1.5 2 .7 3.7 1.6c1.8.8 3.2 2.1 3.2 2.9Z" onclick="window.location.href='/build.php?id=25&amp;gid=23'"></path>
        </g>
    </svg>
</div>
<div class="buildingSlot a26 g15 aid26 spartan" data-aid="26" data-gid="15" data-building-id="130930" data-name="Main Building"><a href="/build.php?id=26&amp;gid=15" class="level colorLayer good aid26 spartan" data-level="10" previewlistener="true">
        <div class="labelLayer">10</div>
    </a><img src="/img/x.gif" class="building g15 spartan" alt=""><svg width="120" height="120" viewBox="0 0 120 120" class="buildingShape g15">
        <g class="hoverShape">
            <path d="m105 94 .83-17.18c.11-.37.17-.72.17-1.02 0-1.3-.4-2.9-.9-3.7-4.55-10.35-11.73-18.52-20.64-25.24l-.2-.1a.883.883 0 0 0-.16-.17.807.807 0 0 0-.55-.18L60.21 35.14c-.13-.1-.24-.15-.31-.15-10.53-2.64-22.61-3-35.79-1.7-1.08-.51-2.16.66-6.21 5.4-3 3.6-7.1 8.6-9.1 11.1-.51.65-.94 1.24-1.33 1.8l-2.15 2.48C1.97 60.81.55 67.6.74 74.42c-.25 1.74-.4 4.89-.34 8.56.04 3.81.13 6.23.34 7.78v2.39l23.1 11.44c11.61 5.5 23.51 9.3 35.79 10.91.4.11.75.16 1.1.16h.06c.37-.01.74-.09 1.15-.22 9.67-2.22 40.03-17.82 43.06-21.46Z" onclick="window.location.href='/build.php?id=26&amp;gid=15'"></path>
        </g>
        <g class="highlightShape">
            <path d="M102.4 91.5c-2.2-1.4-2.5-2.2-1.9-5.1.3-1.9 1.7-4.5 3-5.9 1.4-1.3 2.5-3.4 2.5-4.7s-.4-2.9-.9-3.7c-.5-.7-1.9-1.4-3.2-1.5-1.6-.1-2.5-.9-3-2.9-.4-1.6-.5-3.5-.2-4.3.3-.9-.2-1.4-1.5-1.4-1.5 0-2.5 1.1-3.3 3.5-.7 1.9-1.9 3.5-2.6 3.5s-1.3.4-1.3 1c0 .5.7 1.3 1.6 1.8 1.4.8 1.4 1.3-.1 5-1 2.3-2 4.2-2.4 4.2s-1.7-1.1-2.9-2.5-1.8-2.5-1.3-2.5c.4 0 .8-3 .8-6.8.1-3.7.2-7.6.3-8.7 0-1.1-.2-4.3-.5-7-.4-2.8-.9-5.7-1.1-6.5-.4-1.2-.7-1.2-1.3-.1-.7 1-1.7.8-5-.9-2.3-1.1-4.5-2.8-4.8-3.6-.3-.9-1.2-1.2-2.4-.9-1 .3-3.2-.1-4.9-1-1.6-.9-3.6-2.4-4.3-3.5-.6-1.1-1.5-2-1.8-2-.4 0-.9.9-1.2 2s-1.7 2.4-3.1 3c-1.7.6-3.4.6-4.9 0-1.2-.5-5.4-1.8-9.4-3-3.9-1.1-7.4-2.6-7.7-3.3-.3-.8-.8-.7-1.6.5-.6 1-2 1.8-3 1.8-1.1 0-2.8-.8-3.8-1.8-1.8-1.8-2-1.7-7.3 4.5-3 3.6-7.1 8.6-9.1 11.1-2.5 3.2-3.6 5.3-3.2 6.6.4 1 .7 3.1.8 4.7.1 1.6-.3 3-1 3.3-.6.2-1.6 0-2.2-.6-.7-.7-1.2 0-1.7 2.1-.3 1.7-.4 4 0 5.1.3 1.1.2 2-.3 2S.3 77.4.4 83c.1 9.5.2 10.1 2.3 10.6 1.2.3 3.1.3 4.2-.1 1.2-.3 2.1-1.2 2.1-1.9 0-.6.8-1.2 1.8-1.3.9-.1 2.7-.4 3.8-.8 1.8-.5 2.3-.1 3.2 2.4.6 1.8 1.8 3.1 2.8 3.1 1.4 0 1.5.7 1 4-.5 3.4-.3 4.1 1.5 5.1 1.2.6 4.1.9 6.5.6 2.3-.2 6.7.2 9.6 1 2.9.8 8.1 1.4 11.6 1.4s6.2.5 6.2.9c0 .5-.9 1.4-2 2s-2 1.4-2 1.9c0 .4 1.7 1.6 3.8 2.5 3.6 1.7 4 1.6 7.5 0 2-1 3.7-2.3 3.7-2.9s-1.5-1.7-3.2-2.4l-3.3-1.3 3.5-1c1.9-.5 6.6-1.8 10.3-2.9 5-1.5 7.9-3.1 10.6-5.8l3.8-3.8 3.8 1.9c3.6 1.9 3.9 1.9 7.6.2 2.2-.9 3.9-2 3.9-2.4s-1.2-1.5-2.6-2.5ZM29.6 101c-.3 0-.8-.5-1.1-1-.3-.6-.1-1 .4-1 .6 0 1.1.4 1.1 1 0 .5-.2 1-.4 1ZM82 53c-.8.6-1.9 1-2.4 1-.6 0-.1-.6 1-1.4 1-.8 2.1-1.2 2.4-1 .2.3-.2.9-1 1.4Zm10.6 38.8c-2.5 1.1-2.6 1-2.6-2.1 0-1.7.8-5.3 1.7-8 .9-2.6 1.8-4.7 2-4.7s.3 2.1.2 4.7c-.1 2.7.1 5.7.5 6.9.6 1.6.2 2.3-1.8 3.2Zm4.4-3.3c-.5-.3-1-1-1-1.6 0-.5.5-.9 1-.9.6 0 1 .7 1 1.6 0 .8-.4 1.2-1 .9Z" onclick="window.location.href='/build.php?id=26&amp;gid=15'"></path>
        </g>
    </svg>
</div>
<div class="buildingSlot a27 g0 aid27 spartan" data-aid="27" data-gid="0" data-building-id="130931" data-name=""><a href="/build.php?id=27" class="emptyBuildingSlot" previewlistener="true"></a><img src="/img/x.gif" class="building iso spartan" alt=""><svg width="120" height="120" viewBox="0 0 120 120" class="buildingShape iso">
        <path d="M49.4 70.4c-7.8 1.8-13.5 4.7-16.8 8.6-3.5 4.3-4.1 7.2-2.1 11.3 3.3 7.1 13.9 11.7 28.5 12.4 19.8 1.1 35-6.5 35-17.5 0-4.9-5.8-10.2-14.2-13.1-8.1-2.8-22-3.6-30.4-1.7z" onclick="window.location.href='/build.php?id=27'"></path>
    </svg>
</div>
<div class="buildingSlot a28 g0 aid28 spartan" data-aid="28" data-gid="0" data-building-id="130932" data-name=""><a href="/build.php?id=28" class="emptyBuildingSlot" previewlistener="true"></a><img src="/img/x.gif" class="building iso spartan" alt=""><svg width="120" height="120" viewBox="0 0 120 120" class="buildingShape iso">
        <path d="M49.4 70.4c-7.8 1.8-13.5 4.7-16.8 8.6-3.5 4.3-4.1 7.2-2.1 11.3 3.3 7.1 13.9 11.7 28.5 12.4 19.8 1.1 35-6.5 35-17.5 0-4.9-5.8-10.2-14.2-13.1-8.1-2.8-22-3.6-30.4-1.7z" onclick="window.location.href='/build.php?id=28'"></path>
    </svg>
</div>
<div class="buildingSlot a29 g0 aid29 spartan" data-aid="29" data-gid="0" data-building-id="130933" data-name=""><a href="/build.php?id=29" class="emptyBuildingSlot" previewlistener="true"></a><img src="/img/x.gif" class="building iso spartan" alt=""><svg width="120" height="120" viewBox="0 0 120 120" class="buildingShape iso">
        <path d="M49.4 70.4c-7.8 1.8-13.5 4.7-16.8 8.6-3.5 4.3-4.1 7.2-2.1 11.3 3.3 7.1 13.9 11.7 28.5 12.4 19.8 1.1 35-6.5 35-17.5 0-4.9-5.8-10.2-14.2-13.1-8.1-2.8-22-3.6-30.4-1.7z" onclick="window.location.href='/build.php?id=29'"></path>
    </svg>
</div>
<div class="buildingSlot a30 g17 aid30 spartan" data-aid="30" data-gid="17" data-building-id="130934" data-name="Marketplace"><a href="/build.php?id=30&amp;gid=17" class="level colorLayer good aid30 spartan" data-level="8" previewlistener="true">
        <div class="labelLayer">8</div>
    </a><img src="/img/x.gif" class="building g17 spartan" alt=""><svg width="120" height="120" viewBox="0 0 120 120" class="buildingShape g17">
        <g class="hoverShape">
            <path d="M112.75 84.27c.32-.51-.55-5.07-3.95-8.37a88.318 88.318 0 0 0-6.53-5.55L94.7 61.4c-.3-.6-4.5-3-9.2-5.4l-8.6-4.4c-7.43.9-14.78.15-22.05-2.26-.5-.34-.98-.49-1.55-.52h-.03c-.71-.03-1.56.13-2.77.38-1.22.28-3.49 1.08-6.05 2.14-13.58 3.17-26.25 3.09-33.47 3.45-.69-.12-1.5-.11-2.48 0-.74.07-1.42.23-1.97.44-.73.15-1.26.35-1.53.62l.04.49a.47.47 0 0 0-.04.16c0 .18.04.39.11.61l.5 5.83c-.02.33 0 .67.09 1.06 2.5 8.1 3.41 15.15 2.37 20.92-.47.64-.77 1.42-.87 2.28-.07.5-.09.91-.07 1.27v.02c.08 1.07.6 1.59 1.78 1.97C15.42 97.58 21.81 103.48 28 107c0 .27.51.63 1.27.9 4.89 3.4 10.64 5.72 16.94 7.34.17.12.37.19.59.16 9.16 1.84 17.98 2.61 26.35 1.96 7.47.64 13.87-.19 19.11-2.6.2-1.79 16.92-24.71 20.49-30.49Z" onclick="window.location.href='/build.php?id=30&amp;gid=17'"></path>
        </g>
        <g class="highlightShape">
            <path d="M112.6 81.7c-.3-1.3-2.7-4.5-5.2-7.1-2.6-2.5-6.9-5.8-9.6-7.3-2.6-1.4-4.8-3-4.8-3.4s.5-.9 1.2-1.1c.6-.2.9-.9.5-1.4-.3-.6-4.5-3-9.2-5.4l-8.6-4.4-6.5 3.2c-3.8 1.9-6.4 3.8-6.4 4.7s-.4 1.3-1 1c-.5-.3-1 .3-1 1.4s.7 2.6 1.5 3.5c.8.8 1.5 2.5 1.5 3.8v2.3L62.9 69c-1.5-1.9-1.9-3.5-1.5-7 .4-4 0-5-3.2-9-3.6-4.5-3.8-4.6-7.7-3.8-2.2.5-7.8 2.7-12.4 5.1-5.4 2.7-9.7 4.2-12.2 4.2-2.2 0-3.9-.4-3.9-.8s-1.5-.5-3.4-.1c-2.7.5-3.8.2-5.1-1.3-1.1-1.4-2.5-1.8-5-1.5-2 .2-3.5 1-3.5 1.7 0 .8.7 2 1.5 2.8 1.2 1.3 1.2 1.6.1 2-.9.4-1.2 1.4-.9 2.7.3 1.2 1.7 2.6 3 3.1s3.5.9 4.9.9c1.3 0 2.4.5 2.4 1 0 .6-1.1 1.5-2.4 2.1-2.2 1.1-2.4 1.6-1.9 6.3.5 4.6.3 5.2-1.8 6.1-1.5.6-2.5 2-2.7 3.7-.3 2.2.2 2.9 2.2 3.4 1.5.3 4.2.3 6 0 2.1-.4 3.7-.2 4.1.4s.1 1.1-.6.9c-.8-.1-2-.1-2.6 0-.7 0-1.3.5-1.3 1.1 0 .5 1.4.8 3 .6 2.2-.2 2.8 0 2.1.8-.6.6-.9 2-.7 3 .1 1 .9 2.2 1.8 2.7.8.5 2.8.9 4.4 1.1 1.6.1 5.3-.4 8.2-1.1 2.9-.7 5.6-1.1 5.9-.7.3.3.1 1.2-.6 2-.6.8-2.3 1.7-3.6 2-1.4.4-7.5 2.8-7.5 3.6 0 1 3.68 1.39 5.78 1.09 1.6-.2 5.72-2.29 6.42-2.69 1-.6 1.1-.4.1.7-.7.7-1.3 1.6-1.3 2s1.9 1.5 4.3 2.4c2.3 1 3.6 2 3 2.2-.7.3-1.3.9-1.3 1.4s1.6.9 3.5.9 3.5-.5 3.5-1c0-.6-.9-1.4-2.1-1.8-1.8-.7-1.5-1 2.3-2.2 2.3-.8 4.7-2 5.1-2.7.6-1 1.2-1 2.7 0 1.1.6 2 1.7 2 2.4 0 .6.9 1.4 1.9 1.8 1.1.3 3.6 1.9 5.6 3.5 3 2.4 4.1 2.8 5.7 1.9.82-.45 2.95-1.96 5.27-2.24.77-.09 4.01 1.8 4.79 1.75 3.1-.2 4.24-1.51 5.54-1.91 1.7-.6 2.2-1.5 2.2-4.1 0-1.8-.5-3.6-1-3.9-.6-.4-.8-1.1-.4-1.6.3-.5.9-.7 1.4-.4s1.9.1 3.1-.5c1.7-1 2-1.8 1.5-4.5-.6-3-.4-3.4 2.5-4.4 1.7-.6 3.3-1.9 3.6-3 .3-1.1 1.7-2.1 3.3-2.5 1.6-.3 3.7-1.7 4.6-3.1 1-1.5 1.4-3.4 1-4.8ZM56.7 85c.6 0 1.6.7 2.3 1.5.7.9 1.1 1.8.8 2-.3.3-1.3-.4-2.3-1.5s-1.3-2-.8-2ZM46 92.5l-3.5.6 3.5-1.6c1.9-.9 4-1.8 4.7-1.9.7-.1 1.5-.5 1.9-.8.3-.4 1.2-.4 2-.1.8.3 1.4.9 1.4 1.3s-1.5 1-3.2 1.3c-1.8.3-4.9.8-6.8 1.2Zm15.7 7.6c-1 .6-2.5.8-3.3.5-.9-.3-2.3-.2-3.2.3-1.4.7-1.7.4-1.9-1.6-.1-1.8.2-2.2 1-1.4.6.6 2.9 1.1 5.2 1.1 3.3.1 3.7.2 2.2 1.1Zm.8-17.1c-.8 0-1.5-.4-1.5-.8 0-.5.3-1.2.7-1.5.3-.4 1-.7 1.5-.7.4 0 .8.7.8 1.5s-.7 1.5-1.5 1.5Zm5.4 6.9c-1.8.6-3.6 1.1-4 1.1-.5 0-.9-.9-.9-1.9 0-1.4.8-2.1 2.8-2.4 1.5-.2 3.1-.3 3.6-.2.6.1 1.1.6 1.3 1.2.2.6-1 1.6-2.8 2.2Z" onclick="window.location.href='/build.php?id=30&amp;gid=17'"></path>
        </g>
    </svg>
</div>
<div class="buildingSlot a31 g19 aid31 spartan" data-aid="31" data-gid="19" data-building-id="130935" data-name="Barracks"><a href="/build.php?id=31&amp;gid=19" class="level colorLayer good aid31 spartan" data-level="12" previewlistener="true">
        <div class="labelLayer">12</div>
    </a><img src="/img/x.gif" class="building g19 spartan" alt=""><svg width="120" height="120" viewBox="0 0 120 120" class="buildingShape g19">
        <g class="hoverShape">
            <path d="M107.1 78.3c-.33-1.2-.66-2.08-1.17-2.83-6.66-13.48-11.46-21.51-14.37-23.97H90c-.05 0-.09 0-.14.01l-29.96.19c-.09-.14-.29-.09-.56.1l-19.3 3.44-.69.55c-.19.08-.34.21-.46.36l-19.5 15.54c-.4-.4-1.8 1-3.2 3.1-1.4 2-4.3 5.8-6.4 8.4-3.5 4.2-3.8 5-3.2 8.7.21 1.38.54 2.44.94 3.14l-.16.32c12.01 8.23 23.87 14.65 35.46 17.71.64.22 1.38.41 2.16.53 1.77.41 2.59.51 2.81.17l3.25.2c.13.02.27.03.43.03.35 0 .55-.15.68-.41l10.92-6.59c.9 0 1.72-.33 1.87-.76 8.41-3.43 16.73-7.34 24.93-11.84.43.1.72-.04.91-.35 6.59-2.51 12.32-5.53 16.11-9.68.32-.22.57-.49.68-.78.3-.8.1-3.1-.5-5.3Z" onclick="window.location.href='/build.php?id=31&amp;gid=19'"></path>
        </g>
        <g class="highlightShape">
            <path d="M59.9 51.7c-.3-.5-1.9 1.2-3.5 3.8-1.9 2.9-3.4 4.4-4.4 4.1-.8-.2-4-1.4-7-2.5-4.3-1.7-5.6-1.8-6.2-.8-.4.8-2.8 4.2-5.3 7.7-3.7 4.9-4.6 6.9-4.3 9.2.4 2.3.2 2.8-1.1 2.2-.9-.4-3.1-1.2-4.8-1.8-1.8-.7-3.6-1.5-3.9-1.9-.4-.4-1.8 1-3.2 3.1-1.4 2-4.3 5.8-6.4 8.4-3.5 4.2-3.8 5-3.2 8.7C7 94.5 7.8 96 8.7 96c.8 0 2.9.8 4.6 1.7 1.8 1 3.4 2.1 3.5 2.5.2.5.9.8 1.5.8s3.2 1 5.9 2.2c2.6 1.2 4.8 2.5 4.8 3 0 .4.7.8 1.5.8.9 0 3.5 1 5.8 2.1 2.3 1.2 4.4 2.6 4.7 3 .4.5 2.1 1.2 4 1.5 3 .7 3.3.5 2.5-1.2-.4-1-1-2.9-1.2-4.1-.4-1.4.2-2.5 1.6-3.2 2-1.1 2.1-.9 2.1 3.9 0 3.8-.53 5 1.5 5 1 0 .86-1.14.86-3.14 0-2.2 1.04-2.66 2.14-2.26 1.2.5 1.5-.3 1.5-4.1q0-4.7 2.3-3.3c1.2.9 2.3 2.5 2.5 3.7.2 1.3 1.1 2.1 2.3 2.1 1 0 1.9-.4 1.9-.9s.9-1.3 2-1.6c1.8-.6 2-1.4 1.8-5.3-.2-3.4-.9-5.2-2.5-6.5S64 89.8 64 87.5c0-2.8.3-3.2 2-2.8 1.3.4 2 1.4 2 3 0 2.3.2 2.5 3.6 1.8 3.3-.6 3.9-.3 6.8 3.1 3.2 3.7 3.3 3.7 5.7 2.1 1.8-1.3 2.4-2.7 2.4-5.4 0-2 .6-3.8 1.3-4 .8-.3 1.2 1 1.2 4.8 0 3.3-.4 4.43.9 4.3 1.81.43 1.1-3.3 1.3-6.3.2-3.2.8-5.6 1.6-5.9.8-.2 1.2.7 1.2 2.7 0 1.7-.46 3.09 1 3.1 1.71.01 1-1.6 1-3.5 0-2.8.4-3.5 2-3.5 1.1 0 2.5.9 3.2 2s2.3 2 3.6 2c1.2 0 2.5-.6 2.8-1.4s.1-3.1-.5-5.3c-.9-3.3-1.8-4.2-6.6-6.6-5.3-2.6-5.6-2.9-5.3-6 .2-2.1-.1-3.1-.9-3-.7.2-1.3-.2-1.3-.7 0-.6.7-1.3 1.5-1.6.8-.4 1.5-1.2 1.5-2 0-.7-1-2-2.2-2.9-1.3-.8-2.3-2.1-2.3-2.8 0-.6-.7-1.2-1.5-1.2s-1.4.5-1.3 1.2c.2.7-.8 2.8-2.1 4.8-1.4 2-2.6 4-2.8 4.5-.2.6-3.4-.6-7.2-2.5-3.7-1.9-8.9-4.2-11.5-5.2-2.5-.9-4.9-2.1-5.2-2.6Zm.2 30.3c.5 0 .9 1.6.9 3.5 0 2.4-.5 3.5-1.5 3.5-.8 0-1.8-.1-2.2-.3-.5-.1-.7-1.1-.5-2.1.1-1.1.7-2.5 1.3-3.3.6-.7 1.5-1.3 2-1.3Z" onclick="window.location.href='/build.php?id=31&amp;gid=19'"></path>
        </g>
    </svg>
</div>
<div class="buildingSlot a32 g0 aid32 spartan" data-aid="32" data-gid="0" data-building-id="130936" data-name=""><a href="/build.php?id=32" class="emptyBuildingSlot" previewlistener="true"></a><img src="/img/x.gif" class="building iso spartan" alt=""><svg width="120" height="120" viewBox="0 0 120 120" class="buildingShape iso">
        <path d="M49.4 70.4c-7.8 1.8-13.5 4.7-16.8 8.6-3.5 4.3-4.1 7.2-2.1 11.3 3.3 7.1 13.9 11.7 28.5 12.4 19.8 1.1 35-6.5 35-17.5 0-4.9-5.8-10.2-14.2-13.1-8.1-2.8-22-3.6-30.4-1.7z" onclick="window.location.href='/build.php?id=32'"></path>
    </svg>
</div>
<div class="buildingSlot a33 g23 aid33 spartan" data-aid="33" data-gid="23" data-building-id="130937" data-name="Cranny"><a href="/build.php?id=33&amp;gid=23" class="level colorLayer good aid33 spartan" data-level="6" previewlistener="true">
        <div class="labelLayer">6</div>
    </a><img src="/img/x.gif" class="building g23 spartan" alt=""><svg width="120" height="120" viewBox="0 0 120 120" class="buildingShape g23">
        <g class="hoverShape">
            <path d="m100 62.39-1.47-1.41c-.44-.74-.98-1.5-1.63-2.28-1.83-2.2-2.92-3.16-4.23-3.35l-.04-.04-7.76-1.34c-.26-.16-.69-.23-1.35-.23h-.02c-.41 0-.9.02-1.5.06-.48.05-1.01.14-1.55.26-7.69.63-15.1-.22-22.15-2.96l-.24.06c-.12-.03-.25-.06-.37-.06-.51.07-1.97.52-3.69 1.06L34.39 57c-.8 0-1.4.9-1.4 2 0 .25-.06.63-.15 1.1-4.56 8.83-10.6 18.05-19.39 27.97-.89.66-1.46 1.27-1.46 1.63 0 .26.14.52.38.74 2.85 5.73 2.79 12.53 1.17 19.9-.25.16-.31.41-.17.75-.03.11-.05.23-.08.34l.74.55c.14.14.29.27.46.42.17.12.38.25.6.37l1.66 1.23 1.89-.09c.36.05.71.09 1.05.09 1.07 0 2.3-.12 3.29-.28l26.18-1.19c1.61.12 4.37-.1 8.54-.63 4.8-.6 9.8-1.5 11.1-2s4.1-.9 6.3-.9 6.1-.5 8.7-1.2c2.6-.6 5.3-1.7 6-2.5.7-.7 2.1-1.7 3-2.3.6-.36.93-.63.97-.95l.08-.02c2.09-7.29 3.75-13.7 4.99-18.97.09-.1.15-.19.15-.26.19-4.3.26-8.99-.07-13.93.92-.33 1.07-1.14 1.07-3.17 0-.63-.09-1.28-.26-1.93.09-.46.17-.92.26-1.38Z" onclick="window.location.href='/build.php?id=33&amp;gid=23'"></path>
        </g>
        <g class="highlightShape">
            <path d="M96.9 58.7c-2.5-3-3.6-3.7-5.8-3.3-1.4.2-3.4.7-4.4 1.1-1.4.6-1.8.4-1.5-1.1.2-1.6-.2-1.8-3.2-1.6-1.9.2-4.5 1-5.7 1.7-1.5 1.1-2.1 2.3-2 4.7.2 2.3.9 3.6 2.5 4.4 1.5.7 2 1.4 1.3 1.9-.6.3-.9 1-.6 1.5s.1 1.1-.5 1.5-1.6-.6-2.3-2.2c-.6-1.5-2-2.9-2.9-3.1-1.1-.2-1.8.3-1.8 1.3 0 .8-.5 1.5-1.1 1.5s-.8-.7-.5-1.6c.3-.9.3-2.1-.1-2.7-.4-.7-.9-1.8-1-2.5-.2-.6-.5-2-.6-2.9-.2-.9-1.9-2.2-3.7-2.8-1.9-.6-3.6-1.7-3.8-2.3-.2-.7-.9-1.1-1.5-1.1-.7.1-3.2.9-5.7 1.7-2.5.9-4.6 1.7-4.8 1.8-.1 0 .3 1.5.9 3.2.6 1.7 2 3.4 3.1 3.7q1.9.7.1 2.7c-1.3 1.5-1.5 2.2-.5 2.5.6.3 1 .9.7 1.3-.3.5 0 1.8.6 2.8.7 1.2 2 1.8 3.3 1.6 1.2-.3.3.5-1.9 1.6s-5 2-6.2 2c-2.1 0-2.3-.4-2.3-6.3 0-3.4-.4-6.7-.8-7.2-.4-.6-2.4-2.1-4.5-3.3-2.1-1.2-4.5-2.2-5.3-2.2s-1.4.9-1.4 2c0 1-.9 4.2-2 7.1-1.1 2.8-2.2 7-2.5 9.2-.2 2.3-1 6-1.9 8.2-.8 2.2-1.5 3.5-1.5 2.8-.1-.6-1-1.4-2-1.8-1.1-.3-3.9.4-6.5 1.7-2.5 1.2-4.6 2.8-4.6 3.5s1 1.4 2.3 1.4c1.2.1 3.1.2 4.2.2s3.1-.2 4.5-.6c1.4-.4 1.9-.4 1.3-.1-.7.3-1.3 1.2-1.3 2 0 .9-1.3 2.7-3 4-2.9 2.5-2.9 2.6-1.2 4.9.9 1.3 3.1 2.5 4.9 2.8 1.7.3 4.4 1.5 6 2.6 1.5 1.1 5.6 2.7 9.1 3.6 3.4.9 6.7 1.3 7.2 1s1.1-.1 1.5.5c.3.5 1.5 1 2.5 1 1.1 0 6.8-2.3 12.7-5.2l10.7-5.1 6 2.1c3.4 1.2 6.7 2.2 7.4 2.2s2-.7 2.8-1.5c.8-.8 2.3-1.9 3.2-2.5 1.5-1 1.4-1.3-1-3.2l-2.7-2.1 2.6-2.2c2.3-2.1 2.4-2.5 1.4-5.8-.7-1.9-2.3-4.3-3.6-5.1-1.6-1.1-3.4-1.4-5.1-1-1.8.5-3.2 0-4.9-1.6-1.9-1.8-2.3-2.9-1.8-4.9.3-1.4 1-3.2 1.6-3.9.5-.7 1.8-1 2.7-.7 1 .3 2.6-.2 3.6-1.2 1.3-1.3 1.8-1.5 2.2-.5.3 1 .7 1 2 0 .8-.7 2.2-1.3 3.1-1.4.9-.1 2.8-.2 4.4-.3 2.4-.1 2.7-.5 2.7-3.4 0-2.2-1-4.5-3.1-7ZM68 72.3c-1.1-.3-2-.9-2-1.3 0-.5.9-.6 2-.3s2 .9 2 1.3c0 .5-.9.6-2 .3Zm15.2-3.9c-.6.3-1.2-.3-1.5-1.4s-.4-2-.2-2c.1 0 .8.6 1.4 1.4.7.8.8 1.7.3 2ZM26 111.5c0 .7-.7 1.6-1.6 1.9-.9.3-3 .6-4.7.6-1.8 0-4.1-.8-5.2-1.6-1.2-1-1.5-1.8-.9-2.1.6-.2 2-1 3-1.8s2.2-1.5 2.5-1.5 2 .7 3.7 1.6c1.8.8 3.2 2.1 3.2 2.9Z" onclick="window.location.href='/build.php?id=33&amp;gid=23'"></path>
        </g>
    </svg>
</div>
<div class="buildingSlot a34 g0 aid34 spartan" data-aid="34" data-gid="0" data-building-id="130938" data-name=""><a href="/build.php?id=34" class="emptyBuildingSlot" previewlistener="true"></a><img src="/img/x.gif" class="building iso spartan" alt=""><svg width="120" height="120" viewBox="0 0 120 120" class="buildingShape iso">
        <path d="M49.4 70.4c-7.8 1.8-13.5 4.7-16.8 8.6-3.5 4.3-4.1 7.2-2.1 11.3 3.3 7.1 13.9 11.7 28.5 12.4 19.8 1.1 35-6.5 35-17.5 0-4.9-5.8-10.2-14.2-13.1-8.1-2.8-22-3.6-30.4-1.7z" onclick="window.location.href='/build.php?id=34'"></path>
    </svg>
</div>
<div class="buildingSlot a35 g0 aid35 spartan" data-aid="35" data-gid="0" data-building-id="130939" data-name=""><a href="/build.php?id=35" class="emptyBuildingSlot" previewlistener="true"></a><img src="/img/x.gif" class="building iso spartan" alt=""><svg width="120" height="120" viewBox="0 0 120 120" class="buildingShape iso">
        <path d="M49.4 70.4c-7.8 1.8-13.5 4.7-16.8 8.6-3.5 4.3-4.1 7.2-2.1 11.3 3.3 7.1 13.9 11.7 28.5 12.4 19.8 1.1 35-6.5 35-17.5 0-4.9-5.8-10.2-14.2-13.1-8.1-2.8-22-3.6-30.4-1.7z" onclick="window.location.href='/build.php?id=35'"></path>
    </svg>
</div>
<div class="buildingSlot a36 g0 aid36 spartan" data-aid="36" data-gid="0" data-building-id="130940" data-name=""><a href="/build.php?id=36" class="emptyBuildingSlot" previewlistener="true"></a><img src="/img/x.gif" class="building iso spartan" alt=""><svg width="120" height="120" viewBox="0 0 120 120" class="buildingShape iso">
        <path d="M49.4 70.4c-7.8 1.8-13.5 4.7-16.8 8.6-3.5 4.3-4.1 7.2-2.1 11.3 3.3 7.1 13.9 11.7 28.5 12.4 19.8 1.1 35-6.5 35-17.5 0-4.9-5.8-10.2-14.2-13.1-8.1-2.8-22-3.6-30.4-1.7z" onclick="window.location.href='/build.php?id=36'"></path>
    </svg>
</div>
<div class="buildingSlot a37 g0 aid37 spartan" data-aid="37" data-gid="0" data-building-id="130941" data-name=""><a href="/build.php?id=37" class="emptyBuildingSlot" previewlistener="true"></a><img src="/img/x.gif" class="building iso spartan" alt=""><svg width="120" height="120" viewBox="0 0 120 120" class="buildingShape iso">
        <path d="M49.4 70.4c-7.8 1.8-13.5 4.7-16.8 8.6-3.5 4.3-4.1 7.2-2.1 11.3 3.3 7.1 13.9 11.7 28.5 12.4 19.8 1.1 35-6.5 35-17.5 0-4.9-5.8-10.2-14.2-13.1-8.1-2.8-22-3.6-30.4-1.7z" onclick="window.location.href='/build.php?id=37'"></path>
    </svg>
</div>
<div class="buildingSlot a38 g0 aid38 spartan" data-aid="38" data-gid="0" data-building-id="130942" data-name=""><a href="/build.php?id=38" class="emptyBuildingSlot" previewlistener="true"></a><img src="/img/x.gif" class="building iso spartan" alt=""><svg width="120" height="120" viewBox="0 0 120 120" class="buildingShape iso">
        <path d="M49.4 70.4c-7.8 1.8-13.5 4.7-16.8 8.6-3.5 4.3-4.1 7.2-2.1 11.3 3.3 7.1 13.9 11.7 28.5 12.4 19.8 1.1 35-6.5 35-17.5 0-4.9-5.8-10.2-14.2-13.1-8.1-2.8-22-3.6-30.4-1.7z" onclick="window.location.href='/build.php?id=38'"></path>
    </svg>
</div>
<div class="buildingSlot a39 g16 aid39 spartan" data-aid="39" data-gid="16" data-building-id="130943" data-name="Rally Point"><a href="/build.php?id=39&amp;gid=16" class="level colorLayer good aid39 spartan" data-level="1" previewlistener="true">
        <div class="labelLayer">1</div>
    </a><img src="/img/x.gif" class="building g16 spartan" alt=""><svg width="125" height="160" viewBox="0 0 125 160" class="buildingShape g16">
        <g class="hoverShape">
            <path d="M25.13 56.43C32.02 49.31 35.91 41.52 37 33.1c.16-1.06 2.28-2.32 9.5-4.1 11.67.74 23.34 2.66 35 5.4 4.89.84 12.14 20.83 18.8 27.8 7.63 8.68 15.52 16.3 23.7 22.8l.2 3.6c-6.38 5.22-10.29 15.67-12.62 29.5 1.25 6.49-.48 9.59-2.88 11.9-10.21 8.34-23.7 16.88-40.2 25.6-12.63-3.14-23.3-8.05-31.5-15.2 19-33.02-12.26-74.16-11.87-83.97Z" onclick="window.location.href='/build.php?id=39&amp;gid=16'"></path>
        </g>
        <g class="highlightShape">
            <path d="M41 76.1c.8.2 1.7 1.5 2 2.9s.9 2.4 1.3 2.2c.4-.1.7-.5.6-.8 0-.3 2-1.7 4.5-3S55.3 75 57 75h3v-7.9c0-5.8.4-8 1.4-8.4.7-.3 1.8-.1 2.4.5.6.6 1.5.7 2 .4.6-.3.8-1.5.5-2.6-.4-1.3.1-2.6 1.3-3.4 1.5-1.1 1.6-1.7.6-2.8-.6-.8-.9-1.8-.5-2.1.3-.4 1.6-.4 2.8-.1 1.6.4 2.4 0 2.9-1.2.6-1.5.9-1.6 1.6-.4.7 1.1 1.1 1.1 2.4.1.9-.7 2.3-1.1 3.1-.7.8.3 1.5.1 1.5-.3 0-.5.8-.7 1.9-.4 1.3.3 2-.2 2.4-1.7.3-1.2-.2-3.7-1.1-5.6-.9-1.8-2.6-3.7-3.7-4-1.1-.4-3.3-.9-5-1.1-1.6-.3-4.4-.6-6.1-.8-1.8-.1-4.2.2-5.5.9-1.3.6-2.3 2.1-2.4 3.6-.1 1.3.4 3.1 1.1 3.8.8.7 2.2 1.1 3.2.8 1.2-.4 2.5.1 3.6 1.3 1.2 1.3 1.4 2.1.6 2.6-.7.4-1.4-.2-1.7-1.4-.3-1.2-.9-2.1-1.4-2.1s-1.4 1.1-1.9 2.5-1.2 2.5-1.5 2.5-1-1.1-1.5-2.5c-.6-1.5-1.7-2.5-2.9-2.5-1.1 0-2.1.3-2.4.7-.2.5-.2.2-.1-.5.2-.7-.3-1.5-1.1-1.8-.7-.3-1.1-1.2-.9-1.9.3-.7.1-1.6-.5-1.9-.6-.4-.8-1.3-.4-2.1.3-1-.2-1.5-1.6-1.5-1.2 0-3-.9-4.1-2s-2.2-2-2.5-2-.5.4-.5.9-2 1.2-4.5 1.5c-2.5.4-4.5 1.1-4.5 1.7 0 .5.5.9 1.1.9.5 0 .8.4.4.9-.3.5.2 1.7 1.1 2.5.8.9 2.2 1.6 3.1 1.6 1.1 0 .9.6-.8 2.1-1.7 1.4-2 2.2-1.1 2.5.6.3.9 1 .6 1.5-.3.6 0 1.7.7 2.5.8 1 2.9 1.4 6.6 1.3 2.9-.1 5.6-.5 5.8-1 .3-.4 1.4-.5 2.5-.2s2 .9 2 1.4c0 .4-.5 1.1-1 1.4-.6.4-.8 1.1-.4 1.6.3.5 0 1.6-.6 2.4-.7.8-2.3 1.5-3.6 1.5s-2.4.4-2.4.9 1.2 1.2 2.8 1.4c1.9.3 1.5.4-1.5.6-2.3 0-6.2 1.2-8.6 2.4-2.4 1.3-5.4 2.6-6.6 3-1.8.4-2.1 1.2-2.1 6.1 0 5.2.2 5.6 2.3 5.4 1.2 0 2.9.1 3.7.3Zm10.6-8.5c.3-.8 1.2-1.2 2-.9.7.3 1.7-.2 2-1.1.4-.9.9-1.4 1.2-1.1.3.2.6 1.8.6 3.5.1 1.6-.3 2.8-.9 2.6-.5-.2-1.8.1-2.7.6-1.4.6-1.6.5-1.2-.7.4-.8.1-1.5-.5-1.5s-.8-.6-.5-1.4ZM47 73c.8-.6 2.2-1 3-.9.9 0 .5.6-1 1.4-1.4.7-2.7 1.1-3 .9-.2-.3.2-.9 1-1.4Zm-7.4-6.6c.9.3 2 .6 2.5.6s.9.9.9 2c0 1-.9 2.4-1.9 3-1.1.5-2.2 1-2.5 1s-.6-1.6-.6-3.6c0-2.9.3-3.5 1.6-3Zm1.4-6.1c-2.1 1.5-5.2 3-6.8 3.3-1.8.4-4.1 0-6.1-1.1-2.6-1.3-3.2-2.1-2.9-4.3.2-2.2 1.5-3.3 6.3-5.8 3.3-1.7 6.1-3.2 6.3-3.3.2 0 1.7.6 3.5 1.5s3.5 2.1 3.8 2.7c.4.5.5 1.7.2 2.6-.2.9-2.2 2.8-4.3 4.4ZM124 85c-.6 0-5.2-2.8-10.3-6.1-5.1-3.4-9.4-6.4-9.7-6.6-.2-.2.1-.7.7-1.1.9-.6.7-1.9-.7-5s-2.5-4.3-3.7-4c-1.1.2-1.9 1.4-2.1 3.1-.2 1.5-.6 2.7-1 2.7s-2.2-1.4-4.1-3c-1.8-1.7-3.8-3-4.2-3-.5 0-3.1-1.6-5.8-3.5-2.6-1.9-5.3-3.5-6-3.5-.6 0-1.1.3-1.1.7 0 .5 2.5 2.4 5.5 4.3s5.5 3.9 5.5 4.5c.1.5.3 3 .6 5.5.4 3.1 1.5 5.4 3.5 7.5 1.6 1.7 2.9 3.6 2.9 4.3s-.3 1.2-.6 1.2-3.7-1.6-7.4-3.6l-6.9-3.6-13 6.9C58.9 86.4 53 89.8 53 90.2c0 .3 6.6 4.1 14.6 8.2l14.6 7.6 5.6-3c3-1.6 5.7-2.8 5.9-2.7.2.2.8 3 1.4 6.3 1 5.2.9 6-.6 6.9-.9.5-2.9 2-4.3 3.2-1.7 1.4-3.4 2-4.8 1.7-1.4-.4-5.4 1.1-11.3 4-5 2.6-9.1 5.1-9.1 5.6s5.4 3.7 12 7c9.9 4.9 12.3 5.8 14.4 5.1 1.3-.6 2.7-.7 3-.4.3.4.6.1.6-.6s.5-.9 1-.6c.6.3 1 .2 1-.3 0-.4 2.7-2.1 6-3.7 4.1-2 6-3.4 5.7-4.5-.1-.8.3-2 1-2.5.7-.6 1.6-3.1 1.9-5.7.6-4.6.6-4.7-2.9-6.4-3.5-1.7-3.6-1.7-3-6.8.5-4.2 1.2-5.6 3.9-7.9 1.8-1.5 3.8-4.3 4.4-6.2.9-2.7.8-4-.2-6.2-.7-1.6-2.3-2.9-3.6-3.1-1.2-.2-2.2-1-2.2-1.9s-.7-2.4-1.6-3.4c-.9-1-1.4-2.3-1.2-2.9s4.3 1.7 9.3 5c4.9 3.4 9.3 6.4 9.7 6.6.4.3.8-.4.8-1.5 0-1.2-.5-2.1-1-2.1ZM96.4 72.9c-.8 1.9-1.2 2-2.6.9-.9-.7-2-2.5-2.4-4.1-.3-1.5-.2-2.7.2-2.7.5 0 2 .9 3.3 1.9 2 1.5 2.3 2.3 1.5 4Zm3.9 38.4c-.8-.3-1.3-2.3-1.3-5.1 0-3.6.3-4.3 1.2-3.4.7.7 1.3 3 1.3 5.1.1 2.8-.3 3.7-1.2 3.4ZM68.9 62.4c.8.9.8 1.6.2 2-.6.4-2.2.4-3.6 0-1.4-.3-2.5-.9-2.5-1.3s.3-1.1.7-1.4c.3-.4 1.4-.7 2.3-.7 1 0 2.3.6 2.9 1.4Zm-6.8 73.9c-3.1-1.5-5.8-2.9-6-3-.2-.1-.1-.9.2-1.8.4-.8 1.1-1.5 1.7-1.5s3.7 1.4 7 3c3.3 1.7 6 3.4 6 3.9s-.8 1.2-1.7 1.5c-.9.4-4-.5-7.2-2.1Zm-12.1-1c.3.1 3.1 1.3 6.2 2.6 3.2 1.3 5.9 3 6.2 3.8.3.8-.5 1.5-2 1.9-1.5.4-2.9.2-3.3-.4-.4-.6-2.8-2.1-5.4-3.2-2.6-1.2-4.7-2.5-4.7-3 0-.4.6-1.1 1.3-1.3.6-.3 1.4-.5 1.7-.4Zm35.8 9.4c.2.8-.5 1.3-1.9 1.3-1.2 0-4.6-1.2-7.6-2.6-2.9-1.5-5.3-3.2-5.3-3.9s.6-1.5 1.3-1.8c.6-.2 3.9 1 7.1 2.7 3.3 1.7 6.2 3.7 6.4 4.3Zm-34 1c.2.8-.5 1.3-1.9 1.3-1.2 0-4.6-1.2-7.6-2.6-2.9-1.5-5.3-3.3-5.3-4 0-.8 1-1.4 2.3-1.4 1.2 0 4.4 1.3 7.1 2.8 2.7 1.5 5.1 3.3 5.4 3.9Zm26.2 4c0 .7-.9 1.3-2 1.3s-3.4-.9-5.2-2-4.1-2-5-2-2-.5-2.3-1c-.3-.6-.3-1.5 0-2 .3-.6 1.3-1 2-1 .8 0 3.9 1.2 7 2.7 3 1.5 5.5 3.3 5.5 4Zm-8 4.3c0 .6-.7 1.3-1.5 1.6-.8.3-3.9-.6-6.9-2.1-3-1.4-5.7-2.9-6-3.2-.3-.4-.1-1.2.5-2 .6-.7 1.3-1.3 1.6-1.3.2 0 3 1.4 6.3 3 3.3 1.7 6 3.5 6 4Z" onclick="window.location.href='/build.php?id=39&amp;gid=16'"></path>
        </g>
    </svg>
</div>
<div class="buildingSlot a40 g47 bottom spartan" data-aid="40" data-gid="47" data-building-id="" data-name="Defensive Wall"><a href="" class="level colorLayer good aid40 spartan" title="" data-level="15" previewlistener="true">
        <div class="labelLayer">15</div>
    </a><img src="/img/x.gif" class="g47Bottom spartan" alt=""><svg width="794" height="540" viewBox="0 0 794 540" class="buildingShape g47Bottom">
        <g class="hoverShape">
            <path d="M703 288c-2.29 15.3-6.49 24.54-21.73 32.62-1.03.3-1.92 1.48-2.18 2.41-2.75 4.25-8.91 12.85-11.43 16.8-3.16 4.63-8.93 13.09-12.16 17.87-.85.45-1.49 1.35-1.49 2.19-1.81 15.41-7.92 31.39-20.3 40.1-1.98.32-7.38 5.84-9.3 6.8-6.25 3.58-14.4 9.85-20.9 13-1.97 1.09-21.87 10.04-23.7 11.3-4.16 1.02-8.72 2.72-12.8 4.7-17.72 5.76-36.73 11.16-55 14.8-4.38.71-7.05 1.23-11.5 2-2.52.65-7.32-.3-9 1.4-.4.6-1 .8-1.5.5-2.62-.57-12.39 1.98-15.5 2C384.56 466.84 287 466.92 199 443.58v-.02c-10.11-6.73-16.44-16.22-21.19-26.87-.37-.66-1.28-1.27-2.26-1.55l-47.44-32.45c-20.39 3.06-38.28-6.04-47.3-23.9-8.61-10.9-18.79-31.25-22.8-44.7-2.7-7.36-4.2-11.21-6.1-22.4-3.49-15.09-.74-23.73 1.6-37.2 1.46-8.94 9.39-22.59 10.5-30.5h-20c-5.98 7.79-6.94 67.97-5.99 81 4.45 7.71 2.44 13.57 5 23.2 3.37 13.37 5.63 18.98 12.6 33.3 13.41 27.29 29.93 46.22 51.93 66.68 8.62 18.6 35.04 27.51 48.05 37.96.32.98.83 1.2 1.62 1.45 2.33.35 5.4 4.23 7.5 4.4l30.42 3.71.02-.17c16.95 4.37 34.46 8.68 47.86 9.45 2.5 0 5.1.5 5.7 1.1 4.3 2.19 22.41 3.94 27.8 4.8 23.84 2 53.43 7.35 77 5 2.29-.05 20.47-.25 23 .6 4.37.77 11.71 1.16 15.7-.4 26.28.59 58.43-2.33 84.7-7.7 14.32-3.11 44.16-7.19 58.1-11.8 9.54-1.75 32.95-8.55 40.4-12.9 5.31.02 22.09-8.95 26.7-10.4 1.8-.5 7-2.7 11.5-5 7.05-3.13 8.1-5.93 12.5-7.3 1.77.36 8.7-6.88 10.2-7 .5 0 3.8-2 7.3-4.5 7.73-5.31 6.38-6.77 13.1-12 2.6-2 5.3-4.9 6-6.6.6-1.6 1.9-2.9 2.8-2.9 2.17.02 4.18-3.11 6.4-3 5.99-3.13 18.68-25.67 23.06-31.07-.45-5.21 4.16-10.7 4.54-15.33-.49-2.99 2.9-9.02 4.1-11.8 1.64-2.46.98-5.29 2.2-7.3.4-.6 1.6-3.7 2.7-7 5.91-13.33 7.31-29.43 7.5-44.5h-13Z" onclick="window.location.href='/build.php?id=40&amp;gid=47'"></path>
        </g>
        <g class="highlightShape">
            <path d="M698 363.5c-4.62 8.37-1.98 18.57-14.8 11.1-4.83-1.27-1.91-6.97-4.4-8.6-.8 0-1 4.3-.5 16.5.4 9.7.3 16.5-.3 16.5-.5 0-1.7 1.4-2.7 3-1.87 3.66-4.22 2.37-6.7 4.5-.8.8-2.2 1.5-3.1 1.5s-2.2 1.3-2.8 2.9c-.7 1.7-3.4 4.6-6 6.6-6.72 5.23-5.35 6.69-13.1 12-7.28 5.47-6.35 2.82-12 8-3.73 3.86-5.68 2.61-8.7 5.1-11.56 8.27-23.5 11.42-37.2 17.9-5.3 2.1-10 3.5-10.3 3.2-5.26 1.82-9.48 5.3-19.9 7.7-23.43 5.63-31.49 9.13-56.5 13-25.54 4.26-40.29 8.11-64.1 10-10.42.21-29.68 3.23-39.4 1.6-2.33-1.15-6.87 1.77-10.5 1.2-8.06-.46-23.71-2.07-31.5-1.3-18.67 2.26-38.88-1.57-58.5-3-15.21-1.86-32.79-2.73-46.3-6.8-5.81-2.07-12.4-.92-21.7-3.2-9.98-1.55-44.77-10.46-53.4-13.3-3.5-1.2-4-1.2-5.7.5-3.85 4.79-6.8-1.55-10.7-2.5-2.2-.7-2.2-1.1-2.2-18.5 0-15.4-.2-18-1.7-19.2-1.78-1.62-10.4-6.87-13.8-8.9-.99 6.12 1.53 18.32-3.8 20.7-3.18 1.6-7.11-.57-10.2 1.7-2.3 1.5-2.7 1.5-6-.6-2.3-1.5-3.5-3.1-3.5-4.6-2.71-6.98-15.91-15.85-22.4-23.6-17.22-18.02-26.51-30.56-38-53.1-9.93-17.8-14.11-39.48-17.6-56.5-.3-.3-.3-14.2.1-31 .5-27 .9-31.5 2.8-39.5 1.3-5 3.1-10.5 3.1-10.5h20c-.46 4.26-2.06 7.4-4.9 14-4.85 10.7-6.93 21.76-8.4 33.2-2.49 27.79 13.99 65.62 30.1 87.6-.09 2.73 33.28 40.44 32.9 35.2-1.68-2.55 11.06-9.13 14.4-11.3 1.87 1.76 5.42 6.35 7.4 6.3 1 0 2.6 1.1 3.7 2.5 2.95 3.68 4.36 1.7 8 5.5 3.72 3.53 4.24 2.03 7.3 5 2.9 2.94 4.86 1.26 8 5 1.6 1.6 3.6 3 4.6 3 2.59.11 4.36 5.42 7.4 5 8.8 1.35-.14 16.62 3.5 21.5 23.01 8.94 38.41 11.9 66.3 17 47.72 7.8 74.99 9.23 124.2 9.4 46.24-.07 80.26-2.49 123-8.9 1.64-1.71 6.51-.75 9-1.4 8.41-1.54 18.84-2.95 27-5.6 25.71-5.62 52.5-15.21 76-27.2 6.52-3.15 14.64-9.41 20.9-13 2.03-.95 7.31-6.5 9.3-6.8.5 0 1.9-1 3.1-2.2 4.89-5.29 20.42-15.65 20.2-23.4.35-4.14-2.76-10.99-3-14.5 0-1 .9-2.1 2-2.4 2.92-1.02 1.42-3.98 4-5.8 2.72-2.19 1.33-3.94 4-6.2 1.1-1 2-2.3 2-3-.11-1.57 4.11-4.43 4-6-.11-1.44 5.23-5.26 5-6.8 0-.8.9-2.2 2-3.2 2.45-1.98 1.39-3.63 3.4-5.4 1.22-2.14 8.63 2.53 11.1 3.7 3.28-3.59 3.39-5.93 4.6-10.7 3.03-6.92 4.95-17.25 6.9-26.1h13c-.12 10.57-1.37 28.31-4.7 37.3-1.05 1.12-4.55 13.02-5.5 14.2-1.22 2.01-.56 4.84-2.2 7.3-1.2 2.78-4.59 8.81-4.1 11.8.1 1.1-.5 3.2-1.5 4.9Z" onclick="window.location.href='/build.php?id=40&amp;gid=47'"></path>
        </g>
    </svg>
</div>
<div class="buildingSlot a40 g47 top spartan" data-aid="40" data-gid="47" data-building-id="130944" data-name="Defensive Wall"><a href="" class="level colorLayer good aid40 spartan" title="" data-level="15" previewlistener="true">
        <div class="labelLayer">15</div>
    </a><img src="/img/x.gif" class="g47Top spartan" alt=""><svg width="794" height="540" viewBox="0 0 794 540" class="buildingShape g47Top">
        <g class="hoverShape">
            <path d="M714.5 242c-7.82-47.14-37.38-87.61-73.8-117 0 0 1.39 1.45-2.7-2.2-2.62-1.76-4.82-3.24-6.69-4.5-6.16-8.34-10.45-17.3-13.32-26.73-.12-2.17-.47-3.97-1.68-4.61-5.4-3.72-42.1-28.74-48.41-33.07-13.74 6.67-27.17 10.67-40.1 10.03l.08.14c-2.93-1.19-6.28-.96-8.49-2.37-.87-.94-5.26-.4-5.9-1.7-.64-1.37-5.33-.67-6-2-.4-.6-1.4-1-2.3-.9-4.29.52-9.55-2.69-13.7-3-1.9-.32-4.88.38-6-1.2-.82-1.23-5.34-.54-6-2-.4-.6-1.3-.8-1.9-.6-.7.3-4.8-.1-9.2-.9-8.93-2.11-12.43-2.5-19.9-3.5-24.91-3.96-57.43-5.53-82.9-5.2-12.9 1.41-29.31 1.2-42.6 2.9-5.63.7-9.07.06-12.7 1.7-.7.5-1.7.6-2.2.3-.5-.4-4.2.1-8.3 1-18.9 3.01-41.33 8.06-59.4 13.4-3.76.3-3.08 2.14-7.9 2.6-4.95.32-4.2 2.09-8 2.4-1.3 0-2.7.5-3 1l-43.6-7.5c-10.52 7.76-35.3 24.57-45.22 32.13-1.97-.86-4.38 1.97-4.88 3.47-1.77 3.5-11.32 31.5-15.7 31.9-30.44 24.08-57.57 60.18-68.1 98h20c1.04-.95 3.07-3.51 3-5.1.73-3.34 6.04-7.78 7.5-11.5 1.77-4.03 16.57-21.84 18.4-25.6 1-2.95 4.52-2.99 5.1-5.4 1.45-2.72 6.78-5.06 15.7-13.6 7.6-6.7 14-12.5 14.1-13 .2-.4.8-.8 1.4-.8 1.35.02 6.05-3.76 7.7-5.1 1.66 1.22 4.18 5.57 6.03 3.43 5.78-2.59 31.11-21.72 36.77-25.73 5.43-1.39 35.47-17.54 41.8-19.83v-.84c10.66-3.98 24.33-7 33.5-10.93.21-1.32 9.95-2.1 10.5-3 1.05-.76 18.13-3.13 19.1-4.1.5-.5 5.2-1.1 10.4-1.4 10.82-.3 8.3-2.26 17.1-2.5 5.78.33 17.12-3.2 22.4-2.6 4.8.75 13.27-2.99 18.4-1.4 3.95.55 8.95 1.04 11.3-1.4 3.24.98 36.01.99 41.8 1.7 15.74 1.54 20.02 1.95 36.9 4.1 32.42 4.54 67.74 12.87 98.1 24.6 7.29 3.25 11.58 3.77 14.43 6.2.78.77.39 2.77 1.67 2.8 1.33.86 6.61 4.11 7.7 5.1l.18-.1 30.75 19.53c3.87 5.76 19.99 8.05 25.99 10.44l.1-.28c42.29 30.42 86.04 85.76 81.18 140.31h13c.07-12.67.16-36.75-1.5-46Z" onclick="window.location.href='/build.php?id=40&amp;gid=47'"></path>
        </g>
        <g class="highlightShape">
            <path d="M714.5 242c-7.82-47.14-37.38-87.61-73.8-117-11.25-8.86-19.45-11.9-20.71-16.97-1.21-.07-2.2.02-3.86-.05-.17-6.95-.17-6.44-.23-9 2.17-2.17 2.2-2.17 2.17-2.17-.35-.86.45-8.49-1.27-9.51-.7-.6-2.5-1.3-3.9-1.7-3.25-.3-2.82-4.37-5.6-4.6-2.42.16-7.16-6.15-9.5-6-2.05.27-4.67-3.86-6.3-4-1.44-.04-7.47-6.31-9.1-6-1.9.09-5.4-5.21-7.4-5-1.83.05-5.56-4.35-7.1-6.1-3.15 1.72-13.13 7.14-14.2 8.5-.98 1.15.19 10.02 1.6 10.8.6.4.8 1.1.3 1.5-1.12.92-1.66-2.07-4.1-1.7-1.3 0-2.7-.4-3-1-1.91-1.68-9.44-3.06-12-4.4-4.56-2.31-10.38-4.36-15.2-5.1-1.87-.27-2.48-1.7-4.9-1.5-1.3 0-2.6-.5-2.9-1-.65-1.37-5.33-.67-6-2-1.73-1.74-4.28-.4-7-1.4-3.28-.65-5.91-2.41-9-2.5-1.91-.32-4.88.38-6-1.2-.82-1.23-5.34-.54-6-2-.4-.6-1.3-.8-1.9-.6-.7.3-4.8-.1-9.2-.9-32.99-6.99-69.16-8.93-102.8-8.7-12.96 1.42-29.27 1.19-42.6 2.9-5.63.7-9.07.06-12.7 1.7-.7.5-1.7.6-2.2.3-2.18-.72-16.12 2.79-18.6 2.6-13.38 2.77-35.99 7.73-49.1 11.8-3.74.29-3.09 2.15-7.9 2.6-2.5.3-4.8 1-5.1 1.5-.66 1.21-5.28.61-5.9 1.9-.4.6-1.5.8-2.4.5-2.39-.81-3.64 2.66-6.1 1.8-2.6-.97-2.41 2.74-4.7 2-.9-.4-2.1 0-2.7.8-.6.8-3.1 2.1-5.6 2.9-3.8.9-5.95 2.87-8.2 4-.2-.75 1.9-10.74.5-11.2-1.45-1.55-11.03-6.54-14.4-8.3-1.3 1.84-3.95 5.61-6 5.5-2.2-.31-6.68 5.96-8.7 6-2.96.48-8.36 5.94-11.1 7.7-1.6 1.3-3.5 2.3-4.1 2.3-1.54-.18-7.81 6.12-9.4 6-1.72-.25-4.19 5.42-6.1 4.6-.8-.3-2.1.1-2.9.9-2.95 3.46-1.28 1.77-1.53 8.45q.25 1.12 1.82 3.19c0 3.12.13 4.79.15 9.88C88.58 139.94 57.9 178.11 43.99 224h20c1.04-.95 3.07-3.51 3-5.1.73-3.34 6.04-7.78 7.5-11.5 1.77-4.03 16.57-21.84 18.4-25.6 1-2.95 4.52-2.99 5.1-5.4 1.45-2.72 6.78-5.06 15.7-13.6 7.6-6.7 14-12.5 14.1-13 .2-.4.8-.8 1.4-.8 1.35.02 6.05-3.76 7.7-5.1 2.65 2.25 4.42 6.27 7.4 2.1 5.42-4.41 8.4-.15 7.5-11-.4-5.7.2-25.9.2-27-.23-2.21 12.17-9.54 15.5-11.8l1 19.2c2.61 1.39 9.8 5.58 11.2 6.2 1.33.87 10.89-4.9 10.8-6.3 1.72-5.23 6.05-3.01 8.1-5.8.4-.8 1.4-1.5 2.4-1.5 3.27-.71 4.12-3.21 8.8-3.6 9.55-1.96 23.49-7.69 33.2-10.4 4.1-1.84 9.69-1.89 12-4 0-.5 2.1-1.2 4.8-1.6 7.51-1.27 5.77-2.01 15.2-3.4 4.7-.7 9-1.6 9.6-2.1.76-1.12 20.05-1.68 20.8-2.9.6-.6 3.6-1 6.7-1 5.8.33 17.11-3.2 22.4-2.6 4.76.75 13.3-2.99 18.4-1.4 3.97.55 8.93 1.04 11.3-1.4 3.08 1 36.13.97 41.8 1.7 21.09 2 40.55 4.1 62.4 8.3 27.67 5.34 60.43 14.82 85.4 25.4 1.2.5 2.2 1.6 2.2 2.5 0 .8.5 1.5 1.1 1.5 1.29.04 5.97 3.83 7.7 5.1 4.23-2.38 9.46-4.81 13.32-7.67-.02-4.18-.2-16.57-.23-18.86.3-1.5 2.01.33 8.71 4.93 6.5 4.5 8.36 6.11 8.27 7.66.91 3.38-2.69 31.34 2.32 35.04 5.43 3.43 7.49 5.57 12.3-.1 40.26 26.7 73.95 62.03 88.8 109.4 6.75 17.5 5.07 23.35 4.7 39.5h13c.07-12.67.16-36.75-1.5-46Z" onclick="window.location.href='/build.php?id=40&amp;gid=47'"></path>
        </g>
    </svg>
</div>
<script type="text/javascript">
    jQuery(function() {
        Travian.Game.Village.initializeWallStates();
        Travian.Translation.add('gid15.rearrangeBuildings_step2', 'Now select the new position of the building: [NAME] (Level [LEVEL])');
        Travian.Translation.add('gid15.rearrangeBuildings_dragAndDrop', 'Now drag and drop the building [NAME] (level [LEVEL]) to its new position.');
        Travian.Translation.add('gid15.rearrangeToContinue', '<span class=\"notice\">Rearrange a building to continue.<\/span>');
        Travian.Translation.add('gid15.rearrangeBuildings', 'Rearrange buildings');
        Travian.Translation.add('allgemein.onUnloadMessage', 'You have made changes. Do you really want to leave this page?')
    });
    rearrangeBuildingsSuccessHandler = function() {
        window.location.href = '/dorf2.php';
    };
</script>
<!-- </div> -->
<div class="clear">&nbsp;</div>