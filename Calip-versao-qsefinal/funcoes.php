<?php
/**
 * calc_ipv4 - Cálculo de máscara de sub-rede IPv4
 */
class calc_ipv4
{
    // O endereço IP
    public $endereco;
    
    // O cidr
    public $cidr;
    
    // O endereço IP 
    public $endereco_completo;

    public function __construct() {

        //Assosia o endereco ao POST['ip'] da página index
        $this->endereco = $_POST['ip'];

        //Assosia o endereco ao POST['mascara'] da página index
        $this->mascara = $_POST['mascara'];

        //Concatena o IP do prefixo CIDR
        $this->endereco_completo = $this->endereco."/".$this->mascara;
        $this->valida_endereco();
    }
    
    /**
     * Validação do endereço IPv4
     */

    public function valida_endereco() {
        // Expressão regular
        $regexp = '/^[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\/[0-9]{1,2}$/';
        
        // Verifica se o IP/CIDR são válidos
        if ( ! preg_match( $regexp, $this->endereco_completo ) ) {
            return false;
        }

   
        // Separa o IP do prefixo CIDR
        $endereco = explode( '/', $this->endereco_completo );
        
        // CIDR
        $this->cidr = (int) $endereco[1];
        
        // Endereço IP
        $this->endereco = $endereco[0];
        
        // Verifica o prefixo
        if ( $this->cidr > 32 ) {
            return false;
        }
        
        // Faz um loop e verifica cada número do IP
        foreach( explode( '.', $this->endereco ) as $numero ) {
        
            // Garante que é um número
            $numero = (int) $numero;
            
            // Não pode ser maior que 255 nem menor que 0
            if ( $numero > 255 || $numero < 0 ) {
                return false;
            }
        }
        
        // IP "válido" (correto)
        return true;
    }

    /* Retorna o endereço IPv4/CIDR */
    public function endereco_completo() { 
        return ( $this->endereco_completo ); 
    }

    /* Retorna o endereço IPv4 */
    public function endereco() { 
        return ( $this->endereco ); 
    }

    /* Retorna o prefixo CIDR */
    public function cidr() { 
        return ( $this->cidr ); 
    }

    /* Retorna a máscara de sub-rede */
    public function mascara() {
        if ( $this->cidr() == 0 ) {
            return '0.0.0.0';
        }

        return ( 
            long2ip(
                ip2long("255.255.255.255") << ( 32 - $this->cidr ) 
            )
        );
    }

    /* Retorna a rede na qual o IP está */
    public function rede() {
        if ( $this->cidr() == 0 ) {
            return '0.0.0.0';
        }

        return (
            long2ip( 
                ( ip2long( $this->endereco ) ) & ( ip2long( $this->mascara() ) )
            )
        );
    }

    /* Retorna o IP de broadcast da rede */
    public function broadcast() {
        if ( $this->cidr() == 0 ) {
            return '255.255.255.255';
        }
        
        return (
            long2ip( ip2long($this->rede() ) | ( ~ ( ip2long( $this->mascara() ) ) ) )
        );
    }
    
    /* Retorna o número total de IPs (com a rede e o broadcast) */
    public function total_ips() {
        return( pow(2, ( 32 - $this->cidr() ) ) );
    }
    
    /* Retorna os número de IPs que podem ser utilizados na rede */
    public function ips_rede() {
        if ( $this->cidr() == 32 ) {
            return 0;
        } elseif ( $this->cidr() == 31 ) {
            return 0;
        }
        
        return( abs( $this->total_ips() - 2 ) );
    }

    public function binario(){

        $pontos = array(",",".");   

        $enderecos_separado = array();

        $enderecos_binario = array();

        $enderecos_separado = explode( '.', $this->endereco);

        foreach ($enderecos_separado as $end) {

            $enderecos_binario[] = decbin($end);

        }

        $endereco_binario = implode(".",$enderecos_binario);
        
        return $endereco_binario;

    }

    public function classe(){

        $endereco_separado = explode('.',$this->endereco);

        if ($endereco_separado[0] >= '1' AND $endereco_separado[0] <= '127') {
            return "A" ;
        }elseif($endereco_separado[0] >= '128' AND $endereco_separado[0] <= '191') {
            return "B" ;
        }elseif($endereco_separado[0] >= '192' AND $endereco_separado[0] <= '223') {
            return "C" ;
        }elseif($endereco_separado[0] >= '224' AND $endereco_separado[0] <= '239') {
            return "D" ;
        }elseif($endereco_separado[0] >= '240' AND $endereco_separado[0] <= '255') {
            return "E" ;            
        }
    }

    public function puborpriv(){

         $endereco_separado = explode('.',$this->endereco);

         switch ($endereco_separado[0]) {
            case '10':
                 return "Privado";
                 break;

            case '172':
                 return "Privado";
                 break;

            case '192':
                 return "Privado";
                 break;    

             default:
                 return "Público";
                 break;
         }
    }
    
    /* Retorna os número de IPs que podem ser utilizados na rede */
    public function primeiro_ip() {
        if ( $this->cidr() == 32 ) {
            return null;
        } elseif ( $this->cidr() == 31 ) {
            return null;
        } elseif ( $this->cidr() == 0 ) {
            return '0.0.0.1';
        }
        
        return (
            long2ip( ip2long( $this->rede() ) | 1 )
        );
    }
    
    /* Retorna os número de IPs que podem ser utilizados na rede */
    public function ultimo_ip() {
        if ( $this->cidr() == 32 ) {
            return null;
        } elseif ( $this->cidr() == 31 ) {
            return null;
        }
    
        return (
            long2ip( ip2long( $this->rede() ) | ( ( ~ ( ip2long( $this->mascara() ) ) ) - 1 ) )
        );
    }
}

