<?php
    class App{
        protected $db;
        public $language;
        private $languages;
        public function __construct($db) {

            $this->language= 'en';
            $this->languages = array('en','sk');
            
            
            
            $this->db = $db;
            
            $modules = scandir('modules');
            array_shift($modules);
            array_shift($modules);
            foreach($modules as $key => $value){
                include('modules/'.$value);
                $module = explode('.',$value)[0];
                $modules[$key] = $module;
                $moduleName = ucfirst($module);
                $this->{$module} =  new $moduleName();
            }
        }

        public function setLanguage(string $l){
            if(in_array($l, $this->languages)){
                $this->language = $l;
                return true;
            }else{
                return false;
            }
             
        }
        
    }
?>