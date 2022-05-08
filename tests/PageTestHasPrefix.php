<?php namespace Tests ; ?>
<?php
trait PageTestHasPrefix {
    protected string $pageRoutePrefix = '';

    protected function pageRoutePrefix() :string {
        return $this->pageRoutePrefix;
    }
}
