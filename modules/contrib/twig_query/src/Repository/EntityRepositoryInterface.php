<?php


namespace Drupal\twig_query\Repository;

use Drupal\Core\Entity\EntityStorageInterface;
use Drupal\Core\Entity\Query\QueryInterface;

/**
 * Interface EntityRepositoryInterface.
 *
 * @package Drupal\entity_repository\Repository
 */
interface EntityRepositoryInterface {
  public function findAll(int $pager = NULL, array $sort = []) : array;
  public function findBy(array $criteria, int $pager = NULL, array $sort = []) : array;
  public function countBy(array $criteria): int;
  public function getResults(QueryInterface $query): array;
  public function where(Object $query, $condition): void;
  public function addSort(QueryInterface $query, $sort): void;
  public function limit(QueryInterface $query, int $limit): void;
  public function getLangCode(): string;
  public function get(): QueryInterface;
  public function getEntityType(): string;
  public function setEntityType(string $entityType): void;
  public function getStorage(): EntityStorageInterface;
}
