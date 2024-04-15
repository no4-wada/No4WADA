<?php
//エスケープ処理
function escape($s)
{
  return htmlSpecialChars($s, ENT_QUOTES, 'UTF-8');
}
//バリテーション処理
function isValidateTitle($title)
{
  return (preg_match('/\A[[:^cntrl:]]{1,20}+\z/u', $title) === 1);
}

function isValidateContent($text)
{
  return (preg_match('/\A[[:^cntrl:]]{1,200}+\z/u', $text) === 1);
}
