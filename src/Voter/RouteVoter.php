<?php

declare(strict_types = 1);

namespace Everlution\NavigationBundle\Voter;

use Everlution\Navigation\NavigationItem;
use Everlution\Navigation\Voter\StringVoter;
use Everlution\Navigation\Voter\Voter;
use Everlution\Navigation\RoutableItem;

/**
 * Class RouteMatcher.
 * @author Ivan Barlog <ivan.barlog@everlution.sk>
 */
class RouteVoter extends RequestAware implements Voter, StringVoter
{
    /**
     * @param NavigationItem $item
     * @return bool
     */
    public function match(NavigationItem $item): bool
    {
        if (!$item instanceof RoutableItem) {
            return false;
        }

        return $this->matchString($item->getRoute());
    }

    /**
     * @param string $value
     * @return bool
     */
    public function matchString(string $value): bool
    {
        return$this->getRequest()->get('_route') === $value;
    }
}