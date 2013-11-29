<?php namespace jtgrimes\Laravelodbc;

use Illuminate\Database\Connection;

class ODBCConnection extends Connection {

	/**
	 * Get the default query grammar instance.
	 *
	 * @return Illuminate\Database\Query\Grammars\Grammars\Grammar
	 */
	protected function getDefaultQueryGrammar()
	{
		$connection = \Config::get('database.default');

        if (\Config::has('database.connections.' . $connection . '.grammar')) {
            $grammar = \Config::get('database.connections.' . $connection . '.grammar');

            return $this->withTablePrefix(new $grammar);
        }

        return $this->withTablePrefix(new ODBCQueryGrammar);
	}

	/**
	 * Get the default schema grammar instance.
	 *
	 * @return Illuminate\Database\Schema\Grammars\Grammar
	 */
	protected function getDefaultSchemaGrammar()
	{
        return $this->withTablePrefix(new ODBCSchemaGrammar);
	}

}