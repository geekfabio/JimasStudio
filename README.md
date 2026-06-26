# JIMAS Marketing e Comunicação

Site institucional completo da **JIMAS Marketing e Comunicação**, com painel administrativo para gestão de conteúdos dinâmicos.

## Stack

- [Laravel 12](https://laravel.com)
- [Tailwind CSS v4](https://tailwindcss.com)
- [Vite](https://vitejs.dev)
- SQLite (desenvolvimento local)
- [Trix Editor](https://trix-editor.org/) (rich text no painel admin)

## Requisitos

- PHP >= 8.2
- Composer
- Node.js >= 20

## Instalação

```bash
# Instalar dependências PHP
composer install

# Instalar dependências Node
npm install

# Criar ficheiro de ambiente
cp .env.example .env
php artisan key:generate

# Criar base de dados SQLite
touch database/database.sqlite

# Executar migrations e seeders
php artisan migrate:fresh --seed

# Criar link simbólico para uploads
php artisan storage:link

# Compilar assets
npm run build
```

## Desenvolvimento

```bash
# Iniciar servidor de desenvolvimento
php artisan serve

# Em outro terminal, compilar assets em watch mode
npm run dev
```

Aceda a http://127.0.0.1:8000

## Credenciais do painel administrativo

- URL: `/admin/login`
- Email: `admin@jimas.ao`
- Palavra-passe: `jimas2026`

## Rotas Públicas

- `/` — Página inicial (home)
- `/empresa/sobre-nos` — Página institucional (sobre nós / empresa)
- `/servicos` — Tabela de serviços, estúdios e salas
- `/portfolio` — Portfólio de projectos
- `/portfolio/{slug}` — Detalhe de um projecto
- `/noticias` — Listagem de notícias
- `/noticias/{slug}` — Detalhe de uma notícia
- `/contactos` — Página de contactos com formulário

## Painel Administrativo

Aceda a `/admin/login` e utilize as credenciais acima. O painel permite gerir:

- **Configurações** — WhatsApp, email, telefone, endereço, redes sociais, texto da home.
- **Serviços** — Categorias e planos de serviços existentes.
- **Notícias** — Criar, editar e publicar notícias com editor rich text (Trix).
- **Portfólio** — Adicionar projectos, clientes e galerias de imagens.
- **Contactos** — Mensagens recebidas através do formulário do site.
- **Páginas** — Páginas institucionais editáveis com rich text.

## Estrutura de dados

- `users` — utilizadores (com flag `is_admin`)
- `site_settings` — configurações chave-valor (WhatsApp, contactos, etc.)
- `pages` — páginas institucionais (sobre nós, empresa)
- `news` — notícias
- `events` — eventos
- `portfolio_items` — projectos do portfólio
- `service_categories` — categorias de serviços
- `service_plans` — planos/pacotes
- `plan_features` — funcionalidades dos planos
- `sub_categories` — grupos de planos
- `addons` — serviços adicionais
- `contacts` — mensagens do formulário de contactos

## Helpers úteis

- `setting($key, $default = null)` — lê uma configuração do `SiteSetting`.
- `whatsapp_url($message = '')` — gera link do WhatsApp com o número configurado.

## Deploy

1. Configure as variáveis de ambiente no servidor (`.env`).
2. Execute `composer install --no-dev --optimize-autoloader`.
3. Execute `npm ci && npm run build`.
4. Execute `php artisan migrate --force`.
5. Execute `php artisan storage:link`.
6. Configure o document root para a pasta `public/`.

## Licença

Propriedade da JIMAS Marketing e Comunicação.
