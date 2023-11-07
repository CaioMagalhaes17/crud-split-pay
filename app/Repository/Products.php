<?php

namespace App\Repository;

use App\Models\Products as ProductsModel;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class Products {

    private ProductsModel $model;

    public function __construct(){
        $this->model = new ProductsModel();
    }

    public function index() : LengthAwarePaginator{
        return $this->model::paginate(5);
    }

    public function create(array $data){
        $this->model->nome = $data['nome'];
        $this->model->descricao = $data['descricao'];
        $this->model->preco = $data['preco']; 
        $this->model->quantidade = $data['quantidade']; 
        $this->model->save();
        return $this->model::paginate(5);
    }

    public function show(string $id): Collection
    {
        $product = $this->model->findOrFail($id);
        return collect($product);
    }

    public function update(array $data, string $id) : void {
        $product = $this->model->findOrFail($id);
        foreach ($data as $key => $value) {
            $product->$key = $value;
            $product->save();
        }
    }

    public function delete(string $id) : void {
       $product = $this->model->findOrFail($id);
       $product->delete();
    }
}