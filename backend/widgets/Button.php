<?php
namespace backend\widgets;

use yii\bootstrap\Button as BaseButton;
use yii\bootstrap\Html;
use yii\helpers\Url;

/**
 * Renders a bootstrap button with links support.
 *
 * For example,
 *
 * ```php
 * echo Button::widget([
 *     'label' => 'Action',
 *     'link' => 'some-link',
 *     'buttonClass' => 'btn-info',
 * ]);
 * ```
 * @see http://getbootstrap.com/javascript/#buttons
 */
class Button extends BaseButton
{
    const ICON_ADD = 'glyphicon glyphicon-plus';

    /**
     * @var string | null
     */
    public $link;

    /**
     * @var string | null
     */
    public $buttonClass = 'default';

    /**
     * @var string | null
     */
    public $iconClass;

    /**
     * @inheritdoc
     */
    public $encodeLabel = false;

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        if ($this->link) {
            $this->tagName = 'a';
            $this->options['href'] = Url::to($this->link);
        }
        if ($this->buttonClass) {
            Html::addCssClass($this->options, 'btn-'.$this->buttonClass);
        }
        if ($this->iconClass) {
            $this->label = Html::tag('span', '', [
                'class' => $this->iconClass,
            ]) . ' ' . $this->label;
        }
    }
}
