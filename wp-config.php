<?php
/**
 * As configurações básicas do WordPress
 *
 * O script de criação wp-config.php usa esse arquivo durante a instalação.
 * Você não precisa user o site, você pode copiar este arquivo
 * para "wp-config.php" e preencher os valores.
 *
 * Este arquivo contém as seguintes configurações:
 *
 * * Configurações do MySQL
 * * Chaves secretas
 * * Prefixo do banco de dados
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/pt-br:Editando_wp-config.php
 *
 * @package WordPress
 */
//define('WP_DEBUG', true);
// ** Configurações do MySQL - Você pode pegar estas informações
// com o serviço de hospedagem ** //
/** O nome do banco de dados do WordPress */
define('DB_NAME', 'openredu_org');

/** Usuário do banco de dados MySQL */
define('DB_USER', 'openreduorg');

/** Senha do banco de dados MySQL */
define('DB_PASSWORD', 'orr3du2017');

/** Nome do host do MySQL */
define('DB_HOST', 'localhost');

/** Charset do banco de dados a ser usado na criação das tabelas. */
define('DB_CHARSET', 'utf8mb4');

/** O tipo de Collate do banco de dados. Não altere isso se tiver dúvidas. */
define('DB_COLLATE', '');

/**#@+
 * Chaves únicas de autenticação e salts.
 *
 * Altere cada chave para um frase única!
 * Você pode gerá-las
 * usando o {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org
 * secret-key service}
 * Você pode alterá-las a qualquer momento para desvalidar quaisquer
 * cookies existentes. Isto irá forçar todos os
 * usuários a fazerem login novamente.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'a]B`Yu?h^ti$MSk)kTts?,y?CZ8D,w:-ADB<edan>BKri!X@&8z&T yO<i~ Y5Xu');
define('SECURE_AUTH_KEY',  'S<zeX9;z3)zi#-+_,d$-vP>U6/O%Ez91gq|S~K&Uz&S|{uN3yzJ%I|<ZyWQ,3y6q');
define('LOGGED_IN_KEY',    'Bc;@M,Tjkt2O4s<EBX9*6E>-~mP{AuZptU:ni<s/|z}w_7tb,=tl9o4]{X#ygq( ');
define('NONCE_KEY',        ' 4U^VaUkwT/  X0b$6~L1}v[kr1NrV<!fLNDT=y`gN3ndhbLv9CW.N,f,dCuI#iM');
define('AUTH_SALT',        'Q,,.o(HBba)W4(GAxi^3.e)IS,hG4<RC&~?IrM$`ocMyBFDwg@Cn?pIL=TzFcKxE');
define('SECURE_AUTH_SALT', 'r44@_bo<Y5on1i/_&[M}3`LAi9h1Z9,D_n^zG,A4w#p6!qN[Q>lFm6;u$!0SOv}x');
define('LOGGED_IN_SALT',   '0@lzN%cyn`x&U(=WqK6]Xc12hKomi?;leS#w|X0v5w;Y[7ooH_aI+*xE~a:h78Yx');
define('NONCE_SALT',       '|3yRLm3LjiBf BE9IZIjJ,D0TWx)-08+Itm}6d=?bV]3TfD%zMdJ_<UXtHjpK-za');

/**#@-*/

/**
 * Prefixo da tabela do banco de dados do WordPress.
 *
 * Você pode ter várias instalações em um único banco de dados se você der
 * para cada um um único prefixo. Somente números, letras e sublinhados!
 */
$table_prefix  = 'opr_';

/**
 * Para desenvolvedores: Modo debugging WordPress.
 *
 * Altere isto para true para ativar a exibição de avisos
 * durante o desenvolvimento. É altamente recomendável que os
 * desenvolvedores de plugins e temas usem o WP_DEBUG
 * em seus ambientes de desenvolvimento.
 *
 * Para informações sobre outras constantes que podem ser utilizadas
 * para depuração, visite o Codex.
 *
 * @link https://codex.wordpress.org/pt-br:Depura%C3%A7%C3%A3o_no_WordPress
 */
define('WP_DEBUG', false);
define('FS_METHOD', 'direct');
// caminho absoluto do diretório raiz de instalação
define('FTP_BASE', '/public_html/');
// caminho absoluto do diretório wp-content
define('FTP_CONTENT_DIR', '/public_html/wp-content/');
// caminho absoluto da pasta de plugins
define('FTP_PLUGIN_DIR', '/ public_html /wp-content/plugins/');

/* Isto é tudo, pode parar de editar! :) */

/** Caminho absoluto para o diretório WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Configura as variáveis e arquivos do WordPress. */
require_once(ABSPATH . 'wp-settings.php');
