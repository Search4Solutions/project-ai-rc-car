provider "azurerm" {
  version = "~> 1.33.1"
}

resource "azurerm_resource_group" "rc-car" {
  name     = "rc-car-resourcegroup"
  location = "West Europe"
  tags = {
    environment = "testing"
  }
}

data "azurerm_resource_group" "rc-car" {
  name = "rc-car-resourcegroup"
}

data "azurerm_key_vault" "keyvault" {
  name = "key-vault-s4s"
  resource_group_name = data.azurerm_resource_group.rc-car.name
}
 
data "azurerm_key_vault_secret" "secret_ad-client-secret" {
  name = "ad-client-secret"
  vault_uri = data.azurerm_key_vault.keyvault.vault_uri
}

data "azurerm_key_vault_secret" "secret_rc-car-api-token" {
  name = "rc-car-api-token"
  vault_uri = data.azurerm_key_vault.keyvault.vault_uri
}

data "azurerm_key_vault_secret" "secret_rc-car-server-ip" {
  name = "rc-car-server-ip"
  vault_uri = data.azurerm_key_vault.keyvault.vault_uri
}

resource "azurerm_app_service_plan" "rc-sp-plan" {
  name                = "rc-car-appserviceplan"
  location            = azurerm_resource_group.rc-car.location
  resource_group_name = azurerm_resource_group.rc-car.name
  kind                = "Linux"
  reserved            = true

  sku {
    tier = "Free"
    size = "F1"
  }
}

resource "azurerm_app_service" "example" {
  name                = "rc-car-cp"
  location            = azurerm_resource_group.rc-car.location
  resource_group_name = azurerm_resource_group.rc-car.name
  app_service_plan_id = azurerm_app_service_plan.rc-sp-plan.id

  app_settings = {
    SERVER_IP = data.azurerm_key_vault_secret.secret_rc-car-server-ip.value
    API_TOKEN = data.azurerm_key_vault_secret.secret_rc-car-api-token.value
  }

  auth_settings{
    enabled = true
    default_provider = "AzureActiveDirectory"
    issuer = "https://sts.windows.net/5932d7c7-b284-4c98-8e44-a577768248df"

    active_directory {
      client_id     = "171ce5b4-b4a3-4c2b-bd64-6fbed471469a"
      client_secret = data.azurerm_key_vault_secret.secret_ad-client-secret.value

      allowed_audiences = [
        "https://rc-car-cp.azurewebsites.net",
      ]
    }

  }

  site_config {
    linux_fx_version = "PHP|7.3"
    scm_type         = "LocalGit"
    use_32_bit_worker_process = true
  }
}

