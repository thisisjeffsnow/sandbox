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
        ob_start();
        include __DIR__ . "/templates/{$this->templateName}.php";
        $template = ob_get_clean();
        ob_start();
        include __DIR__ . "/contents/{$this->contentName}.php";
        $content = ob_get_clean();
        echo str_replace("{{content}}", $content, $template);
    }
}
