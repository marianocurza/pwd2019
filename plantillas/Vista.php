<?php

namespace app;

class Vista
{
    private $archivo;
    private $variables;
    
    public function __construct(string $archivo, array $variables)
    {
        $this->archivo = $archivo;
        $this->variables = $variables;
    }
    
    public function render(): string
    {
        ob_start();
        ob_implicit_flush(false);
        extract($this->variables, EXTR_OVERWRITE);
        require $this->archivo;
        $contenido = ob_get_clean();
        return $contenido;
    }
    
}