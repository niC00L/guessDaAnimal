<?php

/**
 * This file is part of the Nette Framework (http://nette.org)
 * Copyright (c) 2004 David Grudl (http://davidgrudl.com)
 */

namespace Nette\DI\Extensions;

use Nette;


/**
 * Enables registration of other extensions in $config file
 */
class ExtensionsExtension extends Nette\DI\CompilerExtension
{

	public function loadConfiguration()
	{
		foreach ($this->getConfig() as $name => $class) {
			if ($class instanceof Nette\DI\Statement) {
				$rc = new \ReflectionClass($class->getEntity());
				$this->compiler->addExtension($name, $rc->newInstanceArgs($class->arguments));
			} else {
				$this->compiler->addExtension($name, new $class);
			}
		}
	}

}
