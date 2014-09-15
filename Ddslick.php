<?php

/**
 * Extension for Yii Framework v1.1.* for jQuery plugin ddSlick
 * http://designwithpc.com/Plugins/ddSlick
 * 
 * 
 */
class Ddslick extends CWidget {
    
    /**
     * The ID of the element to convert to ddSlick element
     * @var string
     */
    public $id;
        
    /**
     * The data to show in dropdown (ddslick)
     * @var array
     */
    public $data;
    
    /**
     * Options for the plugin. Please note that the data part is put in 
     * the data attribute.
     * @var array
     */
    public $options = array();
    
    /**
     * Initialize the extension
     */
    public function init() {
        $cs = Yii::app()->getClientScript();
        $assets = Yii::app()->getAssetManager()->publish(dirname(__FILE__) . '/assets');
        $cs->registerScriptFile($assets . '/jquery.ddslick.min.js');        
    }
    
    /**
     * Run the extension
     */
    public function run() {
        $this->options['data'] = $this->data;  // Add data to the options
        $json = json_encode($this->options);   // Make JSON representation of the options

        // Set up javascript for the ddslick setup
        $js = '<script type="text/javascript">';                
        $js .= "$(\"#{$this->id}\").ddslick($json);";
        $js .= '</script>';
               
        // Output the container first and then the javscript
        echo "<div id=\"{$this->id}\"></div>";
        echo $js;
    }
}
