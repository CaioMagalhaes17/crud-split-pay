# Crud para Produtos

# Iniciando o web-server
    php -S localhost:8000 -t public

# Rotas
    Criar Produto -> POST /api/produto
    Retornar todos produtos -> GET /api/produto
    Retornar um produto -> GET /api/produto/{id do produto}
    Editar um produto -> PUT /api/produto/{id do produto}
    Deletar um produto -> DELETE /api/produto/{id do produto}
 
# Banco
    Substituir:
        DB_CONNECTION=mysql
        DB_HOST=127.0.0.1
        DB_PORT=3306
        DB_DATABASE=homestead
        DB_USERNAME=homestead
        DB_PASSWORD=secret
    no .env para os dados reais do banco de dados.
    
    Criar tabela produto -> php artisan migrate
    Popular tabela produto -> php artisan db:seed --class=ProductsSeeder
