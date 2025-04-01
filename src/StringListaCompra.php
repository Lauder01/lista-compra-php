<?php

namespace Deg540\ListaCompraPHP;

class StringListaCompra
{
    private array $listaCompra;

    public function __construct()
    {
        $this->listaCompra = [];
    }

    /**
     * @param string $instruction
     *
     * @return string
     * @throws \InvalidArgumentException
     */
    public function processInstruction(string $instruction): string
    {
        return "";
    }
}