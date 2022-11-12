<?php
namespace Sandbox;

class View {

    public function __construct(
        public string $requested_view,
    ) {}
    

    public function render() {
        /* Load the template from the requested view. */
        ob_start();
        require BASE . "/src/Sandbox/Templates/{$this->requested_view}.php";
        echo ob_get_clean();
    }
}