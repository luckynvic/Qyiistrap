<?php
/**
 * TbListView class file.
 * @author Christoffer Niska <christoffer.niska@gmail.com>
 * @copyright Copyright &copy; Christoffer Niska 2013-
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 * @package bootstrap.widgets
 */

Yii::import('zii.widgets.CListView');

/**
 * Bootstrap Zii list view.
 */
class TbListView extends CListView
{

    /**
     * @var string the CSS class name for the items container. Defaults to 'items'.
     */
    public $itemsCssClass='items';

    /**
     * @var string the CSS class name for the pager container. Defaults to ''.
     */
    public $pagerCssClass = 'pagination-container';
    /**
     * @var array the configuration for the pager.
     * Defaults to <code>array('class'=>'ext.bootstrap.widgets.TbPager')</code>.
     */
    public $pager = array('class' => 'bootstrap.widgets.TbPager');
    /**
     * @var string the URL of the CSS file used by this detail view.
     * Defaults to false, meaning that no CSS will be included.
     */
    public $cssFile = false;
    /**
     * @var string the template to be used to control the layout of various sections in the view.
     */
    public $template = "{items}<div class=\"clearfix\"></div>\n<div class=\"row\"><div class=\"col-md-6\">{pager}</div><div class=\"col-md-6\">{summary}</div></div>";

    /**
     * Renders the empty message when there is no data.
     */
    public function renderEmptyText()
    {
        $emptyText = $this->emptyText === null ? Yii::t('zii', 'No results found.') : $this->emptyText;
        echo TbHtml::tag('div', array('class' => 'empty', 'span' => 12), $emptyText);
    }

    /**
     * Renders the sorter
     */

    public function renderSorter()
    {
    if($this->dataProvider->getItemCount()<=0 || !$this->enableSorting || empty($this->sortableAttributes))
        return;
    echo CHtml::openTag('div',array('class'=>$this->sorterCssClass))."\n";
    echo $this->sorterHeader===null ? Yii::t('zii','Sort by: ') : $this->sorterHeader;
    echo "<ul>\n";
    $sort=$this->dataProvider->getSort();
    foreach($this->sortableAttributes as $name=>$label)
    {
        echo "<li>";
        $labelText=$label;
        if(is_integer($name))
            $labelText=$sort->resolveLabel($label);

        $directions=$sort->getDirections();
        if(isset($directions[$label]))
            $labelText.=' <span class="caret"></span>';
        
        echo $sort->link($label,$labelText);

        echo "</li>\n";
    }
    echo "</ul>";
    echo $this->sorterFooter;
    echo CHtml::closeTag('div');
} 

}
