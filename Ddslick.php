<?php

/**
 * Extension for Yii Framework v1.1.* for jQuery plugin ddSlick
 * http://designwithpc.com/Plugins/ddSlick
 * 
 * This extension has had the ddslick script edited to fix a bug where select
 * element does not submit the value. Take a look at the fix description from user 
 * Bonjiro:
 * http://stackoverflow.com/questions/11453578/ddslick-select-options-wonst-post-value-of-selected-option-jquery-plugin
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
     * Using select element instead of div?
     * @var boolean
     */
    public $select = true;
    
    /**
     * Options for the plugin. Please note that the data part is put in 
     * the data attribute.
     * @var array
     */
    public $options = array();
    
    /**
     * If element type is select, then this attribute specifies the name
     * of that element. If not set, then defaults to the same as id.
     * @var string
     */
    public $name;
    
    /**
     * Initialize the extension
     */
    public function init() {
        $cs = Yii::app()->getClientScript();
        $assets = Yii::app()->getAssetManager()->publish(dirname(__FILE__) . '/assets');
        
        // Using the modified non-minified script because of the bugfix introduced into it
        //$cs->registerScriptFile($assets . '/jquery.ddslick.min.js');        
        $cs->registerScriptFile($assets . '/jquery.ddslick.js');
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

        if ($this->select) {
            if (is_null($this->name)) { $this->name = $this->id; } // if name not given
            echo "<select id=\"{$this->id}\" name=\"$this->name\"></select>";
        }
        else {
            // Output the container first and then the javscript
            echo "<div id=\"{$this->id}\" name=\"{$this->id}\"></div>";                
        }
        echo $js;
    }
}
