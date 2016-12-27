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
                'maskName'      => $config['mask_name'],
                'campaignName'  => $config['campaign_name']
            ]
        ];

        try{
            $value = $soapClient->__call($config['delivery_type'], $onnorokomArray);

            $arrResult = explode("||", $value->OneToOneResult);
            
            return $arrResult;
            
        }
        catch (\SoapFault $ex)
        {
            return [0 => '9999', 1 => $ex->getMessage()];
            
        }
    }
}
