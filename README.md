# Aplicação Web Integrada com Banco de Dados

## Descrição

Este repositório contém o código desenvolvido para a atividade de autoestudo, onde foi implementada uma aplicação web integrada com uma base de dados utilizando os serviços AWS EC2 e RDS. O projeto inclui a criação de uma nova tabela no banco de dados, a implementação de uma página web para gerenciar registros desta tabela, e uma demonstração das máquinas e serviços em execução no console da AWS.

## Passos Realizados

1. **Implementação da Aplicação Web**:
   - Seguindo o tutorial fornecido, foi configurada uma instância EC2 na AWS para hospedar uma aplicação web. Esta aplicação se conecta a uma instância RDS, que gerencia o banco de dados relacional usado pela aplicação.

2. **Criação de Nova Tabela**:
   - No banco de dados RDS, foi criada uma nova tabela com pelo menos 4 campos e 3 tipos de dados diferentes. Esta tabela foi integrada à aplicação web, permitindo o armazenamento de informações específicas.

3. **Página Web para Gerenciamento de Registros**:
   - Uma página web adicional que permite a criação e listagem de registros da nova tabela criada foi desenvolvida. A interface foi implementada em PHP, com formulários para inserção de dados e uma tabela que exibe todos os registros armazenados.

4. **Repositório no GitHub**:
   - Todo o código desenvolvido foi armazenado no GitHub. Este repositório contém o arquivo PHP.

5. **Demonstração em Vídeo**:
   - Foi preparado um vídeo demonstrando as máquinas e serviços em execução no console da AWS. A URL do vídeo está disponível abaixo.

## Estrutura do Repositório

- `ProjectsPage.php`: Página adicional para gerenciar os registros na tabela `PROJECTS`, criada durante a atividade.
- `dbinfo.inc`: Arquivo de configuração contendo as credenciais e o endpoint do banco de dados.
- `README.md`: Documento explicativo sobre o projeto e o conteúdo do repositório.

## Link para o Vídeo

- [Demonstração dos Serviços na AWS](https://youtu.be/8lmxxHXHymU)

## Como Executar

1. Clone o repositório para a sua máquina local.
2. Certifique-se de que as configurações no arquivo `dbinfo.inc` estão corretas e apontam para o seu banco de dados RDS.
3. Suba os arquivos PHP para o servidor EC2 configurado.
4. Acesse a página  `ProjectsPage.php` via navegador para interagir com a aplicação.

