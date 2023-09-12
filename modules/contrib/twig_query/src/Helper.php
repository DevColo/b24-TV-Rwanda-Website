<?php

namespace Drupal\twig_query;

class Helper
{
  const ALL_PLAIN = ['body', 'nid', 'uid', 'title', 'type', 'created'];
  const ALL_PLAIN_TERMS = ['tid', 'uid', 'name', 'created', 'vid', 'status'];

  const PREFIX = 'field_';

  public static function getCurrentDate(): string
  {
    return date('Y-m-dTh:i:s');
  }

  public static function getFieldNameFromString(string $name, $type): string
  {

    if (static::startsWith($name, self::PREFIX)) {
      return $name;
    }

    if ($type === 'node' && in_array($name, static::ALL_PLAIN)) {
      return $name;
    }

    if ($type === 'taxonomy_term' && in_array($name, static::ALL_PLAIN_TERMS)) {
      return $name;
    }

    return self::PREFIX . $name;
  }

  public static function startsWith(string $string, string $startString): bool
  {
    $len = strlen($startString);
    return (substr($string, 0, $len) === $startString);
  }
}
