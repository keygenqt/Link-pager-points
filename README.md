yii2-link-pager-points
===================

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

## Latest Release

The latest version of the module is v0.5.0 `BETA`.

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

## License

**yii2-link-pager-points** is released under the BSD 3-Clause License. See the bundled `LICENSE.md` for details.


