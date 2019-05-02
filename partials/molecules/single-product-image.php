<div class="produkt-img">
    <?php
    $img_full = get_field('field_img_full');
    $img_full_2x = $img_full['url'];
    $img_full_1x = $img_full['sizes']['large'];
    ?>
    <?php if($img_full) echo '<img src="'.$img_full_2x.'"  srcset="'.$img_full_2x.', '.$img_full_1x.'" alt="' . $img_full['alt'] . '" />'; ?>
</div>