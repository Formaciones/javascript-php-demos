<?php 
    require_once 'libraries/ApiTools.php';
    require_once 'models/Customer.php';

    $baseUrl = 'https://gesnorthwind.azurewebsites.net/customers';

    function list_customers() {
        global $baseUrl;

        $url = $baseUrl;
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