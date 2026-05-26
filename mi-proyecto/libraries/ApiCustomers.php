<?php 
    require_once 'libraries/ApiTools.php';
    require_once 'models/Customer.php';

    $baseUrl = 'https://gesnorthwind.azurewebsites.net/customers';

    function list_customers() {
        global $baseUrl;

        $url = $baseUrl;
        $headers = [];
        $body = null;

        return call_api($url, 'GET', $headers, $body);
    }

    function get_customer($id) {
        global $baseUrl;
        
        $url = $baseUrl . '/' . $id;
        $headers = [];
        $body = null;

        return call_api($url, 'GET', $headers, $body);
    }

?>