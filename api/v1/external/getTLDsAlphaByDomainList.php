<?php
/**
 * 每天更新 ICANN 发布的域名后缀列表
 */

require "../../../common/globalVar.php";
require "../../../common/database.php";

$fileContent = file_get_contents("https://data.iana.org/TLD/tlds-alpha-by-domain.txt");

if(isset($fileContent)){
    $TLDsList = explode("\n",$fileContent);
    array_splice($TLDsList, 0, 1);
    echo sizeof($TLDsList);
    for($i=0;$i<sizeof($TLDsList);$i++){
        $status = insert_data("INSERT INTO `tlds_alpha_by_domain_list` (`id`, `tld`, `create_time`, `update_time`, `is_delete`) VALUES
            (NULL, '".strtolower($TLDsList[$i])."', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP, 0) ON DUPLICATE KEY UPDATE `update_time` = CURRENT_TIMESTAMP");
        echo "插入".strtolower($TLDsList[$i]).($status?"成功":"失败")."<br/>";
    }
}
