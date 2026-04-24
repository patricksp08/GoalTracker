# 🚀 GoalTracker

Sistema web para gerenciamento de metas pessoais, desenvolvido com Laravel 12.

---

## 📌 Sobre o projeto

O GoalTracker é uma aplicação que permite ao usuário:

* Criar, editar e excluir metas
* Acompanhar o progresso das metas
* Marcar metas como concluídas ou pendentes
* Visualizar estatísticas no dashboard
* Gerenciar perfil com upload de imagem

O projeto foi desenvolvido seguindo boas práticas de organização de código, utilizando conceitos como Service Layer, validação com FormRequest e Policies para controle de acesso.

---

## 🛠️ Tecnologias utilizadas

* PHP 8
* Laravel 12
* Blade
* Bootstrap 5
* JavaScript / jQuery
* DataTables
* MySQL

---

## ⚙️ Funcionalidades

### 🔐 Autenticação

* Login e logout
* Proteção de rotas com middleware

### 👤 Usuários

* CRUD completo
* Upload e preview de imagem de perfil
* Edição de perfil

### 🎯 Metas

* CRUD de metas
* Associação com usuário autenticado
* Marcar como concluída / pendente com 1 clique
* Identificação de metas atrasadas
* Ordenação por prioridade

### 📊 Dashboard

* Total de metas
* Metas concluídas
* Metas pendentes
* Barra de progresso

### 🔒 Segurança

* Policies para garantir que usuários só acessem seus próprios dados

---

## 📂 Estrutura do projeto

* **Controllers** → controle de fluxo
* **Services** → regras de negócio
* **Requests** → validação de dados
* **Policies** → controle de acesso
* **Models** → acesso ao banco

---

## ▶️ Como rodar o projeto

### 1. Clonar repositório

```bash
git clone https://github.com/seu-usuario/goal-tracker.git
cd goal-tracker
```

---

### 2. Instalar dependências

```bash
composer install
```

---

### 3. Configurar ambiente

Copie o arquivo `.env.example`:

```bash
cp .env.example .env
```

Configure o banco de dados no `.env`:

```env
DB_CONNECTION=mysql
DB_DATABASE=nome_do_banco
DB_USERNAME=root
DB_PASSWORD=
```

---

### 4. Gerar chave da aplicação

```bash
php artisan key:generate
```

---

### 5. Rodar migrations

```bash
php artisan migrate
```

---

### 6. Criar link do storage

```bash
php artisan storage:link
```

---

### 7. Rodar o projeto

```bash
php artisan serve
```

Acesse em:
👉 http://127.0.0.1:8000

---

## 📷 Demonstração

<img width="1306" height="525" alt="image" src="https://github.com/user-attachments/assets/3c47a863-252a-4826-9825-8f41638d5ea7" />
<br>
<img width="1304" height="456" alt="image" src="https://github.com/user-attachments/assets/73403eac-df61-443d-b221-0d52c28dcd6a" />

---

## 🧪 Testes Automatizados

O projeto possui testes automatizados para garantir o funcionamento das principais funcionalidades, como:

* Autenticação de usuários
* Atualização de perfil
* Upload de imagem de perfil
* CRUD de metas
* Regras de autorização (Policies)

### ▶️ Como rodar os testes

Execute o comando:

```bash
php artisan test
```

Ou, se preferir mais detalhes:

```bash
php artisan test -v
```

---

### 📌 Exemplos de testes implementados

* ✔ Usuário autenticado pode acessar suas metas
* ✔ Usuário não pode acessar metas de outros usuários
* ✔ Usuário pode atualizar seu perfil
* ✔ Upload de imagem de perfil funciona corretamente
* ✔ Usuário não pode editar/deletar dados de outro usuário

---

### 🧰 Tecnologias utilizadas nos testes

* PHPUnit (nativo do Laravel)
* Factories para geração de dados
* RefreshDatabase para isolamento dos testes
* Storage::fake para simulação de upload de arquivos

---

### 📊 Cobertura

Os testes cobrem os fluxos principais da aplicação, garantindo:

* Integridade dos dados
* Segurança de acesso
* Funcionamento das regras de negócio

---

💡 Para executar um teste específico:

```bash
php artisan test --filter=NomeDoTeste
```

---

## 👨‍💻 Autor

Desenvolvido por Patrick

---

## 📄 Licença

Este projeto está sob a licença MIT.
