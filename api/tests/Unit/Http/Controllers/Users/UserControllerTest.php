<?php

namespace Tests\Unit\Http\Controllers\Users;

use App\Contracts\Users\Services\UserServiceInterface;
use App\Entities\Users\UserEntity;
use App\Mappers\Users\UserMapper;
use Codeception\PHPUnit\TestCase;

/**
 * Class WmsEnderecoControllerTest
 *
 * @package Tests\Unit\Http\Controllers\Users
 */

class WmsEnderecoControllerTest extends TestCase
{
    use WmsEnderecoEntityModelTrait;

    /** @var \Prophecy\Prophecy\ObjectProphecy */
    private ObjectProphecy $wmsEnderecoServicoMock;

    /** @var \Prophecy\Prophecy\ObjectProphecy */
    private ObjectProphecy $requestMock;

    /** @var array */
    private array $reabreDados;

    /**
     * @inheritDoc
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->wmsEnderecoServicoMock = $this->prophesize(WmsEnderecoServiceInterface::class);
        $this->requestMock = $this->prophesize(WmsEnderecoRequest::class);
        $this->reabreDados = [
            'mawbId' => 1,
            'wmsEnderecoId' => 2,
            'agid' => 3,
            'funcid' => 4
        ];
    }

    /**
     * Testa se a classe pode ser instanciada
     */
    public function testConsegueInstanciar()
    {
        $classeConcreta = new WmsEnderecoController($this->wmsEnderecoServicoMock->reveal());
        $this->assertInstanceOf(WmsEnderecoController::class, $classeConcreta);
    }

    /**
     * Teste unitário para o método Criar Wms Endereço com Sucesso.
     */

    public function testCriarWmsEnderecoComSucesso()
    {
        $this->requestMock->all()->willReturn($this->reabreDados);
        $this->wmsEnderecoServicoMock->inserir($this->reabreDados)->willReturn($this->obterWmsEnderecoEntity());
        $classeConcreta = $this->getClasseConcreta();
        $retorno = $classeConcreta->cadastrar($this->requestMock->reveal());
        $this->assertInstanceOf(JsonResponse::class, $retorno);
        $this->assertEquals(Response::HTTP_CREATED, $retorno->getStatusCode());
        $data = [
            "codigo" => Response::HTTP_CREATED,
            "descricao" => "Encomenda Endereço cadastrado com sucesso.",
            "encomendaEndereco" => $this->obterWmsEnderecoEntity()->getId(),
        ];
        $this->assertEquals(json_encode($data), $retorno->getContent());
    }


    /**
     * Teste unitário para o método Criar Wms Endereço com Erro.
     */
    public function testCriarWmsEnderecoComErro()
    {
        $this->requestMock->all()->willReturn($this->reabreDados);
        $this->wmsEnderecoServicoMock->inserir($this->reabreDados)->willThrow(\Exception::class);
        $this->expectException(\Exception::class);
        $classeConcreta = $this->getClasseConcreta();
        $retorno = $classeConcreta->cadastrar($this->requestMock->reveal());
        $this->assertInstanceOf(JsonResponse::class, $retorno);
        $this->assertEquals(Response::HTTP_BAD_REQUEST, $retorno->getStatusCode());
        $data = [
            'codigo' => 400,
            'descricao' => $retorno->getMessage(),
        ];
        $this->assertEquals(json_encode($data), $retorno->getContent());
    }

    /**
     * @return WmsEnderecoController
     */
    private function getClasseConcreta()
    {
        return new WmsEnderecoController(
            $this->wmsEnderecoServicoMock->reveal()
        );
    }
}
