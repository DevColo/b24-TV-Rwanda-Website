<?php

namespace Drupal\twig_query\Service;

use Drupal\twig_query\Repository\EntityRepositoryInterface;
use Drupal\twig_query\Traits\Service\Query;
use Drupal\twig_query\Traits\Service\Draggable;
use Drupal\twig_query\Traits\Service\Translated;

abstract class Base implements ServiceInterface
{

  use Draggable, Translated, Query;

  abstract public function defineTypeColumn(): string;

  public function __construct(EntityRepositoryInterface $queryRepository)
  {
    $this->queryRepository = $queryRepository;
    $this->query = $queryRepository->get();
  }

  public function getAll(bool $draggableView = false): array
  {
    $queryResults = $this->getQueryResults();

    if ($draggableView) {
      $queryResults = $this->getDraggableOrderedContent($queryResults);
    }

    return $this->fetchTranslatedContent($queryResults);
  }

  public function getWhere($condition): ServiceInterface
  {
    $this->queryRepository->where($this->query, $condition);
    return $this;
  }

  public function getOrderBy($sort = null): ServiceInterface
  {
    $this->queryRepository->addSort($this->query, $sort);
    return $this;
  }

  public function getLimit($limit): ServiceInterface
  {
    $this->queryRepository->limit($this->query, $limit);
    return $this;
  }

  public function getType(string $type): ServiceInterface
  {
    $this->setQuery($this->getQuery()->condition($this->defineTypeColumn(), $type));
    return $this;
  }

  public function getGroup(array $conditions, string $type = 'and'): ServiceInterface
  {

    if ($type === 'and') {
      $group = $this->getQuery()->andConditionGroup();
    }

    if (!isset($group) && $type === 'or') {
      $group = $this->getQuery()->orConditionGroup();
    }

    if (!isset($group) || !$group) {
      return $this;
    }

    foreach ($conditions as $condition) {
      $this->queryRepository->where($group, $condition);
    }

    if (!empty($group->conditions())) {
      $this->getQuery()->condition($group);
    }

    return $this;
  }
}
