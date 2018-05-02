<?php

namespace App\Filter;

use ApiPlatform\Core\Bridge\Doctrine\Orm\Filter\OrderFilter;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class CustomOrderFilter.
 */
final class CustomOrderFilter extends OrderFilter
{
    /**
     * @param Request $request
     *
     * @return array
     */
    protected function extractProperties(Request $request/*, string $resourceClass*/): array
    {
        return $request->query->get('filter[order]', []);
    }
}
