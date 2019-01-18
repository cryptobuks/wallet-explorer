<?php


namespace KriosMane\WalletExplorer\app\Cryptocurrencies;




class Bitcoin extends Crypto {

    /**
     * 
     */
    protected $name = 'Bitcoin';

    /**
     * 
     */
    protected $symbol = 'BTC';

    /**
     * 
     */
    protected $url = 'https://chain.so/api/v2/get_address_balance/BTC/%s';

    /**
     * {@inheritdoc}
     */
    public function handle($arguments)
    {
        

        $response = $this->call($arguments);

        if(!$response){

            return $response;

        }

        $response = json_decode($response->getBody()->getContents(), true);

        $this->explorer_response->setBalance($response['data']['confirmed_balance']);

        return $this->explorer_response;

    }


}



?>