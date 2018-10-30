<?php
/**
 * Created by PhpStorm.
 * User: hizbul
 * Date: 12/20/16
 * Time: 11:37 AM
 */

namespace Hizbul\OnnorokomSms;


class OnnorokomSms implements OnnorokomSmsInterface
{
    public function send(array $data)
    {
        $soapClient = new \SoapClient("http://api2.onnorokomsms.com/sendsms.asmx?wsdl");
        $config = config('onnorokom');

        $onnorokomArray = [
            'request' => [
                'userName'      => $config['username'],
                'userPassword'  => $config['password'],
                'mobileNumber'  => $data['mobile_number'],
                'smsText'       => isset($data['message']) ? $data['message'] : 'Default sms',
                'type'          => $config['type'],
                'maskName'      => '',
                'campaignName'  => $config['campaign_name']
            ]
        ];

        if ($config['delivery_type'] == 'OneToMany') {
            unset($onnorokomArray['request']['mobileNumber']);
            $onnorokomArray['request']['numberList'] = $data['mobile_number'];
        }

        try{
            $value = $soapClient->__call($config['delivery_type'], $onnorokomArray);

            $func = $config['delivery_type'].'Result';
            $arrResult = explode("||", $value->$func);
            
            return $arrResult;
            
        }
        catch (\SoapFault $ex)
        {
            return [0 => '9999', 1 => $ex->getMessage()];
            
        }
    }
}
