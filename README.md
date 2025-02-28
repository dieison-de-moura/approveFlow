# 🚀 ApproveFlow - API REST para Aprovação de Notas Fiscais

ApproveFlow é uma API REST moderna e escalável, projetada para aprovar ou reprovar notas fiscais de forma eficiente. Construída com **Laravel 11**, **PHP 8.4** e uma arquitetura **clean e modularizada**, esta API segue os princípios de **Clean Code** e **SOLID**, garantindo qualidade, manutenção fácil e expansibilidade.

## 🌟 Destaques
- 🚀 **Desempenho e escalabilidade** com Laravel 11 e PHP 8.4.
- 🏗️ **Arquitetura limpa e modularizada**, facilitando manutenção e expansibilidade.
- 🛠 **Boas práticas de desenvolvimento**: SOLID, Clean Code.
- 🐳 **Docker-ready** para um ambiente de desenvolvimento padronizado.
- 🔄 **Sistema de aprovação e reprovação de notas fiscais**.
- ✅ **Testes automatizados** com PHPUnit garantindo a confiabilidade da API.

## 🎯 Objetivo do Projeto
O principal objetivo deste projeto é aprimorar minhas habilidades em **desenvolvimento de APIs escaláveis e bem estruturadas**, aplicando princípios de boas práticas e padrões arquiteturais modernos.

## 🛠 Tecnologias Utilizadas
- **Laravel 11** - Framework PHP moderno e robusto.
- **PHP 8.4** - Versão mais recente para melhor desempenho.
- **Docker** - Containerização para um ambiente de desenvolvimento consistente.
- **Arquitetura Limpa** - Organização modularizada do sistema.
- **Clean Code & SOLID** - Código limpo e manutenção fácil.
- **PHPUnit** - Framework de testes para garantir a qualidade do código.

## 🚀 Como Rodar o Projeto

### 1️⃣ Clonar o Repositório
```bash
git clone https://github.com/seu-usuario/approveflow.git
cd approveflow
```

### 2️⃣ Subir o ambiente com Docker
```bash
docker compose up -d
```

### 3️⃣ Acessar o container
```bash
docker exec -it approval_app bash
```

### 4️⃣ Executar os comandos dentro do container
```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan db:seed --class="App\Modules\Invoices\Database\Seeders\DatabaseSeeder"
```

### 5️⃣ Executar os testes
```bash
php artisan test
```

## 📖 Documentação da API

### Endpoints

#### 1️⃣ Aprovar uma Nota Fiscal
**Endpoint:** `POST /invoice/approve`

**Parâmetros:**
```json
{
  "id": "uuid"
}
```

**Resposta:**
```json
{
  "data": {},
  "message": "Success",
  "status": 200
}
```

#### 2️⃣ Reprovar uma Nota Fiscal
**Endpoint:** `POST /invoice/reject`

**Parâmetros:**
```json
{
  "id": "uuid"
}
```

**Resposta:**
```json
{
  "data": {},
  "message": "Success",
  "status": 200
}
```

#### 3️⃣ Consultar uma Nota Fiscal
**Endpoint:** `GET /invoice/show/{id}`

**Parâmetros:**
- `id` (UUID): Identificador único da nota fiscal.

**Resposta:**
```json
{
  "data": {
    "invoice_id": "uuid",
    "invoice_number": "12345",
    "invoice_date": "2025-02-28",
    "due_date": "2025-03-15",
    "status": "approved",
    "company": {
      "name": "Company ABC",
      "street_address": "123 Dooley Bridge",
      "city": "Port Marlee",
      "zip_code": "51017-9006",
      "phone": "-",
      "email_address": "todo"
    },
    "products": "todo"
  },
  "message": "Success",
  "status": 200
}
```

---

👨‍💻 Feito por [Dieison de Moura](https://github.com/dieison-de-moura)
