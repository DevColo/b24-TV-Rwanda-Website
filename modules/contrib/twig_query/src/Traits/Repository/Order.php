<?php

namespace Drupal\twig_query\Traits\Repository;

use Drupal\Core\Entity\Query\QueryInterface;

trait Order
{
  protected function addOrderBy(QueryInterface $query, string $orderString)
  {
    if ($orderString) {
      $sortArray = explode(' ', $orderString);

      if (count($sortArray) === 2) {
        $query->sort($sortArray[0], $sortArray[1], $this->getLangCode());
      }
    }
  }
}
