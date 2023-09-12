<?php

namespace Drupal\twig_query\Traits\Repository;

use Drupal\Core\Entity\Query\QueryInterface;

trait Sort
{
  protected function addEntityQuerySort(QueryInterface $query, array $sort): void {
    if (!empty($sort)) {
      if (array_key_exists('field', $sort)) {
        $sort = [$sort];
      }

      foreach ($sort as $sortItem) {
        $query->sort($sortItem['field'], $sortItem['dir'], $this->getLangCode());
      }
    }
  }

  public function addSort(QueryInterface $query, $sort): void
  {
    if (is_string($sort)) {
      $this->addOrderBy($query, $sort);
    }

    if (is_array($sort)) {
      if (!empty($sort)) {
        foreach ($sort as $item) {
          $this->addOrderBy($query, $item);
        }
      }
    }
  }
}
