<div class="boxes villageInfobox production">
    <div class="boxes-tl"></div>
    <div class="boxes-tr"></div>
    <div class="boxes-tc"></div>
    <div class="boxes-ml"></div>
    <div class="boxes-mr"></div>
    <div class="boxes-mc"></div>
    <div class="boxes-bl"></div>
    <div class="boxes-br"></div>
    <div class="boxes-bc"></div>
    <div class="boxes-contents cf">
        <table id="production" cellpadding="1" cellspacing="1">
            <thead>
            <tr>
                <th colspan="4"> <?php echo PROD_HEADER; ?> </th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td class="ico">
                    <div><i class="r1" title="<?php echo LUMBER; ?>"></i></div>
                </td>
                <td class="res"><?php echo LUMBER; ?>:</td>
                <td class="num">
				<?php $production=$village->getProd("wood");?>
				<?=number_format(round($production),0,'.','.')?></td>
            </tr>
            <tr>
                <td class="ico">
                    <div><i class="r2" title="<?php echo CLAY; ?>"></i></div>
                </td>
                <td class="res"><?php echo CLAY; ?>:</td>
                <td class="num">
				<?php $production=$village->getProd("clay");?>
				<?=number_format(round($production),0,'.','.')?></td></td>
            </tr>
            <tr>
                <td class="ico">
                    <div><i class="r3" title="<?php echo IRON; ?>"></i></div>
                </td>
                <td class="res"><?php echo IRON; ?>:</td>
                <td class="num">
				<?php $production=$village->getProd("iron");?>
				<?=number_format(round($production),0,'.','.')?></td></td>
            </tr>
            <tr>
                <td class="ico">
                    <div><i class="r4" title="<?php echo CROP; ?>"></i></div>
                </td>
                <td class="res"><?php echo CROP; ?>:</td>
                <td class="num">
				<?php $production=$village->getProd("crop");?>
				<?=number_format(round($production),0,'.','.')?></td></td>
            </tr>
            </tbody>
        </table>


    </div>
</div>