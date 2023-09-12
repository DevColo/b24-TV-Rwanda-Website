<?php

namespace Drupal\twig_query\Traits\Repository;

use Drupal\Core\Entity\Query\ConditionInterface;
use Drupal\Core\Entity\Query\QueryInterface;
use Drupal\twig_query\Helper;
use InvalidArgumentException;

trait Condition
{

  public function where(object $query, $condition): void
  {
    $this->limitToSupportedInterfaces($query);

    is_array($condition) && $this->addByArray($condition, $query);
    is_string($condition) && $this->addByString($condition, $query);
  }

  /**
   * @param Object $query
   * @param array $condition
   */
  private function addByOperator(object $query, array $condition): void
  {

    $this->limitToSupportedInterfaces($query);

    $field = Helper::getFieldNameFromString($condition[0], $this->entityType);
    $testCondition = $condition[1];
    $operator = $condition[2];

    $query->condition($field, $testCondition, $operator);
  }

  private function limitToSupportedInterfaces(object $query)
  {
    if (!$query instanceof QueryInterface and !$query instanceof ConditionInterface) {
      throw new InvalidArgumentException(sprintf('This function only works on %s and %s - got %s.', QueryInterface::class, ConditionInterface::class, get_class($query)));
    }
  }

  /**
   * @param array $condition
   * @param Object $query
   * @return string
   */
  private function addBySimpleArray(object $query, array $condition): string
  {
    $this->limitToSupportedInterfaces($query);
    $field = Helper::getFieldNameFromString(key($condition), $this->entityType);

    // todo: allow other operators
    $query->condition($field, $condition[key($condition)]);
    return $field;
  }

  /**
   * @param array $condition
   * @param Object $query
   */
  private function addByArray(array $condition, object $query): void
  {

    $this->limitToSupportedInterfaces($query);
    // we have an operator
    if (count($condition) === 3) {
      $this->addByOperator($query, $condition);
    }

    if (count($condition) === 1) {
      $this->addBySimpleArray($query, $condition);
    }
  }

  /**
   * @param string $condition
   * @param Object $query
   */
  private function addByString(string $condition, object $query): void
  {
    $this->limitToSupportedInterfaces($query);

    $conditionArray = explode(' ', $condition);

    // if it's only the field - test against true or false
    if (count($conditionArray) === 1) {
      $testCondition = true;

      $field = $conditionArray[0];

      // check for the !field_name notation
      // if its set - test against false
      if (Helper::startsWith($field, '!')) {
        $field = substr($field, 1);
        $testCondition = false;
      }

      $field = Helper::getFieldNameFromString($field, $this->entityType);
      $query->condition($field, $testCondition);
    }

    // we have a field and a (is) condition
    if (count($conditionArray) === 2) {
      $field = Helper::getFieldNameFromString($conditionArray[0], $this->entityType);
      $testCondition = $conditionArray[1];
      $query->condition($field, $testCondition);
    }

    /** TODO: add string operators */
  }
}
