<?php

$data = file_get_contents("data/posts.json");

$dataArr = json_decode($data, true);

function sortDate($a, $b)
{
    if ($a['post_date'] == $b['post_date']) {
        return 0;
    }
    return ($a['post_date'] > $b['post_date']) ? -1 : 1;
}

usort($dataArr, "sortDate");

echo "<section class='content'>";

//reads json data and adds content
foreach ($dataArr as $item) {
    echo "<article><h1>" . $item["title"] . "</h1>"
    . "<p><i>" . date('F j, Y', $item["post_date"]) . "</i><br></p><p> By "
    . $item["author"] . "<br></p><p>"
    . $item["content"] . "<p> <b>Catagorized in: </b> "
    . ucwords(implode(", ", $item["category"]));
    echo "</article>";
}
echo "</section>";
