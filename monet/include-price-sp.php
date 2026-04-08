฿<?php
$str = get_field('special_price');
$new_str = str_replace(',', '', $str);
echo number_format($new_str * 1);
?>