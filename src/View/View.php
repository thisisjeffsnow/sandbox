<?php

namespace Sandbox\View;

class View
{
    public function __construct(
        private string $templateName,
        private string $contentName
    ) {
    }

    public function render(array $params = [])
    {
        echo "<pre>";
        echo "Params:\n";
        var_dump($params);
        echo "\n";
        echo "Template Name: $this->templateName\n";
        echo "Content Name: $this->contentName\n";
    }
}
