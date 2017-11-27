# Deploy

## Authorization to deploy

To deploy the application you must generate a SSH key pair to the project and register it in the stage server. Use the a PHP container to generate the key pair.

    docker-compose run --rm php ssh-keygen -q -t rsa -f /root/.ssh/id_rsa -N ""

Get the generated key and add to the stage server  _authorized_keys_ file that you want deploy.

    docker-compose run --rm php cat /root/.ssh/id_rsa.pub

Copy the key and sent to who has the access to update the authorized keys.

## Authorization to get the code

In the process of deploy, the serve will get the code in the Git repository. It's necessary config the repository to allow server access it. Normally it has a section called _Deploy Keys_ in the project settings. Put the server public key there.

## Deploying

The deploy is managed by Deployer. You need permission to do the deploy. You public key must be registered in the host. To run the deploy you just need

    docker-compose run --rm php dep deploy production --log deploy.log
