<?php 
    require_once 'libraries/ApiTools.php';
    require_once 'models/Customer.php';

    $baseUrl = 'https://gesnorthwind.azurewebsites.net/customers';

    function list_customers($company = null, $city = null, $country = null) {
        global $baseUrl;

        // Ejemplo: https://gesnorthwind.azurewebsites.net/customers?company=Comidad&city=Berlin&Country=Germany
        $params = '';
        $params .= ($params != '' ? '&' : '') . ($company != null ? 'company=' . $company : '');
        $params .= ($params != '' ? '&' : '') . ($city != null ? 'city=' . $city : '');
        $params .= ($params != '' ? '&' : '') . ($country != null ? 'country=' . $country : '');

        $url = $baseUrl . ($params != null ? '?' . $params : '');

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