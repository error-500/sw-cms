<?php

namespace app\modules\sw\widgets\swnav;

use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\base\InvalidConfigException;

class SwNav extends \yii\base\Widget {

    public $items;
    public $options = [];
    protected $_route;

    public function run() {
        $this->_route = explode('?', Yii::$app->request->getUrl())[0];
        return $this->renderItems();
    }

    protected function renderItems() {
        $items = [];
        foreach ($this->items as $i => $item) {
            if (isset($item['visible']) && !$item['visible']) {
                continue;
            }
            $items[] = $this->renderItem($item);
        }

        return Html::tag('ul', implode(PHP_EOL, $items), $this->options);
    }

    public function renderItem($item)
    {
        if (is_string($item)) {
            return $item;
        }
        if (!isset($item['label'])) {
            throw new InvalidConfigException("The 'label' option is required.");
        }
        $label = sprintf('<span> %s </span>', $item['label']);
        $options = ArrayHelper::getValue($item, 'options', []);
        $items = ArrayHelper::getValue($item, 'items', '');
        $url = ArrayHelper::getValue($item, 'url', 'javascript:void(0);');
        $icon = ArrayHelper::getValue($item, 'icon', null);
        $linkOptions = ArrayHelper::getValue($item, 'linkOptions', []);

        if ($icon !== null) {
            $icon = sprintf('<i class="%s"></i>', $icon);
            $a[] = $icon;
        }

        $a[] = $label;

        $active = $this->isActive($url);

        if (!empty($items)) {

            if (!is_array($items)) {
                throw new InvalidConfigException("The 'items' option must be array.");
            }
            
            $items = $this->renderDropdown($items, $item, $active);
        }

        $link = Html::a(implode(' ', $a), $url, $linkOptions);

        if ($active) {
            Html::addCssClass($options, 'active');
        }

        return Html::tag('li', implode('', [$link, $items]), $options);
    }

    protected function renderDropdown($items, $parentItem, &$active)
    {
        foreach ($items as $item) {
            
            if (is_string($item)) {
                $li_pack[] = $item;
                continue;
            }

            if (isset($item['visible']) && !$item['visible']) {
                continue;
            }

            if (!isset($item['label'])) {
                throw new InvalidConfigException("The 'label' option is required.");
            }

            $label = $item['label'];
            $options = ArrayHelper::getValue($item, 'options', []);
            $url = ArrayHelper::getValue($item, 'url', 'javascript:void(0);');
            $liOptions = ArrayHelper::getValue($item, 'liOptions', []);
            $linkOptions = ArrayHelper::getValue($item, 'linkOptions', []);

            $active = $this->isActive($url);
            
            if ($active) {
                Html::addCssClass($liOptions, 'active');
            }

            $link = Html::a($label, $url, $linkOptions);
            $li_pack[] = Html::tag('li', $link, $liOptions);
        }
        
        return Html::tag('ul', implode("\n", $li_pack), $options);
    }

    protected function isActive($url) 
    {
        if (is_array($url) && isset($url[0]) && $url[0] == $this->_route) {
            return true;
        } 
        return false;
    }
}
