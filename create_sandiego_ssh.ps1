# Criacao e configuracao de chave SSH para deploy do tema San Diego (Hostinger)
# Ambiente: PowerShell (Windows)

$hostingerIP   = "31.170.167.12"
$hostingerPort = 65002
$hostingerUser = "u356155903"

$sshFolder = "$env:USERPROFILE\.ssh"
$keyName   = "id_rsa_sandiego"
$keyPath   = Join-Path $sshFolder $keyName
$keyPubPath = "$keyPath.pub"

if (!(Test-Path $sshFolder)) {
    New-Item -ItemType Directory -Path $sshFolder | Out-Null
}

Write-Host "Gerando par de chaves SSH..."
ssh-keygen -t rsa -b 4096 -C "deploy@sandiegohoteis" -f $keyPath -N ''


Write-Host ""
Write-Host "Chave publica gerada em: $keyPubPath"
Get-Content $keyPubPath
Write-Host "--------------------------------------------"

$senha = Read-Host "Digite a senha SSH do usuario ($hostingerUser) no Hostinger" -AsSecureString
$senhaTexto = [Runtime.InteropServices.Marshal]::PtrToStringAuto([Runtime.InteropServices.Marshal]::SecureStringToBSTR($senha))

# Usa plink (PuTTY) se disponivel, ou tenta com sshpass para Windows
if (Get-Command "plink.exe" -ErrorAction SilentlyContinue) {
    $plinkCmd = "echo $pubKey | plink.exe -ssh -P $hostingerPort -l $hostingerUser -pw $senhaTexto $hostingerIP `"mkdir -p ~/.ssh && cat >> ~/.ssh/authorized_keys && chmod 700 ~/.ssh && chmod 600 ~/.ssh/authorized_keys`""
    cmd /c $plinkCmd
} else {
    Write-Host "plink.exe nao encontrado. Tentando com sshpass..."
}

Write-Host ""
Write-Host "Testando conexao via chave..."
ssh -i $keyPath -p $hostingerPort "$hostingerUser@$hostingerIP" "echo 'Conexao SSH OK'"

Write-Host ""
Write-Host "--------------------------------------------"
Write-Host "Tudo pronto."
Write-Host "Adicione no GitHub (Settings -> Secrets -> Actions):"
Write-Host "  HOSTINGER_HOST    = $hostingerIP"
Write-Host "  HOSTINGER_PORT    = $hostingerPort"
Write-Host "  HOSTINGER_USER    = $hostingerUser"
Write-Host "  HOSTINGER_SSH_KEY = conteudo do arquivo:"
Write-Host "                      $keyPath"
Write-Host "--------------------------------------------"
Write-Host "Para exibir a chave privada, execute:"
Write-Host "Get-Content $keyPath"
Write-Host "--------------------------------------------"
