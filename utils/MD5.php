<?php
function createHash(string $pass)
{
    return md5($pass);
}

function verify(string $pass, string $passHash)
{
    return md5($pass) == $passHash;
}
