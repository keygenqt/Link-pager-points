<?php

namespace keygenqt\linkPager;

use yii\helpers\Html;

class LinkPager extends \yii\widgets\LinkPager
{
    public $nextPageLabel = true;
    public $prevPageLabel = true;
    public $maxButtonCount = 10;

    public function init()
    {
        ActiveAssets::register($this->getView());
        parent::init();
    }

    protected function renderPageButtons()
    {
        $next = 0;
        $pageCount = $this->pagination->getPageCount();

        if ($pageCount < 2 && $this->hideOnSinglePage) {
            return '';
        }

        $buttons = [];
        $points = false;
        $currentPage = $this->pagination->getPage();
        list($beginPage, $endPage) = $this->getPageRange();

        if ($this->nextPageLabel) {
            if (!$currentPage) {
                $buttons[] = Html::tag('li', '<label>Previous</label>', ['class' => $this->prevPageCssClass]);
            } else {
                $buttons[] = $this->renderPageButton('Previous', $currentPage - 1, $this->prevPageCssClass, false, false);
            }
        }

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

        if ($this->nextPageLabel) {
            if ($currentPage + 1 == $pageCount) {
                $buttons[] = Html::tag('li', '<label>Next</label>', ['class' => $this->nextPageCssClass]);
            } else {
                $buttons[] = $this->renderPageButton('Next', $currentPage + 1, $this->nextPageCssClass, false, false);
            }
        }

        return Html::tag('ul', implode("\n", $buttons), $this->options);
    }
}