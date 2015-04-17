<?php

function		path_to_page($path, &$match)
{
	global		$g_pages;

	foreach ($g_pages as $name => $page)
	{
		if (fnmatch($page[0], $path))
		{
			$match = array_filter(explode('/', $path));
			return ($name);
		}
	}
	return (FALSE);
}

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