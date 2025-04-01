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
    public function givenNewListReturnEmptyList()
    {
        $resultado = $this->stringListaCompra->processInstruction("");

        $this->assertEquals("", $resultado);
    }

    /** @test */
    public function givenNewItemReturnListWithNewItemIncluded()
    {
        $resultado = $this->stringListaCompra->processInstruction("añadir pan");

        $this->assertEquals("pan x1", $resultado);
    }

    /** @test */
    public function givenNonExistingItemReturnErrorMessage()
    {
        $resultado = $this->stringListaCompra->processInstruction("eliminar leche");

        $this->assertEquals("El producto seleccionado no existe", $resultado);
    }
}