<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductShowResource;
use App\Http\Resources\ProductsIndexResource;
use Illuminate\Http\Request;
use Illuminate\Http\Response as ResponseHttpCode;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\JsonResponse;

class ProductsController extends Controller
{

    public function index(): ProductsIndexResource
    {
        return (new ProductsIndexResource($this->repository->index()));
    }

    public function create(Request $request): JsonResponse {
        $data = $request->only('nome', 'descricao', 'preco', 'quantidade');
        return Response::json (
            (new ProductsIndexResource($this->repository->create($data))),
            ResponseHttpCode::HTTP_CREATED
        );
    }

    public function show(string $id): ProductShowResource
    {
        try {
            return (new ProductShowResource($this->repository->show($id)));
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            abort(ResponseHttpCode::HTTP_NOT_FOUND, 'Produto com ID = ' . $id . ' não encontrado!');
        }
    }

    public function update(Request $request, string $id)
    {
        try {
            $data = $request->only('nome', 'descricao', 'preco', 'quantidade');
            return $this->repository->update($data, $id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            abort(ResponseHttpCode::HTTP_NOT_FOUND, 'Produto com ID = ' . $id . ' não encontrado!');
        }
    }

    public function delete(string $id)
    {
        try {
            return $this->repository->delete($id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            abort(ResponseHttpCode::HTTP_NOT_FOUND, 'Produto com ID = ' . $id . ' não encontrado!');
        }
    }
}
