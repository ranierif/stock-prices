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
    public $loadingResult = false;

    /**
     * Data
     */
    public $stockPriceResponse;

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
        $this->loadingResult = true;
        $this->stockPriceResponse = null;
        $this->validateOnly($propertyName);
        $this->can_submit = true;
        $this->loadingResult = false;
    }

    /**
     * Submit form
     */
    public function submit()
    {
        $this->loadingResult = true;

        try {
            $this->validate();
        } catch (\Illuminate\Validation\ValidationException $e) {
            $this->loadingResult = false;
            return session()->flash('danger', $e->getMessage());
        }

        if($this->validate()){
            try {
                $information = app(StockPriceService::class)->getInformation($this->symbol);
                if($information){
                    $this->stockPriceResponse = $information;
                }
            } catch (\Exception $e) {
                session()->flash('danger', $e->getMessage());
            }
        }

        $this->loadingResult = false;
    }

    public function render()
    {
        return view('livewire.show-stock-price');
    }
}
