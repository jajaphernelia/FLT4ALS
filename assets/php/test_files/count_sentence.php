<?php

  $sentences = "this book are bigger than encyclopedia. test.";
  echo $sentences."<br>";


  function countSentences($str){
	return preg_match_all('/[^\s](\.|\!|\?)(?!\w)/',$str,$match);
}
  echo countSentences($sentences);

?>