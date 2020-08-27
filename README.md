Estágios FFLCH

Procedimentos de deploy básico para desenvolvimento:

    composer install
    cp .env.example .env
    php artisan vendor:publish --provider="Uspdev\UspTheme\ServiceProvider" --tag=assets --force
    php artisan migrate:fresh --seed


Vizualizar etapas do estágio:

    sudo apt-get install graphviz
    php artisan workflow:dump -v workflow_estagio --class=App\\Estagio

![workflow](https://raw.githubusercontent.com/fflch/estagios/master/workflow_estagio.png)

## Tutoriais

Empresa 1:

Sistema de Estágio FFLCH - Empresa
https://youtu.be/0TY25JRCJ1E 

- Login por email apenas
- Cadastrar vagas para divulgação
- Cadastrar novos estagiários
- Ver Termo

Setor de graduação:
Sistema de Estágio FFLCH - Setor de Graduação
https://youtu.be/vDPAj9MbjM0

- Cadastrar e editar empresas - em especial quando essa muda de email
- Cadastrar Avisos 
- Cadastrar/Excluir novos parecerista e definir qual é o presidente
- Listar estágios e dar parecer técnico

Pareceristas:

Sistema de Estágio FFLCH - Parecerista 
https://youtu.be/UHg433C2JkE 

- Dar pareceres de méritos
