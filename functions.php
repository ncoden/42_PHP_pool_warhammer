<?php

function		array_recursive_sum(array $array)
{
	$sum = 0;
	foreach ($array as $value)
	{
		if (is_array($$value))
			$sum += array_recursive_sum($value);
		else
			$sum += floatval($value);
	}
	return ($sum);
}

?>