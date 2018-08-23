# cgnat-mikrotik


Itens necessários:
-> php
-> shell terminal

Modo de uso:

Editar o arquivo "configure.php" conforme a necessidade de sua rede. 
A variável definida em"IP_PRI_START" refere-se à rede interna. Não é necessário colocar todo o bloco, o script ira gerar ip privado suficiente para os blocos públicos.
Coloque apenas o ip privado que você deseja que inicie o CGNAT. (Conforme o exemplo deixado na configuração padrão)

Variável definida como "IP_PUB_START" defini-se o ip inicial do bloco público.

Variável definida como "IP_PUB_STOP" define-se o ip final do bloco público. (Deixado exemplo para teste)

Variável definiada "IP_CGNAT" defini-se a quantidade de clientes privados que sairá por um ÚNICO ip público. 

Um exemplo disso seria: 1:64 = 1 ip público, com 64 ip privados onde 1023 portas por ip privado fixas
			1:32 = 1 ip público, com 32 ip privados onde 2046 portas por ip privado fixas

(OBS.: Recomeda-se fazer o MÍNIMO de portas por cliente privado em 1024.)
(OBS2.: O SCRIPT NÃO IRA GERAR PORTAS A BAIXO DE 1024 PARA OS CLIENTES. ESSAS PORTAS FICAM PARA SUA GERÊNCIA)

Após configurar tudo, dê o comando:

- php execute.php

Ele ira criar um arquivo com o nome:"cgnat-mikrotik.txt" na mesma pasta. Copie e cole no terminal do seu mikrotik. 
	(OBS3.: Todas as regras criadas pelo script, são criadas de formas desabilitadas. Será necessário acessar o winbox, e habilitar as regras em ip > firewall> NAT)

Em algumas versões do Shell, você pode ter problema de escrita nos script. Rode o comando na pasta com os script:

- chmod +o *
