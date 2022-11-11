<?php

namespace App\Http\Livewire;

use App\Http\Requests\StockPriceRequest;
use App\Models\StockPrice;
use App\Repositories\StockPriceRepository;
use App\Services\StockPriceService;
use App\Traits\Livewire\HasFormRequest;
use Illuminate\Database\QueryException;
use Livewire\Component;

class ShowStockPrice extends Component
{
    use HasFormRequest;

    /**
     * Form Request
     */
    protected $formRequest = StockPriceRequest::class;

    /**
     * Variables
     */
    public $symbol;
    public $can_submit = false;

    /**
     * Data
     */
    public $stockPriceResponse;
    private $stockPriceService;

    /**
     * Mount the component
     */
    public function mount()
    {
        $this->name = $this->symbol;
        $this->stockPriceResponse = $this->stockPriceResponse;
    }

    /**
     * Updated component
     *
     * @param  string  $propertyName
     */
    public function updated($propertyName)
    {
        $this->can_submit = false;
        $this->validateOnly($propertyName);
        $this->can_submit = true;
    }

    /**
     * Submit form
     */
    public function submit()
    {
        try {
            $this->validate();
        } catch (\Illuminate\Validation\ValidationException $e) {
            return session()->flash('danger', $e->getMessage());
        }

        try {
            $this->stockPriceResponse = app(StockPriceService::class)->getInformation($this->symbol);
        } catch (QueryException $exception) {
            session()->flash('danger', $exception->errorInfo);
        }
    }

    public function render()
    {
        return view('livewire.show-stock-price');
    }
}
