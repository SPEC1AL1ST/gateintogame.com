<?php
foreach ($reviews as $review) {
    $info = $review->getElementsByTagName("info");
    $dates = $review->getElementsByTagName("date");
    $evaluation = $review->getElementsByTagName("type");

    $i = 0;
    foreach ($info as $text) {
        $eval = $evaluation[$i]->nodeValue;
        $date = $dates[$i]->nodeValue;
        echo '<div class="reviews-table-row">';
        echo '<div class="reviews-table-cell reviews-table-name">'.$date.'</div>';
        echo '<div class="reviews-table-cell reviews-table-review">'.$text->nodeValue.'</div>';
        echo '</div>';
        $i++;
    }
}

?>
