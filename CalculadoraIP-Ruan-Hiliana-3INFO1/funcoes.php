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

        //Associa o endereco ao POST['ip'] da página index
        $this->endereco = $_POST['ip'];

        //Associa o endereco ao POST['mascara'] da página index
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

    /* Total de sub-redes */
    public function quantidade_subredes(){
        $total_ips = $this->total_ips();
        $quantidade = (256 / $total_ips);
        return $quantidade;
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

    /*Retorna o valor binário do endereço*/
    public function binario(){

        $enderecos_binario = array();

        $enderecos_separado = explode( '.', $this->endereco);

        foreach ($enderecos_separado as $end) {

            $enderecos_binario[] = decbin($end);

        }

        $endereco_binario = implode(".",$enderecos_binario);
        
        return $endereco_binario;

    }

    /*Retorna a classe da qual o endereço pertence*/
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

    /*Retorna se o endereço é público ou privado*/
    public function puborpriv(){

         $endereco_separado = explode('.',$this->endereco);

         if ($endereco_separado[0] == 10 OR $endereco_separado[0] == 172 AND 16 <= $endereco_separado[1] AND $endereco_separado[1] <= 31 OR $endereco_separado[0] == 192 AND $endereco_separado[1] == 168) {
            return "Privado";
         }else{
            return "Público";
         }

    }

    /* Informa cada bloco de sub-rede */
    /* Informa cada bloco de sub-rede */
    public function blocoSubrede(){

        $count = $this->quantidade_subredes();

        $broadcast = explode(".", $this->broadcast());

        $endereco_intervalo = explode(".", $this->endereco());

        $semi_ip = $broadcast[0] . "." . $broadcast[1] . "." . $broadcast[2];

        $host1 = 0;
    
        if($this->cidr() <= 30){

            for ($i=0; $i < $count; $i++) { 
                     
                $host2 = $host1 + $this->total_ips() - 1;

                /*Primeiro IP não disponível */
                $primeiroValor = $semi_ip . "." . $host1;

                /*Último IP não disponível */  
                $segundoValor = $semi_ip . "." . $host2;

                /*Primeiro intervalo disponível*/
                $intervalo1 = $host1 + 1;

                /*Último intervalo disponível*/
                $intervalo2 = $host2 - 1;

                /*Endereço com intervalo*/
                $valorIntervalo1 = $semi_ip . "." . $intervalo1;
                $valorIntervalo2 = $semi_ip . "." . $intervalo2;

                if ($endereco_intervalo[3] >= $intervalo1 AND $endereco_intervalo[3] <= $intervalo2) {

                    $bloc_sub[$i] = "<b style='color: #557A95;'>" . $primeiroValor . '</b> -- <b class="bloco">' . $valorIntervalo1 . ' - <b style="color: #557A95;">'.$this->endereco().' </b>- ' . $valorIntervalo2 . '</b> -- <b style="color: #557A95;">' . $segundoValor . "</b><br>";

                    $host1 = $host1 + $this->total_ips();
                   
                }else{

                    $bloc_sub[$i] = "<b style='color: #557A95;'>" . $primeiroValor . '</b> -- <b class="bloco">' . $valorIntervalo1 . ' - ' . $valorIntervalo2 . '</b> -- <b style="color: #557A95;">' . $segundoValor . "</b> <br>";    

                    $host1 = $host1 + $this->total_ips();                
                }
            }
           
            }elseif( $this->cidr() == 31 ){

            for ($i=0; $i < $count; $i++) { 
                            
                $host2 = $host1 + $this->total_ips() - 1;

                $primeiroValor = $semi_ip . "." . $host1;
                $segundoValor = $semi_ip . "." . $host2;

                $intervalo1 = $host1 + 1;
                $intervalo2 = $host2 - 1;

                $valorIntervalo1 = $semi_ip . "." . $intervalo1;
                $valorIntervalo2 = $semi_ip . "." . $intervalo2;

                if($endereco_intervalo[3] <= $intervalo1 and $endereco_intervalo[3] >= $intervalo2 ){
                    $bloc_sub[$i] = "<b style='color: #557A95;'>" . $primeiroValor . '</b> -- <b class="bloco">' . $valorIntervalo2 . ' -<b style="color: #557A95;"> '.$this->endereco().'</b> - ' . $valorIntervalo1 . '</b> -- <b style="color: #557A95;">' . $segundoValor . "</b><br>";
                }else{
                    $bloc_sub[$i] = "<b style='color: #557A95;'>" . $primeiroValor . '</b> -- <b class="bloco">' . $valorIntervalo2 . ' - ' . $valorIntervalo1 . '</b> -- <b style="color: #557A95;">' . $segundoValor . "</b> <br>";
                }

                $host1 = $host1 + $this->total_ips();

            }
        }elseif( $this->cidr() == 32 ){

            for ($i=0; $i < $count; $i++) { 

                $Valor = $semi_ip . "." . $host1;

                if($endereco_intervalo[3] == $host1 ){
                    $bloc_sub[$i] = "<b style='color: #557A95;'>" . $Valor . '</b> -- <b>' . $Valor . ' - <b style="color: #557A95;">' . $this->endereco . '</b> - ' . $Valor . '</b> -- <b style="color: #557A95;">' . $Valor . "</b> <br>";
                }else{
                    $bloc_sub[$i] = "<b style='color: #557A95;'>" . $Valor . '</b> -- <b>' . $Valor . ' - ' . $Valor . '</b> -- <b style="color: #557A95;">' . $Valor . "</b> <br>";
                }
                
                $host1 = $host1 + $this->total_ips();

            }
        }

        return $bloc_sub;   
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

