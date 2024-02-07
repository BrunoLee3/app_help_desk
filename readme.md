# App Help Desk

## Projeto Help Desk do curso Udemy Desenvolvimento Web Completo
Aplicação web desenvolvida em PHP  para registro e controle de chamados Help Desk, com a finalidade 
de aprender e praticar conhecimento da linguagem PHP e suas aplicações do dia-a-dia. Esta aplicação
registra chamados feitos pelo usuário e os apresentam para o suporte. 

O envio de dados pelo lado do cliente são enviados ao servidor por método POST, enquanto o servidor 
cria uma sessão única do usuário para compartilhar scripts de segurança em todas as páginas da aplicação. 
Para armazenar os chamados, foi criado um arquivo .txt que é manipulado e recuperado por meio de funções
PHP em todas suas instâncias.


---

## conceitos e recursos utilizados durante o projeto:
- Protocolo HTTP
- Métodos GET/POST
- Autenticação de usuário
- Controle de perfis administrativo e usuário
- Proteção de rotas com SESSION
- incorporação de scripts com include e require
- logoff com session_destroy ou unset
- manipulação de arquivos em PHP

> Utilizei pacote XAMPP para acessar a aplicação em Local Host.