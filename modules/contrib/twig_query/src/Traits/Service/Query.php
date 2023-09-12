<?php

namespace Drupal\twig_query\Traits\Service;

use Drupal\Core\Entity\Query\QueryInterface;
use Drupal\twig_query\Repository\EntityRepositoryInterface;

trait Query
{
  protected QueryInterface $query;
  protected EntityRepositoryInterface $queryRepository;

  public function getQuery(): QueryInterface
  {
    return $this->query;
  }

  public function setQuery(QueryInterface $query): void
  {
    $this->query = $query;
  }

  protected function getQueryResults(): array
  {
    $result = $this->queryRepository->getResults($this->query);

    $this->setQuery($this->queryRepository->get());
    return $result;
  }
}
