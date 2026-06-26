# Deploy no Coolify

Este projecto está configurado para ser deployado no [Coolify](https://coolify.io) usando o Dockerfile incluído.

## Requisitos

- Coolify v4 ou superior
- Acesso a um servidor com Docker instalado

## Como fazer deploy

### 1. Criar uma nova aplicação no Coolify

1. Acede ao teu painel do Coolify
2. Clica em **New Resource** → **Private Repository** (ou Public Repository)
3. Indica a URL do repositório Git
4. Selecciona o branch principal (`main` ou `master`)
5. Em **Build Pack** escolhe **Dockerfile**
6. Confirma que o **Dockerfile Path** está como `./Dockerfile`

### 2. Configurar variáveis de ambiente

Adiciona as seguintes variáveis de ambiente na secção **Environment Variables** do Coolify:

| Variável | Descrição | Exemplo |
|----------|-----------|---------|
| `APP_NAME` | Nome da aplicação | `JIMAS` |
| `APP_KEY` | Chave da aplicação Laravel | `base64:...` |
| `APP_URL` | URL pública do domínio | `https://jimas.ao` |
| `APP_DEBUG` | Modo debug | `false` |
| `APP_LOCALE` | Idioma | `pt` |
| `LOG_CHANNEL` | Canal de logs | `stderr` |
| `MAIL_MAILER` | Driver de email | `smtp` |
| `MAIL_HOST` | Servidor SMTP | `smtp.mailgun.org` |
| `MAIL_PORT` | Porta SMTP | `587` |
| `MAIL_USERNAME` | Utilizador SMTP | `postmaster@...` |
| `MAIL_PASSWORD` | Password SMTP | `...` |
| `MAIL_FROM_ADDRESS` | Email do remetente | `geral@jimas.ao` |
| `MAIL_FROM_NAME` | Nome do remetente | `JIMAS` |

> **Importante:** Gera o `APP_KEY` com o comando `php artisan key:generate --show` e coloca o valor no Coolify.

### 3. Porta exposta

O container expõe a porta `80`. No Coolify, configura o **Port** para `80`.

### 4. Volumes persistentes (recomendado)

Para manter a base de dados SQLite e os ficheiros de storage entre deploys, adiciona volumes no Coolify:

- `/var/www/html/database` — base de dados SQLite
- `/var/www/html/storage` — uploads e logs

### 5. Deploy

Clica em **Deploy** e aguarda o build. O entrypoint executa automaticamente:

- `php artisan config:cache`
- `php artisan route:cache`
- `php artisan view:cache`
- `php artisan event:cache`
- `php artisan migrate --force`

## Usar Docker Compose no Coolify

Alternativamente, podes seleccionar **Docker Compose** como build pack e usar o ficheiro `docker-compose.yml` incluído.

## Health Check

O Dockerfile inclui um health check que verifica a rota `/up` do Laravel.
