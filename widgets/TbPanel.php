<?php
/**
 * TbPanel class file.
 * @author Lucky Vic <luckynvic@gmail.com>
 * @copyright Copyright &copy; Lucky Vic 2013
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 * @package bootstrap.widgets
 */

Yii::import('bootstrap.helpers.TbHtml');

/**
 * Bootstrap panel widget.
 */
class TbPanel extends CWidget
{
    /**
     * @var array the HTML options for the view container tag.
     */
    public $htmlOptions = array();

    /**
     * @var string header content
     */
    public $header;

    /**
    * @var string header tag, used for render header text. Set false to render without header tag.
    */
    public $headerTag='h3';

    /**
    * @var array the HTML options for the header title. Only affected if $headerTag != false
    */
    public $titleOptions=array();

    /**
     * @var string body of modal
     */
    public $content;

    /**
     * @var string footer content
     */
    public $footer;

    /**
    * @var string panel color
    */
    public $color=TbHtml::PANEL_COLOR_DEFAULT;


    /**
     * Widget's run method
     */
    public function run()
    {

        $headerOptions['titleOptions']=$this->titleOptions;
        $headerOptions['headerTag']=$this->headerTag;

        $this->htmlOptions['color']=$this->color;
       
        $output = TbHtml::panelHeader($this->header, $headerOptions);
        $output .= TbHtml::panelBody($this->content);
        $output .= TbHtml::panelFooter($this->footer);

        echo TbHtml::panel($output, $this->htmlOptions);

    }


}