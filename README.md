Link Pager Points
===================

![GitHub](https://img.shields.io/github/license/keygenqt/yii2-link-pager-points)
![Packagist Downloads](https://img.shields.io/packagist/dt/keygenqt/yii2-link-pager-points)

LinkPager for yii2 with points

## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either add

```
"require": {
    "keygenqt/yii2-link-pager-points": "*"
}
```

of your `composer.json` file.

## Usage

```php
<?=
    ListView::widget([
        'dataProvider' => $model->search(Yii::$app->request->getQueryParams()),
        'itemView' => 'block/item',
        'layout' => "{items}{pager}",
        'options' => [
            'tag' => 'ul',
            'class' => 'list'
        ],
        'itemOptions' => [
            'tag' => 'li',
        ],
        'pager' => [
            'class' => 'keygenqt\linkPager\LinkPager',
            'maxButtonCount' => 5
        ],
    ]);
?>
```