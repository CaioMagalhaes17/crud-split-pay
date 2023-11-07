<?php

namespace Tests;

use App\Models\Products;

class ProductTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testeCriarProduto()
    {
        $data = [
            'nome' => 'Produto de Teste',
            'preco' => 10.99,
            'descricao' => 'Produto de Teste',
            'quantidade' => 300
        ];

        $response = $this->json('POST', '/api/produtos', $data);
        $response->assertEquals(201, $this->response->status());

        $data = [
            'nome' => 'Produto de Teste',
            'preco' => 10.99,
            'descricao' => 'Produto de Teste'
        ];

        $response = $this->json('POST', '/api/produtos', $data);
        $response->assertEquals(500, $this->response->status());
    }

    public function testeAtualizarProduto()
    {
        $produto = Products::first();
        $data = [
            'nome' => 'Produto Atualizado',
            'preco' => 15.99,
        ];

        $response = $this->json('PUT', '/api/produtos/' . $produto->id, $data);
        $response->assertEquals(200, $this->response->status());
    }

    public function testeDeletarProduto()
    {
        $produto = Products::first();

        $response = $this->json('DELETE', '/api/produtos/' . $produto->id);
        $response->assertEquals(200, $this->response->status());
    }

    public function testeListarTodosProdutos()
    {
        $response = $this->json('GET', '/api/produtos');
        $response->assertEquals(200, $this->response->status());
    }

    public function testeListarProduto()
    {
        $produto = Products::first();

        $response = $this->json('GET', '/api/produtos/' . $produto->id);
        $response->assertEquals(200, $this->response->status());
    }
}
