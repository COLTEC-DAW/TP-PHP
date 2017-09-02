# Desenvolvimento de Aplicações Web

**Data de Apresentação: 24/08/2017**

**Grupo: Três alunos**

**Valor: 17 pontos**

## Desenvolvimento de um Sistema de Informação

A web abriu um nova forma de interação entre as pessoas. Entre suas características, a web se destaca por sua alta escalabilidade e acessibilidade. Não há nenhuma outra plataforma tecnológica no mundo que permite a interação entre seus usuários nos moldes como acontece na web. Tal estrutura permitiu que a sociedade, de forma autônoma, se engajasse em torno de causas importantes porém relegados por seus representantes, tais como: mobilidade urbana, assistência social, organização e promoção de eventos, etc.

Este trabalho tem como objetivo mostrar ao aluno que os conhecimentos adquiridos na disciplina de Desenvolvimento de Aplicações Web podem ser utilizados em pról de tais causas. Mais especificamente, espera-se que através deste trabalho o aluno identifique um problema real vivenciado por ele e proponha uma solução para este problema envolvendo o desenvolvimento de um sistema web.

## Temas de Trabalho

Segue abaixo uma lista de possíveis temas de trabalho:

* Mobilidade urbana (sistemas de carona, compartilhamento de transportes, etc.) - **Gustavo, Paulo e Raul**: *Uber + Sedex*
* Organização e promoção de eventos (Bilheteria, portal de eventos, etc.) - **Francisco, Victor e Ping**: *Organizador de mesas de RPG*
* Educação & Aprendizado (Plataformas de aprendizado) - **Bruzzi, Matheus e Eduardo:** *Sistema de aulas particulares*
* Causas sociais (Plataformas para gestão de doações)

É importante ressaltar que essa lista é **sugestiva**. Isto é, o grupo pode selecionar uma proposta fora da lista descrita acima.

## Restrições

Independentemente do tema escolhido pelo grupo, seu trabalho deverá cumprir **obrigatóriamente** as seguintes restrições:

1. **Sistema de identificação dos usuários:** Seu sistema deverá ser capaz de identificar unicamente seus usuários através de um mecanismo de login.

2. **Suporte a pelo menos dois atores distintos:** Seu sistema deverá suportar a atuação de pelo menos dois atores distintos com suas respectivas ações (ex.: usuário e administrador).

3. **Solução deverá conter pelo menos quatro requisitos:** Sua solução deverá implementar pelo menos quatro requisitos no formato de funcionalidades.

4. **Armazenamento no formato de arquivos texto:** Seu sistema deverá armazenar suas informações no utilizando arquivos texto.
	* É claro que você poderá utilizar formas automatizadas para recuperar e armazenar os dados, tais como formatos estruturados de armazenamento (XML ou JSON).

## Cronograma

O trabalho será avaliado parcialmente, conforme cronograma definido abaixo. Essa organização permite ao aluno não se perder durante o desenvolvimento do sistema, uma vez que provê uma estimativa confiável de cumprimento do prazo do trabalho.

| Data       | O que deve ser entregue?                        | Valor     | TAG   |
|------------|-------------------------------------------------|-----------|-------|
| 27/06/2017 | Grupo, Tema & Requisitos                        | --        | --    |
| 04/07/2017 | Sprint 01: Protótipos HTML de dois requisitos   | 02 pontos | HTML  |
| 13/07/2017 | Sprint 02: Implementação do requisito R1        | 02 pontos | R1    |
| 01/08/2017 | Sprint 03: Implementação dos requisitos R2 e R3 | 04 pontos | R2/R3 |
| 08/08/2017 | Sprint 04: Implementação do requisito R4        | 02 pontos | R4    |
| 17/08/2017 | Sprint 05: Implementação da autenticação        | 02 pontos | Auth  |
| 24/08/2017 | Apresentação do trabalho                        | 05 pontos | 1.0   |


* **27/06/2017:** O grupo deverá fazer um fork deste repositório e alterar o `README.md` do projeto de forma a incluir os componmentes do grupo, qual foi o tema selecionado, e quais requisitos seu sistema irá implementar.
* **04/07/2017:** O grupo deverá implementar o protótipo em HTML de dois requisitos selecionados anteriormente. É importante que o grupo converse com o professor para decidir quais requisitos são mais fáceis de se prototipar e implementar primeiro.
* **13/07/2017:** O grupo deverá implementar pelo menos um dos requisitos prototipados anteriormente.
* **01/08/2017:** O grupo deverá implementar pelo menos dois requisitos do sistema, somando três requisitos implementados no total.
* **08/08/2017:** O grupo deverá ter implementado todos os requisitos do sistema.
* **17/08/2017:** O grupo deverá ter implementado os mecanimos de autenticação e identificação dos usuários do sistema.
* **24/08/2017:** Apresentação do trabalho final em sala de aula.

As entregas deverão ser marcadas com tags do próprio Git, indicadas na tabela acima. Leia sobre tags [aqui](http://imasters.com.br/artigo/21127/software-livre/como-trabalhar-com-tags-no-git/?trace=1519021197&source=single).

## Apresentação

A apresentação do trabalho ocorrerá no dia **24/08/2017**. Você deverá apresentar seu trabalho para seus colegas de turma junto de uma **banca de avaliação** que irá avaliar seu trabalho.

A banca de avaliação contará, a princípio, com **um especialista no desenvolvimento de software** que irá avaliar principalmente os aspectos internos do sistema (código, estruturação, etc.) e **um usuário comum**, que irá avaliar principalmente os aspectos externos do sistema (design, usabilidade, etc.).

A apresentação será dividida em duas partes:

* **Explicação:** Apresentação sobre o sistema, principais funcionalidades, o que foi implementado, o que foi usado, etc. etc.
* **Demonstração:** Você irá executar o seu sistema e mostrar o funcionamento dos requisitos implementados.

## Pilha de Tecnologias

Você estará livre para utilizar as bibliotecas e frameworks que considerar necessários. O uso de tais recursos inclusive é incentivado!!

Contudo, o desenvolvimento do trabalho **deve** englobar, de alguma forma, os seguintes conceitos:

* HTML
* CSS/SCSS
* JavaScript
* PHP: Classes, funções, etc.
* PHP: Sessões e Cookies
* PHP: Arquivos

## Composição dos grupos

Os grupos deverão, **obrigatóriamente**, ser compostos por alunos das duas extintas subturmas (103 e 106).

## Projeto GameMaster (Organizador de Mesas de RPG)

**Membros do grupo**:
* Francisco Fabiano
* Victor Hugo Silva Moura
* Fernando Luiz

**Proposta:**
A proposta do projeto é facilitar a montagem de mesas de RPG. Usuários poderão assumir as posições de jogador e de mestre, criando e participando de mesas.
Vários filtros, incluindo mas não se limitando a perfil do jogador, gênero, horário e local da mesa, serão usados para filtrar as mesas, permitindo aos usuários escolher a melhor para eles.

**Features**
* Busca filtrada de mesas: veja apenas jogos compatíveis com seus horários, gostos e locais.
	* Os usuários não verão todas as mesas disponíveis (que, nós esperamos, devem se espalhar por todo o globo), apenas as de sua área. Conforme o projeto for evoluindo, ele poderá ver separar mesas por relevância, gênero, jogador, etc.
* Criação flexível de mesas, incluindo hora e local. Chega de cancelamentos!
	* A criação de mesas irá incluir características como horário e local, além de gênero do jogo, foco da narrativa, sistema e jogadores. Nunca mais você se verá às voltas com um jogador querendo combate em uma campanha política ou aquele noob que achava que D&D era ficção científica.
* Avaliação de mestres e jogadores. Seja você lawful/neutral ou chaotic/evil, temos uma mesa para você!
	* O mestre destruiu toda a sua interpretação do personagem e contou uma história ruim? Dê uma nota baixa para ele. Um jogador acabou com sua campanha séria matando todos os NPCs? Você pode bani-lo da sua mesa e colocar uma tag "agressivo" no perfil dele para prevenir outros mestres.
* Perfis de jogador e mestre, detalhando as preferências individuais.
	* Receba notificações de mesa dos gêneros e sistemas que você curte próximas. Conheça as preferências dos seus jogadores e mestres, tiros no escuro nunca mais.
* Mesas públicas e privadas. Convide jogadores ou seja encontrado por eles!
	* Ao criar a mesa, o mestre terá a opção de torná-la pública ou privada. Mesas públicas podem ser vistas por todos, perfeitas para conhecer novos jogadores. Mesas privadas só podem ser acessadas por quem receber um convite.
* Sistema de notificações: receba convites e fique ligado nas alterações nas suas mesas
	* Receba convites para mesas privadas e saiba imediatamente se seu mestre mudou o horário do jogo ou colocou um novo jogador na mesa.
* No futuro:
	* Sistema de localização
	* Banco de dados da mesa para armazenar fichas e livros
	* Tags