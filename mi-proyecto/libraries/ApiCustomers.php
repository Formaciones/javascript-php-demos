<?php 
    require_once 'libraries/ApiTools.php';
    require_once 'models/Customer.php';

    $baseUrl = 'https://gesnorthwind.azurewebsites.net/customers';

    function list_customers($company = null, $city = null, $country = null) {
        global $baseUrl;

        // Ejemplo: https://gesnorthwind.azurewebsites.net/customers?company=Comidad&city=Berlin&Country=Germany
        $param = '';
        $param += ($param != '' ? '&' : '') . ($company != null ? 'company=' . $company : '');
        $param += ($param != '' ? '&' : '') . ($city != null ? 'city=' . $city : '');
        $param += ($param != '' ? '&' : '') . ($country != null ? 'country=' . $country : '');

        $url = $baseUrl . ($param != null ? '?' . $param : '');

        $headers = ['apikey: 1234567890.'];
        $body = null;

        return call_api($url, 'GET', $headers, $body);
    }

    function get_customer($id) {
        global $baseUrl;
        
        $url = $baseUrl . '/' . $id;
        $headers = ['apikey: 1234567890.'];
        $body = null;

        return call_api($url, 'GET', $headers, $body);
    }

?>