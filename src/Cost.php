<?php
 
namespace RafiJohari\RajaOngkir;

 
/**
 * Advance Calculator.
 * 
 */
class Cost
{
    /**
     * Convert dari integer/desimal ke biner.
     *
     * @param integer $number
     * @return string
     */

     //ambil semua 
    public static function getcost($origin,$destination,$weight,$courier)
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(    
        CURLOPT_URL => config('services.rajaongkir.account_type') == 'pro' ? "https://pro.rajaongkir.com/api/cost" : "https://api.rajaongkir.com/".config('services.rajaongkir.account_type')."/cost",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "origin=".$origin."&destination=".$destination."&weight=".$weight."&courier=".$courier."",
        CURLOPT_HTTPHEADER => array(
          "content-type: application/x-www-form-urlencoded",
          "key:".config('services.rajaongkir.api_key')
        ),
        ));
    
    
        $response = curl_exec($curl);
        $err = curl_error($curl);
    
        curl_close($curl);
    
        if ($err) {
            return "cURL Error #:" . $err;
        } else {
            $data =  json_decode($response,true);
            if($data['rajaongkir']['status']['code'] == 200){
                return $data['rajaongkir']['results'];

            }else{
                return $data['rajaongkir']['status']['description'];
            }
        }    
    
    }

    
 
    
}
 