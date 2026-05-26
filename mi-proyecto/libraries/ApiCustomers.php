<?php 
    require_once 'ApiTools.php';

    $baseUrl = 'https://gesnorthwind.azurewebsites.net/customers';

    function list_customers() {
        global $baseUrl;

        $url = $baseUrl;
        $headers = [];
        $body = null;

        call_api($url, 'GET', $headers, $body);
    }

    function get_customer($id) {
        global $baseUrl;
        
        $url = $baseUrl . '/' . $id;
        $headers = [];
        $body = null;

        call_api($url, 'GET', $headers, $body);
    }

?>