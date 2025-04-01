<?php

namespace Deg540\ListaCompraPHP;

class StringListaCompra
{
    private array $listaCompra;

    // TODO: Prueba lista de la compra

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
        $parts = explode(" ", strtolower($instruction));
        $action = $parts[0];

        if ($action === "añadir") {
            $product = $parts[1];
            $quantity = $parts[2] ?? 1;

            $this->addProduct($product, (int)$quantity);

            return $this->formatList();
        }

        return "";
    }

    /**
     * Añade un producto a la lista de la compra.
     *
     * @param string $product
     * @param int $quantity
     */

    private function addProduct(string $product, int $quantity): void
    {
        if (!isset($this->listaCompra[$product])) {
            $this->listaCompra[$product] = 0;
        }

        $this->listaCompra[$product] += $quantity;

        // Ordenar alfabéticamente
        ksort($this->listaCompra);
    }

    /**
     * Formatea la lista de la compra como un string.
     *
     * @return string
     */

    private function formatList(): string
    {
        $formatted = [];
        foreach ($this->listaCompra as $product => $quantity) {
            $formatted[] = "$product x$quantity";
        }
        return implode(", ", $formatted);
    }
}