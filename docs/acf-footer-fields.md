# Campos ACF - Rodape San Diego Hoteis 2025

**Grupo sugerido:** Footer - Conteudo institucional  
**Local:** Post Type == `conteudo` (mesmo CPT usado hoje para centralizar os textos globais)

## Campos principais
| Ordem | Rotulo (admin) | Nome (slug) | Tipo | Observacoes |
| ----- | --------------- | ----------- | ---- | ----------- |
| 1 | Logomarca do rodape | `logomarca_rodape` | Image | Reaproveitar campo ja existente. Retorno pode ser URL ou Array (o template trata os dois formatos). |
| 2 | Titulo coluna: Nossa empresa | `footer_company_menu_title` | Text | Valor padrao "Nossa Empresa". Exibido sobre o menu institucional. |
| 3 | Titulo coluna: Entre em contato | `footer_contact_title` | Text | Valor padrao "Entre em contato". |
| 4 | Itens de contato | `footer_contact_items` | Repeater | Cada linha representa um item com label + conteudo + link. Exibir na coluna central. |
| 5 | Linhas info institucional | `footer_company_info_lines` | Repeater | Usado para as duas linhas menores (endereco e dados legais). |
| 6 | Titulo coluna: Siga-nos | `footer_social_title` | Text | Valor padrao "Siga-nos". |
| 7 | Redes sociais | `footer_social_links` | Repeater | Lista de icones/links sociais. |

## Subcampos dos repeaters

### `footer_contact_items`
| Rotulo | Nome | Tipo | Regras | Observacoes |
| ------ | ---- | ---- | ------ | ----------- |
| Label | `footer_contact_label` | Text | Opcional | Ex: "Administracao Hoteleira". Sempre exibido em caps e com tracking. |
| Conteudo | `footer_contact_content` | Textarea | Obrigatorio | Usado para telefone/email ou texto livre. Permita quebras de linha manuais (desative auto `<p>`). |
| Link | `footer_contact_link` | Link | Opcional | Retorno em formato **Array** para aproveitar URL + Target. Use para `tel:`, `mailto:` ou URLs externas. |

### `footer_company_info_lines`
| Rotulo | Nome | Tipo | Observacoes |
| ------ | ---- | ---- | ----------- |
| Linha | `footer_company_info_text` | Textarea | Coloque aqui endereco completo e dados legais (uma linha por item). Pode receber `&mdash;` para travessoes. |

### `footer_social_links`
| Rotulo | Nome | Tipo | Observacoes |
| ------ | ---- | ---- | ----------- |
| Label | `footer_social_label` | Text | Usado como texto acessivel/aria-label. Ex: "Facebook". |
| URL | `footer_social_url` | Link | Retorno em formato **Array** (URL + Target). Se vazio o item e ignorado. |
| Classe do icone | `footer_social_icon_class` | Text | Informe a classe completa do Font Awesome (ex: `fab fa-facebook-f`). O template exibe o texto do label caso o campo fique vazio. |

## Notas de preenchimento
- Continue usando o CPT `conteudo` para armazenar os campos globais e mantenha apenas 1 post publicado (o template pega o mais recente).
- Os itens de contato sao renderizados na ordem definida no repeater. Use-os para telefones, emails e whatsapp; os dois campos livres abaixo (repeater `footer_company_info_lines`) cuidam do endereco e do CNPJ.
- Os links sociais sao renderizados como botoes circulares. Utilize icones Font Awesome ja carregados pelo tema.
- Caso algum titulo de coluna fique vazio no painel, o tema aplica automaticamente os textos padrao mostrados na tabela acima.