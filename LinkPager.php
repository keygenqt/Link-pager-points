<?php

namespace keygenqt\linkPager;

use yii\helpers\Html;

class LinkPager extends \yii\widgets\LinkPager
{
    public $nextPageLabel = false;
    public $prevPageLabel = false;
    public $maxButtonCount = 10;

    protected function renderPageButtons()
    {
        $pageCount = $this->pagination->getPageCount();

        if ($pageCount < 2 && $this->hideOnSinglePage) {
            return '';
        }

        $buttons = [];
        $points = false;
        $currentPage = $this->pagination->getPage();
        list($beginPage, $endPage) = $this->getPageRange();

        if ($beginPage > 0) {
            $points = true;
            $buttons[] = $this->renderPageButton(1, 0, $this->firstPageCssClass, false, $currentPage == 0);
        }

        for ($i = $beginPage; $i < $endPage; ++$i) {
            if ($points) {
                $points = false;
                $buttons[] = Html::tag('li', '<label>...</label>', ['class' => 'point']);
                continue;
            }
            $buttons[] = $this->renderPageButton($i + 1, $i, null, false, $i == $currentPage);
        }

        if ($endPage + 1 !== $pageCount) {
            $buttons[] = Html::tag('li', '<label>...</label>', ['class' => 'point']);
        }

        $buttons[] = $this->renderPageButton($pageCount, $pageCount - 1, $this->lastPageCssClass, false, $currentPage + 1 == $pageCount);

        return Html::tag('ul', implode("\n", $buttons), $this->options);
    }
}