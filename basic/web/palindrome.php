<?

function isPalindrome($inputString) {
	$original = preg_replace("'\s'", "", mb_strtolower($inputString));
	$reversional = iconv("windows-1251", "utf-8", strrev(iconv("utf-8", "windows-1251", $original)));
	
	if ($original == $reversional) {
		return true;
	} else {
		return false;
	}
}
	
	function getPalindrome($inputString){
		
		if (isPalindrome($inputString)) {
			return $inputString;
		}
		
		$inputStrLen = mb_strlen($inputString, 'utf8');
		for ($i = 0; $i < $inputStrLen - 1; $i++) {
			for ($j = $inputStrLen - $i; $j > 1; $j--) {
				$subStr = mb_substr($inputString, $i, $j, 'utf8');
				if (isPalindrome($subStr)) {
					$palindromesArray[] = $subStr;
				}
			}
		}
		
		if (empty($palindromesArray)) {
			return mb_substr($inputString, 0, 1, 'utf8');
		}
		
		$max = 0;
		$subPalindrome = '';
		foreach ($palindromesArray as $key => $value) {
			$valueLen = mb_strlen($value, 'utf8');
			if ($max > $valueLen) {
				continue;
			}
			$max = $valueLen;
			$subPalindrome = $value;
		}
		
		return $subPalindrome;
		
	}
	
echo getPalindrome("Аргентина манит негра");
