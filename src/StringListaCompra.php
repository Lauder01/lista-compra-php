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

        if ($action === "añadir")
        {
            $item = $parts[1];
            $quantity = $parts[2] ?? 1;

            $this->addItem($item, (int)$quantity);

            return $this->formatList();
        }

        if ($action === "eliminar")
        {
            $item = $parts[1];

            return $this->removeItem($item);
        }

        return "";
    }

    /**
     * Añade un producto a la lista de la compra.
     *
     * @param string $item
     * @param int $quantity
     */

    private function addItem(string $item, int $quantity): void
    {
        if (!isset($this->listaCompra[$item]))
        {
            $this->listaCompra[$item] = 0;
        }

        $this->listaCompra[$item] += $quantity;

        // Ordenar alfabéticamente
        ksort($this->listaCompra);
    }

    /**
     * Elimina un producto de la lista de la compra.
     *
     * @param string $item
     */

     private function removeItem(string $item): string
     {
        if (!isset($this->listaCompra[$item])) {
            return "El producto seleccionado no existe";
        }

        unset($this->listaCompra[$item]);
    
        return $this->formatList();
    }

    /**
     * Formatea la lista de la compra como un string.
     *
     * @return string
     */

    private function formatList(): string
    {
        $formatted = [];
        foreach ($this->listaCompra as $item => $quantity)
        {
            $formatted[] = "$item x$quantity";
        }
        return implode(", ", $formatted);
    }
}