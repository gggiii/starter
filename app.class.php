<?php
    class App{
        public function __construct() {

            global $db;
            $this->db = $db;

            $modules = scandir('modules');
            array_shift($modules);
            array_shift($modules);
            foreach($modules as $key => $value){
                include('modules/'.$value);
                $module = explode('.',$value)[0];
                $modules[$key] = $module;
                $moduleName = ucfirst($module);
                $this->{$module} =  new $moduleName($this->db);
            }
        }
    }
?>