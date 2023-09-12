<?php

namespace Drupal\twig_query\Service;

interface ServiceInterface
{
  public function getAll(bool $draggableView = false): array;
  public function getWhere($condition): ServiceInterface;
  public function getOrderBy($sort = null): ServiceInterface;
  public function getLimit($limit): ServiceInterface;
}
