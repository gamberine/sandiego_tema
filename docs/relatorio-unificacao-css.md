# Relatório - Unificação CSS San Diego

Data: 09/11/2025

## Inclusões no `style-base.css`
- `.section-pad`, `.sd-title`, `.sd-sub` e `.lead` ajustadas para tipografia responsiva e espaçamento fluido.
- `.sd-btn` e estados de foco/hover migrados do antigo `sandiego.css`, agora usando `var(--azul-500)`/`var(--teal-500)`.
- `.sd-card` e `.sd-amenity` consolidadas com sombras suaves e transições consistentes.
- Blocos hero/search/services/numbers atualizados para usar tokens (`--card-shadow-soft`, `--white-color`) e melhorias de responsividade.

## Ajustes de variáveis em `style-variaveis.css`
- Atualização da paleta principal (`--primary-color`, `--primary-color-hover`, `--gray-color`).
- Inclusão de novos tokens `--teal-500/600/700`, `--azul-500/600`, `--destaque-color`, `--card-border-color`, `--card-shadow-soft` e `--input-border-color` para padronização.

## Remoções / Conteúdo legado
- Arquivo `assets/css/sandiego.css` removido; todo o conteúdo relevante está em `style-base.css`.
- Referências ao arquivo foram removidas de `functions.php` e do loader redundante `inc/enqueue-and-acf.php`.
- Seletores sem uso atual (`.copy-inline`, `.copy-list .copy-btn`) movidos para o final de `style-base.css` e comentados com indicação de legado.

## Observações
- A responsividade foi revisada com `clamp` e media queries dedicadas às seções principais.
- `sandiego.css` permanece apenas em diretórios obsoletos (`wOBSOLETO/*`) para fins de histórico e não influencia o tema ativo.
