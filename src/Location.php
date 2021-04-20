<?php
 
namespace RafiJohari\RajaOngkir;

 
/**
 * Advance Calculator.
 * 
 */
class Location
{
    /**
     * Convert dari integer/desimal ke biner.
     *
     * @param integer $number
     * @return string
     */

     //ambil semua provinsi
    public static function getprovinsi()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(    
        CURLOPT_URL => config('services.rajaongkir.account_type') == 'pro' ? "https://pro.rajaongkir.com/api/province" : "https://api.rajaongkir.com/".config('services.rajaongkir.account_type')."/province",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
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

    

    //ambil semua kota
    public static function getkota()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(    
        CURLOPT_URL => config('services.rajaongkir.account_type') == 'pro' ? "https://pro.rajaongkir.com/api/city" : "https://api.rajaongkir.com/".config('services.rajaongkir.account_type')."/city",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
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
    //ambil kota berdasarkan provinsi
    public static function findkota($id)
    { 
        $curl = curl_init();

        curl_setopt_array($curl, array(    
        CURLOPT_URL => config('services.rajaongkir.account_type') == 'pro' ? "https://pro.rajaongkir.com/api/city?province=".$id : "https://api.rajaongkir.com/".config('services.rajaongkir.account_type')."/city?province=".$id,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
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

    //get all kecamatan untuk pro
    public static function getkecamatan()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(    
        CURLOPT_URL => "https://pro.rajaongkir.com/api/subdistrict",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
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


    //ambil kecamatan berdasarkan kota
    public static function findkecamatan($id)
    { 
        $curl = curl_init();

        curl_setopt_array($curl, array(    
        CURLOPT_URL => "https://pro.rajaongkir.com/api/subdistrict?city=".$id,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
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
 