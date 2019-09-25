<?php
namespace Pandora3\Plugins\TwigRussianPluralExtension;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

/**
 * Class RussianPluralExtension
 * @package Pandora3\Plugins\TwigRussianPluralExtension
 */
class RussianPluralExtension extends AbstractExtension {

	public function getFilters() {
		return [
			new TwigFilter('plural', function($values, $count) {
				$mod10 = $count % 10;
				$mod100 = $count % 100;
				if (
					$mod10 === 0 || $mod10 >= 5 ||
					($mod100 >= 10 && $mod100 < 20)
				) {
					$index = 2;
				} else {
					$index = ($mod10 === 1) ? 0 : 1;
				}
				return sprintf($values[$index] ?? '', $count);
			})
		];
	}

}

