yii_ddslick
===========

Yii Framework extension for ddSlick

http://designwithpc.com/Plugins/ddSlick

##Setup the extension in your project:
Copy the contents into the folder project/extensions/ddslick

##Example usage in project

```
// Set up the data for the ddSlick element
$data = array(
    array(        
        'text'=>'Facebook',
        'value'=>1,
        'selected'=>false,
        'description'=>'Description with Facebook',
        'imageSrc'=>'http://dl.dropbox.com/u/40036711/Images/facebook-icon-32.png'
    ),
    array(
        'text'=>'Twitter',
        'value'=>2,
        'selected'=>false,
        'description'=>'Description with Twitter',
        'imageSrc'=>'http://dl.dropbox.com/u/40036711/Images/twitter-icon-32.png'        
    )
);
   
// Set up options
$options = array(
    'imagePosition'=>'right'
);

// Call the widget
$this->widget('ext.ddslick.Ddslick', array('id'=>'test_ddslick', 'data'=>$data, 'options'=>$options));
```
