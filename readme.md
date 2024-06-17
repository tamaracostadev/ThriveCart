** ThriveCart Test

Shopping Basket Project
This project was developed using PHP 8.1 with object-oriented programming to implement a shopping basket that calculates the total cost of products, applying delivery rules and special offers.

Project Structure
Files and Folders
index.php: Main file that initializes the application, manages sessions, and renders the user interface.
App/Basket.php: Class that manages items in the basket, applies special offers, and calculates the total cost, including delivery costs.
App/DeliveryCosts.php: Class that calculates delivery costs based on provided rules.
autoload.php: File that defines an autoload function to automatically load necessary classes.
Configuration
The configuration parameters (Product Catalogue, Delivery Charge Rules, and Offers) are passed at the beginning of index.php to simplify the project and allow easy modification of values.

Classes Used
Basket
Responsible for managing items in the basket, applying special offers, and calculating the total cost.

Methods
__construct(array $productCatalogue, array $offers, DeliveryCosts $deliveryCosts): Initializes the basket with a product catalog, offers, and a delivery costs object.
addItem(string $productCode): Adds an item to the basket.
getProductCatalogue(): Returns the product catalog.
total(): Calculates and returns the total cost of the basket, applying delivery rules and offers.


DeliveryCosts
Responsible for calculating delivery costs based on provided rules.

Methods
__construct(array $deliveryChargeRules): Initializes the class with delivery charge rules.
calculate(float $orderPrice): Calculates the delivery cost based on the total order price.
Features
Adding products to the basket.
Calculating the total cost considering delivery rules and special offers.
Clearing the basket to facilitate testing.
Rules Details
Delivery Rules
Orders below $50 have a delivery cost of $4.95.
Orders below $90 have a delivery cost of $2.95.
Orders of $90 or more have free delivery.
Special Offers
"Buy one red widget, get the second half price".
Rounding Considerations
Regarding the total function in the Basket class, the floor function was added to round the cent value down, since the second test, for example, would return $54.375, which rounds to $54.38 and not to $54.37.

Interface
The interface was built using Bootstrap to facilitate user interaction and visualization.

Example Usage
To add a product to the basket, simply click the "Add to Basket" button next to the desired product. The total cost will automatically update, considering the applicable delivery rules and offers.

Project Initialization
Clone this repository.
Ensure PHP 8.1 is installed in your environment.
Start a local web server pointing to the project directory.
Access the project via a web browser.
shell
Copiar código
git clone <repository_url>
cd <project_directory>
php -S localhost:8000
Open your browser and access http://localhost:8000 to see the application in action.


PT-BR
Shopping Basket Project
Este projeto foi desenvolvido utilizando PHP 8.1 com orientação a objetos para implementar uma cesta de compras que calcula o custo total de produtos, aplicando regras de entrega e ofertas especiais.

Estrutura do Projeto
Arquivos e Pastas
index.php: Arquivo principal que inicializa a aplicação, gerencia as sessões e renderiza a interface do usuário.
App/Basket.php: Classe que gerencia os itens no carrinho, aplica ofertas especiais e calcula o custo total, incluindo os custos de entrega.
App/DeliveryCosts.php: Classe que calcula os custos de entrega com base nas regras fornecidas.
autoload.php: Arquivo que define uma função autoload para carregar automaticamente as classes necessárias.
Configuração
Os parâmetros de configuração (Product Catalogue, Delivery Charge Rules and Offers) foram passados no início do index.php para simplificar o projeto e, ao mesmo tempo, permitir que os valores pudessem ser alterados sem dificuldade.

Classes Utilizadas
Basket
Responsável por gerenciar os itens no carrinho, aplicar ofertas especiais e calcular o custo total.

Métodos
__construct(array $productCatalogue, array $offers, DeliveryCosts $deliveryCosts): Inicializa a cesta com um catálogo de produtos, ofertas e um objeto de custos de entrega.
addItem(string $productCode): Adiciona um item ao carrinho.
getProductCatalogue(): Retorna o catálogo de produtos.
total(): Calcula e retorna o custo total do carrinho, aplicando as regras de entrega e ofertas.
DeliveryCosts
Responsável por calcular os custos de entrega com base nas regras fornecidas.

Métodos
__construct(array $deliveryChargeRules): Inicializa a classe com as regras de cobrança de entrega.
calculate(float $orderPrice): Calcula o custo de entrega com base no preço total do pedido.
Funcionalidades
Adição de produtos ao carrinho.
Cálculo do custo total considerando regras de entrega e ofertas especiais.
Limpeza do carrinho para facilitar os testes.
Detalhes das Regras
Regras de Entrega
Pedidos abaixo de $50 têm um custo de entrega de $4.95.
Pedidos abaixo de $90 têm um custo de entrega de $2.95.
Pedidos de $90 ou mais têm entrega gratuita.
Ofertas Especiais
"Compre um widget vermelho, leve o segundo pela metade do preço".
Considerações de Arredondamento
Com relação à função total da classe Basket, foi adicionada a função floor para arredondar o centavo para baixo, visto que o segundo teste, por exemplo, retornaria $54.375, que é arredondado para $54.38 e não para $54.37.

Interface
A interface foi construída usando Bootstrap para facilitar a visualização e a interação do usuário com a aplicação.

Exemplo de Uso
Para adicionar um produto ao carrinho, basta clicar no botão "Add to Basket" ao lado do produto desejado. O custo total será atualizado automaticamente considerando as regras de entrega e ofertas aplicáveis.

Inicialização do Projeto
Clone este repositório.
Certifique-se de que o PHP 8.1 está instalado em seu ambiente.
Inicie um servidor web local apontando para o diretório do projeto.
Acesse o projeto via navegador web.
shell
Copiar código
git clone <url_do_repositorio>
cd <diretorio_do_projeto>
php -S localhost:8000
Abra o navegador e acesse http://localhost:8000 para ver a aplicação em funcionamento.

Licença
Este projeto está licenciado sob a licença MIT. Veja o arquivo LICENSE para mais detalhes.