<?php

require "../../../common/globalVar.php";
require "../../../common/database.php";

echo json_encode(@select_data("select * from `rss_news` order by `ID` desc limit 1"));
