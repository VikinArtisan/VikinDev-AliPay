<?php
namespace Vikin\AliPay;

use Illuminate\Support\Facades\App;

class AliPayMain
{
	/**
	 * @var
	 */
	protected $orderId;

	/**
	 * @var
	 */
	protected $orderName;

	/**
	 * @var
	 */
	protected $orderPrice;

	/**
	 * @var
	 */
	protected $orderContent;

	/**
	 * @var
	 */
	protected $showUrl;

	/**
	 * @param $orderShowUrl
	 */
	public function setOrderShowUrl ($orderShowUrl)
	{
		$this->showUrl = urlencode($orderShowUrl);
	}

	/**
	 * @param $orderContent
	 */
	public function setOrderContent ($orderContent)
	{
		$this->orderContent = urlencode($orderContent);
	}

	/**
	 * @param $orderPrice
	 */
	public function setOrderPrice ($orderPrice)
	{
		$this->orderPrice = urlencode($orderPrice);
	}

	/**
	 * @param $orderName
	 */
	public function setOrderName ($orderName)
	{
		$this->orderName = urlencode($orderName);
	}

	/**
	 * @param $orderId
	 */
	public function setOrderNO ($orderId)
	{
		$this->orderId = urlencode($orderId);
	}


	/**
	 * @return mixed
	 */
	public function webPay ()
	{
		return $this->webRequest();
	}

	/**
	 * @return mixed
	 */
	public function wapPay ()
	{
		return $this->wapRequest();
	}

	/**
	 * 构造要请求的参数数组(web)，无需改动
	 * @return array
	 */
	public function parameter_pc ()
	{
		return [
			"service"           => config("VikinDevWebAliPay.service"),
			"partner"           => config("VikinDevAliPay.partner"),
			"seller_id"         => config("VikinDevAliPay.seller_id"),
			"payment_type"      => config("VikinDevAliPay.payment_type"),
			"notify_url"        => config("VikinDevWebAliPay.notify_url"),
			"return_url"        => config("VikinDevWebAliPay.return_url"),
			"anti_phishing_key" => config("VikinDevWebAliPay.anti_phishing_key"),
			"exter_invoke_ip"   => config("VikinDevWebAliPay.exter_invoke_ip"),
			"out_trade_no"      => $this->orderId,
			"subject"           => $this->orderName,
			"total_fee"         => $this->orderPrice,
			"body"              => $this->orderContent,
			"_input_charset"    => trim(strtolower(config("VikinDevAliPay.input_charset")))
		];
	}

	/**
	 * 构造要请求的参数数组(wap)，无需改动
	 * @return array
	 */
	public function parameter_wap ()
	{
		return [
			"service"        => config("VikinDevWebAliPay.service"),
			"partner"        => config("VikinDevAliPay.partner"),
			"seller_id"      => config("VikinDevAliPay.seller_id"),
			"payment_type"   => config("VikinDevAliPay.payment_type"),
			"notify_url"     => config("VikinDevWebAliPay.notify_url"),
			"return_url"     => config("VikinDevWebAliPay.return_url"),
			"out_trade_no"   => $this->orderId,
			"subject"        => $this->orderName,
			"total_fee"      => $this->orderPrice,
			"body"           => $this->orderContent,
			"show_url"       => $this->showUrl,
			"_input_charset" => trim(strtolower(config("alipayMobile.input_charset")))
		];
	}


	/**
	 * @return mixed
	 */
	public function wapRequest ()
	{
		$AliPaySubmit = App::make('Vikin\AliPay\Resource\AliPaySubmit');

		$mobileRes = App::call([$AliPaySubmit, 'buildRequest'], ['paraTemp' => $this->parameter_wap()]);

		return $mobileRes;

	}


	/**
	 * @return mixed
	 */
	public function webRequest ()
	{
		$AliPaySubmit = App::make('Vikin\AliPay\Resource\AliPaySubmit');

		$mobileRes = App::call([$AliPaySubmit, 'buildRequest'], ['paraTemp' => $this->parameter_pc()]);

		return $mobileRes;
	}
}

?>