<?php
	class Brackets 
	{
	public function isBracketSequenceCorrect($str) 
	{
		$true = 'true';
		$false = 'false';
		$strlen = strlen($str);
		
		if ($strlen % 2 == 1)
			return $false;
		
		$stack = array();
		$stackSize = 0;
		$openBrackets = array('{','[','(');
		$closeBrackets = array('}',']',')');
		$bracketsMatches = array(
		')'=>'(',
		'}'=>'{',
		']'=>'[');

		for ($i = 0; $i < $strlen; $i++) {
			if (in_array($str[$i], $openBrackets)) 
			{	
				array_push($stack, $str[$i]);
				$stackSize++;
			}
			else
			if (in_array($str[$i], $closeBrackets))
			{		
				if ($stackSize-- == 0)
					return $false;
				
				if ($bracketsMatches[$str[$i]] != array_pop($stack))
					return $false;
			}
			else 
				return $false;
		}
		
		if ($stackSize == 0)
			return $true;

		return $false;
	}
	
	/*
	public function isBracketSequenceCorrectTEST($str)
	{
		return strlen($str) > strlen($str = str_replace(array('{}','()','[]') , '' , $str)) ? $this->isBracketSequenceCorrectTEST($str) : strlen($str)==0;	
	}
	public function TEST($str) {
		echo $str.' ';
		if ($this->isBracketSequenceCorrect($str)=='true' && $this->isBracketSequenceCorrectTEST($str) ||
			$this->isBracketSequenceCorrect($str)=='false' && !$this->isBracketSequenceCorrectTEST($str))
			echo 'OK<br />';
			else 
			echo 'NOT OK<br />';
	}
	*/
	
	}
	
	/*
	$obj = new Brackets();
	$obj->TEST('()');
	$obj->TEST('abc');
	$obj->TEST('');
	$obj->TEST('(');
	$obj->TEST(')');
	$obj->TEST('((');
	$obj->TEST('()');
	$obj->TEST('))');
	$obj->TEST(')(');
	$obj->TEST('[]');
	$obj->TEST('}{');
	$obj->TEST('{}');
	$obj->TEST('(((');
	$obj->TEST(')))');
	$obj->TEST('((((');
	$obj->TEST('((()');
	$obj->TEST('(()(');
	$obj->TEST('(())');
	$obj->TEST('()((');
	$obj->TEST('()()');
	$obj->TEST('()))');
	$obj->TEST(')(((');
	$obj->TEST(')(()');
	$obj->TEST(')()(');
	$obj->TEST(')())');
	$obj->TEST('))((');
	$obj->TEST('))()');
	$obj->TEST(')))(');
	$obj->TEST('))))');
	
	$brackets = array('(','{','[',')','}',']');
	for ($i1=0; $i1<6; $i1++) {
		for ($i2=0; $i2<6; $i2++) {
			for ($i3=0; $i3<6; $i3++) {
				for ($i4=0; $i4<6; $i4++) {
					$test = $brackets[$i1].$brackets[$i2].$brackets[$i3].$brackets[$i4];
					$obj->TEST($test);
	}}}}
	*/
?>