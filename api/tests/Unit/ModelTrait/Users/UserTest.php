<?php

namespace Tests\Unit\ModelTrait\Users;

use App\Contracts\Users\Services\UserServiceInterface;
use App\Entities\Users\UserEntity;
use App\Mappers\Users\UserMapper;
use Codeception\PHPUnit\TestCase;
use Faker\Factory as Faker;

/**
 * Class UserTest
 *
 * @package Tests\Unit\Http\Controllers\Users
 */

class UserTest extends TestCase
{

    /** @var array */
    protected array $dados = [];

    /** @var \ICSEncomendaLv\Entities\Devolucao\Encomenda\WmsEnderecoEntity */
    protected WmsEnderecoEntity $entidade;

    /**
     * Retorna uma Entidade WmsEndereco populada com dados válidos
     * @return \ICSEncomendaLv\Entities\Devolucao\Encomenda\WmsEnderecoEntity
     */

    protected function obterWmsEnderecoEntity(): WmsEnderecoEntity
    {
        $this->entidade = new WmsEnderecoEntity();
        $dados = $this->obterDadosWmsEnderecoModel();
        $this->entidade->setId($dados["id"])
            ->setWmsEnderecoId($dados["wms_endereco_id"])
            ->setAgid($dados["agid"])
            ->setEncoid($dados["encoid"])
            ->setFuncid($dados["funcid"])
            ->setCadastroData($dados["cadastro_data"])
            ->setCadastroHora($dados["cadastro_hora"]);
        return $this->entidade;
    }


    /**
     * Retorna um conjunto de dados validos para popular Model de WmsEndereco
     * @return array
     */

    protected function obterDadosWmsEnderecoModel()
    {
        $faker = Faker::create();
        if (empty($this->dados)) {
            $this->dados = [
                "id" => $faker->numberBetween(),
                "wms_endereco_id" => $faker->numberBetween(),
                "agid" => $faker->numberBetween(),
                "cadastro_data" => $faker->date(),
                "cadastro_hora" => $faker->time(),
                "funcid" => $this->faker->numberBetween(),
                "encoid" => $this->faker->numberBetween(),
            ];
        }
        return $this->dados;
    }
}
