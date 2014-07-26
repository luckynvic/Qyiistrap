#Yiistrap Bootstrap 3

Twitter Bootstrap 3 for Yii.

This extension developed base on yiistrap RC 1.1.1 (https://github.com/Crisu83/yiistrap).

Documentation can found [http://www.getyiistrap.com](http://www.getyiistrap.com)

## Development Status
Alpha


## Config
config/main
```
...
'components'=>array(
	'bootstrap'=>array(
				'class'=>'bootstrap.components.TbApi',
				'iconVendor'=>'fa',
			),
...
)
```

## Usage
* Using another icon vendor, eg : font-awsome;
** Widget automatically using icon options from config. You need not to write another options.

** static function
 ```
echo TbHtml::icon('gears',Yii::app()->bootstrap->iconOptions);
echo TbHtml::linkButton('Submit', array(
	'url'=>array('/site/index'),
	'icon'=>'home',
	'iconOptions'=>Yii::app()->bootstrap->iconOptions,
));
 ```