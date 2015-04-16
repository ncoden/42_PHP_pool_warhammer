<?php

class Dice
{
	const DICE_MAX = 6;

	public static function		doc()
	{
		return (file_get_contents('Dice.doc.txt'));
	}

	public function				__construct()
	{

	}

	static public function		toss()
	{
 		$roll = rand(1, self::DICE_MAX);
 		return $roll;
	}

	static public function		multi_toss($numtoss = 0)
	{
		$arr = array();
		if (is_int ($numthrow) && $numthrow > 0)
		{
			while ($numthrow > 0)
			{
				$arr[] = rand(1, self::DICE_MAX);
				$numthrow--;
			}
		}
		return $arr;
	}

	static public function		min_toss($min = 0, $n = 0)
	{
		if (is_int($min) && is_int($n) && ($min <= self::DICE_MAX))
			while ($n > 0)
			{
				if (rand(1, self::DICE_MAX) > $min)
					return TRUE;
				$n--;
			}
		return FALSE;
	}
}

?>