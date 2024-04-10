<?php
//エスケープ処理
function escape($s)
{
    return htmlspecialchars($s, ENT_QUOTES, 'UTF-8');
}
//バリテーション処理
function Check($s)
{
    return preg_match('/\A[[:^cntrl:]]{1,20}+\z/u', $s);
}
