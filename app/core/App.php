<?php

class App 
{
    protected $controller = 'Home';
    protected $method = 'index';
    protected $params = [];

    public function __construct()
    {
        $url = $this->parseURL();
        
        // cek file controller 

        if ($url == NULL){
            $url = [$this->controller]; 
        };

        if (file_exists('../app/controllers/' . ucfirst($url[0]) .'.php')){
            $this->controller = ucfirst($url[0]);
            
            // menghilangkan element array
            unset($url[0]);
        };

        // jika file ditemukan panggil filenya untun diinsansiasi classnya
        require_once '../app/controllers/' . $this->controller . '.php';
    
        $this->controller = new $this->controller;

        // cek method
        if (isset($url[1])){
            // jika ada cek method yang dikirim
            if (method_exists($this->controller, $url[1])){
                $this->method = $url[1];
                unset($url[1]);
            }
        };

        // cek params yang dikirim
        // jika url tidak kosng maka ...
        if (!empty($url)){
            $this->params = array_values($url);
        };

        // panggil method ini untuk menjalankan class dan method
        call_user_func_array([$this->controller, $this->method], $this->params);
    }   

    public function parseURL()
    {
        if(isset($_GET['url'])){
            // menghapus tanda / diakhir
            $url = rtrim($_GET['url'], '/');

            // membersihkan url yang tidak jelas
            $url = filter_var($url, FILTER_SANITIZE_URL);

            // pecah url 
            $url = explode('/', $url);
            return $url;
        }
    }
}