<?php
function import($path)
{
    require_once($_SERVER['DOCUMENT_ROOT'] . $path);
}
