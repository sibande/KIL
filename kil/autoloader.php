<?php

/*
 * KIL - Kohana Image Library
 *
 * @package   KIL
 * @author    Jose Sibande <jbsibande@gmail.com>
 */

class KIL_Autoloader
{
    /**
     * Registers KIL
     *
     * @return  void
     */
    public static function register()
    {
      spl_autoload_register(array(new self, 'autoload'));
    }

    /**
     * Autoloads KIL class
     *
     * @param   string   class name.
     * @return  boolean
     */
    public static function autoload($class)
    {
      if (strpos($class, 'KIL') != 0) {
	return;
      }
      $file_name = dirname(dirname(__FILE__)).'/'.str_replace('_', '/', strtolower($class)).'.php';
      if (file_exists($file_name))
      {
	require($file_name);
      }
    }
}
