<?php

namespace Vikin\AliPay;

use Illuminate\Support\Facades\Facade;

class AliPay extends Facade
{
	protected static function getFacadeAccessor ()
	{
		return 'aliPay';
	}

}