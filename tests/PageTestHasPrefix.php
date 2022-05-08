<?php namespace Tests ; ?>
<?php
trait PageTestHasPrefix {
    protected string $pageRoutePrefix = '';

    protected function pageRoutePrefix() :string {
        return $this->pageRoutePrefix;
    }

    protected function pageRouteGenerateWithPrefix(
        string $pageRoute
    ):string {
        return $this->pageRoutePrefix.$pageRoute;
    }
}
