<?php

namespace Tests\Unit;
use App\Exceptions\HttpException;
use App\Services\Http\HttpClient;
use App\Services\NearEarth\NearEarthService;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class NearEarthServiceTest extends TestCase

{
    use RefreshDatabase;

    protected HttpClient $httpClient;
    protected array $data;

    protected function setUp(): void
    {
        parent::setUp(); // TODO: Change the autogenerated stub
        $this->httpClient = new HttpClient(new Http());
        $date_current = Carbon::now();
        $date_last = Carbon::now();
        $date_last->subDays(3);
        $properties = [
            'start_date=' . $date_last->format('Y-m-d'),
            'end_date=' . $date_current->format('Y-m-d'),
            'api_key=' . env('NASA_API_KEY')
        ];

        $this->data = $this->httpClient->get('https://api.nasa.gov/neo/rest/v1/feed', $properties)->json();
    }

    public function test_getHazardous() : void
    {
        $hazardousObj = NearEarthService::getHazardous();
        $this->assertInstanceOf(JsonResource::class, $hazardousObj);
    }

    public function test_getFastestHazardous() : void
    {
        $hazardousObj = NearEarthService::getFastestHazardous([]);
        $this->assertInstanceOf(JsonResource::class, $hazardousObj);
    }

    public function test_getHazardousForNasaCheckingHttpClientUncorrectUrl() : void
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('error');
        $this->httpClient->get('https://apis.nasa.gov/neo/rest/v1/feed', []);
    }

    public function test_getHazardousForNasaCheckingHttpClient() : void
    {

        $this->assertArrayHasKey('near_earth_objects', $this->data);
    }

    public function test_checkGetHazardousForNasaCheckingHttpClient() : void
    {
        $this->assertNotEmpty($this->data["near_earth_objects"]);
    }
}
