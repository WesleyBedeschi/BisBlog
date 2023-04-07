<?php

$prod = false;

/*
    prod.php => produção
    local.php => local
*/


$file = $prod ? 'prod.php' : 'local.php';

require_once('env/' . $file);