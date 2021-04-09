<?php


class VarJS
{
    public function __construct($name, $array = array(), $script = 'app-js')
    {
        $this->getObject( $script, $name, $array );
    }

    public function getObject($name, $array = array(), $script = 'app-js'){
        wp_localize_script( $script, $name, $array );
    }

    public function getObjects($name, $array = array(), $script = 'app-js'){

        foreach ($array as $key => $value){
            wp_localize_script( $script, $key, $value );
        }

    }

}
