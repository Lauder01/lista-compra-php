<?php

namespace Deg540\ListaCompraPHP\Test;

use Deg540\ListaCompraPHP\StringListaCompra;
use PHPUnit\Framework\TestCase;

class StringListaCompraTest extends TestCase
{
    private StringListaCompra $stringListaCompra;

    protected function setUp(): void
    {
        parent::setUp();
        $this->stringListaCompra = new StringListaCompra();
    }

    /** @test */
    public function devuelve_lista_vacia_al_iniciar()
    {
        $resultado = $this->stringListaCompra->processInstruction("");

        $this->assertEquals("", $resultado);
    }
}