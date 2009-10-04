<?php

Class Route extends Kohana_Route
{
	public function __get($var)
	{
		return isset($this->{'_'.$var}) ? $this->{'_'.$var} : $this->$var;
	}
}
