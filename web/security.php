<?php
//エスケープ処理
function escape($s)
{
  return htmlspecialchars($s, ENT_QUOTES, 'UTF-8');
}
//バリテーション処理
function check_title($s)
{
  return preg_match('/\A[[:^cntrl:]]{1,20}+\z/u', $s);
}

function check_text($s)
{
  return preg_match('/\A[[:^cntrl:]]{1,20}+\z/u', $s);
}
