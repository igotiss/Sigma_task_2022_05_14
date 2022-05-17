<?php
function discount($arr) {

    $discountArr = preg_grep("/^(\d+)?\.99$/", $arr);
    $noDiscountArr = array_diff($arr, $discountArr);

    if(count($discountArr)>3) {
        return (array_sum($noDiscountArr)+max($discountArr));
    } else {
        return(array_sum($arr));
    }
}

var_dump(discount([20.99, 1, 2.99, 1.99,  3, 100.99]));



