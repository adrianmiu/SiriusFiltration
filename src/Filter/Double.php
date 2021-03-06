<?php
declare(strict_types=1);
namespace Sirius\Filtration\Filter;

class Double extends AbstractFilter
{
    const OPTION_PRECISION = 'precision';

    protected $options = [
        self::OPTION_PRECISION => 2
    ];

    public function filterSingle($value, string $valueIdentifier = null)
    {
        if (is_object($value)) {
            return $value;
        }
        if ($value == 0) {
            return 0;
        }
        $value = floatval($value);
        $multiplier = pow(10, (int) $this->options['precision']);
        return round($value * $multiplier) / $multiplier;
    }
}
