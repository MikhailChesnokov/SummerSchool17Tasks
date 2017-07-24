<?php
	class MaximumUniqueSubstring
	{
		public function findMaximumUniqueSubstring($str)
		{
			$strlen = strlen($str);
			$set = array();
			$startIndex = 0;
			$endIndex = 0;
			$maxSubstringLength = 0;
			$maxSubstringIndex = 0;
			
			while ($endIndex < $strlen)
			{
				if (!empty($set[$str[$endIndex]]) && $set[$str[$endIndex]] > $startIndex)
				{
					$startIndex = $set[$str[$endIndex]];
				}
				if ($endIndex - $startIndex + 1 > $maxSubstringLength)
				{
					$maxSubstringLength = $endIndex - $startIndex + 1;
					$maxSubstringIndex = $startIndex;
				}
				$set[$str[$endIndex]] = $endIndex + 1;
				$endIndex++;
			}

			return substr($str, $maxSubstringIndex, $maxSubstringLength);
		}
	}
	
	//$obj = new MaximumUniqueSubstring();
	//echo $obj->findMaximumUniqueSubstring('aabcdAbc');
?>