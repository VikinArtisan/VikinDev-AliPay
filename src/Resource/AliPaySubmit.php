<?php
namespace Vikin\AliPay\Resource;


class AliPaySubmit
{
    use AliPayRsa;
    use AliPayCore;

    protected $aliPayRsa;
    protected $aliPayCore;


    /**
     * 生成签名结果
     *
     * @param $para_sort 已排序要签名的数组
     *                   return 签名结果字符串
     * @param $para_sort
     *
     * @return string
     */
    function buildRequestMySign ( $paraSort )
    {
        //把数组所有元素，按照“参数=参数值”的模式用“&”字符拼接成$字符串
        $prestr = $this->createLinkstring($paraSort);

        $mySign = "";
        switch (strtoupper(trim(config('VikinDevAliPay.sign_type')))) {
            case "RSA" :
                $mySign = $this->rsaSign($prestr, config('VikinDevAliPay.private_key'));
                break;
            default :
                $mySign = "";
        }

        return $mySign;
    }

    /**
     * 生成要请求给支付宝的参数数组
     *
     * @param $paraTemp 请求前的参数数组
     *
     * @return 要请求的参数数组
     */
    function buildRequestPara ( $paraTemp )
    {
        //除去待签名参数数组中的空值和签名参数
        $paraFilter = $this->paraFilter($paraTemp);

        //对待签名参数数组排序
        $paraSort = $this->argSort($paraFilter);

        //生成签名结果
        $mySign = $this->buildRequestMySign($paraSort);

        //签名结果与签名方式加入请求提交参数组中
        $paraSort['sign'] = $mySign;
        $paraSort['sign_type'] = strtoupper(trim(config('VikinDevAliPay.sign_type')));

        return $paraSort;
    }

    /**
     * 生成要请求给支付宝的参数数组
     *
     * @param $para_temp 请求前的参数数组
     *
     * @return 要请求的参数数组字符串
     */
    function buildRequestParaToString ( $para_temp )
    {
        //待请求参数数组
        $para = $this->buildRequestPara($para_temp);

        //把参数组中所有元素，按照“参数=参数值”的模式用“&”字符拼接成字符串，并对字符串做urlencode编码
        $request_data = createLinkstringUrlencode($para);

        return $request_data;
    }


    /**
     * 建立请求，以表单HTML形式构造（默认）
     *
     * @param $paraTemp
     *
     * @return string
     */
    function buildRequest ( array $paraTemp ) : string
    {
        $para = $this->buildRequestPara($paraTemp);

        $sHtml = "https://mapi.alipay.com/gateway.do?_input_charset=utf-8";
        while (list ( $key, $val ) = each($para)) {

            if($key == '_input_charset') continue;

            $sHtml .= "&" . $key . "=" . urlencode($val);
        }

        return $sHtml;
    }

    /**
     * 用于防钓鱼，调用接口query_timestamp来获取时间戳的处理函数
     * 注意：该功能PHP5环境及以上支持，因此必须服务器、本地电脑中装有支持DOMDocument、SSL的PHP配置环境。建议本地调试时使用PHP开发软件
     * return 时间戳字符串
     */
    function query_timestamp ()
    {
        $url = "https://mapi.alipay.com/gateway.do?service=query_timestamp&partner=" . trim(strtolower(config('VikinDevAliPay.partner'))) . "&_input_charset=" . trim(strtolower(config('VikinDevAliPay.input_charset')));
        $encrypt_key = "";

        $doc = new DOMDocument();
        $doc->load($url);
        $itemEncrypt_key = $doc->getElementsByTagName("encrypt_key");
        $encrypt_key = $itemEncrypt_key->item(0)->nodeValue;

        return $encrypt_key;
    }
}

?>