<?php

require_once("inc_base.php");
require_once($CMS_COMMON_INCLUDE_DIR . "libs.php");
require_once("inc_smarty.php");

require_once($CMS_COMMON_INCLUDE_DIR . "auth_adm.php");

        session_destroy();
        $SESSION = array();
        cutil::redirect_exit('ad_login.php');
?>