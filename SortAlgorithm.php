<?php

class SortAlgorithm
{
	/**
	 * Merge sort (divide and conquer) algorithm
	 *
	 * @param array $unsortedArray
	 *
	 * @return array
	 */
	public static function mergeSort($unsortedArray) {
	    $length = count($unsortedArray);

	    if($length <= 1) {
	        return $unsortedArray;
	    }

		$midpoint = $length / 2;

		$leftSide =array_slice($unsortedArray, 0, $midpoint);
		$rightSide = array_slice($unsortedArray, $midpoint);

		$leftSide = self::mergeSort($leftSide);
		$rightSide = self::mergeSort($rightSide);

		return self::merge($leftSide, $rightSide);
	}

	/**
	 * Helper function for merge sort
	 * @param array $leftSide
	 * @param array $rightSide
	 *
	 * @return array
	 */
	protected static function merge($leftSide, $rightSide) {
	    $sortedArray = [];

	    while(count($leftSide) !== 0 && $rightSide !==0) {
	        if($leftSide[0] > $rightSide[0]) {
	            $sortedArray[] = $rightSide[0];
	            $rightSide = array_slice($rightSide, 1);
	        } else {
				$sortedArray[] = $leftSide[0];
				$leftSide = array_slice($leftSide, 1);
			}
		}

		foreach($leftSide as $item) {
			$sortedArray[] = $item;
		}

		foreach($rightSide as $item) {
			$sortedArray[] = $item;
		}

		return $sortedArray;
	}
}
