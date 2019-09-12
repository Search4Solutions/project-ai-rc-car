# Project RC-Car web app
The control panel of the RC car is built with HTML and a small script with PHP which ensures that the data is sent to the API. The application is hosted with the Azure Web Apps service. 

#How to use
There are two ways on how to use this web app:

1. You can host it on Azure. This is the most convenient way as your web app is accessible from all over the world. Also it is very easy to integrate it with Azure DevOps for continuous delivery.
2. You can host it locally. If you decide to go with this method, make sure that PHP is installed on your machine.

For both options, you have to insert the IP-address of where the API is hosted in the code at the indicated places in the PHP-script.
